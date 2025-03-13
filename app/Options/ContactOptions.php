<?php

namespace App\Options;

use Log1x\AcfComposer\Builder;
use Log1x\AcfComposer\Options as Field;

class ContactOptions extends Field
{
    /**
     * The option page menu name.
     *
     * @var string
     */
    public $name = 'Contact Options';

    /**
     * The option page document title.
     *
     * @var string
     */
    public $title = 'Contact Options | Options';

    public $parent = 'theme-options';

    /**
     * The option page field group.
     */
    public function fields(): array
    {
        $fields = Builder::make('contact_options');

        $fields
            ->addText('contact_title')
            ->addText('contact_subtitle')
            // ->addPartial(\App\Fields\Partials\BackgroundColor::class)

            ->addLink('contact_read_more_link')

            ->addFlexibleContent('contact_blocks', [
                'layout' => 'block',
                'button_label' => 'Add Block',
            ])

            ->addLayout('block', [
                'label' => 'Block',
            ])

            ->addWysiwyg(
                'heading',
                [
                    'tabs' => 'visual',
                    'toolbar' => 'simple',
                    'media_upload' => 0,
                ]
            )
            ->addWysiwyg('subheading', [
                'tabs' => 'visual',
                'toolbar' => 'simple',
                'media_upload' => 0,
            ])
            // ->addUrl('link')
            ->addField('icon', 'svg_icon_picker', [
                'label'         => 'Icon',
                'return_format' => 'value', // or 'icon'
            ])

            ->addLink('link')

            ->endFlexibleContent();

        return $fields->build();
    }
}
