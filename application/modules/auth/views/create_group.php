<div class="container">
	<h1><?php echo lang('create_group_heading');?></h1>
	<p><?php echo lang('create_group_subheading');?></p>

	<?php if($message != '') { ?>
	<div class="alert alert-success" role="alert" id="infoMessage"><?php echo $message;?></div>
	<?php } ?>

	<?php echo form_open("auth/create_group");?>
		<div class="form-group">
            <?php echo lang('create_group_name_label', 'group_name');?> <br />
            <?php echo form_input($group_name, '', 'class="form-control"');?>
	    </div>
	    <div class="form-group">
            <?php echo lang('create_group_desc_label', 'description');?> <br />
            <?php echo form_input($description, '', 'class="form-control"');?>
        </div>
        <?php echo form_submit('submit', lang('create_group_submit_btn'), 'class="btn btn-primary"');?>
	<?php echo form_close();?>
</div>