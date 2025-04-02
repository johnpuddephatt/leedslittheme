<?php

namespace App\Options;

use Log1x\AcfComposer\Builder;
use Log1x\AcfComposer\Options as Field;

class ThemeOptions extends Field
{
    /**
     * The option page menu name.
     *
     * @var string
     */
    public $name = 'Theme options';

    public $slug = 'theme-options';

    /**
     * The option page document title.
     *
     * @var string
     */
    public $title = 'Theme options | Options';

    /**
     * The option page field group.
     */
    public function fields(): array
    {


        $fields = Builder::make('Social media');

        $fields

            ->addRepeater('social_media', [
                'label' => 'Social media',
                'layout' => 'table',
            ])
            ->addSelect('Type')
            ->addChoices(['Twitter', 'Facebook', 'Instagram', 'LinkedIn', 'Bluesky'])
            ->addUrl('link')
            ->endRepeater()
            ->addText('company_info')
            ->addImage(
                'social_media_image',
                [
                    'label' => 'Social media image',
                    'instructions' => 'This image will be used as the default social media preview if no image is set on the page.',
                    'return_format' => 'id'
                ]
            );



        return $fields->build();
    }
}
