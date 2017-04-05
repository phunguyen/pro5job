<div class="container">
    <h1><?php echo lang('create_user_heading');?></h1>
    <p><?php echo lang('create_user_subheading');?></p>

    <?php if($message != '') { ?>
    <div class="alert alert-success" role="alert" id="infoMessage"><?php echo $message;?></div>
    <?php } ?>

    <?php echo form_open("auth/create_user");?>
        <div class="form-group">
            <?php echo lang('create_user_fname_label', 'first_name');?>
            <?php echo form_input($first_name, '', 'class="form-control"');?>
        </div>
        <div class="form-group">
            <?php echo lang('create_user_lname_label', 'last_name');?>
            <?php echo form_input($last_name, '', 'class="form-control"');?>
        </div>
        <?php if($identity_column !== 'email') { ?>
        <div class="form-group">
            <?php echo lang('create_user_identity_label', 'identity'); ?>
            <?php echo form_error('identity'); ?>
            <?php echo form_input($identity, '', 'class="form-control"'); ?>
        <?php } ?>
        <div class="form-group">
            <?php echo lang('create_user_company_label', 'company');?>
            <?php echo form_input($company, '', 'class="form-control"');?>
        </div>
        <div class="form-group">
            <?php echo lang('create_user_email_label', 'email');?>
            <?php echo form_input($email, '', 'class="form-control"');?>
        </div>
        <div class="form-group">
            <?php echo lang('create_user_phone_label', 'phone');?>
            <?php echo form_input($phone, '', 'class="form-control"');?>
        </div>
        <div class="form-group">
            <?php echo lang('create_user_password_label', 'password');?>
            <?php echo form_input($password, '', 'class="form-control"');?>
        </div>
        <div class="form-group">
            <?php echo lang('create_user_password_confirm_label', 'password_confirm');?>
            <?php echo form_input($password_confirm, '', 'class="form-control"');?>
        </div>
        <?php echo form_submit('submit', lang('create_user_submit_btn'), 'class="btn btn-primary"');?>
    <?php echo form_close();?>
</div>