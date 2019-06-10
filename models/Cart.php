<?php

/**
 * Модель Cart
 * Модель для работы с корзиной
 */

class Cart
{

    /**
     * Добавление билета в корзину (сессию)
     * @param int $id билета
     * @return int (количество билетов в корзине)
     */
    public static function addTicket($id)
    {
        // Приводим $id к типу int
        $id = intval($id);

        // Пустой массив для билетов в корзине
        $ticketsInCart = array();

        // Если в корзине уже есть билеты (они хранятся в сессии)
        if (isset($_SESSION['tickets'])) {
            // Заполняем наш массив билетами
            $ticketsInCart = $_SESSION['tickets'];
        }

        // Проверяем есть ли уже такой билет в корзине
        // array_key_exists проверяет на то, есть ли id выбранного товара в $ticketsInCart
        if (array_key_exists($id, $ticketsInCart)) {
            // Если такой билет уже есть, но добавили еще раз, то увеличиваем его количество на 1
            $ticketsInCart[$id] ++;
        } else {
            // Если нет, то добавляем id нового билета в корзину в количестве 1
            $ticketsInCart[$id] = 1;
        }

        // Записываем массив билетов в сессию
        $_SESSION['tickets'] = $ticketsInCart;

        // Возвращаем ко-во билетов, которые находятся в корзине
        return self::countItems();

    }

    /**
     * Удаляем билет с указанным id из корзины
     * @param $id
     */
    public static function deleteTicket($id)
    {
        // Получаем массив с id  и кол-ом билетов в корзине
        $ticketsInCart = self::getTickets();

        // Удаляем из массива элемент с указанными id
        unset($ticketsInCart[$id]);

        // Записываем массив билетов с удаленным элементом в сессию
        $_SESSION['tickets'] = $ticketsInCart;
    }

    /**
     * Удаляем 1 билет, если их несколько шт
     * @param $id
     */
    public static function deleteAmountTicket($id)
    {
        // Получаем массив с id  и кол-ом билетов в корзине
        $ticketsInCart = self::getTickets();

        if ($ticketsInCart[$id] > 1) {
            // Если одного билета несколько шт, то удаляем 1
            $ticketsInCart[$id] --;
        }

        // Записываем массив билетов с удаленным элементом в сессию
        $_SESSION['tickets'] = $ticketsInCart;
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

    /**
     * Получаем общую стоимость переданных билетов
     * @param array $tickets массив с информацией о билетах
     * @return float|int общая стоимость
     */
    public static function getTotalPrice($tickets)
    {
        // Получаем массив билетов с id и кол-м в корзине
        $ticketsInCart = self::getTickets();

        $total = 0;
        if ($ticketsInCart) {
            // Если в корзине есть билеты
            // Проходим циклом по переданному в метод массиву билетов
            foreach ($tickets as $item) {
                // Считаем общую стоимость: стоимость билета * количество
                $total += $item['price'] * $ticketsInCart[$item['id']];
            }
        }

        return $total;
    }

    /**
     * Подсчет количества билетов в корзине (сессии)
     * @return int количество товаров в корзине
     */
    public static function countItems()
    {
        // Если есть в корзине, то подсчитываем
        if (isset($_SESSION['tickets'])) {
            $count = 0;
            // Проходим циклом по сессии, $id = id билета, $quantity = ко-во билетов
            foreach ($_SESSION['tickets'] as $id => $quantity) {
                // Считаем
                $count = $count + $quantity;
            }
            return $count;
        } else {
            // Если билетов нет, то возвращаем 0
            return 0;
        }
    }

    /**
     * Очистка корзины
     */
    public static function clear()
    {
        if (isset($_SESSION['tickets'])) {
            unset($_SESSION['tickets']);
        }
    }

}