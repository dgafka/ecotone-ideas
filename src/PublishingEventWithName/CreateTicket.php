<?php


namespace App\PublishingEventWithName;


class CreateTicket
{
    private string $ticketId;

    public function getTicketId(): string
    {
        return $this->ticketId;
    }
}