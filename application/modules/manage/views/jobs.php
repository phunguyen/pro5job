<?php
// echo '<pre>';print_r($list_profiles);echo '</pre>';
?>
<div class="heading">
	<div class="container">
		<hr>
		<div class="row">
			<div class="col-md-4">
			<h4>Chọn Profile để quản lý Job</h4>
			</div>
			<div class="col-md-8">
				<select class="form-control" id="profiles">
				<?php
					foreach ($list_profiles as $profile) {
						echo '<option value='.$profile['profile_id'].'>'.$profile['profile_name'].'</option>';
					}
				?>
				</select>
			</div>

		</div>
		<hr>
		<div class="row">
			<div class="col">
			<h2>Quản lý Jobs phù hợp với Profile đã chọn</h2>
			<hr>
			<h4>Cột 1 hiển thị các Job đã chọn, Cột 2 hiển thị các Job quan tâm Profile này</h4>
			<h4>Click vào Checkbox ở đầu tên Job để chọn 1 danh sách Job mà bạn muốn liên hệ hoặc in hồ sơ</h4>

			</div>
		</div>

	</div>
</div>
<hr>
<div class="container">
	<div class="row">

		<div class="col-md-4">
			<div>
					<h3>
						Jobs đã lọc
					</h3>
					<hr>
						<ul id="list_jobs_filtered">
							<!-- <li>
								<h5>
									<input type="checkbox"> |
									<a title="Phó giám đốc kỹ thuật" data-toggle="popover" data-placement="bottom" data-content="Đây là nội dung mô tả chi tiết Công việc Phó giám đốc kỹ thuật">Phó giám đốc kỹ thuật</a>
								</h5>
							</li>
							<li>
								<h5>
									<input type="checkbox"> |
									<a title="Trưởng phòng kinh doanh" data-toggle="popover" data-placement="bottom" data-content="Đây là nội dung mô tả chi tiết Công việc Trưởng phòng kinh doanh">Trưởng phòng kinh doanh</a>
								</h5>
							</li> -->
						</ul>
					<hr>


			</div>
		</div>
		<div class="col-md-4">

			<div>
					<h3 style="text-align: left">Jobs quan tâm Profile này</h3>
					<hr>

						<ul>

							<li>
								<h5>
								<input type="checkbox"> |
									<a title="Phó giám đốc kỹ thuật" data-toggle="popover"
									data-placement="bottom" data-content="Đây là nội dung mô tả chi tiết về Công việc Phó giám đốc kỹ thuật">Phó giám đốc kỹ thuật </a>
								</h5>

							</li>

						</ul>



			</div>
			<hr>
		</div>
		<div class="col-md-4">
		<h3 style="text-align: left">Tác vụ</h3>
			<hr>
			<h5>Với danh sách Job đã chọn ở bên, ta thực hiện các tác vụ</h5>
			<input type="button" value="Tạo danh sách Email liên hệ" class="btn btn-primary btn-block">
			<br>
			<input type="button" value="Xuất Hồ sơ Job ra file Word" class="btn btn-primary btn-block export-word">
		</div>
	</div>
</div>
<script type="text/javascript">
	$(function() {
		loadManageJobs();
	});
</script>