<?php

/**
 * Class Collection - модель для работы с коллекциями
 */

class Collection
{

    // Значение по умолчанию (сколько отображать)
    const SHOW_BY_DEFAULT = 6;

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
        $sql = 'INSERT INTO collection (name, author, year, category_id, description, status) '
                . 'VALUES (:name, :author, :year, :category_id, :description, :status)';

        // Подготавливаем запрос
        $result = $db->prepare($sql);
        // Привязываем параметры
        $result->bindParam(':name', $options['name'], PDO::PARAM_STR);
        $result->bindParam(':author', $options['author'], PDO::PARAM_STR);
        $result->bindParam(':year', $options['year'], PDO::PARAM_INT);
        $result->bindParam(':category_id', $options['category_id'], PDO::PARAM_INT);
        $result->bindParam(':description', $options['description'], PDO::PARAM_STR);
        $result->bindParam(':status', $options['status'], PDO::PARAM_INT);

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
                    category_id = :category_id, 
                    description = :description, 
                    status = :status 
                WHERE id = :id";

        // Подготавливаем запрос
        $result = $db->prepare($sql);
        // Привязываем параметры
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':name', $options['name'], PDO::PARAM_STR);
        $result->bindParam(':author', $options['author'], PDO::PARAM_STR);
        $result->bindParam(':year', $options['year'], PDO::PARAM_INT);
        $result->bindParam(':category_id', $options['category_id'], PDO::PARAM_INT);
        $result->bindParam(':description', $options['description'], PDO::PARAM_STR);
        $result->bindParam(':status', $options['status'], PDO::PARAM_INT);

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
    public static function getLatestCollection($page = 1)
    {
        $limit = self::SHOW_BY_DEFAULT;
        $page = intval($page);
        // Считаем смещение для запроса
        $offset = ($page - 1) * self::SHOW_BY_DEFAULT;

        $db = Db::getConnection();

        // Используем подготовленный запрос
        $sql = 'SELECT id, name FROM collection WHERE status = "1" '
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
            $i++;
        }

        // Возвращаем массив
        return $collectionList;
    }

    /**
     * Получаем список коллекций в виде массива для админки
     * @return array
     */
    public static function getCollectionList()
    {
        $db = Db::getConnection(); // Создаем соединение

        // Выполняем запрос
        $result = $db->query('SELECT id, name, author, year, category_id FROM collection ORDER BY id ASC');

        $collectionList = array();
        $i = 0;
        // Получаем данные в виде массива
        while ($row = $result->fetch()) {
            $collectionList[$i]['id'] = $row['id'];
            $collectionList[$i]['name'] = $row['name'];
            $collectionList[$i]['author'] = $row['author'];
            $collectionList[$i]['year'] = $row['year'];
            $collectionList[$i]['category_id'] = $row['category_id'];
            $i++;
        }

        // Возвращаем массив
        return $collectionList;
    }

    /**
     * Получаем количество произведений
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
     * Возвращаем список произведений в определенной категории
     * @param bool $categoryId
     * @param int $page - номер страницы
     * @return array - массив с произведениями
     */
    public static function getCollectionListByCategory($categoryId, $page = 1)
    {
        // Указываем лимит
        $limit = self::SHOW_BY_DEFAULT;

        $page = intval($page);
        // Считаем смещение для запроса
        $offset = ($page - 1) * self::SHOW_BY_DEFAULT;

        $db = Db::getConnection();

        // Используем подготовленный запрос
        $sql = 'SELECT id, name FROM collection '
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

}