<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use Log1x\AcfComposer\Builder;

class HomeEvents extends Block
{
    /**
     * The block name.
     *
     * @var string
     */
    public $name = 'Home events';

    /**
     * The block description.
     *
     * @var string
     */
    public $description = 'Used on the homepage';

    /**
     * The block category.
     *
     * @var string
     */
    public $category = 'widgets';

    /**
     * The block icon.
     *
     * @var string|array
     */
    public $icon = 'calendar';

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
        'align' => false,
        'align_text' => false,
        'align_content' => false,
        'full_height' => false,
        'anchor' => false,
        'mode' => false,
        'multiple' => false,
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
        $events = get_posts([
            'post_type' => 'event',
            'orderby' => ['start_date' => 'ASC'],
            'numberposts' => 4,
            'meta_query' => [
                'relation' => 'AND',
                [
                    'key' => 'featured',
                    'value' => 1,
                    'compare' => '='
                ],
                [
                    'key' => 'date',
                    'value' => date('Y-m-d'),
                    'compare' => '>='
                ]
            ],
            'meta_key' => 'date',
        ]);

        if (count($events) < 4) {
            $additional_events = get_posts([
                'post_type' => 'event',
                'orderby' => ['start_date' => 'ASC'],
                'numberposts' => 4 - count($events),
                'meta_query' => [
                    'relation' => 'AND',
                    [
                        'key' => 'featured',
                        'value' => 0,
                        'compare' => '=',

                    ],
                    [
                        'key' => 'date',
                        'value' => date('Y-m-d'),
                        'compare' => '>='
                    ]
                ],
                'meta_key' => 'date',
            ]);
        }

        $events = array_merge($events, $additional_events ?? []);

        return [
            'heading' => get_field('heading'),
            'link' => get_field('link'),
            'events' => $events
        ];
    }

    /**
     * The block field group.
     */
    public function fields(): array
    {
        $fields = Builder::make('home_events');
        $fields
            ->addText('heading')
            ->addLink('link');
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
