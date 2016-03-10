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
            <input class="form-control" name="ask_description" value="<?php echo $ask['description']; ?>">
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
        <?php echo form_submit('submit', 'Submit', 'class="btn btn-primary"');?>
	<?php echo form_close();?>
</div>