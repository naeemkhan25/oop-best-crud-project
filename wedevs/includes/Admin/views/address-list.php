   <div class="wrap">
    <h1 class="wp-heading-inline"><?php _e("Address Book",'weDevs');?></h1>
    <a  class='page-title-action' href="<?php echo admin_url('admin.php?page=weDevsAcademy&action=new') ?>"><?php _e("Add New",'weDevs');?></a>
       <?php
       if(isset($_GET['address-update'])){
           ?>
            <div class="notice notice-success">
                <p>
                    <?php _e("Address has been Updated successfully!","weDevs");?>
                </p>
            </div>
       <?php
       }elseif(isset($_GET['inserted'])){
           ?>
           <div class="notice notice-success">
               <p>
                   <?php _e("Address has been Inserted successfully!","weDevs");?>
               </p>
           </div>
           <?php
       }
        elseif(isset($_GET['address_delete'])){
           ?>
       <div class="notice notice-warning">
           <p>
               <?php _e("Address has been delete successfully!","weDevs");?>
           </p>
       </div>
       <?php
       }
       ?>

   </div>
    <div class="container bag" >
        <div class="row">
            <div class="col-md-10">
                <table class="table">
                          <form method="GET" action="">
                        <?php
                        $AddressList=new wedevs\Admin\AddressList();
                        $AddressList->prepare_items();
                        $AddressList->search_box("search","search_id");
                        $AddressList->display();
                        ?>
                        <input type="hidden" name="page" value="<?php echo $_REQUEST['page'];?>">

                    </form>

                    <?php



                    ?>
                </table>
            </div>
        </div>
    </div>


