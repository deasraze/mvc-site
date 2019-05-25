<?php


class Tickets
{

    const SHOW_BY_DEFAULT = 10;

    // Метод получения массива последних билетов, который принимает параметр $count,
    // либо значение по умолчанию SHOW_BY_DEFAULT
    public static function getLatestTicket($count = self::SHOW_BY_DEFAULT)
    {
        $count = intval($count);

        $db = Db::getConnection();

        $ticketList = array();

        $result = $db->query('SELECT id, name, price, image FROM tickets WHERE status = "1" ORDER BY id DESC LIMIT ' . $count);
        $i = 0;
        while ($row = $result->fetch()) {
            $ticketList[$i]['id'] = $row['id'];
            $ticketList[$i]['name'] = $row['name'];
            $ticketList[$i]['image'] = $row['image'];
            $ticketList[$i]['price'] = $row['price'];
            $i++;
        }

        return $ticketList;
    }

    public static function getTicketById($id)
    {
        $id = intval($id);

        if ($id) {
            $db = Db::getConnection();
            $result = $db->query('SELECT * FROM tickets WHERE id=' . $id);

            return $result->fetch();
        }
    }

    /**
     * Метод возвращения билетов по заданым id
     * @param $idsArray
     * @return array
     */
    public static function getTicketsByIds($idsArray)
    {
        $tickets = array();

        $db = Db::getConnection();

        // Объединяем элементы массива в строку
        $idsString = implode(',', $idsArray);

        $sql = "SELECT * FROM tickets WHERE status='1' AND id IN ($idsString)";

        // Выполняем
        $result = $db->query($sql);
        // Устанавливаем режим выборки (массив)
        $result->setFetchMode(PDO::FETCH_ASSOC);

        $i = 0;
        while ($row = $result->fetch()) {
            $tickets[$i]['id'] = $row['id'];
            $tickets[$i]['code'] = $row['code'];
            $tickets[$i]['name'] = $row['name'];
            $tickets[$i]['price'] = $row['price'];
            $i++;
        }

        return $tickets;
    }
}