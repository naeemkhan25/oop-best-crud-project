<?php
namespace wedevs\Admin;
/*
 * the Address List handler
 *
 */
if(!class_exists("WP_List_Table")){
    require_once ("ABSPATH"."wp-admin/includes/class-wp-list-table.php");
}

class AddressList extends \WP_List_Table{

    public function __construct()
    {
        parent::__construct([
                'singular'=>'contact',
                'plural'=>'contacts',
                'ajax'=>false,
     ]);


    }
    public function get_columns()
    {
    return [
        'cb'=>'<input type="checkbox">',
        'name'=>__("Name","weDevs"),
        'address'=>__("address","weDevs"),
        'phone'=>__("Phone","weDevs"),
        'created_at'=>__("Date","weDevs"),
    ];
    }
    function column_cb($item)
    {
        return "<input type='checkbox' value='{$item->id}'>";
    }
    public function extra_tablenav($which)
    {
        if('top'==$which):

            ?>
            <div class="actions alignleft">
                <select name="felter_s" id="filter_s">
                    <option value="all">All</option>
                    <option value="F">Females</option>
                    <option value="M">Male</option>
                </select>
                <?php
                submit_button(__("Filter","weDevs"),"button","submit",false);
                ?>

            </div>

        <?php
        endif;

    }

    public function column_name($item){
        //nonce very importent

//        $nonce=wp_create_nonce("weDevs_edit");
        $actions=[
            'edit'=>sprintf('<a href="?page=weDevsAcademy&action=edit&id=%s">%s</a>',$item->id,__("Edit","weDevs")),
            'delete'=>sprintf('<a href="%s" class="submitdelete" onclick="return confirm(\'Are you sure\');" title="%s">%s</a>',wp_nonce_url(admin_url('admin-post.php?action=wedevs_delete_address&id='.$item->id),'wedevs_delete_address_n'),__("Delete","weDevs"),__("Delete","weDevs")),

        ];
        return sprintf('<a href="%1$s"><strong>%2$s</strong></a>%3$s',admin_url('admin.php?page=weDevsAcademy&action=view&id='.$item->id),$item->name,$this->row_actions($actions));
    }

    public function get_sortable_columns()
    {
        return [
            'name'=>[
                'name',true
            ],
            'created_at'=>[
                'created_at',true
            ]
        ];
    }
    protected function column_default($item, $column_name)
    {
        switch($column_name){
            case 'value':
                break;
            default:
                return isset($item->$column_name)?$item->$column_name:'';
        }

    }
//    public function column_action($item){
//
//        $link=wp_nonce_url(admin_url("admin.php?page=weDevsAcademy&action=edit&id=".$item->id),"weDevs_edit","weDevs_edit_nonce");
//        $deleteId=wp_nonce_url(admin_url("admin.php?page=weDevsAcademy&id=".$item->id),"weDevs_edit","weDevs_delete_nonce");
//        return '<a href="'.esc_url($link).'">Edit</a>'.'<a href="'.esc_url($deleteId).'"> delete</a>';
//    }

    public function prepare_items()
    {
        $this->_column_headers=array($this->get_columns(),[],$this->get_sortable_columns());
        $per_page=3;
        $current_paged=$this->get_pagenum();
        $offset=($current_paged-1)*$per_page;
        $args=[
            'number'=>$per_page,
            'offset'=>$offset
        ];

        if(isset($_REQUEST['orderby'])&&isset($_REQUEST['order']))
        {

            $args['order']=$_REQUEST['order'];
            $args['orderby']=$_REQUEST['orderby'];
        }



        $this->items=wedevs_get_address($args);
        $this->set_pagination_args([
                'total_items'=>weDevs_count_address(),
                "per_page"=>$per_page,

            ]

        );





    }

}