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

}