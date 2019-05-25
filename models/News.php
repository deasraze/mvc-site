<?php

class News
{

    /**
     * Возвращает одну новость по id
     * @param $id
     * @return mixed
     */
    public static function getNewsItemById($id)
    {
        // Запрос к БД

        $id = intval($id);

        if ($id != 0) {
            $db = Db::getConnection();

            $result = $db->query('SELECT * from news WHERE id=' . $id);
            //Убираем дублирование колонок и оставляем только названия
            $result->setFetchMode(PDO::FETCH_ASSOC);

            $newsItem = $result->fetch();

            return $newsItem;
        }
    }

    /**
     * Возвращает список новостей
     */
    public static function getNewsList()
    {
        // Запрос к БД

        $db = Db::getConnection();

        $newsList = array();

        $result = $db->query('SELECT id, title, date, short_content, author_name '
            . 'FROM news '
            . 'ORDER BY date DESC '
            . 'LIMIT 10');

        $i = 0;
        while ($row = $result->fetch()) {
            $newsList [$i]['id'] = $row['id'];
            $newsList [$i]['title'] = $row['title'];
            $newsList [$i]['date'] = $row['date'];
            $newsList [$i]['author_name'] = $row['author_name'];
            $newsList [$i]['short_content'] = $row['short_content'];
            $i++;
        }

        return $newsList;
    }
}