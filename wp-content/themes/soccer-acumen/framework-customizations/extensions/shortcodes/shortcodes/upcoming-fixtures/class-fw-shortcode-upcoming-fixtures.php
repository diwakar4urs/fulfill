<?php

if (!defined('FW'))
    die('Forbidden');

class FW_Shortcode_Upcoming_Fixtures extends FW_Shortcode {

    protected function _render($atts, $content = null, $tag = '') {
		
        if (!empty($atts['view']['gadget']) && $atts['view']['gadget'] === 'carousel') {
            $view = 'carousel';
        } else if (!empty($atts['view']['gadget']) && $atts['view']['gadget'] === 'carousel-two') {
            $view = 'carousel-two';
        } else {
            $view = 'list';

        }
        

        $view_path = $this->locate_path('/views/' . $view . '.php');
        return fw_render_view($view_path, array(
            'atts' => $atts,
            'content' => $content,
            'tag' => $tag
                ));
    }

    private function get_error_msg() {
        return '<b>Something went wrong :(</b>';
    }

}
