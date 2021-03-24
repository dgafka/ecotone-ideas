<?php

namespace App\FunctionalOne;

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

    public function assign(AssignTicket $command) : array
    {
        return [new TicketWasAssigned($command->getTicketId(), $command->getPersonId())];
    }

    #[EventSourcingHandler]
    public function onTicketWasCreated(TicketWasCreated $event) : static
    {
        $ticket = new self();
        $ticket->ticketId = $event->getTicketId();

        return $ticket;
    }

    #[EventSourcingHandler]
    public function onTicketWasAssigned(TicketWasAssigned $event) : static
    {
        $ticket = clone $this;
        $ticket->assignedPersonId = $event->getPersonId();

        return $ticket;
    }
}