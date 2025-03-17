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

        return [
            'content' => apply_filters('the_content', get_the_content(null, false)),
            'events' => get_posts([
                'post_type' => 'event',
                // 'orderby' => ['start_date' => 'ASC'],
                "orderby" => "meta_value",
                "meta_key" => "date",
                "order" => "ASC",
                'numberposts' => get_option('posts_per_page'),
                'page' => (int) get_query_var('paged')
            ])
        ];
    }
}
