<?php


/**
 * Class Order
 * Модель для работы с заказами
 */
class Order
{

    /**
     * Сохранение заказа
     * @param $userName - имя
     * @param $userSurname - фамилия
     * @param $userPhone - телефон
     * @param $userComment - комментарий
     * @param $userId - id пользователя, если авторизован
     * @param $tickets - билеты
     * @return bool - результат выполнения метода
     */
    public static function save($userName, $userSurname, $userPhone, $userComment, $userId, $tickets)
    {

        $db = Db::getConnection();

        // Делаем подготовленный запрос
        $sql = 'INSERT INTO ticket_order (user_name, user_surname, user_phone, user_comment, user_id, tickets) '
            . 'VALUES (:user_name, :user_surname, :user_phone, :user_comment, :user_id, :tickets)';

        // Преобразуем массив с билетами в строку формата json
        $tickets = json_encode($tickets);

        // Подготавливаем запрос к выполнению
        $result = $db->prepare($sql);
        // Привязываем параметры к плейсхолдерам
        $result->bindParam(':user_name', $userName, PDO::PARAM_STR);
        $result->bindParam(':user_surname', $userSurname, PDO::PARAM_STR);
        $result->bindParam(':user_phone', $userPhone, PDO::PARAM_STR);
        $result->bindParam(':user_comment', $userComment, PDO::PARAM_STR);
        $result->bindParam(':user_id', $userId, PDO::PARAM_STR);
        $result->bindParam(':tickets', $tickets, PDO::PARAM_STR);

        // Запускаем запрос и возвращаем
        return $result->execute();
    }

    /**
     * Возвращаем заказ по указанному id
     * @param $id
     * @return array
     */
    public static function getOrderById($id)
    {
        $db = Db::getConnection();

        // Используем подготовленный запрос
        $sql = 'SELECT * FROM ticket_order WHERE id = :id';
        // Подготавливаем запрос к выполнению
        $result = $db->prepare($sql);
        // Привязываем параметр к плейсхолдеру
        $result->bindParam(':id', $id, PDO::PARAM_INT);

        // Указываем, что хотим получить данные в виде массива
        $result->setFetchMode(PDO::FETCH_ASSOC);

        // Запускаем запрос
        $result->execute();
        // Возвращаем данные
        return $result->fetch();
    }

    /**
     * Возвращаем список заказов для админки
     * @return array
     */
    public static function getOrdersListByAdmin()
    {
        $db = Db::getConnection();

        // Выполняем запрос
        $result = $db->query('SELECT id, user_name, user_surname, 
                            user_phone, date, status 
                            FROM ticket_order ORDER BY id DESC ');

        $orderList = array();
        $i = 0;
        // Извлекаем все данные и помещаем в массив
        while ($row = $result->fetch()) {
            $orderList[$i]['id'] = $row['id'];
            $orderList[$i]['user_name'] = $row['user_name'];
            $orderList[$i]['user_surname'] = $row['user_surname'];
            $orderList[$i]['user_phone'] = $row['user_phone'];
            $orderList[$i]['date'] = $row['date'];
            $orderList[$i]['status'] = $row['status'];
            $i++;
        }
        return $orderList;
    }

    /**
     * Метод изменения выбранного заказа
     * @param $id
     * @param $options
     * @return bool
     */
    public static function updateOrderById($id, $options)
    {
        $db = Db::getConnection();

        // Используем подготовленный запрос
        $sql = 'UPDATE ticket_order 
                SET 
                    user_name = :user_name, 
                    user_surname = :user_surname, 
                    user_phone = :user_phone, 
                    user_comment = :user_comment, 
                    date = :date, 
                    status = :status 
                WHERE id = :id';

        // Подготавливаем запрос к выполнению
        $result = $db->prepare($sql);
        // Привязываем параметры
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':user_name', $options['user_name'], PDO::PARAM_STR);
        $result->bindParam(':user_surname', $options['user_surname'], PDO::PARAM_STR);
        $result->bindParam(':user_phone', $options['user_phone'], PDO::PARAM_STR);
        $result->bindParam(':user_comment', $options['user_comment'], PDO::PARAM_STR);
        $result->bindParam(':date', $options['date'], PDO::PARAM_STR);
        $result->bindParam(':status', $options['status'], PDO::PARAM_INT);

        // Выполняем и возвращаем
        return $result->execute();
    }

    /**
     * Метод удаления заказа по заданному id
     * @param $id
     * @return bool
     */
    public static function deleteOrderById($id)
    {
        $db = Db::getConnection();

        // Используем подготовленный запрос
        $sql = 'DELETE FROM ticket_order WHERE id = :id';
        // Подготавливаем запрос к выполнению
        $result = $db->prepare($sql);
        // Привязываем параметры
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        // Выполняем и возвращаем
        return $result->execute();
    }

    /**
     * Возваращаем текстовое пояснение для статуса заказов
     * @param int $status
     * @return string
     */
    public static function getStatusText($status)
    {
        switch ($status) {
            case '1':
                return 'Новый заказ';
                break;
            case '2':
                return 'В обработке';
                break;
            case '3':
                return 'Забронировано';
                break;
            case '4':
                return 'Закрыт';
                break;
        }
    }
}