<?php

//include_once ROOT . '/models/Tickets.php';

class TicketsController
{

    public function actionIndex()
    {
        $ticketList = array();
        $ticketList = Tickets::getLatestTicket(3);

        require_once(ROOT.'/views/tickets/index.php');

        return true;
    }

    public function actionView($ticketId)
    {
        $ticket = Tickets::getTicketById($ticketId);
        require_once (ROOT. '/views/tickets/view.php');

        return true;
    }
}