<?php


class CabinetController
{

    public function actionIndex()
    {
        // Получаем id пользователя из сессии
        $userId = User::checkLogged();

        // Получаем информацию о пользователе из БД
        $user = User::getUserById($userId);

        require_once (ROOT . '/views/cabinet/index.php');

        return true;
    }

    public function actionEdit()
    {
        // Получаем id пользователя из сессии
        $userId = User::checkLogged();

        // Получаем инф-ию о пользователе из БД
        $user = User::getUserById($userId);

        $name = $user['name'];
        $password = '';
        $old_password = '';
        $re_password = '';

        $result = false;

        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $old_password = $_POST['old_password'];
            $password = $_POST['password'];
            $re_password = $_POST['re_password'];

            $errors = false;

            if (!User::checkName($name)) {
                $errors[] = 'Имя не должно быть короче 2-х символов';
            }

            if ($password != $re_password) {
                $errors[] = 'Пароли не совпадают';
            }

            if (!password_verify($old_password, $user['password'])) {
                $errors[] = 'Старый пароль введен неверно';
            }

            if (!User::checkPassword($password)) {
                $errors[] = 'Пароль не должен быть короче 6 символов. Должен содержать одну заглавную, маленькую буквы, и цифру';
            }

            if ($errors == false) {
                $result = User::edit($userId, $name, $password);
            }
        }

        require_once (ROOT . '/views/cabinet/edit.php');

        return true;
    }
}