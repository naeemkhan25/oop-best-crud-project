<div class="wedevs-enquire-form" id="wedevs-enquire-form">
    <form action="" method="post">
        <div class="form-row">
            <label for="name"><?php _e("Name","weDevs");?></label>
            <input type="text" name="name" id='name' value="" required>
        </div>
        <div class="form-row">
            <label for="email"><?php _e("E-mail","weDevs");?></label>
            <input type="text" name="email" id='email' value="" required>
        </div>
        <div class="form-row">
            <label for="message"><?php _e("Message","weDevs");?></label>
            <textarea  name="message" id='message' required></textarea>
        </div>
        <div class="form-row">
            <?php
            wp_nonce_field('wd_weDevs_equire');
            ?>
            <input type="hidden" name="action" value="wd_weDevs_equire">
            <input type="submit" name="Send_Enquire" value="<?php esc_attr_e("Send Enquire",'weDevs');?>">
        </div>
    </form>
</div>