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
}