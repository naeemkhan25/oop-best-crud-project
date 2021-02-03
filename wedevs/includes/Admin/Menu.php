<?php
namespace wedevs\Admin;
/**
 * the Menu handler class.
 */
class Menu{
    public $addressbook;
    public function __construct($address_book)
    {
        $this->addressbook=$address_book;
        add_action("admin_menu",array($this,"Admin_Menu"));
    }

    function Admin_Menu(){
        $parent_slug="weDevsAcademy";
        $capability='manage_options';
       $hook= add_menu_page(__("WeDevs Academy",'weDevs'),__("WeDevs Academy",'weDevs'),$capability,$parent_slug,array($this,"address_book_page"),'dashicons-welcome-learn-more');
        add_submenu_page($parent_slug,__("Address Book","weDevs"),__("Address Book","weDevs"),$capability,$parent_slug,[$this,"address_book_page"]);
        add_submenu_page($parent_slug,__("Settings","weDevs"),__("Settings","weDevs"),$capability,'settings',[$this,"address_book_settings"]);
        add_action("admin_head-".$hook,[$this,"admin_enqueue_assets"]);

    }

    function address_book_page(){

       $this->addressbook->plugin_page();
    }

    function address_book_settings(){
        echo "this is settings page";
    }


    public function admin_enqueue_assets(){
        wp_enqueue_style('weDevs-admin-css');
    }
}