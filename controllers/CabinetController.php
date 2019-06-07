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
        $surname = $user['surname'];
        $password = '';
        $old_password = '';
        $re_password = '';

        $result = false;

        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $surname = $_POST['surname'];
            $old_password = $_POST['old_password'];
            $password = $_POST['password'];
            $re_password = $_POST['re_password'];

            $errors = false;

            if (!User::checkName($name) || !User::checkName($surname)) {
                $errors[] = 'Имя и фамилия не должны быть короче 2-х символов';
            }

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

            if ($errors == false) {
                $result = User::edit($userId, $name, $surname, $password);
            }
        }

        require_once (ROOT . '/views/cabinet/edit.php');

        return true;
    }
}