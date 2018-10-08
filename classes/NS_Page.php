<?php

final class NS_Page extends NS_Controller
{

    public $subfields;

    public function __construct()
    {
        parent::__construct();
        $this->subfields = $this->getACF();
    }

    /**
     * @return array
     */

    private function getACF()
    {
        $rows = get_field('text_repeater');
        $subfields = array();
        $work_page = get_permalink(get_page_by_title('work')->ID);


        foreach($rows as $fields) {
            $subfields[$fields['subtitle']]['content'] = $fields['textarea'];
            if(!empty($fields['rel_link']))
            {
                $taxo = get_term($fields['rel_link'])->slug;
                $subfields[$fields['subtitle']]['rel_link'] = $work_page.'?&amp;cat='.$taxo;
            }

        }

        return $subfields;
    }
}