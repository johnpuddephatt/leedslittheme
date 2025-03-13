<?php

namespace App\Fields\Partials;

use Log1x\AcfComposer\Builder;
use Log1x\AcfComposer\Partial;

class BackgroundColor extends Partial
{


    /**
     * The partial field group.
     */
    public function fields(): Builder
    {
        $fields = Builder::make('item');

        $fields
            ->addField('background_colour', 'editor_palette')
            ->setConfig('default_value', 'green-light')
            ->setConfig('allowed_colors', [
                'green-light',
                'pink-light',
                'beige-light',

            ])
            ->setConfig('return_format', 'slug');

        return $fields;
    }
}
