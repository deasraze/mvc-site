<?php

/**
 * Модель для управления новостями
 * Модель News
 */

class News
{

    const SHOW_BY_DEFAULT = 10;

    /**
     * Возвращает одну новость по id
     * @param $id
     * @return mixed
     */
    public static function getNewsItemById($id)
    {
        $db = Db::getConnection();

        // Используем подготовленный запрос
        $sql = 'SELECT * FROM news WHERE id = :id';

        // Подготавливаем запрос
        $result = $db->prepare($sql);
        // Привязываем параметры
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        // Выполняем запрос
        $result->execute();

        // Указываем, что хотим получить данные в виде массива
        $result->setFetchMode(PDO::FETCH_ASSOC);

        // Извлекаем и возвращаем
        return $result->fetch();
    }

    /**
     * Возвращаем список новостей
     * @param $page
     * @return array
     */
    public static function getNewsList($page)
    {
        $page = intval($page);
        $limit = self::getNewsShowByDefault();
        // Считаем сдвиг для запроса
        $offset = ($page - 1) * $limit;

        $db = Db::getConnection();

        // Используем подготовленный запрос
        $sql = 'SELECT id, title, short_content '
            . 'FROM news WHERE status="1" '
            . 'ORDER BY date DESC '
            . 'LIMIT :limit OFFSET :offset';

        // Подготавливаем запрос к выполнению
        $result = $db->prepare($sql);
        // Привязываем параметры
        $result->bindParam(':limit', $limit, PDO::PARAM_INT);
        $result->bindParam(':offset', $offset, PDO::PARAM_INT);
        // Выполняем запрос
        $result->execute();

        $newsList = array();
        $i = 0;
        // Получаем данные в виде массива
        while ($row = $result->fetch()) {
            $newsList [$i]['id'] = $row['id'];
            $newsList [$i]['title'] = $row['title'];
            $newsList [$i]['short_content'] = $row['short_content'];
            $i++;
        }

        // Возвращаем массив
        return $newsList;
    }

    /**
     * Возвращаем список новостей для админ панели
     * @param $page
     * @return array
     */
    public static function getNewsListForAdminPanel($page)
    {
        $page = intval($page);
        $limit = self::SHOW_BY_DEFAULT;
        // Считаем сдвиг для запроса
        $offset = ($page - 1) * $limit;

        $db = Db::getConnection();

        // Используем подготовленный запрос
        $sql = 'SELECT id, title, status, date FROM news ORDER BY date DESC LIMIT :limit OFFSET :offset';

        // Подготавливаем запрос
        $result = $db->prepare($sql);
        // Привязываем параметры
        $result->bindParam(':limit', $limit, PDO::PARAM_INT);
        $result->bindParam(':offset', $offset, PDO::PARAM_INT);
        // Выполняем запрос
        $result->execute();

        $newsList = array();
        $i = 0;
        // Получаем данные в виде массива
        while ($row = $result->fetch()) {
            $newsList[$i]['id'] = $row['id'];
            $newsList[$i]['title'] = $row['title'];
            $newsList[$i]['status'] = $row['status'];
            $newsList[$i]['date'] = $row['date'];
            $i ++;
        }

        // Возвращаем
        return $newsList;
    }

    /**
     * Добавление новой новости
     * @param $options
     * @return bool
     */
    public static function createNews($options)
    {
        $db = Db::getConnection();

        // Используем подготовленный запрос
        $sql = 'INSERT INTO news (title, short_content, content, status) 
                VALUES (:title, :short_content, :content, :status)';

        // Подготавливаем запрос
        $result = $db->prepare($sql);
        // Привязываем параметры
        $result->bindParam(':title', $options['title'], PDO::PARAM_STR);
        $result->bindParam(':short_content', $options['short_content'], PDO::PARAM_STR);
        $result->bindParam(':content', $options['content'], PDO::PARAM_STR);
        $result->bindParam(':status', $options['status'], PDO::PARAM_INT);

        if ($result->execute()) {
            // Если запись успешно добавлено, то возвращаем id
            return $db->lastInsertId();
        }

        return 0;
    }

