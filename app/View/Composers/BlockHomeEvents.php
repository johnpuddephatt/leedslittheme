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
        return [];
    }
}
