<div class="heading">
	<div class="container">
		<br><br><br>
		<div class="row col-md-10 col-md-offset-1">
			<h2>Quản lý các ASK</h2>
		</div>
	</div>
</div>
<hr>
<div class="container">
	<div class="row">
		<?php echo form_open("ask/create");?>
		<div class="col-md-3">
			<h5>Tên ASK</h5>
			<input type="text" class="form-control" name="ask_name" placeholder="Tên ASK">
		</div>
		<div class="col-md-3">
			<h5>Mô tả</h5>
			<textarea class="form-control" rows="2" name="ask_description" placeholder="Mô tả ASK"></textarea>
		</div>
		<div class="col-md-3">
			<h5>Danh mục cha</h5>
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
			<input type="submit" value="Thêm ASK" class="btn btn-primary btn-block">
		</div>
		</form>
	</div>
	<hr>
	<div class="row">
		<div class="col-md-2">
			<select name="action" class="form-control" id="bulk-action-selector-top">
				<option value="-1" selected="selected">Tác vụ</option>
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
				<th>#</th>
				<th>Tên ASK</th>
				<th>Mô tả ASK</th>
				<th>Danh mục cha</th>
				<th>Xác nhận ASK</th>
			</thead>
			<?php
				foreach($list_asks as $ask) {
					echo '<tr>'
						.'<td>'.$ask['ask_id'].'</td>'
						.'<td>'.$ask['ask_name'].'</td>'
						.'<td>'.$ask['description'].'</td>'
						.'<td>'.$ask['ask_cat_name'].'</td>'
						.'<td>'.$ask['ask_id'].'</td>'
					.'</tr>';
				}
			?>
		</table>
	</div>
</div>