    /**
     * Редактирование новости
     * @param $id
     * @param $options
     * @return bool
     */
    public static function updateNews($id, $options)
    {
        $db = Db::getConnection();

        // Используем подготовленный запрос
        $sql = 'UPDATE news
                SET
                    title = :title, 
                    short_content = :short_content, 
                    content = :content, 
                    status = :status 
                WHERE id = :id';

        // Подготавливаем запрос
        $result = $db->prepare($sql);
        // Привязываем параметры
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':title', $options['title'], PDO::PARAM_STR);
        $result->bindParam(':short_content', $options['short_content'], PDO::PARAM_STR);
        $result->bindParam(':content', $options['content'], PDO::PARAM_STR);
        $result->bindParam(':status', $options['status'], PDO::PARAM_INT);

        // Выполняем
        return $result->execute();
    }

    /**
     * Удаление новости
     * @param $id
     * @return bool
     */
    public static function deleteNews($id)
    {
        $db = Db::getConnection();

        // Используем подготовленный запрос
        $sql = 'DELETE FROM news WHERE id = :id';

        // Подготавливаем
        $result = $db->prepare($sql);
        // Привязываем параметры
        $result->bindParam(':id', $id, PDO::PARAM_INT);

        // Выполняем
        return $result->execute();
    }

    /**
     * Возвращаем новости для слайдера
     * @return array
     */
    public static function getNewsListForSlider()
    {
        $db = Db::getConnection();

        // Выполняем запрос
        $result = $db->query('SELECT id, title, short_content 
        FROM news WHERE status="1" ORDER BY date DESC LIMIT 5');

        $newsList = array();
        $i = 0;
        // Получаем данные в виде массива
        while($row = $result->fetch()) {
            $newsList[$i]['id'] = $row['id'];
            $newsList[$i]['title'] = $row['title'];
            $newsList[$i]['short_content'] = $row['short_content'];
            $i++;
        }

        // Возвращаем
        return $newsList;
    }

    /**
     * Возвращаем общее количество новостей, где статус = 1
     * @return mixed
     */
    public static function getNewsCount()
    {
        $db = Db::getConnection();

        // Выполняем запрос
        $result = $db->query('SELECT count(id) as count FROM news WHERE status="1"');

        // Получаем и возвращаем
        $row = $result->fetch();
        return $row['count'];
    }

    /**
     * Возвращаем количество всех новостей
     * @return mixed
     */
    public static function getNewsCountForAdminPanel()
    {
        $db = Db::getConnection();

        // Выполняем запрос
        $result = $db->query('SELECT count(id) as count FROM news');

        // Получаем и возвращаем
        $row = $result->fetch();
        return $row['count'];
    }

    /**
     * Возвращаем путь до изображения
     * @param $id
     * @return string
     */
    public static function getImage($id)
    {
        // Название для заглушки
        $noImage = 'no-image.png';
        // Путь до папки
        $path = '/upload/images/news/';

        // Путь до картинки новости
        $pathToImage =  $path . $id . '.jpg';

        if (file_exists($_SERVER['DOCUMENT_ROOT'] . $pathToImage)) {
            // Если есть такой файл, то возвращаем путь
            return $pathToImage;
        }

        // Если нет, то возвращаем заглушку
        return $path . $noImage;
    }

    /**
     * Возвращаем текстовое пояснение статусу
     * @param $status
     * @return string
     */
    public static function getStatusText($status)
    {
        switch ($status) {
            case '1':
                return 'Отображается';
                break;
            case '0':
                return 'Скрыто';
                break;
        }
    }

    /**
     * Возвращаем количество отображаемых новостей
     * @return mixed
     */
    public static function getNewsShowByDefault()
    {
        // Получаем настройки
        $settings = SiteConfig::getSiteSettings();

        // Возвращаем
        return $show = $settings['news_count'];
    }

    /**
     * Поиск новостей в админ панели
     * @param $query
     */
    public static function searchNewsInAdminPanel($query)
    {
        $db = Db::getConnection();

        // Испольуем подготовленный запрос
        $sql = "SELECT * FROM news WHERE title LIKE :query limit 5";

        // Подготавливаем запрос
        $result = $db->prepare($sql);
        // Привязываем параметры
        $result->bindValue(':query', "%{$query}%", PDO::PARAM_STR);
        // Выполняем
        $result->execute();


        if ($result->rowCount() > 0) {
            $output = "<div class=table-responsive>
					<table class=table table bordered>";

            while ($row = $result->fetch()) {
                $output .= '<tr><td><a href="/admin/news/update/' . $row['id'] . '">' . $row['title'] . '</a></td></tr>';
            }
            echo $output;
        }
    }
}