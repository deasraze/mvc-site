<?php


class Collection
{

    // Значение по умолчанию (сколько отображать)
    const SHOW_BY_DEFAULT = 6;

    /**
     * @param $id int
     * @return collection item by id
     */
    public static function getCollectionById($id)
    {
        $id = intval($id);

        if ($id) {
            $db = Db::getConnection();

            $result = $db->query('SELECT * FROM collection WHERE id=' . $id);
            $result->setFetchMode(PDO::FETCH_ASSOC);

            return $result->fetch();
        }
    }

    /**
     * Добавление нового произведения
     * @param $options - массив с инцформацией
     * @return int|string
     */
    public static function createCollection($options)
    {
        $db = Db::getConnection();

        $sql = 'INSERT INTO collection (name, author, year, category_id, description, status) '
                . 'VALUES (:name, :author, :year, :category_id, :description, :status)';

        // Получение и возврат результатов
        $result = $db->prepare($sql);
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

        // Получение и возврат результатов, используя подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':name', $options['name'], PDO::PARAM_STR);
        $result->bindParam(':author', $options['author'], PDO::PARAM_STR);
        $result->bindParam(':year', $options['year'], PDO::PARAM_INT);
        $result->bindParam(':category_id', $options['category_id'], PDO::PARAM_INT);
        $result->bindParam(':description', $options['description'], PDO::PARAM_STR);
        $result->bindParam(':status', $options['status'], PDO::PARAM_INT);

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



    // Метод получения последних коллекций, который принимает параметр $count,
    // либо значение по умолчанию SHOW_BY_DEFAULT
    public static function getLatestCollection($count = self::SHOW_BY_DEFAULT, $page = 1)
    {
        $count = intval($count);

        $page = intval($page);
        $offset = ($page - 1) * self::SHOW_BY_DEFAULT;

        $db = Db::getConnection();

        $collectionList = array();

        $result = $db->query('SELECT id, name, image FROM collection '
            . 'WHERE status = "1" '
            . 'ORDER BY id DESC '
            . 'LIMIT ' . self::SHOW_BY_DEFAULT
            . ' OFFSET ' . $offset);

        $i = 0;
        // Кладем данные в результирующий массив $collectionList
        while ($row = $result->fetch()) {
            $collectionList[$i]['id'] = $row['id'];
            $collectionList[$i]['name'] = $row['name'];
            $collectionList[$i]['image'] = $row['image'];
            $i++;
        }

        return $collectionList;
    }

    /**
     * Получаем список коллекций
     * @return array
     */
    public static function getCollectionList()
    {
        $db = Db::getConnection(); // Создаем соединение

        $result = $db->query('SELECT id, name, author, year, category_id FROM collection ORDER BY id ASC'); // Выполняем запрос
        $collectionList = array();
        $i = 0;
        while ($row = $result->fetch()) {
            $collectionList[$i]['id'] = $row['id'];
            $collectionList[$i]['name'] = $row['name'];
            $collectionList[$i]['author'] = $row['author'];
            $collectionList[$i]['year'] = $row['year'];
            $collectionList[$i]['category_id'] = $row['category_id'];
            $i++;
        }

        return $collectionList;
    }

    // Подсчитываем количество коллекций для пагинатора c помощью count
    public static function getTotalCollection()
    {
        $db = Db::getConnection();

        $result = $db->query('SELECT count(id) AS count FROM collection WHERE status="1"');
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $row = $result->fetch();

        return $row['count'];
    }

    // Метод получения коллекций по категорям
    public static function getCollectionListByCategory($categoryId = false, $page = 1)
    {
        if ($categoryId) {

            $page = intval($page);
            $offset = ($page - 1) * self::SHOW_BY_DEFAULT;

            $db = Db::getConnection();
            $collection = array();
            $result = $db->query("SELECT id, name, image FROM collection "
                . "WHERE status = '1' AND category_id = '$categoryId' "
                . "ORDER BY id DESC "
                . "LIMIT ".self::SHOW_BY_DEFAULT
                . ' OFFSET '. $offset);

            $i = 0;
            while ($row = $result->fetch()) {
                $collection[$i]['id'] = $row['id'];
                $collection[$i]['name'] = $row['name'];
                $collection[$i]['image'] = $row['image'];
                $i++;
            }

            return $collection;
        }
    }

    // Подсчитываем количество коллекций c помощью count
    // у которых status 1 и которые относятся к нужной категории
    public static function getTotalCollectionInCategory($categoryId)
    {
        $db = Db::getConnection();

        $result = $db->query('SELECT count(id) AS count FROM collection '
                            . 'WHERE status="1" AND category_id="'.$categoryId.'"');
        $result->setFetchMode(PDO::FETCH_ASSOC);
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