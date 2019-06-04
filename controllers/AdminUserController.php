<?php

/**
 * Контроллер AdminUserController
 * Управление пользователями в админке
 */

class AdminUserController extends AdminBase
{

    /**
     * Страница с пользователями
     * @return bool
     */
    public function actionIndex()
    {
        // Проверка прав доступа
        self::checkAdmin();

        // Получаем список пользователей
        $userList = User::getUserList();

        // Подключаем вид
        require_once (ROOT . '/views/admin_user/index.php');
        return true;
    }

    /**
     * Страница создания нового пользователя
     * @return bool
     */
    public function actionCreate()
    {
        // Проверка прав доступа
        self::checkAdmin();

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
                $errors[] = 'Пароль не должен быть короче 6 символов. Должен содержать одну заглавную, маленькую буквы, и цифру';
            }

            if (User::checkEmailExists($options['email'])) {
                $errors[] = 'Пользователь с такой почтой уже существует';
            }

            if ($errors == false) {
                if ($options['role'] == 'admin' || $options['role'] == 'editor') {
                    // Если роль пользователя админ либо редактор, то генерируем логин и пароль для входа в админку
                    $options['admin_login'] = Random::generateLogin(9);
                    $options['admin_password'] = Random::generatePassword(18);

                    // Отправляем письмо на почту пользователя с данными для входа
                    $to = $options['email'];
                    $subject = 'Доступ в админ панель';
                    $message = 'http://'.$_SERVER['HTTP_HOST'] . '/admin/login/' . PHP_EOL . 'Ваш логин: ' . $options['admin_login'] . PHP_EOL . 'Ваш пароль: ' . $options['admin_password'];
                    mail($to, $subject, $message);

                    // Хешируем пароль для входа в админ панель
                    $options['admin_password'] = password_hash($options['admin_password'], PASSWORD_DEFAULT);

                } else {
                    // Если нет, то оставляем строки пустыми
                    $options['admin_login'] = '';
                    $options['admin_password'] = '';
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

    /**
     * Страница удаления пользователя
     * @param $id
     * @return bool
     */
    public function actionDelete($id)
    {
        // Проверка прав доступа
        self::checkAdmin();

        // Получаем информацию о пользователе
        $user = User::getUserById($id);

        if (isset($_POST['submit'])) {
            // Если кнопка была нажата, то удаляем пользователя
            User::deleteUserById($id);

            // Перенаправляем
            header('Location: /admin/user/');
        }

        // Подключаем вид
        require_once (ROOT . '/views/admin_user/delete.php');
        return true;
    }
}