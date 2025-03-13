<?php

namespace App\Options;

use Log1x\AcfComposer\Builder;
use Log1x\AcfComposer\Options as Field;

class MessageOptions extends Field
{
    /**
     * The option page menu name.
     *
     * @var string
     */
    public $name = 'Messages';

    /**
     * The option page menu slug.
     *
     * @var string
     */
    public $slug = 'messages';

    /**
     * The option page document title.
     *
     * @var string
     */
    public $title = 'Messages | Options';



    /**
     * The slug of another admin page to be used as a parent.
     *
     * @var string
     */
    public $parent = 'theme-options';


    /**
     * The option page field group.
     */
    public function fields(): array
    {
        $fields = Builder::make('options');

        $fields
            ->addRepeater('items')
            ->addText('item')
            ->endRepeater();

        return $fields->build();
    }
}
