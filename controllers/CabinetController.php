<?php

/**
 * Контроллер для управления кабинетом
 * Контроллер CabinetController
 */

class CabinetController
{

    /**
     * Главная страница кабинета
     * @return bool
     * @param $page
     */
    public function actionIndex($page = 1)
    {
        // Получаем id пользователя из сессии
        $userId = User::checkLogged();

        // Получаем информацию о пользователе из БД
        $user = User::getUserById($userId);

        // Получаем массив заказов пользователя
        $orderList = array();
        $orderList = Order::getOrderByIdUser($userId, $page);

        // Получаем количество заказов пользователя
        $total = Order::getTotalOrderByUser($userId);

        // Создаем новый объект класса
        $pagination = new Pagination($total, $page, Order::SHOW_BY_DEFAULT, 'page-');

        // Подключаем вид
        require_once (ROOT . '/views/cabinet/index.php');
        return true;
    }

    /**
     * Страница редактирования данных
     * @return bool
     */
    public function actionEdit()
    {
        // Получаем id пользователя из сессии
        $userId = User::checkLogged();

        // Получаем инф-ию о пользователе из БД
        $user = User::getUserById($userId);

        $name = $user['name'];
        $surname = $user['surname'];
        $password = '';

        $result = false;

        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $surname = $_POST['surname'];
            $password = $_POST['password'];

            $name = SiteConfig::html($name, false);
            $surname = SiteConfig::html($surname, false);

            $errors = false;

            if (!User::checkName($name) || !User::checkName($surname)) {
                $errors[] = 'Имя и фамилия не должны быть короче 2-х символов';
            }

            if (!password_verify($password, $user['password'])) {
                $errors[] = 'Пароль введен неверно';
            }

            if (!User::checkPassword($password)) {
                $errors[] = 'Пароль должен содержать не менее 6 символов, из них цифр - не менее 1, 
                    строчных букв - не менее 1, заглавных букв - не менее 1';
            }

            if ($errors == false) {
                // Если ошибок нет, сохраняем изменения
                $result = User::edit($userId, $name, $surname);

                // Если ошибок нет, проверяем, было ли загружено изображение
                if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
                    // Если изображение было загружено, то перемещаем его
                    move_uploaded_file($_FILES["image"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "/upload/images/users/{$user['id']}.jpg");
                }

            }
        }

        // Подключаем вид
        require_once (ROOT . '/views/cabinet/edit.php');
        return true;
    }

    /**
     * Страница изменения пароля в лк
     * @return bool
     */
    public function actionEditpassword()
    {
        // Получаем id пользователя из сессии
        $userId = User::checkLogged();

        // Получаем инф-ию о пользователе из БД
        $user = User::getUserById($userId);

        $password = '';
        $old_password = '';
        $re_password = '';

        $result = false;

        if (isset($_POST['submit'])) {
            $old_password = $_POST['old_password'];
            $password = $_POST['password'];
            $re_password = $_POST['re_password'];

            $errors = false;

            if ($password != $re_password) {
                $errors[] = 'Пароли не совпадают';
            }

            if (!password_verify($old_password, $user['password'])) {
                $errors[] = 'Старый пароль введен неверно';
            }

            if (!User::checkPassword($password)) {
                $errors[] = 'Пароль должен содержать не менее 6 символов, из них цифр - не менее 1, 
                    строчных букв - не менее 1, заглавных букв - не менее 1';
            }

            if (password_verify($password, $user['password'])) {
                $errors[] = 'Новый пароль совпадает со старым';
            }

            if ($errors == false) {
                $password = password_hash($password, PASSWORD_DEFAULT);
                $result = User::editPassword($userId, $password);
            }
        }

        // Подключаем вид
        require_once (ROOT . '/views/cabinet/editpassword.php');
        return true;
    }
}