<div class="heading">
	<div class="container">
		<br><br><br>
		<div class="row col-md-10 col-md-offset-1">
			<h2><?php echo lang('lbl_manage_asks'); ?></h2>
		</div>
	</div>
</div>
<hr>
<div class="container">
	<div class="row">
		<?php echo form_open("ask/create");?>
		<div class="col-md-3">
			<h5><?php echo lang('lbl_ask_name'); ?></h5>
			<input type="text" class="form-control" name="ask_name" placeholder="<?php echo lang('lbl_ask_name'); ?>">
		</div>
		<div class="col-md-3">
			<h5><?php echo lang('lbl_description'); ?></h5>
			<textarea class="form-control" rows="2" name="ask_description" placeholder="<?php echo lang('lbl_description'); ?>"></textarea>
		</div>
		<div class="col-md-3">
			<h5><?php echo lang('lbl_parent_cats'); ?></h5>
			<select class="form-control" name="cat_parent">
				<?php
					foreach($list_cats as $cat) {
						echo '<option value="'.$cat['ask_cat_id'].'">'.$cat['ask_cat_name'].'</option>';
					}
				?>
			</select>
		</div>
		<div class="col-md-3">
			<br>
			<input type="submit" value="<?php echo lang('lbl_add_ask'); ?>" class="btn btn-primary btn-block">
		</div>
		</form>
	</div>
	<hr>
	<div class="row">
		<div class="col-md-2">
			<select name="action" class="form-control" id="bulk-action-selector-top">
				<option value="-1" selected="selected"><?php echo lang('lbl_action'); ?></option>
				<option value="delete"><?php echo lang('lbl_delete'); ?></option>
			</select>
		</div>
		<div class="col-md-2">
			<input type="submit" id="doaction" class="btn btn-primary btn-block" value="<?php echo lang('lbl_do_action'); ?>">
		</div>

	</div>
	<br>
	<div class="row">
		<table class="table table-condensed table-bordered">
			<thead>
				<th>#</th>
				<th><?php echo lang('lbl_ask_name'); ?></th>
				<th><?php echo lang('lbl_description'); ?></th>
				<th><?php echo lang('lbl_parent_cats'); ?></th>
				<th>Xác nhận ASK</th>
				<th>Action</th>
			</thead>
			<?php
				foreach($list_asks as $ask) {
					echo '<tr>'
						.'<td>'.$ask['ask_id'].'</td>'
						.'<td>'.$ask['ask_name'].'</td>'
						.'<td>'.$ask['description'].'</td>'
						.'<td>'.$ask['ask_cat_name'].'</td>'
						.'<td>'.$ask['ask_id'].'</td>'
						.'<td>'.anchor('ask/edit/'.$ask['ask_id'], 'Edit').' | '.anchor('ask/delete/'.$ask['ask_id'], 'Delete').'</td>'
					.'</tr>';
				}
			?>
		</table>
	</div>
</div>