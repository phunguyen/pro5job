<?php
// echo '<pre>';print_r($list_cats);echo '</pre>';
?>
<div class="heading">
	<div class="container">
		<div class="row col-md-10 col-md-offset-1">
			<!-- <h2>Quản lý danh mục các ASK</h2> -->
			<h2><?php echo lang('lbl_manage_askcats'); ?></h2>
		</div>
	</div>
</div>
<hr>
<div class="container">
	<div class="row">
		<?php echo form_open("askcat/create");?>
		<div class="col-md-2">
			<h5><?php echo lang('lbl_askcat_name'); ?></h5>
			<input type="text" class="form-control" name="ask_cat_name" placeholder="<?php echo lang('lbl_askcat_name'); ?>">
		</div>
		<div class="col-md-2">
			<h5><?php echo lang('lbl_description'); ?></h5>
			<textarea class="form-control" rows="2" name="description" placeholder="<?php echo lang('lbl_description'); ?>"></textarea>
		</div>
		<div class="col-md-2">
			<h5><?php echo lang('lbl_askcat_name_en'); ?></h5>
			<input type="text" class="form-control" name="ask_cat_name_en" placeholder="<?php echo lang('lbl_askcat_name_en'); ?>">
		</div>
		<div class="col-md-2">
			<h5><?php echo lang('lbl_description_en'); ?></h5>
			<textarea class="form-control" rows="2" name="description_en" placeholder="<?php echo lang('lbl_description_en'); ?>"></textarea>
		</div>
		<div class="col-md-2">
			<h5><?php echo lang('lbl_parent_cats'); ?></h5>
			<select class="form-control" name="ask_cat_parent">
				<option value="0"></option>
				<?php
					foreach($list_cats as $cat) {
						echo '<option value="'.$cat['ask_cat_id'].'">'.$cat['ask_cat_name'].'</option>';
					}
				?>
			</select>
		</div>
		<div class="col-md-2">
			<br>
			<input type="submit" value="<?php echo lang('lbl_add_askcat'); ?>" class="btn btn-primary btn-block">
		</div>
		</form>
	</div>
	<hr>
	<div class="row">
		<div class="col-md-2">
			<select name="action" class="form-control" id="bulk-action-selector-top">
				<option value="-1" selected="selected"><?php echo lang('lbl_action'); ?></option>
				<option value="delete">Xóa</option>
			</select>
		</div>
		<div class="col-md-2">
			<input type="submit" id="doaction" class="btn btn-primary btn-block" value="Áp dụng">
		</div>

	</div>
	<br>
	<div class="row">
		<table class="table table-condensed table-bordered">
			<thead>
				<th><input type="checkbox"></th>
				<th><?php echo lang('lbl_action'); ?></th>
				<th><?php echo lang('lbl_askcat_name'); ?></th>
				<th><?php echo lang('lbl_description'); ?></th>
				<th><?php echo lang('lbl_askcat_name_en'); ?></th>
				<th><?php echo lang('lbl_description_en'); ?></th>
				<th><?php echo lang('lbl_parent_cats'); ?></th>
				<th><?php echo lang('lbl_count_asks'); ?></th>
			</thead>
			<?php
				foreach($list_cats as $cat) {
					echo '<tr>'
						.'<td><input type="checkbox"></td>'
						.'<td>'.anchor('askcat/edit/'.$cat['ask_cat_id'], lang('lbl_edit')).' | <a href="javascript: void(0);" onclick="confirmDelete(\''.base_url().'askcat/delete/'.$cat['ask_cat_id'].'\');">'.lang('lbl_delete').'</a> | '.anchor('askcat/approve/'.$cat['ask_cat_id'], lang('lbl_approve')).'</td>'
						.'<td>'.$cat['ask_cat_name'].'</td>'
						.'<td>'.$cat['description'].'</td>'
						.'<td>'.$cat['ask_cat_name_en'].'</td>'
						.'<td>'.$cat['description_en'].'</td>'
						.'<td>'.$cat['parent_cat'].'</td>'
						.'<td>'.$cat['count_asks'].'</td>'
					.'</tr>';
				}
			?>
		</table>
	</div>
</div>