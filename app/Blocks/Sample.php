<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use Log1x\AcfComposer\Builder;

class Sample extends Block
{
    /**
     * The block name.
     *
     * @var string
     */
    public $name = 'Sample';

    /**
     * The block description.
     *
     * @var string
     */
    public $description = 'Used to communicate important information to users';

    /**
     * The block category.
     *
     * @var string
     */
    public $category = 'reusable';

    /**
     * The block icon.
     *
     * @var string|array
     */
    public $icon = 'megaphone';

    /**
     * The block keywords.
     *
     * @var array
     */
    public $keywords = [];

    /**
     * The block post type allow list.
     *
     * @var array
     */
    public $post_types = [];

    /**
     * The parent block type allow list.
     *
     * @var array
     */
    public $parent = [];

    /**
     * The ancestor block type allow list.
     *
     * @var array
     */
    public $ancestor = [];

    /**
     * The default block mode.
     *
     * @var string
     */
    public $mode = 'preview';

    /**
     * The default block alignment.
     *
     * @var string
     */
    public $align = '';

    /**
     * The default block text alignment.
     *
     * @var string
     */
    public $align_text = '';

    /**
     * The default block content alignment.
     *
     * @var string
     */
    public $align_content = '';

    /**
     * The supported block features.
     *
     * @var array
     */
    public $supports = [
        'align' => true,
        'align_text' => false,
        'align_content' => false,
        'full_height' => false,
        'anchor' => false,
        'mode' => true,
        'multiple' => true,
        'jsx' => false,
        'color' => [
            'background' => false,
            'text' => false,
            'gradient' => false,
        ],
    ];



    /**
     * The block styles.
     *
     * @var array
     */
    // public $styles = ['default', 'large'];

    /**
     * The block preview example data.
     *
     * @var array
     */


    /**
     * The block template.
     *
     * @var array
     */
    // public $template = [
    //     'core/heading' => ['placeholder' => 'Heading',],
    //     'core/paragraph' => [
    //         'placeholder' => 'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum',
    //     ],
    //     'core/buttons' => ['placeholder' => 'Buttons', 'lock' => [
    //         'move'   => true,
    //         'remove' => true,
    //         'innerBlocks' => [
    //             [
    //                 'core/button' => ['placeholder' => 'Button', 'lock' => [
    //                     'move'   => true,
    //                     'remove' => true,
    //                 ]],
    //                 'core/button' => ['placeholder' => 'Button', 'lock' => [
    //                     'move'   => true,
    //                     'remove' => true,
    //                 ]],
    //             ],

    //         ],
    //     ]],


    // ];

    /**
     * Data to be passed to the block before rendering.
     */
    public function with(): array
    {
        return [
            'heading' => get_field('heading'),
            'content' => get_field('content'),
            'link' => get_field('link'),
            'background_colour' => get_field('background_colour'),
            'behind_color' => get_field('behind_color'),
            'image' => get_field('image'),
            'type' => get_field('Announcement type'),
            'page' => get_field('page'),
            'override' => get_field('Override details'),
        ];
    }

    /**
     * The block field group.
     */
    public function fields(): array
    {
        $fields = Builder::make('announcement');

        $fields
            ->addPartial(\App\Fields\Partials\BackgroundColor::class)

            ->addField('behind_color', 'editor_palette')
            ->setConfig('default_value', 'transparent')
            ->setConfig('allowed_colors', ['transparent', 'green-light', 'pink-light', 'beige-light'])
            ->setConfig('return_format', 'slug')

            ->addSelect('Announcement type')
            ->addChoices([
                'link' => 'Link',
                'page' => 'Page or post',
            ])
            ->addPostObject('page', [
                'post_type' => ['page', 'post', 'tribe_events', 'opportunity'],
                'return_format' => 'id',
                'conditional_logic' => [
                    [
                        'field' => 'Announcement type',
                        'operator' => '==',
                        'value' => 'page',
                    ],
                ],
            ])

            ->addText('heading', [
                'conditional_logic' =>
                [
                    [
                        'field' => 'Announcement type',
                        'operator' => '==',
                        'value' => 'link',
                    ]
                ],
            ])
            ->addUrl('link', [
                'conditional_logic' =>
                [
                    [
                        'field' => 'Announcement type',
                        'operator' => '==',
                        'value' => 'link',
                    ]
                ],
            ])
            ->addTextarea('content', [
                'maxlength' => '150',
                'conditional_logic' =>
                [
                    [
                        'field' => 'Announcement type',
                        'operator' => '==',
                        'value' => 'link',
                    ]
                ],
            ])
            ->addImage('image', [
                'return_format' => 'id',

                'conditional_logic' =>
                [
                    [
                        'field' => 'Announcement type',
                        'operator' => '==',
                        'value' => 'link',
                    ]
                ],
            ]);


        return $fields->build();
    }


    /**
     * Assets enqueued when rendering the block.
     */
    public function assets(array $block): void
    {
        //
    }
}
