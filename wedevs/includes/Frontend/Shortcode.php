<?php
namespace wedevs\Frontend;
/**
 * shortcode handler class.
 */

class Shortcode{
    /**
     * Shortcode constructor.
     */
    public function __construct(){
        add_shortcode("WeDevs_Academy",array($this,"render_shortcode"));
    }

    /**
     *  shortcode handler class.
     * @param $attrs
     * @param string $content
     *
     * @return string
     */


    function render_shortcode($attrs,$content=''){
            wp_enqueue_style('weDevs-frontend-css');
        return "<div class='academy_shortcode'>hallo short code</div>";

    }
}