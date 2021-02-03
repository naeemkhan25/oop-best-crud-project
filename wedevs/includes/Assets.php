<?php
namespace wedevs;


class Assets{
    public function __construct(){
        add_action("wp_enqueue_scripts",[$this,'enqueue_assets']);
        add_action("admin_enqueue_scripts",array($this,'enqueue_assets'));
    }

//  public function get_script(){
//        return [
//            'weDevs-main-js'=>[
//                'scr'=>WD_ACADEMY_ASSETS.'/js/frontend.js',
//                'dep'=>['jquery'],
//                'version'=>time(),
//            ]
//        ];
//  }
//    public function get_style(){
//        return [
//            'weDevs-frontend-css'=>[
//                'scr'=>WD_ACADEMY_ASSETS.'/css/frontend.css',
//
//                'version'=>time(),
//            ]
//        ];
//    }
    function enqueue_assets(){
//        $styles=$this->get_style();
////        $dep=isset($style['dep'])?$style['dep']:false;
//
//        foreach ($styles as $handle=>$style){
//            wp_enqueue_style($handle,$style['src'],null,$style['version']);
//        }
//        $scripts=$this->get_script();
//
//
//        foreach ($scripts as $handle=>$script){
//            $dep=isset($script['dep'])?$script['dep']:false;
//            wp_register_script($handle,$script['src'],$dep,$script['version'],true);
//        }

        wp_register_style("weDevs-frontend-css",WD_ACADEMY_ASSETS.'/css/frontend.css',null,time(),false);
        wp_register_style("weDevs-admin-css",WD_ACADEMY_ASSETS.'/css/admin.css',null,time(),false);
        wp_register_style("weDevs-enquire-css",WD_ACADEMY_ASSETS.'/css/enquire.css',null,time(),false);
//       wp_enqueue_style('wedevs_main-css',get_stylesheet_uri(),null,time(),false);
        wp_register_script("weDevs-main-js",WD_ACADEMY_ASSETS.'/js/frontend.js',array('jquery'),time(),true);
        wp_register_script("weDevs-enquire-js",WD_ACADEMY_ASSETS.'/js/enquire.js',array('jquery'),filemtime(WD_ACADEMY_PATH.'/assets/js/enquire.js'),true);


    }
}