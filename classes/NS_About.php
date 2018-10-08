<?php

final class NS_About extends NS_Controller
{

    public $block;
    public $awards;
    public $testimonials;
    public $cover;

    public function __construct()
    {
        parent::__construct();

        $this->awards = $this->getRows('awards');
        $this->block = $this->getText();
        $this->cover = $this->getCover();
        $this->testimonials = $this->getRows('testimonials');
    }

    /**
     * @param $field
     * @return array
     */
    private function getRows($field)
    {
        $rows = get_field($field);
        $output = array();
        foreach($rows as $key => $row) {
            $output['subtitle'] = $row['subtitle'];
            $output['gallery'] = $row['gallery'];
        }

        return $output;
    }

    private function getText()
    {
        $rows = get_field('block_text');
        $block = array();
        foreach($rows as $row) {
            $block[$row['title']] = $row['content'];
        }

        return $block;
    }

    private function getCover()
    {
        $media = get_field('cover');
        if(getimagesize($media['url']) != FALSE) {
            $cover = wp_get_attachment_image($media['id'], 'full');
        }else{
            $cover = '<video id="cover-about" class="video-js"  autoplay muted preload="true"><source src="'.$media['url'].'" /></video>';
        }
        return $cover;
    }

}
