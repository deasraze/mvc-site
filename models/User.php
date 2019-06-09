<?php

/**
 * Модель User
 * Модель для работы с пользователями
 */

class User
{

    const SHOW_BY_DEFAULT = 10;

    /**
     * Возвращаем список пользователей для админки
     * @param $page
     * @return array
     */
    public static function getUserListAdmin($page)
    {
        $page = intval($page);
        $limit = self::SHOW_BY_DEFAULT;
        // Считаем сдвиг для запроса
        $offset = ($page - 1) * $limit;

        $db = Db::getConnection();

        // Используем подготовленный запрос
        $sql = 'SELECT id, name, surname, email, role FROM user ORDER BY id DESC LIMIT :limit OFFSET :offset';
        // Подготавливаем запрос к выполнению
        $result = $db->prepare($sql);
        // Привязываем параметры
        $result->bindParam(':limit', $limit, PDO::PARAM_INT);
        $result->bindParam(':offset', $offset, PDO::PARAM_INT);
        // Выполняем запрос
        $result->execute();

        $userList = array();
        $i = 0;
        // Получаем все данные в виде массива
        while ($row = $result->fetch()) {
            $userList[$i]['id'] = $row['id'];
            $userList[$i]['name'] = $row['name'];
            $userList[$i]['surname'] = $row['surname'];
            $userList[$i]['email'] = $row['email'];
            $userList[$i]['role'] = $row['role'];
            $i++;
        }

        // Возвращаем массив
        return $userList;
    }

    /**
     * Метод добавления нового пользователя с правами администратора либо редактора
     * @param $options
     * @return int id пользователя
     */
    public static function createUser($options)
    {
        $db = Db::getConnection();

        // Используем подготовленный запрос
        $sql = 'INSERT INTO user (name, surname, email, password, role, admin_login, admin_password) 
                 VALUES (:name, :surname, :email, :password, :role, :admin_login, :admin_password)';

        // Подготавливаем запрос
        $result = $db->prepare($sql);
        // Привязываем параметры
        $result->bindParam(':name', $options['name'], PDO::PARAM_STR);
        $result->bindParam(':surname', $options['surname'], PDO::PARAM_STR);
        $result->bindParam(':email', $options['email'], PDO::PARAM_STR);
        $result->bindParam(':password', $options['password'], PDO::PARAM_STR);
        $result->bindParam(':role', $options['role'], PDO::PARAM_STR);
        $result->bindParam(':admin_login', $options['admin_login'], PDO::PARAM_STR);
        $result->bindParam(':admin_password', $options['admin_password'], PDO::PARAM_STR);

        if ($result->execute()) {
            // Если запрос выполнен успешно, возвращаем id добавленной записи
            return $db->lastInsertId();
        }
        // Иначе возвращаем 0
        return 0;
    }

    /**
     * Метод обновления пользователя
     * @param $id - пользователя
     * @param $options - параметры
     * @return bool
     */
    public static function updateUserById($id, $options)
    {
        $db = Db::getConnection();

        // Используем подготовленный запрос
        $sql = 'UPDATE user 
                SET 
                    name = :name, 
                    surname = :surname, 
                    email = :email, 
                    password = :password, 
                    role = :role, 
                    admin_login = :admin_login, 
                    admin_password = :admin_password 
                WHERE id = :id';

        // Подготавливаем запрос к выполнению
        $result = $db->prepare($sql);
        // Привязываем параметры
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':name', $options['name'], PDO::PARAM_STR);
        $result->bindParam(':surname', $options['surname'], PDO::PARAM_STR);
        $result->bindParam(':email', $options['email'], PDO::PARAM_STR);
        $result->bindParam(':password', $options['password'], PDO::PARAM_STR);
        $result->bindParam(':role', $options['role'], PDO::PARAM_STR);
        $result->bindParam(':admin_login', $options['admin_login'], PDO::PARAM_STR);
        $result->bindParam(':admin_password', $options['admin_password'], PDO::PARAM_STR);

