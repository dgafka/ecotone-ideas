<?php

namespace App\PublishingEventWithName;

use App\Attribute\EventSourcingHandler;
use Ecotone\Modelling\Attribute\AggregateIdentifier;
use Ecotone\Modelling\Attribute\CommandHandler;

class Ticket
{
    #[AggregateIdentifier]
    private string $ticketId;

    private string $assignedPersonId;

    private function __construct() {}

    #[CommandHandler]
    public static function create(CreateTicket $command) : array
    {
        return [new TicketWasCreated($command->getTicketId())];
    }

    #[EventSourcingHandler]
    public function onTicketWasCreated(TicketWasCreated $event) : static
    {
        $ticket = new self();
        $ticket->ticketId = $event->getTicketId();

        return $ticket;
    }
}