<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class Event extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'partials.content-single-event',
    ];

    /**
     * Data to be passed to view before rendering, but after merging.
     *
     * @return array
     */
    public function override()
    {
        global $post;

        $post->subtitle = get_field('subtitle', $post);
        $post->date = get_field('date', $post) ? wp_date(get_option('date_format'), strtotime(get_field('date', $post),)) : null;

        $post->start_time = get_field('start_time', $post);
        $post->end_time = get_field('end_time', $post);
        $post->venue = get_field('venue', $post);
        $post->address = get_field('address', $post);

        $post->cost = get_field('cost', $post);


        $post->ticket_url = get_field('tickets_url', $post);

        $post->featured_image = get_the_post_thumbnail(null, 'wide-3xl', ['class' => 'w-full h-auto']);


        return [
            'event' => $post,
        ];
    }
}
