<?php


class Category
{

    /**
     * Получение информации о категории по id
     * @param $id
     * @return array - массив с информацией
     */
    public static function getCategoryById($id)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'SELECT * FROM category WHERE id = :id';

        // Подготавливаем запрос
        $result = $db->prepare($sql);
        // Привязываем параметры
        $result->bindParam(':id', $id, PDO::PARAM_INT);

        // Указываем, что хотим получить данные в виде массива
        $result->setFetchMode(PDO::FETCH_ASSOC);

        // Выполняем запрос
        $result->execute();

        // Возвращаем данные
        return $result->fetch();
    }

    /**
     * Получение списка категорий для сайта
     * @return array of categories
     */
    public static function getCategoriesList()
    {
        $db = Db::getConnection();

        $categoryList = array();

        $result = $db->query('SELECT id, name FROM category WHERE status = "1" ORDER BY sort_order ASC');

        $i = 0;
        while ($row = $result->fetch()) {
            $categoryList [$i]['id'] = $row['id'];
            $categoryList [$i]['name'] = $row['name'];
            $i++;
        }

        return $categoryList;
    }

    /**
     * Получаем массив всех категорий для списка в админке
     * @return array
     */
    public static function getCategoriesListAdmin()
    {
        $db = Db::getConnection();

        $result = $db->query('SELECT id, name, sort_order, status FROM category ORDER BY sort_order ASC');

        $categoryList = array();
        $i = 0;
        while ($row = $result->fetch()) {
            $categoryList[$i]['id'] = $row['id'];
            $categoryList[$i]['name'] = $row['name'];
            $categoryList[$i]['sort_order'] = $row['sort_order'];
            $categoryList[$i]['status'] = $row['status'];
            $i++;
        }
        return $categoryList;
    }

    /**
     * Получаем текстовое объяснение статуса для категорий
     * @param $status
     * @return string - пояснение
     */
    public static function getStatusText($status)
    {
        switch ($status) {
            case '1':
                return 'Отображается';
                break;
            case '0':
                return 'Скрыта';
                break;
        }
    }


    /**
     * Создание категории
     * @param $options
     * @return bool
     */
    public static function createCategory($options)
    {
        $db = Db::getConnection();

        // Используем подготовленный запрос
        $sql = 'INSERT INTO category (name, sort_order, status) '
            . 'VALUES (:name, :sort_order, :status)';

        // Подготавливаем запрос
        $result = $db->prepare($sql);
        // Привязываем параметры
        $result->bindParam(':name', $options['name'], PDO::PARAM_STR);
        $result->bindParam(':sort_order', $options['sort_order'], PDO::PARAM_INT);
        $result->bindParam(':status', $options['status'], PDO::PARAM_INT);
        // Выполняем и возвращаем
        return $result->execute();
    }

    /**
     * Редактированние категории
     * @param $id - редактируемой категории
     * @param $options - параметры
     * @return bool
     */
    public static function updateCategoryById($id, $options)
    {
        $db = Db::getConnection();

        // Используем подготовленный запрос
        $sql = "UPDATE category
            SET 
                name = :name, 
                sort_order = :sort_order, 
                status = :status
            WHERE id = :id";

        // Подготавливаем запрос
        $result = $db->prepare($sql);
        // Привязываем параметры
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':name', $options['name'], PDO::PARAM_STR);
        $result->bindParam(':sort_order', $options['sort_order'], PDO::PARAM_INT);
        $result->bindParam(':status', $options['status'], PDO::PARAM_INT);
        // Выполняем и возвращаем
        return $result->execute();
    }

    /**
     * Удаление категории
     * @param $id - удаляемой категории
     * @return bool
     */
    public static function deleteCategoryById($id)
    {
        $db = Db::getConnection();

        // Используем подготовленный запрос
        $sql = 'DELETE FROM category WHERE id = :id';

        // Подготавливаем запрос
        $result = $db->prepare($sql);
        // Привязываем параметры
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        // Выполняем и возвращаем
        return $result->execute();
    }

}