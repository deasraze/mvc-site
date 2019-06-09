<?php

/**
 * Class Collection - модель для работы с коллекциями
 */

class Collection
{

    // Значение по умолчанию (сколько отображать)
    const SHOW_BY_DEFAULT = 10;

    /**
     * Получаем информацию о произведении по id
     * @param $id
     * @return array
     */
    public static function getCollectionById($id)
    {
        $db = Db::getConnection();

        // Используем подготовленный запрос
        $sql = 'SELECT * FROM collection WHERE id = :id';

        // Подготавливаем запрос к выполнению
        $result = $db->prepare($sql);
        // Привязываем параметр
        $result->bindParam(':id', $id, PDO::PARAM_INT);

        // Указываем, что хотим получить данные в виде массива
        $result->setFetchMode(PDO::FETCH_ASSOC);

        // Выполняем запрос
        $result->execute();

        // Получаем и возвращаем
        return $result->fetch();
    }

    /**
     * Добавление нового произведения
     * @param $options - массив с инцформацией
     * @return int|string
     */
    public static function createCollection($options)
    {
        $db = Db::getConnection();

        // Используем подготовленный запрос
        $sql = 'INSERT INTO collection (name, author, year, material, size, category_id, description, status, display_block) '
                . 'VALUES (:name, :author, :year, :material, :size, :category_id, :description, :status, :display_block)';

        // Подготавливаем запрос
        $result = $db->prepare($sql);
        // Привязываем параметры
        $result->bindParam(':name', $options['name'], PDO::PARAM_STR);
        $result->bindParam(':author', $options['author'], PDO::PARAM_STR);
        $result->bindParam(':year', $options['year'], PDO::PARAM_STR);
        $result->bindParam(':material', $options['material'], PDO::PARAM_STR);
        $result->bindParam(':size', $options['size'], PDO::PARAM_STR);
        $result->bindParam(':category_id', $options['category_id'], PDO::PARAM_INT);
        $result->bindParam(':description', $options['description'], PDO::PARAM_STR);
        $result->bindParam(':status', $options['status'], PDO::PARAM_INT);
        $result->bindParam(':display_block', $options['display_block'], PDO::PARAM_INT);

        if ($result->execute()) {
            // Если добавление выполнено успешно, то возвращаем id добавленной записи
            return $db->lastInsertId();
        }
        // Иначе вернем 0
        return 0;
    }

    /**
     * Изменение выбранного произведения
     * @param $id
     * @param $options
     * @return bool
     */
    public static function updateCollectionById($id, $options)
    {
        $db = Db::getConnection();

        // Используем подготовленный запрос
        $sql = "UPDATE collection 
                SET 
                    name = :name, 
                    author = :author, 
                    year = :year, 
                    material = :material, 
                    size = :size, 
                    category_id = :category_id, 
                    description = :description, 
                    status = :status, 
                    display_block = :display_block  
                WHERE id = :id";

        // Подготавливаем запрос
        $result = $db->prepare($sql);
        // Привязываем параметры
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':name', $options['name'], PDO::PARAM_STR);
        $result->bindParam(':author', $options['author'], PDO::PARAM_STR);
        $result->bindParam(':year', $options['year'], PDO::PARAM_STR);
        $result->bindParam(':material', $options['material'], PDO::PARAM_STR);
        $result->bindParam(':size', $options['size'], PDO::PARAM_STR);
        $result->bindParam(':category_id', $options['category_id'], PDO::PARAM_INT);
        $result->bindParam(':description', $options['description'], PDO::PARAM_STR);
        $result->bindParam(':status', $options['status'], PDO::PARAM_INT);
        $result->bindParam(':display_block', $options['display_block'], PDO::PARAM_INT);

