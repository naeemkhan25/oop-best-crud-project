<?php
namespace wedevs\Frontend;

class Enquire{
    public function __construct(){
        add_shortcode("academy_enquire",[$this,'render_shortcode']);
    }
    public function render_shortcode($attr,$conten=''){
            wp_enqueue_style("weDevs-enquire-css");
            wp_enqueue_script("weDevs-enquire-js");
             wp_localize_script(
            "weDevs-enquire-js",
            "plugindata",
            array(
                'ajax_url' => admin_url( 'admin-ajax.php' ),
                'error'=>__("something went wrong","weDevs")
            )
        );

            ob_start();
            include __DIR__."/views/enquire.php";
            return ob_get_clean();

    }
}