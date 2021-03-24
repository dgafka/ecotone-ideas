<?php


namespace App\PublishingEventWithName;

use App\Attribute\NamedEvent;

#[NamedEvent("ticket.was_created")]
class TicketWasCreated
{
    private string $ticketId;

    public function __construct(string $ticketId)
    {
        $this->ticketId = $ticketId;
    }

    public function getTicketId(): string
    {
        return $this->ticketId;
    }
}