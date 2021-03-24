<?php


namespace App\FunctionalOne;


class TicketWasAssigned
{
    private string $ticketId;

    private string $personId;

    public function __construct(string $ticketId, string $personId)
    {
        $this->ticketId = $ticketId;
        $this->personId = $personId;
    }


    public function getTicketId(): string
    {
        return $this->ticketId;
    }

    public function getPersonId(): string
    {
        return $this->personId;
    }
}