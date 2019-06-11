<?php

/**
 * Управление билетами
 * Контроллер TicketsController
 */

class TicketsController
{

    /**
     * Страница с билетами
     * @param $page
     * @return bool
     */
    public function actionIndex($page = 1)
    {
        // Получаем id пользователя для аватара
        $idUser = User::getUserId();

        // Получаем массив с билетами
        $ticketList = array();
        $ticketList = Tickets::getLatestTicket($page);

        // Получаем количество билетов
        $total = Tickets::getTotalTickets();

        // Создаем новый объект класса
        $pagination = new Pagination($total, $page, Tickets::getTicketsShowByDefault(), 'page-');

        // Подключаем вид
        require_once(ROOT.'/views/tickets/index.php');
        return true;
    }

}