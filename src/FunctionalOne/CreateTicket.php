<?php


namespace App\FunctionalOne;


class CreateTicket
{
    private string $ticketId;

    public function getTicketId(): string
    {
        return $this->ticketId;
    }
}