        // Выполняем и возвращаем
        return $result->execute();
    }

    /**
     * Метод удаления пользователя по переданному id
     * @param $id
     * @return bool
     */
    public static function deleteUserById($id)
    {
        $db = Db::getConnection();

        // Используем подготовленный запрос
        $sql = 'DELETE FROM user WHERE id = :id';

        // Подготавливаем запрос
        $result = $db->prepare($sql);
        // Привязываем параметры
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        // Выполняем и возвращаем
        return $result->execute();
    }

    /**
     * Метод регистрации нового пользователя
     * @param $name
     * @param $surname
     * @param $email
     * @param $password
     * @return bool
     */
    public static function register($name, $surname, $email, $password)
    {
        // Хешируем введенный пароль
        $password = password_hash($password, PASSWORD_DEFAULT);

        $db = Db::getConnection();
        // Используем подготовленный запрос
        $sql = 'INSERT INTO user (name, surname, email, password) VALUES (:name, :surname, :email, :password)';

        // Подготавливаем запрос к выполнению
        $result = $db->prepare($sql);
        // Привязываем параметры к плейсхолдерам
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':surname', $surname, PDO::PARAM_STR);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);

        // Запускаем и возвращаем
        return $result->execute();
    }

    /**
     * Редактирование данных в лк
     * @param $id
     * @param $name
     * @param $surname
     * @param $password
     * @return bool
     */
    public static function edit($id, $name, $surname, $password)
    {
        // Хешируем новый пароль
        $password = password_hash($password, PASSWORD_DEFAULT);

        $db = Db::getConnection();

        // Используем подготовленный запрос
        $sql = "UPDATE user SET name = :name, surname = :surname, password = :password WHERE id = :id";

        // Подготавливаем запрос к выполнению
        $result = $db->prepare($sql);
        // Привязываем полученные параметры
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':surname', $surname, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);

        // Запускаем и возвращаем
        return $result->execute();
    }

    /**
     * Проверяем существует ли пользователь с заданными $email, $password
     * @param $email
     * @param $password
     * @return mixed : integer user id or false
     */
    public static function checkUserData($email, $password)
    {

        $db = Db::getConnection();
        // Используем подготовленный запрос
        $sql = 'SELECT * FROM user WHERE email = :email';

        // Подготавливаем запрос к выполнению
        $result = $db->prepare($sql);
        // Привязываем параметр к плейсхолдеру
        $result->bindParam(':email', $email, PDO::PARAM_INT);
        // Запускаеи запрос
        $result->execute();

        // Извлекаем строку
        $user = $result->fetch();
        // Если пользователь с заданными параметрами найден и введенный пароль совпадает с хешем в бд
        if ($user && password_verify($password, $user['password'])) {
            // Возвращаем id юзера
            return $user['id'];
        }

        return false;
    }

    /**
     * Проверяем правильность ввода логина и пароля для админ панели
     * @param $admin_login
     * @param $admin_password
     * @return bool
     */
    public static function checkUserDataAdminPanel($admin_login, $admin_password)
    {
        $db = Db::getConnection();

        // Используем подготовленный запрос
        $sql = 'SELECT id, admin_login, admin_password FROM user WHERE admin_login = :admin_login';

        // Подготавливаем запрос к выполнению
        $result = $db->prepare($sql);
        // Привязываем параметры
        $result->bindParam(':admin_login', $admin_login, PDO::PARAM_STR);
        // Выполняем запрос
        $result->execute();

        // Извлекаем строку
        $user = $result->fetch();

        if ($user && password_verify($admin_password, $user['admin_password'])) {
            // Если пользователь с таким логином был найден и введенный пароль совпадает с хешем в бд
            // Возвращаем его id
            return $user['id'];
        }

        return false;
    }

    /**
     * Получаем информацию о пользователе по id
     * @param $id
     * @return mixed
     */
    public static function getUserById($id)
    {
        if ($id) {
            $db = Db::getConnection();
            // Используем подготовленный запрос
            $sql = 'SELECT * FROM user WHERE id = :id';

            // Подготавливаем запрос к выполнению
            $result = $db->prepare($sql);
            // Привязываем параметры к плейсхолдеру
            $result->bindParam(':id', $id, PDO::PARAM_INT);

            // Указываем, что хотим получить данные в виде массива
            $result->setFetchMode(PDO::FETCH_ASSOC);
            // Выполняем
            $result->execute();

            // Извлекаем и возвращаем
            return $result->fetch();
        }
    }

    /**
     * Возвращаем общее количество пользователей
     * @return mixed
     */
    public static function getTotalUserAdmin()
    {
        $db = Db::getConnection();

        $result = $db->query('SELECT count(id) AS count FROM user');

        // Получаем и возвращаем
        $row = $result->fetch();
        return $row['count'];
    }

    /**
     * Запоминаем пользователя
     * @param $userId
     */
    public static function auth($userId)
    {
        // Помещаем в $_SESSION id пользователя
        $_SESSION['user'] = $userId;
    }

    /**
     * Запоминаем пользователя в админ панели
     * @param $userId
     */
    public static function authAdminPanel($userId)
    {
        $_SESSION['admin_user'] = $userId;
    }

    /**
     * Проверяем, авторизован ли пользователь
     * @return int id
     */
    public static function checkLogged()
    {
        // Если сессия есть, то вернем id пользователя
        if (isset($_SESSION['user'])) {
            return $_SESSION['user'];
        }

        // Если нет, то перенаправляем
        header("Location: /user/login");
    }

    /**
     * Возвращаем id пользователя
     * @return mixed
     */
    public static function getUserId()
    {
        // Если сессия есть, то вернем id пользователя
        if (isset($_SESSION['user'])) {
            return $_SESSION['user'];
        }
    }

    /**
     * Проверяем, авторизован ли пользователь в админ панели
     * @return mixed
     */
    public static function checkLoggedAdminPanel()
    {
        if (isset($_SESSION['admin_user'])) {
            // Если сессия есть, то возвращаем id
            return $_SESSION['admin_user'];
        }

        // Если нет, то перенаправляем
        header('Location: /admin/login');
    }

    /**
     * Проверяем роль пользователя
     * @param $userId
     * @return bool
     */
    public static function checkRole($userId)
    {
        // Получаем информацию о пользователе по id
        $user = self::getUserById($userId);

        if ($user['role'] == 'admin' || 'editor') {
            // Если пользователь администратор или редакторв, возвращаем true
            return true;
        }
        return false;
    }

    /**
     * Проверяем, является ли пользователь гостем
     */
    public static function isGuest()
    {
        // Если сессия есть, то не гость
        if (isset($_SESSION['user'])) {
            return false;
        }
        return true;
    }


    /**
     * Проверяем имя: не меньше двух символов(до 30)
     * @param $name
     * @return bool
     */
    public static function checkName($name)
    {
        $regexp = '/^([А-ЯЁ]{1}[а-яё]{1,29})|([A-Z]{1}[a-z]{1,29})$/u';
        if (preg_match($regexp, $name)) {
            return true;
        }
        return false;
    }

    /**
     * Проверка телефона
     * @param $phone
     * @return bool
     */
    public static function checkPhone($phone)
    {
        $regexp = '/^(\s*)?(\+)?([- _():=+]?\d[- _():=+]?){10,14}(\s*)?$/';
        if (preg_match($regexp, $phone)) {
            return true;
        }
        return false;
    }

    /*
     * Проверяем пароль (от 6 до 25), должны быть:
    (?=.*[a-z]) - маленькая буква
    (?=.*[A-Z]) - большая
    (?=.*\d) - число
    [a-zA-Z\d] - всё остальное буквы и цифры
    {6,25} - от 6 до 25
    */
    public static function checkPassword($password)
    {
        $regexp = '|^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{6,25}$|';
        if (preg_match($regexp, $password)) {
            return true;
        }
        return false;
    }


    /**
     * Проверяем email
     * @param $email
     * @return bool
     */
    public static function checkEmail($email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        }
        return false;
    }


    /**
     * Проверка на существующий email
     * @param $email
     * @return bool
     */
    public static function checkEmailExists($email)
    {
        $db = Db::getConnection();
        // Используем подготовленный запрос, используя плейсхолдер email (псевдопеременную)
        $sql = 'SELECT COUNT(*) FROM user WHERE email = :email';

        // Подготавливаем запрос к выполнению
        $result = $db->prepare($sql);
        // Привязываем параметр к псевдопеременной
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        // Запускаем запрос
        $result->execute();

        // Проверяем есть ли запись
        if ($result->fetchColumn())
            return true;
        return false;
    }

    /**
     * Получаем текстовое пояснение для роли пользователей
     * @param $role
     * @return string
     */
    public static function getRoleText($role)
    {
        switch ($role) {
            case 'admin':
                return 'Администратор';
                break;
            case 'editor':
                return 'Редактор';
                break;
            case 'user':
                return 'Пользователь';
                break;
        }
    }

    /**
     * Возвращаем путь до изображения пользователя
     * @param $id
     * @return string
     */
    public static function getImage($id)
    {
        // Если нет изображения
        $noImage = 'no-image.png';
        // Путь до папки
        $path = '/upload/images/users/';
        // Путь до изображения
        $pathToUserImage = $path . $id . '.jpg';

        if (file_exists($_SERVER['DOCUMENT_ROOT'] . $pathToUserImage)) {
            // Если изображение было найдено, то возвращаем до него путь
            return $pathToUserImage;
        }
        // Возвращаем путь до заглушки
        return $path . $noImage;
    }

    /**
     * Поиск пользователей
     * @param $query
     */
    public static function searchUserInAdminPanel($query)
    {
        $db = Db::getConnection();

        // Испольуем подготовленный запрос
        $sql = "SELECT * FROM user WHERE name LIKE :query OR surname LIKE :query limit 5";

        // Подготавливаем запрос
        $result = $db->prepare($sql);
        // Привязываем параметры
        $result->bindParam(':query', $query, PDO::PARAM_STR);
        // Выполняем
        $result->execute();


        if ($result->rowCount() > 0) {
            $output = "<div class=table-responsive>
					<table class=table table bordered>";

            while ($row = $result->fetch()) {
                $output .= '<tr><td><a href="/admin/user/update/' . $row['id'] . '">' . $row['surname'] . '</a></td></tr>';
            }
            echo $output;
        }
    }
}