<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class EventArchive extends Composer
{

    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'template-events',

    ];

    public function with()
    {

        if (($_GET['layout'] ?? false) == 'list') {
            $sort = [
                'orderby' => [
                    'event_start_date_clause' => 'ASC',
                    'event_start_time_clause' => 'ASC'
                ],
                'meta_key' => 'date',
                'meta_query' => [
                    'relation' => 'AND',
                    'event_start_date_clause' => [
                        'key'     => 'date',
                        'compare' => 'EXISTS',
                    ],
                    'event_start_time_clause' => [
                        'key'     => 'start_time',
                        'compare' => 'EXISTS',
                    ],
                    'event_not_before_today_clause' => [
                        'key'     => 'date',
                        'value'   => date('Y-m-d'),
                        'compare' => '>=',
                    ],
                ],
            ];
        } else {
            $sort = [
                'orderby' => ['post_title' => 'ASC'],
            ];
        };

        return [
            'content' => apply_filters('the_content', get_the_content(null, false)),
            'events' => get_posts(array_merge($sort, [
                'post_type' => 'event',
                "order" => "ASC",
                'numberposts' => 9999,
                'page' => (int) get_query_var('paged')
            ]))
        ];
    }
}
