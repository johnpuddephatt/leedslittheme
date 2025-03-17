<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class BlockHomeEvents extends Composer
{

    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'blocks.home-events',

    ];

    public function with()
    {
        return [
            'events' => get_posts([
                'post_type' => 'event',
                'orderby' => ['start_date' => 'ASC'],
                'numberposts' => 4,
                'page' => (int) get_query_var('paged')
            ])
        ];
    }
}
