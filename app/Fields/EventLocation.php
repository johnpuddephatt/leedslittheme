<?php

namespace App\Fields;

use Log1x\AcfComposer\Builder;
use Log1x\AcfComposer\Field;

class EventLocation extends Field
{
    /**
     * The field group.
     */
    public function fields(): array
    {
        $fields = Builder::make('event_location', ['position' => 'side']);

        $fields
            ->setLocation('post_type', '==', 'event')
            ->addText('venue')
            ->addTextarea('address');

        return $fields->build();
    }
}
