<?php
/*
Plugin Name:wedevs accdmey
Plugin URI:https://github.com/naeemkhan25/all-demo-plugin
Description:this is my first plugin
Version:1.0
Author: Naeem khan
Author URI:https://naeemkhan25.github.io/
License: GPLv2 or later
Text Domain:weDevs
Domain Path:/languages/
*/

if(! defined('ABSPATH' )){
    exit;
}
require_once __DIR__. '/vendor/autoload.php';
/**
 * the main plugin class
 */
 final class WeDevs_academy{

     /**
      * plugin version
      */
     const version='1.0';


     /**
      * WeDevs_academy constructor.
      */
    private function __construct()
    {
        $this->define_constants();

        register_activation_hook(__FILE__,[$this,'activate']);
        add_action("plugin_loaded",[$this,"init_plugin"]);
    }

     /**
      * initializes singleton instance.
      */
    public static function init(){
        static $instance=false;

        if( ! $instance){
            $instance=new self();
        }
        return $instance;
    }

     /**
      * Define the required plugin constants
      *
      * return void
      */
    public function define_constants(){
        define("WD_ACADEMY_VERSION",self::version);
        define("WD_ACADEMY_FILE",__FILE__);
        define("WD_ACADEMY_PATH",__DIR__ );
        define("WD_ACADEMY_URL",plugin_dir_url(WD_ACADEMY_FILE) );
        define("WD_ACADEMY_ASSETS",WD_ACADEMY_URL.'assets' );
    }

     /**
      * do stuff on plugin activation
      *
      * return void
      */
    public function activate(){
        $installer=new wedevs\Admin\Installer();
        $installer->run();
    }

     /**
      * initialize the plugin load file and class
      *
      * return void
      */
    public function init_plugin(){
        new wedevs\Assets();
        if( defined('DOING_AJAX' ) && DOING_AJAX ){
            new wedevs\Ajax();
        }

        if(is_admin()){
            new wedevs\Admin();
        }else{
            new wedevs\Frontend();
        }

    }
}
/**
 * initializes the main plugin
 *
 * return \WeDevs_academy class.
 */
function WeDevs_academy(){
    return WeDevs_academy::init();
}


/**
 * kick-of the plugin
 */
WeDevs_academy();
