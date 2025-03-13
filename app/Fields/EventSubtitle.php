<?php

namespace App\Fields;

use Log1x\AcfComposer\Builder;
use Log1x\AcfComposer\Field;

class EventSubtitle extends Field
{
    /**
     * The field group.
     */
    public function fields(): array
    {
        $fields = Builder::make('event_subtitle', ['position' => 'side', 'priority' => 'high']);

        $fields
            ->setLocation('post_type', '==', 'event')
            ->addText('subtitle');

        return $fields->build();
    }
}
