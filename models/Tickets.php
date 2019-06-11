<?php

/**
 * Class Tickets - модель для работы с билетами
 */

class Tickets
{

    const SHOW_BY_DEFAULT = 10;

    /**
     * Возвращаем массив с последними билетами
     * @return array
     */
    public static function getLatestTicket()
    {
        $limit = self::SHOW_BY_DEFAULT;

        $db = Db::getConnection();

        // Используем подготовленный запрос
        $sql = 'SELECT id, name, price, description FROM tickets WHERE status = "1" AND availability = "1" ORDER BY id DESC LIMIT :limit';

        //Подготавливаем запрос к выполнению
        $result = $db->prepare($sql);
        // Привязываем параметры
        $result->bindParam(':limit', $limit, PDO::PARAM_INT);
        // Выполняем запрос
        $result->execute();

        $ticketList = array();
        $i = 0;
        // Получаем данные в виде массива
        while ($row = $result->fetch()) {
            $ticketList[$i]['id'] = $row['id'];
            $ticketList[$i]['name'] = $row['name'];
            $ticketList[$i]['price'] = $row['price'];
            $ticketList[$i]['description'] = $row['description'];
            $i++;
        }

        // Возвращаем массив с билетами
        return $ticketList;
    }

    /**
     * Получаем информацию о билете
     * @param $id
     * @return array - массив с информацией
     */
    public static function getTicketById($id)
    {
        $db = Db::getConnection();

        // Используем подготовленный запрос
        $sql = 'SELECT * FROM tickets WHERE id = :id';

        // Подготавливаем запрос к выполнению
        $result = $db->prepare($sql);
        // Привязываем параметр
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        // Указываем, что хотим получить данные в виде массива
        $result->setFetchMode(PDO::FETCH_ASSOC);
        // Выполняем
        $result->execute();

        // Извлекаем и возвращаем
        return $result->fetch();

    }

    /**
     * Получаем список билетов по заданным id
     * @param $idsArray - массив с id
     * @return array - массив со списком билетов
     */
    public static function getTicketsByIds($idsArray)
    {
        $db = Db::getConnection();

        // Объединяем элементы массива в строку
        $idsString = implode(',', $idsArray);

        $sql = "SELECT * FROM tickets WHERE status='1' AND id IN ($idsString)";

        // Выполняем
        $result = $db->query($sql);
        // Устанавливаем режим выборки (массив)
        $result->setFetchMode(PDO::FETCH_ASSOC);

        $tickets = array();
        $i = 0;
        // Получаем данные в виде массива
        while ($row = $result->fetch()) {
            $tickets[$i]['id'] = $row['id'];
            $tickets[$i]['code'] = $row['code'];
            $tickets[$i]['name'] = $row['name'];
            $tickets[$i]['price'] = $row['price'];
            $i++;
        }
        // Возвращаем массив
        return $tickets;
    }

    /**
     * Возвращаем массив билетов для админки
     * @param $page
     * @return array
     */
    public static function getTicketListAdmin($page)
    {
        $page = intval($page);
        $limit = self::SHOW_BY_DEFAULT;
        $offset = ($page - 1) * $limit;

        $db = Db::getConnection();

        // Используем подготовленный запрос
        $sql = 'SELECT id, name, price, code, status, availability FROM tickets ORDER BY id DESC LIMIT :limit OFFSET :offset';

        // Подготавливаем запрос к выполнению
        $result = $db->prepare($sql);
        // Привязываем паарметры
        $result->bindParam(':limit', $limit, PDO::PARAM_INT);
        $result->bindParam(':offset', $offset, PDO::PARAM_INT);
        // Выполняем запрос
        $result->execute();

        $ticketList = array();
        $i = 0;
        while ($row = $result->fetch()) {
            $ticketList[$i]['id'] = $row['id'];
            $ticketList[$i]['name'] = $row['name'];
            $ticketList[$i]['price'] = $row['price'];
            $ticketList[$i]['code'] = $row['code'];
            $ticketList[$i]['status'] = $row['status'];
            $ticketList[$i]['availability'] = $row['availability'];
            $i++;
        }
        // Возвращаем массив с билетами
        return $ticketList;
    }

    /**
     * Возвращаем общее количество билетов
     * @return mixed
     */
    public static function getTotalTicketsAdmin()
    {
        $db = Db::getConnection();

        // Выполняем запрос
        $result = $db->query('SELECT count(id) AS count FROM tickets');
        // Извлекаем
        $row = $result->fetch();

        // Возвращаем
        return $row['count'];
    }

