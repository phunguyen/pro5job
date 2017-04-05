<div class="heading">
	<div class="container">
		<hr>
		<div class="row">
			<div class="col-md-4">
			<h4>Chọn Job để quản lý Profile</h4>
			</div>
			<div class="col-md-8">
				<select class="form-control" id="jobs">
					<?php
						foreach($list_jobs as $job) {
							echo '<option value="'.$job['job_id'].'">'.$job['job_name'].'</option>';
						}
					?>
				</select>
			</div>

		</div>
		<hr>
		<div class="row">
			<div class="col">
			<h2>Quản lý Profiles phù hợp với Job đã chọn</h2>
			<hr>
			<h4>Cột 1 hiển thị các Profile đã chọn, Cột 2 hiển thị các Profile quan tâm Job này</h4>
			<h4>Click vào Checkbox ở đầu tên Profile để chọn 1 danh sách mà bạn muốn liên hệ hoặc in hồ sơ</h4>
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
						Profiles đã lọc
					</h3>
					<hr>
						<ul>
							<li>
								<h5>
									<input type="checkbox"> |
									<a title="Nguyễn Văn A" data-toggle="popover" data-placement="bottom" data-content="Đây là nội dung mô tả chi tiết về Nguyễn Văn A">Nguyễn Văn A</a>
								</h5>
							</li>
							<li>
								<h5>
									<input type="checkbox"> |
									<a title="Trần Văn B" data-toggle="popover" data-placement="bottom" data-content="Đây là nội dung mô tả chi tiết về Trần Văn B">Trần Văn B</a>
								</h5>
							</li>
						</ul>
					<hr>


			</div>
		</div>
		<div class="col-md-4">

			<div>
					<h3 style="text-align: left">Profiles quan tâm Job này</h3>
					<hr>

						<ul>

							<li>
								<h5>
								<input type="checkbox"> |
									<a title="Nguyễn Văn A" data-toggle="popover"
									data-placement="bottom" data-content="Đây là nội dung mô tả chi tiết về Nguyễn Văn A">Nguyễn Văn A </a>
								</h5>

							</li>

						</ul>



			</div>
			<hr>
		</div>
		<div class="col-md-4">
		<h3 style="text-align: left">Tác vụ</h3>
					<hr>
					<h5>Với danh sách Profiles đã chọn ở bên, ta thực hiện các tác vụ</h5>

					<input type="submit" value="Tạo danh sách Email liên hệ" class="btn btn-primary btn-block">
					<br>
			<form>
				<input type="submit" value="Xuất các Profiles ra file Word" class="btn btn-primary btn-block">
			</form>
		</div>
	</div>
</div>
<div id="modalViewJob" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <!-- CONTENT -->
</div>
<script type="text/javascript">
	$(function() {
		loadManageProfiles();
	});
</script>