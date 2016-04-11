<?php echo form_open("setting/create");?>
<input type="hidden" id="sub_value_id" value="">
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
					<option value="startdate">Ngày bắt đầu tuyển</option>
					<option value="duration">Thời gian đăng tuyển</option>
					<option value="gender">Giới tính</option>
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
						<input type="button" value="Thêm" class="btn btn-primary btn-block btn-add">
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
						if(isset($locations))
						foreach($locations as $loc) {
							echo '<tr>
									<td data-id="'.$loc['id'].'"><a href="#" class="edit-value">Sửa </a>| <a href="#" class="delete-value">Xóa</a></td>
									<td id="sub_value_'.$loc['id'].'">'.$loc['name'].'</td>
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
						<input type="text" class="form-control name" name="experience_name" placeholder="Năm kinh nghiệm">
					</div>
					<div class="col-md-4">
						<input type="button" value="Thêm" class="btn btn-primary btn-block btn-add">
						<input type="button" value="Sửa" class="btn btn-primary btn-block btn-edit" style="display: none;">
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
						if(isset($experiences))
						foreach($experiences as $exp) {
							echo '<tr>
									<td data-id="'.$exp['id'].'"><a href="#" class="edit-value">Sửa </a>| <a href="#" class="delete-value">Xóa</a></td>
									<td id="sub_value_'.$exp['id'].'">'.$exp['name'].'</td>
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
						<input type="text" class="form-control name" name="graduation_name" placeholder="Bằng cấp">
					</div>
					<div class="col-md-4">
						<input type="button" value="Thêm" class="btn btn-primary btn-block btn-add">
						<input type="button" value="Sửa" class="btn btn-primary btn-block btn-edit" style="display: none;">
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
						if(isset($graduations))
						foreach($graduations as $gra) {
							echo '<tr>
									<td data-id="'.$gra['id'].'"><a href="#" class="edit-value">Sửa </a>| <a href="#" class="delete-value">Xóa</a></td>
									<td id="sub_value_'.$gra['id'].'">'.$gra['name'].'</td>
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
						<input type="text" class="form-control name" name="salary_name" placeholder="Mức lương">
					</div>
					<div class="col-md-4">
						<input type="button" value="Thêm" class="btn btn-primary btn-block btn-add">
						<input type="button" value="Sửa" class="btn btn-primary btn-block btn-edit" style="display: none;">
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
						if(isset($salaries))
						foreach($salaries as $sal) {
							echo '<tr>
									<td data-id="'.$sal['id'].'"><a href="#" class="edit-value">Sửa </a>| <a href="#" class="delete-value">Xóa</a></td>
									<td id="sub_value_'.$sal['id'].'">'.$sal['name'].'</td>
								</tr>';
						}
					?>
				</tbody>
			</table>
			<hr>
		</div>
		<div class="col-md-12 sub_value_list" id="startdate_list" style="display: none;">
			<h3>Ngày bắt đầu tuyển</h3>
			<hr>
				<div class="row">
					<div class="col-md-8">
						<input type="text" class="form-control name" name="startdate_name" placeholder="Ngày bắt đầu tuyển">
					</div>
					<div class="col-md-4">
						<input type="button" value="Thêm" class="btn btn-primary btn-block btn-add">
						<input type="button" value="Sửa" class="btn btn-primary btn-block btn-edit" style="display: none;">
					</div>
				</div>
			<hr>
			<table class="table table-condensed table-bordered">
				<thead>
					<tr>
						<th>Tác vụ</th>
						<th>Ngày bắt đầu tuyển</th>
					</tr>
				</thead>
				<tbody>
					<?php
						if(isset($startdates))
						foreach($startdates as $sd) {
							echo '<tr>
									<td data-id="'.$sd['id'].'"><a href="#" class="edit-value">Sửa </a>| <a href="#" class="delete-value">Xóa</a></td>
									<td id="sub_value_'.$sd['id'].'">'.$sd['name'].'</td>
								</tr>';
						}
					?>
				</tbody>
			</table>
			<hr>
		</div>
		<div class="col-md-12 sub_value_list" id="duration_list" style="display: none;">
			<h3>Thời gian tuyển dụng</h3>
			<hr>
				<div class="row">
					<div class="col-md-8">
						<input type="text" class="form-control name" name="duration_name" placeholder="Thời gian tuyển dụng">
					</div>
					<div class="col-md-4">
						<input type="button" value="Thêm" class="btn btn-primary btn-block btn-add">
						<input type="button" value="Sửa" class="btn btn-primary btn-block btn-edit" style="display: none;">
					</div>
				</div>
			<hr>
			<table class="table table-condensed table-bordered">
				<thead>
					<tr>
						<th>Tác vụ</th>
						<th>Thời gian tuyển dụng</th>
					</tr>
				</thead>
				<tbody>
					<?php
						if(isset($durations))
						foreach($durations as $dur) {
							echo '<tr>
									<td data-id="'.$dur['id'].'"><a href="#" class="edit-value">Sửa </a>| <a href="#" class="delete-value">Xóa</a></td>
									<td id="sub_value_'.$dur['id'].'">'.$dur['name'].'</td>
								</tr>';
						}
					?>
				</tbody>
			</table>
			<hr>
		</div>
		<div class="col-md-12 sub_value_list" id="gender_list" style="display: none;">
			<h3>Giới tính</h3>
			<hr>
				<div class="row">
					<div class="col-md-8">
						<input type="text" class="form-control name" name="duration_name" placeholder="Giới tính">
					</div>
					<div class="col-md-4">
						<input type="button" value="Thêm" class="btn btn-primary btn-block btn-add">
						<input type="button" value="Sửa" class="btn btn-primary btn-block btn-edit" style="display: none;">
					</div>
				</div>
			<hr>
			<table class="table table-condensed table-bordered">
				<thead>
					<tr>
						<th>Tác vụ</th>
						<th>Giới tính</th>
					</tr>
				</thead>
				<tbody>
					<?php
						if(isset($genders))
						foreach($genders as $gen) {
							echo '<tr>
									<td data-id="'.$gen['id'].'"><a href="#" class="edit-value">Sửa </a>| <a href="#" class="delete-value">Xóa</a></td>
									<td id="sub_value_'.$gen['id'].'">'.$gen['name'].'</td>
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