        // Выполняем и возвращаем
        return $result->execute();
    }

    /**
     * Удаление произведения с указанным id
     * @param $id - произведения
     * @return bool - результат
     */
    public static function deleteCollectionById($id)
    {
        $db = Db::getConnection();

        // Используем подготовленный запрос
        $sql = 'DELETE FROM collection WHERE id = :id';

        // Подготавливаем запрос для выполнения
        $result = $db->prepare($sql);
        // Привязываем параметры
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        // Выполняем и возвращаем
        return $result->execute();
    }

    /**
     * Возвращаем массив последних произведений
     * @param int $page - номер текущей страницы
     * @return array
     */
    public static function getLatestCollection($page)
    {
        $limit = self::SHOW_BY_DEFAULT;
        $page = intval($page);
        // Считаем смещение для запроса
        $offset = ($page - 1) * $limit;

        $db = Db::getConnection();

        // Используем подготовленный запрос
        $sql = 'SELECT id, name, author, display_block FROM collection WHERE status = "1" '
            . 'ORDER BY id DESC LIMIT :limit OFFSET :offset';

        // Подготавливаем запрос
        $result = $db->prepare($sql);
        // Привязывем параметры
        $result->bindParam(':limit', $limit, PDO::PARAM_INT);
        $result->bindParam(':offset', $offset, PDO::PARAM_INT);
        // Выполняем запрос
        $result->execute();

        $collectionList = array();
        $i = 0;
        // Получаем данные в виде массива
        while ($row = $result->fetch()) {
            $collectionList[$i]['id'] = $row['id'];
            $collectionList[$i]['name'] = $row['name'];
            $collectionList[$i]['author'] = $row['author'];
            $collectionList[$i]['display_block'] = $row['display_block'];
            $i++;
        }

        // Возвращаем массив
        return $collectionList;
    }

    /**
     * Получаем список коллекций в виде массива для админки
     * @param int $page
     * @return array
     */
    public static function getCollectionListAdmin($page)
    {
        $page = intval($page);
        $limit = self::SHOW_BY_DEFAULT;
        // Считаем смещение для запроса
        $offset = ($page - 1) * $limit;

        $db = Db::getConnection();

        // Используем подготовленный запрос
        $sql = 'SELECT id, name, author, year, category_id, status FROM collection ORDER BY id DESC LIMIT :limit OFFSET :offset';

        // Подготавливаем запрос
        $result = $db->prepare($sql);
        // Привязываем параметры
        $result->bindParam(':limit', $limit, PDO::PARAM_INT);
        $result->bindParam(':offset', $offset, PDO::PARAM_INT);
        // Выполняем запрос
        $result->execute();

        $collectionList = array();
        $i = 0;
        // Получаем данные в виде массива
        while ($row = $result->fetch()) {
            $collectionList[$i]['id'] = $row['id'];
            $collectionList[$i]['name'] = $row['name'];
            $collectionList[$i]['author'] = $row['author'];
            $collectionList[$i]['year'] = $row['year'];
            $collectionList[$i]['category_id'] = $row['category_id'];
            $collectionList[$i]['status'] = $row['status'];
            $i++;
        }

        // Возвращаем массив
        return $collectionList;
    }

    /**
     * Возвращаем количество произведений, где статус = 1
     * @return integer
     */
    public static function getTotalCollection()
    {
        $db = Db::getConnection();

        // Выполняем запрос
        $result = $db->query('SELECT count(id) AS count FROM collection WHERE status="1"');

        // Получаем и возвращаем count - количество
        $row = $result->fetch();
        return $row['count'];
    }

    /**
     * Возвращаем общее количество произведений
     * @return mixed
     */
    public static function getTotalCollectionAdmin()
    {
        $db = Db::getConnection();

        // Выполняем запрос
        $result = $db->query('SELECT count(id) AS count FROM collection');

        // Получаем и возвращаем count - количество
        $row = $result->fetch();
        return $row['count'];
    }


    /**
     * Возвращаем список произведений в определенной категории
     * @param bool $categoryId
     * @param int $page - номер страницы
     * @return array - массив с произведениями
     */
    public static function getCollectionListByCategory($categoryId, $page)
    {
        $page = intval($page);
        // Указываем лимит
        $limit = self::SHOW_BY_DEFAULT;
        // Считаем смещение для запроса
        $offset = ($page - 1) * $limit;

        $db = Db::getConnection();

        // Используем подготовленный запрос
        $sql = 'SELECT id, name, author, display_block FROM collection '
                . 'WHERE status = "1" AND category_id = :category_id '
                . 'ORDER BY id DESC LIMIT :limit OFFSET :offset';

        // Подготавливаем запрос
        $result = $db->prepare($sql);
        // Привязываем параметры
        $result->bindParam(':category_id', $categoryId, PDO::PARAM_INT);
        $result->bindParam(':limit', $limit, PDO::PARAM_INT);
        $result->bindParam(':offset', $offset, PDO::PARAM_INT);

        // Выполняем запрос
        $result->execute();

        $collection = array();
        $i = 0;
        // Получаем данные в виде массива
        while ($row = $result->fetch()) {
            $collection[$i]['id'] = $row['id'];
            $collection[$i]['name'] = $row['name'];
            $collection[$i]['author'] = $row['author'];
            $collection[$i]['display_block'] = $row['display_block'];
            $i++;
        }
        // Возвращаем массив
        return $collection;
    }

    /**
     * Возвращаем количество произведенний, которые относятся к категории
     * @param $categoryId
     * @return mixed
     */
    public static function getTotalCollectionInCategory($categoryId)
    {
        $db = Db::getConnection();

        // Используем подготовленный запрос
        $sql = 'SELECT count(id) AS count FROM collection WHERE status="1" AND category_id = :category_id';

        // Подготавливаем запрос
        $result = $db->prepare($sql);
        // Привязываем параметры
        $result->bindParam(':category_id', $categoryId, PDO::PARAM_INT);
        // Выполняем
        $result->execute();

        // Возвращаем количество
        $row = $result->fetch();
        return $row['count'];
    }

    /**
     * Поиск коллекций в админ панели
     * @param $query
     */
    public static function searchCollectionInAdminPanel($query)
    {
        $db = Db::getConnection();

        // Испольуем подготовленный запрос
        $sql = "SELECT * FROM collection WHERE name LIKE :query OR author LIKE :query limit 5";

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
                $output .= '<tr><td><a href="/admin/collection/update/' . $row['id'] . '">' . $row['name'] . '</a></td></tr>';
            }
            echo $output;
        }
    }

    /**
     * Возвращаем путь к изображению произведения
     * @param $id
     * @return string
     */
    public static function getImage($id)
    {
        // Название для изображения, если оно не было загружено
        $noImage = 'no-image.png';

        // Путь к изображениям коллекций
        $path = '/upload/images/collections/';

        // Путь к изображению произведения
        $pathToCollectionImage = $path . $id . '.jpg';

        if (file_exists($_SERVER['DOCUMENT_ROOT'].$pathToCollectionImage)) {
            // Если искомое изображение для произведения существует
            // Возвращаем путь изображения
            return $pathToCollectionImage;
        }

        // Возвращаем изображение "Нет картинки"
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
            case '2':
                return 'Скрыта';
                break;
        }
    }

    /**
     * Возвращаем текстовое пояснение блоку для отображения
     * @param $block
     * @return string
     */
    public static function getBlockName($block)
    {
        switch ($block) {
            case '1':
                return 'Горизонтальный';
                break;
            case '2':
                return 'Квадратный';
                break;
            case '3':
                return 'Вертикальный';
                break;
        }
    }

}