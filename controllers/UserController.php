<?php

/**
 * Контроллер для управления пользователями
 * Контроллер UserController
 */

class UserController
{

    /**
     * Страница регистрации
     * @return bool
     */
    public function actionRegister()
    {
        // Получаем id пользователя для аватара в шапке
        $idUser = User::getUserId();

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

            $name = SiteConfig::html($name, false);
            $surname = SiteConfig::html($surname, false);

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
                $errors[] = 'Пароль должен содержать не менее 6 символов, из них цифр - не менее 1, 
                    строчных букв - не менее 1, заглавных букв - не менее 1';
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

    /**
     * Страница восстановления пароля
     * @return bool
     */
    public function actionRestore()
    {
        // Получаем id для авы
        $idUser = User::getUserId();

        $email = '';
        $result = false;

        if (isset($_POST['submit'])) {
            // Если форма была отправлена, то считываем
            $email = $_POST['email'];

            // Делаем валидацию
            $errors = false;

            if (!User::checkEmail($email)) {
                $errors[] = 'Некорректная почта';
            }

            if (!User::checkEmailExists($email)) {
                $errors[] = 'Пользователь с такой почтой не найден';
            }

            if ($errors == false) {
                // Если ошибок нет, то генерируем новый пароль
                $password = Random::generateUserPassword(10);

                // Отправляем письмо на почту с новым паролем
                $to = $email;
                $subject = 'Восстановление пароля';
                $message =  'http://'.$_SERVER['HTTP_HOST'] . '/user/login/' . PHP_EOL . 'Ваш новый пароль: ' . $password;
                mail($to, $subject, $message);

                // Хешируем новый пароль
                $password = password_hash($password, PASSWORD_DEFAULT);
                // Получаем id пользователя указанной почты
                $id = User::checkEmailExistsForRestore($email);
                // Обновляем пароль
                $result = User::restoreUserPassword($id, $password);
            }
        }

        // Подключаем вид
        require_once (ROOT . '/views/user/restore.php');
        return true;
    }

    /**
     * Страница авторизации
     * @return bool
     */
    public function actionLogin()
    {
        // Получаем id пользователя для аватара в шапке
        $idUser = User::getUserId();

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
     * Экшн выхода
     * Удаляем данные о пользователе из сессии
     */
    public function actionLogout()
    {
        unset($_SESSION['user']);
        header("Location: /");
    }

}