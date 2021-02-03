<?php
namespace wedevs;
class Ajax{
    function __construct(){
    add_action("wp_ajax_wd_weDevs_equire",array($this,"wedevs_enquire_submit"));
    }

    function wedevs_enquire_submit(){
        if(!wp_verify_nonce($_REQUEST['_wpnonce'],'wd_weDevs_equire')){
            wp_send_json_error(array(
                'message'=>__("Nonce verification filed",'weDEvs')
            ));
        }

         wp_send_json_success(array(
             'message'=>__("send jeson success",'weDevs')
         ));
         exit;

    }
    
}