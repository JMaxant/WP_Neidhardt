<?php

/**
 * Class NS_Index
 */

final class NS_Index extends NS_Controller
{

    public $fields;

    public function __construct()
    {
        parent::__construct();

        $this->fields = $this->setFields();
    }


    private function setFields()
    {
        $rows = get_field('slider');
        $fields = array();
        $i=0;

        foreach($rows as $row) {
            $fields[$i]['title'] = $row['title'];
            $fields[$i]['desc'] = $row['desc'];

            if(getimagesize($row['media']['url']) != FALSE) {
                $fields[$i]['media'] = wp_get_attachment_image($row['media']['id'], 'home-slider');
            }else{
                $fields[$i]['media'] = '<video class="video-slider"  autoPlay loop preload="auto"><source src="'.$row['media']['url'].'" /></video><svg class="volume-button sound-on" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 339.62 252.99"><defs/><g id="Layer_2" data-name="Layer 2"><g id="Layer_1-2" data-name="Layer 1"><path d="M166.39 8.24a15.7 15.7 0 0 0-24.69-3.08q-28.23 28.16-56.36 56.39a6.06 6.06 0 0 1-4.78 2c-21.16-.06-42.33 0-63.49-.06C6.11 63.45.45 72.38.5 80c.21 30.83.09 61.65.09 92.48 0 10.63 6.46 17.05 17.15 17.06 20.67 0 41.33 0 62-.06a7.72 7.72 0 0 1 6.1 2.48q27.65 27.84 55.44 55.55a15.77 15.77 0 0 0 27.3-11V126.79 17.57a17.53 17.53 0 0 0-2.19-9.33zm-18.92 215.67c-.86-.79-1.53-1.35-2.15-2q-25.8-25.8-51.57-51.64a5.54 5.54 0 0 0-4.35-1.83c-21.66.06-43.33 0-65 .09-2.33 0-2.88-.66-2.87-2.91q.11-39.12 0-78.23c0-2.51.77-3 3.09-3 21.58.09 43.16 0 64.73.09a5.59 5.59 0 0 0 4.37-1.8Q119.37 57 145.1 31.28a23.92 23.92 0 0 0 1.73-2.15l.64.36z" class="cls-1"/>
      <path d="M336.62 122.07c-.07 21.78-5 41-14.9 58.91a116.22 116.22 0 0 1-16.86 23.19 120.5 120.5 0 0 1-32 24.6c-4.62 2.44-9.18.16-10.08-5a6.43 6.43 0 0 1 3.1-6.27 122.89 122.89 0 0 0 16.44-10.61 107.21 107.21 0 0 0 25-27.63 105 105 0 0 0 13-30.86 111 111 0 0 0 2.79-18.68 99.18 99.18 0 0 0-.13-14.83 105.12 105.12 0 0 0-24.73-59.68 105.68 105.68 0 0 0-28.15-23.44c-1.32-.75-2.66-1.5-4-2.28A6.59 6.59 0 0 1 272.4 18a105.08 105.08 0 0 1 17.18 10.92 118.76 118.76 0 0 1 45.2 74 123.31 123.31 0 0 1 1.84 19.15z" class="cls-2"/><path d="M296.76 124.2a76.49 76.49 0 0 1-16.4 47.07 71.14 71.14 0 0 1-20.25 17.63 6.79 6.79 0 0 1-7.71-.42 6.66 6.66 0 0 1-2.13-7.69 7.43 7.43 0 0 1 3.54-3.69 52.9 52.9 0 0 0 11.25-8.63 60.37 60.37 0 0 0 12.64-18.38 64.13 64.13 0 0 0 5-17.54 67.74 67.74 0 0 0 .17-16.35A63.36 63.36 0 0 0 276 93.38 58.15 58.15 0 0 0 254 70c-2.31-1.36-4.13-3.06-4.15-6a6.65 6.65 0 0 1 10-6 68.89 68.89 0 0 1 17.85 14.4 74.67 74.67 0 0 1 15.57 27.94 78.64 78.64 0 0 1 3.22 17.16c.14 1.94.21 3.88.27 6.7z" class="cls-2"/><path d="M256.87 123.49c-.1 11.56-7.13 21.34-17.3 26a6.7 6.7 0 0 1-8.6-3.15 6.55 6.55 0 0 1 2.89-8.79c3.95-2 7.09-4.77 8.71-9a14.71 14.71 0 0 0-6.45-17.87 17.66 17.66 0 0 1-3.84-2.46 6.68 6.68 0 0 1-.89-8.4 6.59 6.59 0 0 1 8.24-2.37c9.37 4.71 15.44 11.93 17 22.57a26.69 26.69 0 0 1 .24 3.47z" class="cls-2"/></g></g></svg><svg class="volume-button sound-off" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 336.12 251.99"><path class="sound-off" d="M323.35 178.51c-1.92.15-3.16-1.09-4.41-2.34q-16.53-16.53-33.06-33c-2.64-2.64-1.92-2.67-4.68.08q-16.36 16.34-32.7 32.69c-3.53 3.53-6 3.59-9.57.09-2.26-2.21-4.41-4.53-6.54-6.87s-1.75-4.91.65-7.31q11.28-11.34 22.61-22.64c3.77-3.77 7.47-7.61 11.34-11.27 1.49-1.41 1.57-2.21.06-3.7Q250.34 107.66 233.79 91c-3.65-3.65-3.65-5.81 0-9.48 1.74-1.78 3.37-3.68 5.14-5.43 3.54-3.49 6.12-3.45 9.61 0 11.08 11.07 22.19 22.11 33.18 33.27 1.62 1.64 2.4 1.43 3.89-.07q16.51-16.71 33.19-33.27c3.38-3.38 6-3.44 9.42-.08 2.26 2.21 4.42 4.53 6.53 6.89s1.82 5-.69 7.5c-11.18 11.2-22.34 22.43-33.62 33.54-1.75 1.72-1.66 2.57 0 4.25 11.09 10.94 22.07 22 33.08 33 3.5 3.51 3.47 5.73 0 9.29-1.93 2-3.72 4.06-5.7 6-1.22 1.13-2.56 2.21-4.47 2.1zM165.89 7.74a15.7 15.7 0 0 0-24.69-3.08Q113 32.82 84.84 61.05a6.06 6.06 0 0 1-4.78 2C58.9 63 37.73 63.06 16.57 63 5.61 63 0 71.88 0 79.47.21 110.3.09 141.12.09 172c0 10.58 6.46 17 17.15 17 20.67 0 41.33 0 62-.06a7.72 7.72 0 0 1 6.1 2.48Q113 219.27 140.77 247a15.77 15.77 0 0 0 27.3-11V126.28 17.06a17.53 17.53 0 0 0-2.18-9.32zM147 223.41c-.86-.79-1.53-1.35-2.15-2Q119 195.64 93.25 169.8a5.54 5.54 0 0 0-4.35-1.8c-21.66.06-43.33 0-65 .09-2.33 0-2.88-.66-2.87-2.91q.11-39.12 0-78.23c0-2.51.77-3 3.09-3 21.58.09 43.16 0 64.73.09a5.59 5.59 0 0 0 4.37-1.8q25.65-25.78 51.38-51.47a23.92 23.92 0 0 0 1.73-2.15l.67.38z"/></svg>';
            }

            $fields[$i]['links'] = $row['links'];

            $i++;
        }

        return $fields;
    }
}