    /**
     * Добавление нового билета
     * @param $options
     * @return int id добавленного билета
     */
    public static function createTicket($options)
    {
        $db = Db::getConnection();

        // Используем подготовленный запрос
        $sql = 'INSERT INTO tickets (name, price, description, status, code, availability) '
            . 'VALUES (:name, :price :code, :description, :status, :code, :availability)';

        // Подготавливаем запрос
        $result = $db->prepare($sql);
        // Привязываем параметры
        $result->bindParam(':name', $options['name'], PDO::PARAM_STR);
        $result->bindParam(':price', $options['price'], PDO::PARAM_INT);
        $result->bindParam(':description', $options['description'], PDO::PARAM_STR);
        $result->bindParam(':status', $options['status'], PDO::PARAM_INT);
        $result->bindParam(':code', $options['code'], PDO::PARAM_INT);
        $result->bindParam(':availability', $options['availability'], PDO::PARAM_INT);

        // Выполняем запрос
        if ($result->execute()) {
            // Если билет успешно добавлен, то возвращаем его id
            return $db->lastInsertId();
        }
        // Иначе вернем 0
        return 0;
    }

    /**
     * Обновляем информацию о конкретном билете
     * @param $id
     * @param $options
     * @return bool
     */
    public static function updateTicketById($id, $options)
    {
        $db = Db::getConnection();

        // Используем подготовленный запрос
        $sql = 'UPDATE tickets
                SET 
                    name = :name, 
                    code = :code, 
                    price = :price, 
                    description = :description, 
                    availability = :availability, 
                    status = :status 
                WHERE id = :id';

        // Подготавливаем запрос к выполнению
        $result = $db->prepare($sql);
        // Привязываем параметры
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':name', $options['name'], PDO::PARAM_STR);
        $result->bindParam(':code', $options['code'], PDO::PARAM_INT);
        $result->bindParam(':price', $options['price'], PDO::PARAM_INT);
        $result->bindParam(':description', $options['description'], PDO::PARAM_STR);
        $result->bindParam(':availability', $options['availability'], PDO::PARAM_INT);
        $result->bindParam(':status', $options['status'], PDO::PARAM_INT);

        // Выполняем и возвращаем
        return $result->execute();
    }

    /**
     * Удаление билета в админке
     * @param $id
     * @return bool
     */
    public static function deleteTicketById($id)
    {
        $db = Db::getConnection();

        // Используем подготовленный запрос
        $sql = 'DELETE FROM tickets WHERE id = :id';

        // Подготавливаем запрос
        $result = $db->prepare($sql);
        // Привязываем параметры
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        // Выполняем и возвращаем
        return $result->execute();
    }

    /**
     * Возвращаем текстовое пояснение для билета
     * @param $availability
     * @return string
     */
    public static function getTextAvailability($availability)
    {
        switch ($availability) {
            case '1':
                return 'В наличии';
                break;
            case '0':
                return 'Закончились';
                break;
        }
    }

    /**
     * Возвращаем текстовое пояснение для статуса
     * @param $status
     * @return string
     */
    public static function getStatusText($status)
    {
        switch ($status)
        {
            case '1':
                return 'Отображается';
                break;
            case '0':
                return 'Скрыто';
                break;
        }
    }

    /**
     * Возвращаем путь до изображения
     * @param $id
     * @return string
     */
    public static function getImage($id)
    {
        // Название изображения, если оно не было загружено
        $noImage = 'no-image.png';

        // Путь к папке с изображениями
        $path = '/upload/images/tickets/';

        // Путь до изображения
        $pathTicketImage = $path . $id . '.jpg';

        if (file_exists($_SERVER['DOCUMENT_ROOT'].$pathTicketImage)) {
            // Если нужное изображение существует, то возвращаем путь до него
            return $pathTicketImage;
        }

        // Если оно не было найдено, возвращаем заглушку
        return $path . $noImage;
    }

    /**
     * Поиск билетов
     * @param $query
     */
    public static function searchTicketInAdminPanel($query)
    {
        $db = Db::getConnection();

        // Испольуем подготовленный запрос
        $sql = "SELECT * FROM tickets WHERE name LIKE :query limit 5";

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
                $output .= '<tr><td><a href="/admin/ticket/update/' . $row['id'] . '">' . $row['name'] . '</a></td></tr>';
            }
            echo $output;
        }
    }
}