<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class Page extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = ['page'];

    /**
     * Data to be passed to view before rendering.
     *
     * @return array
     */
    public function with()
    {
        global $post;

        return [
            'post' => $post,
            'toc' => $this->get_toc(apply_filters('the_content', $post->post_content)),
            'content' => $this->add_ids_and_jumpto_links('h2', apply_filters('the_content', $post->post_content)),
            'children' => $this->children(),
            'siblings' => $this->siblings(),
            'section' => $this->section(),
            'sidebarMenu' => $this->sidebarMenu(),
        ];
    }

    /**
     * Data to be passed to view before rendering, but after merging.
     *
     * @return array
     */
    public function override()
    {
        return [
            // "title" => $this->title(),
        ];
    }

    public function children()
    {
        global $post;

        if ($post->post_type == 'page') {
            return get_posts([
                'post_type' => 'page',
                'post_parent' => $post->ID,
                'orderby' => 'menu_order',
                'order' => 'ASC',
                'numberposts' => -1,
            ]);
        }
    }

    public function siblings()
    {
        global $post;
        if (!$post->post_parent) return null;

        return get_posts([
            'post_type'        => 'page',
            'post_parent'    => $post->post_parent,
            'orderby' => 'menu_order',
            'order' => 'ASC',
            'numberposts' => -1
        ]);
    }



    public function sidebarMenu()
    {
        global $post;


        return wp_list_pages([
            'title_li' => null,
            'depth' => 2,
            'echo' => false,
            'child_of' => $post->post_parent !== 0 ? $post->post_parent : $post->ID,
            'sort_column' => 'menu_order',
        ]);
    }

    public function section()
    {
        global $post;

        if (!$post->post_type == 'page') {
            return null;
        }

        $ancestors = get_post_ancestors($post->ID);
        $section_id = end($ancestors);
        $section = new \stdClass();
        $section->ID = $section_id;
        $section->title = get_the_title($section_id);
        $section->permalink = get_permalink($section_id);

        return $section;
    }



    public function get_toc($content = '')
    {
        $toc   = '';
        $items   = $this->get_tags('h2', $content);

        if ($items) {
            $toc .= '<div class="relative">';
            $toc .= '<h3 class="font-semibold mb-6">On this page</h3><ul id="toc-menu">';

            if (strpos($content, '<h2') >= 10) {
                $toc .=  '<li class="mb-4 leading-tight"><a href="#overview">Overview</a></li>';
            }
            foreach ($items as $item) {
                $toc .= '<li class="mb-4 leading-tight" ><a href="#' . sanitize_title_with_dashes($item[2]) . '">' . $item[2] . '</a></li>';
            }
            $toc .= '</ul>';
            $toc .= '</div>';
        }

        return $toc;
    }

    private function add_ids_and_jumpto_links($tag, $content)
    {
        $items = $this->get_tags($tag, $content);

        $matches      = array();
        $replacements = array();

        foreach ($items as $item) {
            $replacement = '';
            $matches[]   = $item[0];
            $id          = sanitize_title_with_dashes($item[2]);
            $replacement   .= sprintf('<div class="group  relative"><%1$s class="flex justify-between gap-2" id="%2$s">%3$s<a href="#%2$s" class="before:absolute before:inset-0 group-hover:opacity-70 opacity-0 transition "><svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-width="1.5" class="w-6 h-6 inline-block" viewBox="0 0 24 24">
    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" d="M13.19 8.688a4.5 4.5 0 0 1 1.242 7.244l-4.5 4.5a4.5 4.5 0 0 1-6.364-6.364l1.757-1.757m13.35-.622 1.757-1.757a4.5 4.5 0 0 0-6.364-6.364l-4.5 4.5a4.5 4.5 0 0 0 1.242 7.244"/>
</svg></a></div></%1$s>', $tag, $id, $item[2]);
            $replacements[] = $replacement;
        }

        return str_replace($matches, $replacements, $content);
    }

    private function get_tags($tag, $content = '')
    {
        // if ( empty( $content ) ) {
        // 	$content = get_the_content();
        // }

        preg_match_all("/(<{$tag}.*>)(.*)(<\/{$tag}>)/", $content, $matches, PREG_SET_ORDER);
        return $matches;
    }
}
