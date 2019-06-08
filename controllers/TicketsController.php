<?php

//include_once ROOT . '/models/Tickets.php';

class TicketsController
{

    public function actionIndex()
    {
        $ticketList = array();
        $ticketList = Tickets::getLatestTicket();

        // Получаем id пользователя для аватара
        $idUser = User::getUserId();

        require_once(ROOT.'/views/tickets/index.php');
        return true;
    }

}