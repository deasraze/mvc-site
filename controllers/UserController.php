<?php


class UserController
{

    public function actionRegister()
    {
        $name = '';
        $surname = '';
        $email = '';
        $password = '';
        $re_password = '';
        $result = false;

        // После отправки проверяем переменную _POST submit на существование
        // Если форма отправлена, считываем данные с формы
        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $surname = $_POST['surname'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $re_password = $_POST['re_password'];

            // Создаем переменную для ошибок
            $errors = false;

            if (!User::checkName($name) || !User::checkName($surname)) {
                $errors[] = 'Имя и фамилия не должны быть короче 2-х символов';
            }

            if (!User::checkEmail($email)) {
                $errors[] = 'Неправильный email';
            }

            if ($password != $re_password) {
                $errors[] = 'Пароли не совпадают';
            }

            if (!User::checkPassword($password)) {
                $errors[] = 'Пароль не должен быть короче 6 символов. Должен содержать одну заглавную, маленькую буквы, и цифру';
            }

            if (User::checkEmailExists($email)) {
                $errors[] = 'Такой email уже используется';
            }

            if ($errors == false) {
                $result = User::register($name, $surname, $email, $password);
            }
        }

        require_once(ROOT . '/views/user/register.php');

        return true;
    }

    public function actionLogin()
    {
        $email = '';
        $password = '';

        // Проверяем была ли отправлена форма
        if (isset($_POST['submit'])) {
            // Считываем данные
            $email = $_POST['email'];
            $password = $_POST['password'];

            // Создаем переменную для ошибок
            $errors = false;

            // Валидация полей
            if (!User::checkEmail($email)) {
                $errors[] = 'Неправильный email';
            }
            if (!User::checkPassword($password)) {
                $errors[] = 'Некорректный пароль';
            }

            // Проверяем существует ли пользователь
            $userId = User::checkUserData($email, $password);

            if ($userId == false) {
                // Если данные неправильные, то выводим ошибку
                $errors[] = 'Неправильный email либо пароль';
            } else {
                // Если данные валидные, то запоминаем пользователя (сессия)
                User::auth($userId);

                // Перенаправляем польщователя в закрытую часть
                header("Location: /cabinet/");
            }
        }

        require_once(ROOT . '/views/user/login.php');

        return true;
    }

    /**
     * Удаляем данные о пользователе из сессии
     */
    public function actionLogout()
    {
        unset($_SESSION["user"]);
        header("Location: /");
    }

}