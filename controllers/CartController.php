<?php


class CartController
{

    public function actionIndex()
    {
        $ticketsInCart = false;

        // Получаем данные из корзины (сессии)
        $ticketsInCart = Cart::getTickets();

        if ($ticketsInCart) {
            // Получаем полную информацию о билетах для списка
            // array_keys возвращаем id билетов
            $ticketsIds = array_keys($ticketsInCart);
            $tickets = Tickets::getTicketsByIds($ticketsIds);

            // Получаем общую стоимость
            $totalPrice = Cart::getTotalPrice($tickets);
        }

        require_once (ROOT . '/views/cart/index.php');

        return true;
    }

    public function actionAdd($id)
    {
        // Добавляем в корзину
        echo Cart::addTicket($id);
        return true;

    }
}