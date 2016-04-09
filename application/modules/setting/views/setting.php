<?php echo form_open("setting/create");?>
<div class="heading">
	<div class="container">
		<hr>
		<div class="row">
			<div class="col-md-3">
				<select class="form-control" id="sub_value" name="sub_value">
					<option value="location">Địa điểm</option>
					<option value="experience">Năm kinh nghiệm</option>
					<option value="graduation">Bằng cấp</option>
					<option value="salary">Mức lương</option>
				</select>
			</div>
			<div class="col-md-9">
			</div>
		</div>
	</div>
</div>
<hr>
<div class="container">
	<div class="row">
		<div class="col-md-12 sub_value_list" id="location_list">
			<h3 style="text-align: left">Địa điểm</h3>
			<hr>
			<div class="row">
					<div class="col-md-8">
						<input type="text" class="form-control name" name="location_name" placeholder="Địa điểm làm việc" value="">
					</div>
					<div class="col-md-4">
						<input type="submit" value="Thêm" class="btn btn-primary btn-block btn-add">
						<input type="button" value="Sửa" class="btn btn-primary btn-block btn-edit" style="display: none;">
					</div>
			</div>
			<hr>
				<table class="table table-condensed table-bordered">
				<thead>
					<tr>
						<th>Tác vụ</th>
						<th>Địa điểm</th>
					</tr>
				</thead>
				<tbody>
					<?php
						foreach($locations as $loc) {
							echo '<tr>
									<td data-id="'.$loc['id'].'"><a href="#" class="edit-value">Sửa </a>| <a href="#" class="delete-value">Xóa</a></td>
									<td>'.$loc['name'].'</td>
								</tr>';
						}
					?>
				</tbody>
			</table>
			<hr>
		</div>
		<div class="col-md-12 sub_value_list" id="experience_list" style="display: none;">
			<h3>Năm kinh nghiệm</h3>
			<hr>
				<div class="row">
					<div class="col-md-8">
						<input type="text" class="form-control" name="experience_name" placeholder="Năm kinh nghiệm">
					</div>
					<div class="col-md-4">
						<input type="submit" value="Thêm" class="btn btn-primary btn-block">
					</div>
				</div>
			<hr>
			<table class="table table-condensed table-bordered">
				<thead>
					<tr>
						<th>Tác vụ</th>
						<th>Số năm kinh nghiệm</th>
					</tr>
				</thead>
				<tbody>
					<?php
						foreach($experiences as $exp) {
							echo '<tr>
									<td><a href="#">Sửa </a>| <a href="#">Xóa</a></td>
									<td>'.$exp['name'].'</td>
								</tr>';
						}
					?>
				</tbody>
			</table>
			<hr>
		</div>
		<div class="col-md-12 sub_value_list" id="graduation_list" style="display: none;">
			<h3>Bằng cấp</h3>
			<hr>
				<div class="row">
					<div class="col-md-8">
						<input type="text" class="form-control" name="graduation_name" placeholder="Bằng cấp">
					</div>
					<div class="col-md-4">
						<input type="submit" value="Thêm" class="btn btn-primary btn-block">
					</div>
				</div>
			<hr>
			<table class="table table-condensed table-bordered">
				<thead>
					<tr>
						<th>Tác vụ</th>
						<th>Bằng cấp</th>
					</tr>
				</thead>
				<tbody>
					<?php
						foreach($graduations as $gra) {
							echo '<tr>
									<td><a href="#">Sửa </a>| <a href="#">Xóa</a></td>
									<td>'.$gra['name'].'</td>
								</tr>';
						}
					?>
				</tbody>
			</table>
			<hr>
		</div>
		<div class="col-md-12 sub_value_list" id="salary_list" style="display: none;">
			<h3>Mức lương</h3>
			<hr>
				<div class="row">
					<div class="col-md-8">
						<input type="text" class="form-control" name="salary_name" placeholder="Mức lương">
					</div>
					<div class="col-md-4">
						<input type="submit" value="Thêm" class="btn btn-primary btn-block">
					</div>
				</div>
			<hr>
			<table class="table table-condensed table-bordered">
				<thead>
					<tr>
						<th>Tác vụ</th>
						<th>Mức lương</th>
					</tr>
				</thead>
				<tbody>
					<?php
						foreach($salaries as $sal) {
							echo '<tr>
									<td><a href="#">Sửa </a>| <a href="#">Xóa</a></td>
									<td>'.$sal['name'].'</td>
								</tr>';
						}
					?>
				</tbody>
			</table>
			<hr>
		</div>
	</div>
</div>
</form>
<script>
$(function() {
	setting_registerEvents();
});
</script>