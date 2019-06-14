<?php

/**
 * Контроллер AdminUserController
 * Управление пользователями в админке
 */

class AdminUserController extends AdminBase
{

    /**
     * Страница с пользователями
     * @param $page
     * @return bool
     */
    public function actionIndex($page = 1)
    {
        // Проверка прав доступа
        if (self::checkAdmin()) {
            // Получаем id пользователя для авы
            $idUser = User::checkLoggedAdminPanel();

            // Получаем список пользователей
            $userList = array();
            $userList = User::getUserListAdmin($page);

            // Получаем количество пользоваталей
            $total = User::getTotalUserAdmin();
            // Создаем новый объект класса
            $pagination = new Pagination($total, $page, User::SHOW_BY_DEFAULT, 'page-');

            // Подключаем вид
            require_once (ROOT . '/views/admin_user/index.php');
            return true;
        }

        die('Доступ запрещен');
    }

    /**
     * Страница создания нового пользователя
     * @return bool
     */
    public function actionCreate()
    {
        // Проверка прав доступа
        if (self::checkAdmin()) {
            // Получаем id пользователя для авы
            $idUser = User::checkLoggedAdminPanel();

            // Очищаем строки
            $options['name'] = '';
            $options['surname'] = '';
            $options['email'] = '';
            $options['password'] = '';
            $options['role'] = '';

            if (isset($_POST['submit'])) {
                // Если форма была отправлена, считываем данные
                $options['name'] = $_POST['name'];
                $options['surname'] = $_POST['surname'];
                $options['email'] = $_POST['email'];
                $options['password'] = $_POST['password'];
                $options['role'] = $_POST['role'];

                // Делаем валидацию полей
                $errors = false;
                if (!User::checkName($options['name']) || !User::checkName($options['surname'])) {
                    $errors[] = 'Некорректное имя либо фамилия';
                }

                if (!User::checkPassword($options['password'])) {
                    $errors[] = 'Пароль должен содержать не менее 6 символов, из них цифр - не менее 1, 
                    строчных букв - не менее 1, заглавных букв - не менее 1';
                }

                if (User::checkEmailExists($options['email'])) {
                    $errors[] = 'Пользователь с такой почтой уже существует';
                }

                if (!User::checkEmail($options['email'])) {
                    $errors[] = 'Неправильная почта';
                }

                if ($errors == false) {
                    if ($options['role'] == 'admin' || $options['role'] == 'editor') {
                        // Если роль пользователя админ либо редактор, то генерируем логин и пароль для входа в админку
                        $options['admin_login'] = Random::generateLogin(9);
                        $options['admin_password'] = Random::generatePassword(18);

                        // Отправляем письмо на почту пользователя с данными для входа
                        $to = $options['email'];
                        $subject = 'Доступ в админ панель';
                        $message = 'http://'.$_SERVER['HTTP_HOST'] . '/admin/' . PHP_EOL . 'Ваш логин: ' . $options['admin_login'] . PHP_EOL . 'Ваш пароль: ' . $options['admin_password'];
                        mail($to, $subject, $message);

                        // Хешируем пароль для входа в админ панель
                        $options['admin_password'] = password_hash($options['admin_password'], PASSWORD_DEFAULT);

                    } else {
                        // Если нет, то оставляем строки пустыми
                        $options['admin_login'] = null;
                        $options['admin_password'] = null;
                    }

                    // Хешируем пароль пользователя
                    $options['password'] = password_hash($options['password'], PASSWORD_DEFAULT);

                    // Добавляем нового пользователя и получаем его id для аватара
                    $id = User::createUser($options);

                    if ($id) {
                        // Если запись успешно добавлена, то проверяем, было ли загружено изображение
                        if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
                            // Если изображение было загружено, то перемещаем его и даем новое название
                            move_uploaded_file($_FILES["image"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "/upload/images/users/{$id}.jpg");
                        }
                    }

                    // Перенаправляем пользователя
                    header('Location: /admin/user/');
                }

            }

            // Подключаем вид
            require_once (ROOT . '/views/admin_user/create.php');
            return true;
        }

        die('Доступ запрещен');
    }

