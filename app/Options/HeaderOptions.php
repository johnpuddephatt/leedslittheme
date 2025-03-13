<?php

namespace App\Options;

use Log1x\AcfComposer\Builder;
use Log1x\AcfComposer\Options as Field;

class HeaderOptions extends Field
{
    /**
     * The option page menu name.
     *
     * @var string
     */
    public $name = 'Theme Options';

    /**
     * The option page document title.
     *
     * @var string
     */
    public $title = 'Header Options | Options';

    /**
     * The option page field group.
     */
    public function fields(): array
    {
        $fields = Builder::make('header_options');

        $fields



            ->addWysiwyg(
                'header_text',
                [
                    'tabs' => 'visual',
                    'toolbar' => 'simple',
                    'media_upload' => 0,
                ]
            );



        return $fields->build();
    }
}
