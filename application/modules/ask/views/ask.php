<div class="heading">
	<div class="container">
		<div class="row col-md-10 col-md-offset-1">
			<h2><?php echo lang('lbl_manage_asks'); ?></h2>
		</div>
	</div>
</div>
<hr>
<div class="container">
	<div class="row">
		<?php echo form_open("ask/create");?>
		<div class="col-md-2">
			<h5><?php echo lang('lbl_ask_name'); ?></h5>
			<input type="text" class="form-control" name="ask_name" placeholder="<?php echo lang('lbl_ask_name'); ?>">
		</div>
		<div class="col-md-2">
			<h5><?php echo lang('lbl_description'); ?></h5>
			<textarea class="form-control" rows="2" name="ask_description" placeholder="<?php echo lang('lbl_description'); ?>"></textarea>
		</div>
		<div class="col-md-2">
			<h5><?php echo lang('lbl_ask_name_en'); ?></h5>
			<input type="text" class="form-control" name="ask_name_en" placeholder="<?php echo lang('lbl_ask_name_en'); ?>">
		</div>
		<div class="col-md-2">
			<h5><?php echo lang('lbl_description_en'); ?></h5>
			<textarea class="form-control" rows="2" name="ask_description_en" placeholder="<?php echo lang('lbl_description_en'); ?>"></textarea>
		</div>
		<div class="col-md-2">
			<h5><?php echo lang('lbl_parent_cats'); ?></h5>
			<select class="form-control" name="cat_parent">
				<?php
					foreach($list_cats as $cat) {
						echo '<option value="'.$cat['ask_cat_id'].'">'.$cat['ask_cat_name'].'</option>';
					}
				?>
			</select>
		</div>
		<div class="col-md-2">
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
				<option value="delete"><?php echo lang('lbl_approve'); ?></option>
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
				<th><input type="checkbox"></th>
				<th><?php echo lang('lbl_action'); ?></th>
				<th><?php echo lang('lbl_ask_name'); ?></th>
				<th><?php echo lang('lbl_description'); ?></th>
				<th><?php echo lang('lbl_ask_name_en'); ?></th>
				<th><?php echo lang('lbl_description_en'); ?></th>
				<th><?php echo lang('lbl_parent_cats'); ?></th>
			</thead>
			<?php
				foreach($list_asks as $ask) {
					echo '<tr>'
						.'<td><input type="checkbox"></td>'
						.'<td>'.anchor('ask/edit/'.$ask['ask_id'], lang('lbl_edit')).' | <a href="javascript: void(0);" onclick="confirmDelete(\''.base_url().'ask/delete/'.$ask['ask_id'].'\');">'.lang('lbl_delete').'</a> | '.anchor('ask/delete/'.$ask['ask_id'], lang('lbl_approve')).'</td>'
						.'<td>'.$ask['ask_name'].'</td>'
						.'<td>'.$ask['description'].'</td>'
						.'<td>'.$ask['ask_name_en'].'</td>'
						.'<td>'.$ask['description_en'].'</td>'
						.'<td>'.$ask['ask_cat_name'].'</td>'
					.'</tr>';
				}
			?>
		</table>
		<nav>
			<ul class="pagination">
			    <li class="disabled">
			        <a href="#" aria-label="Previous">
			            <span aria-hidden="true">&laquo;</span>
			        </a>
			    </li>
			    <li class="active"><a href="#">1</a></li>
			    <li><a href="#">2</a></li>
			    <li><a href="#">3</a></li>
			    <li><a href="#">4</a></li>
			    <li><a href="#">5</a></li>
			    <li>
			        <a href="#" aria-label="Next">
			            <span aria-hidden="true">&raquo;</span>
			        </a>
			    </li>
			</ul>
		</nav>
	</div>
</div>