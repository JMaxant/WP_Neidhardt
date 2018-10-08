<?php

/**
 * Class NS_Single
 */
final class NS_Single extends NS_Controller
{

    public $media;
    public $embed;
    public $article;

    public function __construct()
    {
        parent::__construct();

        $this->media = $this->setMedia();
        $this->embed = $this->setEmbed();
        $this->article = $this->getACF();
    }


    private function getACF()
    {
        $article = get_field('main_content');

        return $article;
    }

    private function setMedia()
    {
        $data = get_field('media');

        if(!empty($data)) {
            if(getimagesize($data['url']) != FALSE) {
                $media = wp_get_attachment_image($data['id'], '', '', array('class' => 'img-responsive'));
            } else {
                $media = '<video id="video-workpage" controls controlslist="nodownload" preload="true"><source src="'.$data['url'].'" /></video>';
            }

            return $media;
        }
    }

    private function setEmbed()
    {
        $embed = get_field('soundcloud');

        return $embed;
    }
}