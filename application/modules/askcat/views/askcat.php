<?php
// echo '<pre>';print_r($list_cats);echo '</pre>';
?>
<div class="heading">
	<div class="container">
		<br><br><br>
		<div class="row col-md-10 col-md-offset-1">
			<!-- <h2>Quản lý danh mục các ASK</h2> -->
			<h2><?php echo lang('askcat_title'); ?></h2>
		</div>
	</div>
</div>
<hr>
<div class="container">
	<div class="row">
		<div class="col-md-3">
			<h5>Tên danh mục ASK</h5>
			<form>
				<input type="text" class="form-control" name="ask_cat_name" placeholder="Tên danh mục ASK">
			</form>
		</div>
		<div class="col-md-3">
			<h5>Mô tả</h5>
			<form>
				<textarea class="form-control" rows="2" name="description" placeholder="Mô tả danh mục ASK"></textarea>
			</form>
		</div>
		<div class="col-md-3">
			<h5>Danh mục ASK cha</h5>
			<select class="form-control" name="ask_cat_parent">
				<?php
					foreach($list_cats as $cat) {
						echo '<option value="'.$cat['ask_cat_id'].'">'.$cat['ask_cat_name'].'</option>';
					}
				?>
			</select>
		</div>
		<div class="col-md-3">
			<br>
			<input type="submit" value="Thêm danh mục ASK" class="btn btn-primary btn-block">
		</div>
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
				<th>Tên danh mục ASK</th>
				<th>Mô tả danh mục ASK</th>
				<th>Danh mục cha</th>
				<th>Tổng số ASK</th>
			</thead>
			<?php
				foreach($list_cats as $cat) {
					echo '<tr>'
						.'<td>'.$cat['ask_cat_id'].'</td>'
						.'<td>'.$cat['ask_cat_name'].'</td>'
						.'<td>'.$cat['description'].'</td>'
						.'<td>'.$cat['ask_cat_parent'].'</td>'
						.'<td>'.$cat['ask_cat_parent'].'</td>'
					.'</tr>';
				}
			?>
		</table>
	</div>
</div>