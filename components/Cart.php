<?php


class Cart
{

    /**
     * Добавление билета в корзину (сессию)
     * @param $id
     */
    public static function addTicket($id)
    {
        $id = intval($id);

        // Пустой массив для билетов в корзине
        $ticketsInCart = array();

        // Если в корзине уже есть билеты (они хранятся в сессии)
        if (isset($_SESSION['tickets'])) {
            // То заполняем наш массив билетами
            $ticketsInCart = $_SESSION['tickets'];
        }

        // Если билет есть в корзине, но был добавлен еще раз, то увеличиваем ко-во
        // array_key_exists проверяет на то, есть ли id выбранного товара в $ticketsInCart
        if (array_key_exists($id, $ticketsInCart)) {
            $ticketsInCart[$id] ++;
        } else {
            // Добавляем новый билет в корзину
            $ticketsInCart[$id] = 1;
        }

        $_SESSION['tickets'] = $ticketsInCart;

        // Возвращаем ко-во билетов, которые находятся в корзине
        return self::countItems();

    }

    /**
     * Получаем массив билетов из сессии
     * @return bool|mixed
     */
    public static function getTickets()
    {
        if (isset($_SESSION['tickets'])) {
            return $_SESSION['tickets'];
        }
        return false;
    }

    public static function getTotalPrice($tickets)
    {
        // Получаем билеты из сессии
        $ticketsInCart = self::getTickets();

        $total = 0;

        if ($ticketsInCart) {
            // Считаем стоимость
            foreach ($tickets as $item) {
                $total += $item['price'] * $ticketsInCart[$item['id']];
            }
        }

        return $total;
    }

    /**
     * Подсчет количества билетов в корзине (сессии)
     * @return int
     */
    public static function countItems()
    {
        // Если есть, то подсчитываем
        if (isset($_SESSION['tickets'])) {
            $count = 0;
            // Проходим циклом по сессии, $id = id билета, $quantity = ко-во билетов
            foreach ($_SESSION['tickets'] as $id => $quantity) {
                $count = $count + $quantity;
            }
            return $count;
        } else {
            return 0;
        }
    }

}