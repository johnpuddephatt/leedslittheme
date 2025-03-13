<?php

namespace App\Fields;

use Log1x\AcfComposer\Builder;
use Log1x\AcfComposer\Field;

class EventDate extends Field
{
    /**
     * The field group.
     */
    public function fields(): array
    {
        $fields = Builder::make('event_date', ['position' => 'side']);

        $fields
            ->setLocation('post_type', '==', 'event')
            ->addDatePicker('date', [
                'return_format' => 'Y-m-d',
            ])
            ->addTimePicker('start_time')
            ->addTimePicker('end_time', [
                'instructions' => 'Optional',
            ]);

        return $fields->build();
    }
}
