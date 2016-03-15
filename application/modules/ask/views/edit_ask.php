<?php
// echo '<pre>';print_r($ask);echo '</pre>';
?>
<div class="container">
	<h1><?php echo lang('edit_group_heading');?></h1>
	<p><?php echo lang('edit_group_subheading');?></p>

	<?php if($message != '') { ?>
	<div class="alert alert-success" role="alert" id="infoMessage"><?php echo $message;?></div>
	<?php } ?>

	<?php echo form_open(current_url());?>
		<div class="form-group">
            <label><?php echo lang('lbl_ask_name'); ?></label>
            <input class="form-control" name="ask_name" value="<?php echo $ask['ask_name']; ?>">
	    </div>
	    <div class="form-group">
            <label><?php echo lang('lbl_description'); ?></label>
            <textarea class="form-control" name="ask_description"><?php echo $ask['description']; ?></textarea>
	    </div>
		<div class="form-group">
            <label><?php echo lang('lbl_ask_name_en'); ?></label>
            <input class="form-control" name="ask_name_en" value="<?php echo $ask['ask_name_en']; ?>">
	    </div>
	    <div class="form-group">
            <label><?php echo lang('lbl_description_en'); ?></label>
            <textarea class="form-control" name="ask_description_en"><?php echo $ask['description_en']; ?></textarea>
	    </div>
	    <div class="form-group">
            <label><?php echo lang('lbl_parent_cats'); ?></label>
            <select class="form-control" name="cat_parent">
            	<?php
            		foreach($list_cats as $cat) {
            			echo '<option value="'.$cat['ask_cat_id'].'"';
            			if($ask['ask_cat_id'] == $cat['ask_cat_id']) echo ' selected';
            			echo '>'.$cat['ask_cat_name'].'</option>';
            		}
            	?>
            </select>
	    </div>
        <?php echo form_submit('submit', lang('lbl_edit_ask'), 'class="btn btn-primary"');?>
	<?php echo form_close();?>
</div>