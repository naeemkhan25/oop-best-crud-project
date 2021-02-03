<?php
 namespace wedevs\Admin;
/*
 * the Address book handler
 *
 */

use ParagonIE\Sodium\Core\BLAKE2b;
 use wedevs\Traits\Form_Error;
class AddressBook{
use Form_Error;
    public function plugin_page(){
      $action=isset($_GET['action'])?$_GET['action']:'list';
//        if(isset($_GET['id'])){
//            if(!isset($_GET['weDevs_edit_nonce'])|| !wp_verify_nonce($_GET['weDevs_edit_nonce'],"weDevs_edit")){
//                wp_die("sorry you are not authorizid");
//            }
//        }
       $id=isset($_GET['id'])?intval($_GET['id']):0;

       switch ($action){
           case 'new':
               $template=__DIR__.'/views/address-new.php';
               break;
           case 'edit':
               $singleAddress=wedevs_get_single_address($id);
               $template=__DIR__.'/views/address-edit.php';
               break;
           case 'view':
               $template=__DIR__.'/views/address-view.php';
               break;
           default:
               $template=__DIR__.'/views/address-list.php';
               break;
       }
       if(file_exists($template)){
           include $template;
       }
    }
    /*
     * from handle
     */
    public function from_handler(){
        if(!isset($_POST["submit_address"])){
            return;
        }
        if(!wp_verify_nonce($_POST["_wpnonce"],"new-address")){
            wp_die("Are You cheating?");
        }
       if(!current_user_can("manage_options")){
           wp_die("Are You cheating?");
       }

       $id=isset($_POST["id"])?intval($_POST['id']):0;
       $name=isset($_POST["name"])?sanitize_text_field($_POST["name"]):'';
       $address=isset($_POST["address"])?sanitize_textarea_field($_POST["address"]):'';
       $phone=isset($_POST["phone"])?sanitize_text_field($_POST["phone"]):'';
       if(empty($name)){
           $this->error['name']=__("please provide a name","weDevs");
       }
        if(empty($phone) || ! is_numeric($phone)){
            $this->error['phone']=__("please provide a  unice phone","weDevs");
        }
        if(!empty($this->error)){
            return;
        }

        $argument=[
            'name' => $name,
            'address' => $address,
            'phone' => $phone
        ];

       if($id){
        $argument['id']=$id;
        }
        $insert_id=weDevs_insert_address($argument);

        if(is_wp_error($insert_id)) {
            wp_die($insert_id->get_error_message());
        }

            if($id){
                $redirect_to=admin_url("admin.php?page=weDevsAcademy&address-update=true&id=".$id);
            }else {
                $redirect_to = admin_url("admin.php?page=weDevsAcademy&inserted=true");
            }
        wp_redirect($redirect_to);
       exit;
    }

    /**
     * for delete in the List
     */

    public function delete_address(){
        if(!wp_verify_nonce($_REQUEST["_wpnonce"],"wedevs_delete_address_n")){
            wp_die("Are You cheating?");
        }
        if(!current_user_can("manage_options")){
            wp_die("Are You cheating?");
        }
        $id=isset($_REQUEST["id"])?intval($_REQUEST['id']):0;

        if(wedevs_delete_single_address($id)){
            $redirect_to=admin_url("admin.php?page=weDevsAcademy&address_delete=true");
        }else{
            $redirect_to=admin_url("admin.php?page=weDevsAcademy&address_delete=false");
        }
        wp_redirect($redirect_to);
        exit;
    }






}