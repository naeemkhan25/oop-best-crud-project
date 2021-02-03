<?php
namespace wedevs\Admin;
/**
 * the installer class
 * this function is run when plugin is active
 */
class Installer{

    public function run(){
       $this->add_versions();
       $this->create_table();
    }

    public function add_versions(){
        $installed=get_option("wd_academy_installed");
        if(!$installed){
            $installed=update_option('wd_academy_installed',time());
        }
        update_option("wd_academy_versions",WD_ACADEMY_VERSION);
    }
    public function create_table(){
        global $wpdb;
        $charset_collect=$wpdb->get_charset_collate();
        $sql="CREATE TABLE IF NOT EXISTS {$wpdb->prefix}addresses(id INT(11) NOT NULL AUTO_INCREMENT,
        name VARCHAR(44) NOT NULL,
        address varchar(250) NOT NUll,
        phone varchar(20) NOT NULL,
        created_at datetime not null,
        created_by bigint(20) NOT NULL,PRIMARY KEY (id))$charset_collect";
        if(!function_exists('dbDelta')){
            require_once ABSPATH . 'wp-admin/includes/upgrade.php';
        }
        dbDelta($sql);
    }
}