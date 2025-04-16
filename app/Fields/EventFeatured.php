<?php

namespace App\Fields;

use Log1x\AcfComposer\Builder;
use Log1x\AcfComposer\Field;

class EventFeatured extends Field
{
    /**
     * The field group.
     */
    public function fields(): array
    {
        $fields = Builder::make('event_featured', ['position' => 'side']);

        $fields
            ->setLocation('post_type', '==', 'event')
            ->addTrueFalse('featured', [
                'ui' => true,
                'ui_on_text' => 'Featured',
                'ui_off_text' => 'Not Featured',
            ]);

        return $fields->build();
    }
}
