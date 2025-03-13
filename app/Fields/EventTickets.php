<?php

namespace App\Fields;

use Log1x\AcfComposer\Builder;
use Log1x\AcfComposer\Field;

class EventTickets extends Field
{
    /**
     * The field group.
     */
    public function fields(): array
    {
        $fields = Builder::make('event_tickets', ['position' => 'side']);

        $fields
            ->setLocation('post_type', '==', 'event')
            ->addTextarea('cost')
            ->addUrl('tickets_url');

        return $fields->build();
    }
}
