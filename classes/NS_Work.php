<?php

/**
 * Class NS_Work
 */
final class NS_Work extends NS_Controller
{

    public $tags;
    public $gallery_items;
    public $active_category;

    public function __construct()
    {
        parent::__construct();
        $this->tags = $this->setTags();
        $this->gallery_items = $this->setGallery();
        $this->active_category = $this->setActiveCategory();
    }

    private function setTags()
    {
        $terms = get_categories(array(
            'orderby' => 'name',
            'order' => 'ASC',
            'hide_empty' => 0
        ));

        $i = 0;

        $names = array();
        $anchor = array();
        $desc = array();
        foreach($terms as $term)
        {
            if($term->slug != 'non-classe') {
                $names[] = $term->name;
                $anchor[] = $term->slug;
                $desc[] = $term->description;
            }
            $i++;
        }
        $tags = new stdClass;

        $tags->name = $names;
        $tags->anchor = $anchor;
        $tags->desc = $desc;

        return $tags;
    }

    private function setGallery()
    {
        $query = new WP_Query(array(
            'post-type' => 'post',
            'post_status' => 'publish',
            'post_per_page' => -1,
            'order' => 'ASC',
            'order_by' => 'modified'
        ));

        $posts = $query->posts;

        $gallery = array();
        $i = 0;
        foreach($posts as $post){
            $gallery[$i]['ID'] = $post->ID;
            $gallery[$i]['post_title'] = $post->post_title;
            $gallery[$i]['excerpt'] = $post->post_excerpt;
            $gallery[$i]['thumbnail'] = get_the_post_thumbnail($gallery[$i]['ID']);
            $gallery[$i]['url'] = $post->guid;
            $tags = get_the_category($gallery[$i]['ID']);
            foreach($tags as $tag) {
                $gallery[$i]['tags'][] = $tag->slug;
            }
            $gallery[$i]['tags'] = implode(' ',$gallery[$i]['tags']);
            $i++;
        }
        $gallery = array_reverse($gallery, true);

        return $gallery;
    }

    private function setActiveCategory()
    {
        // to sanitize the input, we need to retrieve all the categories and store their slugs
        $terms = get_terms();
        foreach($terms as $term)
        {
            $slugs[] = $term->slug;
        }

        if(isset($_GET['cat'])&&(in_array($_GET['cat'], $slugs)))
        {
            // we check if $_GET['cat'] is set and if it's a known category
            $active_category = $_GET['cat'];
        }else{
            // else, we assign a default value to $active_category
            $active_category = 'all';
        }

        return $active_category;
    }
}