    /**
     * Страница редактирования пользователя
     * @param $id
     * @return bool
     */
    public function actionUpdate($id)
    {
        // Проверка прав доступа
        if (self::checkAdmin()) {
            // Получаем id пользователя для авы
            $idUser = User::checkLoggedAdminPanel();

            // Получаем информацию о пользователе
            $user = User::getUserById($id);


            if (isset($_POST['submit'])) {
                // Если форма была отправлена, то считываем данные
                $options['name'] = $_POST['name'];
                $options['surname'] = $_POST['surname'];
                $options['email'] = $_POST['email'];
                $options['password'] = $_POST['password'];
                $options['role'] = $_POST['role'];

                $errors = false;
                // Делаем валидацию
                if (!User::checkName($options['name']) || !User::checkName($options['surname'])) {
                    $errors[] = 'Некорректное имя либо фамилия';
                }

                if (!User::checkEmail($options['email'])) {
                    $errors[] = 'Неправильная почта';
                }

                if ($options['email'] != $user['email']) {
                    // Если была изменена почта, то проверяем, есть ли пользователь с такой почтой
                    if (User::checkEmailExists($options['email'])) {
                        $errors[] = 'Пользователь с такой почтой уже существует';
                    }
                }

                if (strlen($options['password']) > 0) {
                    // Если пароль был введен, то делаем проверку
                    if (!User::checkPassword($options['password'])) {
                        $errors[] = 'Пароль должен содержать не менее 6 символов, из них цифр - не менее 1, 
                    строчных букв - не менее 1, заглавных букв - не менее 1';
                    } else {
                        // Если проверка была пройдена, то отправляем письмо на почту пользователя о смене пароля
                        $to = $options['email'];
                        $subject = 'Ваш пароль был изменен администратором';
                        $message =  'http://'.$_SERVER['HTTP_HOST'] . '/user/login/' . PHP_EOL . 'Ваш новый пароль: ' . $options['password'];
                        mail($to, $subject, $message);

                        // Хешируем новый пароль
                        $options['password'] = password_hash($options['password'], PASSWORD_DEFAULT);

                    }
                } else {
                    // В противном случае, оставляем старый пароль
                    $options['password'] = $user['password'];
                }

                if ($errors == false) {
                    // Если ошибок нет, проверяем, была ли изменена роль пользователя
                    if ($options['role'] != $user['role'] && $options['role'] != 'user') {
                        // Если роль пользователя была изменена и она не является пользователем, то генерируем логин и пароль для входа в админку
                        $options['admin_login'] = Random::generateLogin(9);
                        $options['admin_password'] = Random::generatePassword(18);

                        // Отправляем письмо на почту пользователя с данными для входа в админ панель
                        $to = $options['email'];
                        $subject = 'Доступ в админ панель';
                        $message = 'http://' . $_SERVER['HTTP_HOST'] . '/admin/' . PHP_EOL . 'Ваш логин: ' . $options['admin_login'] . PHP_EOL . 'Ваш пароль: ' . $options['admin_password'];
                        mail($to, $subject, $message);

                        // Хешируем пароль
                        $options['admin_password'] = password_hash($options['admin_password'], PASSWORD_DEFAULT);

                    } elseif ($options['role'] == $user['role'] && $user['role'] != 'user') {
                        // Если роль пользователя не была изменена, и он не является пользователем, то оставляем старые данные
                        $options['admin_login'] = $user['admin_login'];
                        $options['admin_password'] = $user['admin_password'];

                    } elseif ($options['role'] != $user['role'] && $options['role'] == 'user') {
                        // Если роль была изменена и она равняется user, то делаем поля пустыми
                        $options['admin_login'] =  null;
                        $options['admin_password'] = null;
                    }
                    // Сохраняем изменения
                    if (User::updateUserById($id, $options)) {
                        // Если запись успешно обновлена, то проверяем, было ли загружено изображение
                        if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
                            // если изображение было загружено, перемещаем его
                            move_uploaded_file($_FILES["image"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "/upload/images/users/{$id}.jpg");
                        }
                    }

                    // Перенаправляем пользователя
                    header('Location: /admin/user/');
                }
            }

            // Подключаем вид
            require_once (ROOT . '/views/admin_user/update.php');
            return true;
        }

        die('Доступ запрещен');
    }

    /**
     * Страница удаления пользователя
     * @param $id
     * @return bool
     */
    public function actionDelete($id)
    {
        // Проверка прав доступа
        if (self::checkAdmin()) {
            // Получаем id пользователя для авы
            $idUser = User::checkLoggedAdminPanel();

            // Получаем информацию о пользователе
            $user = User::getUserById($id);

            // Удаляем
            User::deleteUserById($id);
            return true;
        }

        die('Доступ запрещен');
    }
}