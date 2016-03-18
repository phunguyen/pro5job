<div class="heading">
		<div class="container">
			<hr>
			<div class="row">
				<div class="col-md-4">
				<h4>Chọn Job để lọc</h4>
				</div>
				<div class="col-md-8">
				<select class="form-control" id="jobs">
											<option>Trường phòng nhân sự</option>
											<option>Giám đốc kỹ thuật</option>
											<option>Nhân viên kinh doanh</option>
										</select>
				</div>

			</div>
			<hr>
			<div class="row">
				<div class="col">
				<h2>Lọc ra Profiles phù hợp với Job đã chọn</h2>
				<hr>
				<h4>Chọn các tiêu chí trong Bộ lọc Profile ở Cột 1. Các công việc phù hợp hiển thị ở Cột 2</h4>
				<h4>Xem chi tiết từng Công việc ở Cột 2. Chọn Công việc phù hợp nhất. Hiển thị ở Cột 3</h4>
				</div>
			</div>

		</div>
	</div>
	<hr>
	<div class="container">
		<div class="row">
			<div class="col-md-2">

					<div >
						<h3 style="text-align: left">Lọc Profiles</h3>
						<hr>
						<h5 style="text-align: left">Độ phù hợp</h5>

						<form>
							<div class="progress">
								<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
									60%
								</div>
							</div>
							<h5>Địa điểm muốn làm việc</h5>
									<select class="form-control" id="jobkinhnghiem">
										<option>Tỉnh/Thành</option>
										<option>Hà Nội</option>
										<option>Tp HCM</option>
										<option>Đà Nẵng</option>
										<option>An Giang</option>
										<option>Bắc Ninh</option>
									</select>
							<h5>Số năm kinh nghiệm</h5>
									<select class="form-control" id="jobkinhnghiem">
										<option>Không yêu cầu</option>
										<option>1 năm</option>
										<option>2 năm</option>
										<option>3 năm</option>
										<option>4 năm</option>
										<option>5 năm trở lên</option>
									</select>


										<h5>Giới tính</h5>
										<select class="form-control" id="jobkinhnghiem">

											<option>Không yêu cầu</option>
											<option>Nam</option>
											<option>Nữ</option>
										</select>
										<h5>Bằng cấp cao nhất</h5>
										<select class="form-control" id="jobkinhnghiem">
											<option>Không yêu cầu</option>
											<option>Tốt nghiệp THCS</option>
											<option>Tốt nghiệp THPT</option>
											<option>Trung cấp</option>
											<option>Cao đẳng</option>
											<option>Đại học</option>
											<option>Thạc sỹ</option>
											<option>Tiến sỹ</option>
										</select>
										<h5>Mức lương yêu cầu</h5>
										<select class="form-control" id="jobkinhnghiem">
											<option>Thỏa thuận</option>
											<option>1-3 triệu</option>
											<option>3-5 triệu</option>
											<option>5-8 triệu</option>
											<option>8-12 triệu</option>
											<option>12-17 triệu</option>
											<option>17-25 triệu</option>
											<option>Trên 25 triệu</option>
										</select>
						</form>
					</div>
				<hr>

			</div>
			<div class="col-md-4">
				<div>
						<h3>
							Profiles phù hợp đã lọc
						</h3>
						<hr>
							<ul>
								<li>
									<h5>
										<a title="Nguyễn Văn A" data-toggle="popover" data-placement="bottom" data-content="Đây là nội dung mô tả chi tiết về Nguyễn Văn A">Nguyễn Văn A</a> | <c>Chọn</c>
									</h5>
								</li>
								<li>
									<h5>
										<a title="Trần Văn B" data-toggle="popover" data-placement="bottom" data-content="Đây là nội dung mô tả chi tiết về Trần Văn B">Trần Văn B</a> | <c>Chọn</c>
									</h5>
								</li>
							</ul>
						<hr>


				</div>
			</div>
			<div class="col-md-3">

				<div>
						<h3 style="text-align: left">Profiles đã chọn</h3>
						<hr>

							<ul>

								<li>
									<h5>
									<c>X</c> |
										<a title="Nguyễn Văn A" data-toggle="popover"
										data-placement="bottom" data-content="Đây là nội dung mô tả chi tiết về Nguyễn Văn A">Nguyễn Văn A </a>
									</h5>

								</li>

							</ul>



				</div>
				<hr>
			</div>
			<div class="col-md-3">
			<h3 style="text-align: left">Tác vụ</h3>
						<hr>
						<h5>Gửi thông báo về các Ứng viên mới phù hợp Bộ lọc này vào email của tôi</h5>
					<form>
						<div class="radio">
							<label>
								<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
								Thông báo hàng ngày
							</label>
						</div>
						<div class="radio">
						  <label>
							<input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
							Thông báo hàng tuần
						  </label>
						</div>
						<div class="radio disabled">
						  <label>
							<input type="radio" name="optionsRadios" id="optionsRadios3" value="option3">
							Thông báo hàng tháng
						  </label>
						</div>
						<div class="radio disabled">
						  <label>
							<input type="radio" name="optionsRadios" id="optionsRadios4" value="option4">
							Không thông báo
						  </label>
						</div>

					</form>
						<input type="submit" value="Lưu bộ lọc" class="btn btn-primary btn-block">
						<br>
				<form>
					<input type="submit" value="Gửi thư Các ứng viên" class="btn btn-primary btn-block">
				</form>
			</div>
		</div>
	</div>