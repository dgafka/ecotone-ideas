<?php


namespace App\FunctionalOne;


class AssignTicket
{
    private string $ticketId;

    private string $personId;

    public function getTicketId(): string
    {
        return $this->ticketId;
    }

    public function getPersonId(): string
    {
        return $this->personId;
    }
}