<?php
namespace wedevs;
use wedevs\Admin\Menu;

/**
 * the admin all Classes.
 */

class Admin{
    function __construct()
    {

        $address_book=new Admin\AddressBook();
        $this->dispatch_actions($address_book);
        new Admin\Menu($address_book);

    }

    /**
     * submit output show .
     */
    public function dispatch_actions($address_book){

        add_action("admin_init",[$address_book,'from_handler']);
        add_action("admin_post_wedevs_delete_address",[$address_book,'delete_address']);
    }

}