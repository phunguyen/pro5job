<div class="heading">
		<div class="container">
			<hr>
			<div class="row">
				<div class="col-md-3">
				<h4>Danh sách Jobs</h4>
				</div>
				<div class="col-md-6">
				<select class="form-control" id="profiles">
											<option>Giám đốc điều hành</option>
											<option>Nhân viên kinhd doanh</option>
											<option>Trưởng phòng nhân sự</option>
										</select>
				</div>
				<div class="col-md-3">
				<input type="submit" value="Sửa Job" class="btn btn-primary"> &nbsp;&nbsp;
						<input type="submit" value="Tạo mới Job" class="btn btn-success">
				</div>
			</div>
			<div class="row">
			<div class="col">
				<h2>Tạo/Sửa Job</h2>
				<hr>
				<h4>Hãy chọn các Thái độ, Kỹ Năng, Kiến thức mà Công việc cần ở ứng viên</h4>
				<h4>Càng cụ thể, chi tiết, sát với nhu cầu thực tế sẽ dễ lọc ra ứng viên phù hợp hơn</h4>
				<h4>Nếu trong thư viên hệ thống không có, Bạn có thể bổ sung thêm với chức năng Thêm ASK ở dưới</h4>
			</div>
			</div>

		</div>
	</div>
	<hr>
	<div class="container">
		<div class="row">
			<div class="col-md-2">

					<div >
						<h3>Danh mục ASK</h3>
						<hr>
						<h4 style="text-align: left">Thái độ</h4>
							<h5 style="text-align: left">Với Công việc</h5>
							<h5 style="text-align: left">Với Đồng nghiệp</h5>
							<h5 style="text-align: left">Với Đối tác</h5>
							<h5 style="text-align: left">Với Cộng đồng</h5>
					</div>
					<div >
						<h4 style="text-align: left">Kỹ năng</h4>

							<h5 class="active">Kỹ năng mềm</h5>
								<ul class="nav">
									<li>Thuyết trình</li>
									<li>Giao tiếp</li>
									<li>Đàm phán</li>
								</ul>
							<h5 style="text-align: left">Kỹ năng nghề</h5>
								<ul class="nav">
									<li>Lập trình</li>
									<li>Dạy học</li>
									<li>Thiết kế</li>
								</ul>
							<h5 style="text-align: left">Bán hàng</h5>
							<h5 style="text-align: left">Nông nghiệp</h5>
					</div>
					<div>
						<h4 style="text-align: left">Kiến thức</h4>

					</div>


			</div>
			<div class="col-md-3">
				<div>
						<h3>
							ASK trong Danh mục
						</h3>
						<hr>
						<h4>
							Kỹ năng nghề | Lập trình
						</h4>
						<hr>
							<ul>
								<li>
								<h5>
									<c>Bắt buộc</c> |
									<font color="#ffd700">
												<span class="glyphicon glyphicon-star-empty"></span>
												<span class="glyphicon glyphicon-star-empty"></span>
												<span class="glyphicon glyphicon-star-empty"></span>
												<span class="glyphicon glyphicon-star-empty"></span>
												<span class="glyphicon glyphicon-star-empty"></span></font> |
									<a title="Kỹ năng lập trình Web PHP" data-toggle="popover" data-placement="bottom" data-content="Đây là nội dung mô tả, định nghĩa chi tiết về Kỹ năng lập trình PHP">Lập trình PHP</a>
								</h5>
								</li>
								<li>
								<h5>
									Bắt buộc |
									<font color="#ffd700">
												<span class="glyphicon glyphicon-star-empty"></span>
												<span class="glyphicon glyphicon-star-empty"></span>
												<span class="glyphicon glyphicon-star-empty"></span>
												<span class="glyphicon glyphicon-star-empty"></span>
												<span class="glyphicon glyphicon-star-empty"></span></font> |
												<a title="Kỹ năng Cắt PSD thành HTML" data-toggle="popover" data-placement="bottom" data-content="Đây là nội dung mô tả, định nghĩa chi tiết về Kỹ năng Cắt PSD thành HTML">Cắt PSD thành HTML</a>
								</h5>
								</li>
								<li>
								<h5>
									<c>Bắt buộc</c> |
									<font color="#ffd700">
												<span class="glyphicon glyphicon-star-empty"></span>
												<span class="glyphicon glyphicon-star-empty"></span>
												<span class="glyphicon glyphicon-star-empty"></span>
												<span class="glyphicon glyphicon-star-empty"></span>
												<span class="glyphicon glyphicon-star-empty"></span></font> | Thiết kế Web
								</h5>
								</li>
								<li>
								<h5>
									Bắt buộc |
									<font color="#ffd700">
												<span class="glyphicon glyphicon-star-empty"></span>
												<span class="glyphicon glyphicon-star-empty"></span>
												<span class="glyphicon glyphicon-star-empty"></span>
												<span class="glyphicon glyphicon-star-empty"></span>
												<span class="glyphicon glyphicon-star-empty"></span></font> | Lập trình ASP.net
								</h5>
								</li>
							</ul>
						<hr>
						<div class="panel panel-default">
							<div class="panel-heading" role="tab" id="headingOne">
								<h4 class="panel-title">
									<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
									Bổ sung ASK vào danh mục đang chọn
									</a>
								</h4>
							</div>
							<div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
								<div class="panel-body">
									<form>
										<input type="text" class="form-control" id="askname" placeholder="Tên ASK">
										<br>
										<textarea class="form-control" rows="7"  id="askmota"placeholder="Mô tả ASK"></textarea>
										<br>
										<button type="button" class="btn btn-primary">Thêm ASK</button>
									</form>
								</div>
							</div>
						</div>
						<hr>

				</div>
			</div>
			<div class="col-md-4">
				<h3>ASK đã chọn</h3>
				<hr>
				<div>
						<h4 style="text-align: left">Thái độ</h4>
						<h5 style="text-align: left">Với Công việc</h5>
							<ul class="nav">

								<ul>
									<li>
									<h5>
									<a>X</a> |
									<font color="#ffd700">
												<span class="glyphicon glyphicon-star"></span>
												<span class="glyphicon glyphicon-star"></span>
												<span class="glyphicon glyphicon-star"></span>
												<span class="glyphicon glyphicon-star-empty"></span>
												<span class="glyphicon glyphicon-star-empty"></span></font> |
												Nhiệt tình
									</h5>
									</li>
									<li>
									<h5>
									<a>X</a> |
									<font color="#ffd700">
												<span class="glyphicon glyphicon-star"></span>
												<span class="glyphicon glyphicon-star"></span>
												<span class="glyphicon glyphicon-star-empty"></span>
												<span class="glyphicon glyphicon-star-empty"></span>
												<span class="glyphicon glyphicon-star-empty"></span></font> |
												<a title="Chăm chỉ" data-toggle="popover"
												data-placement="bottom" data-content="Đây là nội dung mô tả, định nghĩa chi tiết về Thái độ chăm chỉ">Chăm chỉ</a>
									</h5>
									</li>
								</ul>
				</div>
				<div>
						<h4 style="text-align: left">Kỹ năng</h4>

							<h5 style="text-align: left">Kỹ năng mềm</h5>
							<ul class="nav">
								<li>Giao tiếp
								<ul>
									<li>
									<h5>
									<a>X</a> | <font color="#ff0000">Bắt buộc</font> |
									<font color="#ffd700">
												<span class="glyphicon glyphicon-star"></span>
												<span class="glyphicon glyphicon-star"></span>
												<span class="glyphicon glyphicon-star"></span>
												<span class="glyphicon glyphicon-star-empty"></span>
												<span class="glyphicon glyphicon-star-empty"></span></font> |
												Thuyết phục khách hàng
									</h5>
									</li>
									<li>
									<h5>
									<a>X</a> | <font color="#ff0000">Bắt buộc</font> |
									<font color="#ffd700">
												<span class="glyphicon glyphicon-star"></span>
												<span class="glyphicon glyphicon-star"></span>
												<span class="glyphicon glyphicon-star-empty"></span>
												<span class="glyphicon glyphicon-star-empty"></span>
												<span class="glyphicon glyphicon-star-empty"></span></font> |
												<a title="Kỹ năng bán hàng tại cửa hàng" data-toggle="popover"
												data-placement="bottom" data-content="Đây là nội dung mô tả, định nghĩa chi tiết về Kỹ năng bán hàng tại cửa hàng">Bán hàng cửa hàng </a>
									</h5>
									</li>
								</ul>
								</li>
								<li>Thuyết trình
								<ul>
									<li>
									<h5>
									<a>X</a> | Bắt buộc |
									<font color="#ffd700">
												<span class="glyphicon glyphicon-star"></span>
												<span class="glyphicon glyphicon-star"></span>
												<span class="glyphicon glyphicon-star-empty"></span>
												<span class="glyphicon glyphicon-star-empty"></span>
												<span class="glyphicon glyphicon-star-empty"></span></font> |
												Giới thiệu sản phẩm
									</h5>
									</li>
									<li>
									<h5>
									<a>X</a> | Bắt buộc |
									<font color="#ffd700">
												<span class="glyphicon glyphicon-star"></span>
												<span class="glyphicon glyphicon-star"></span>
												<span class="glyphicon glyphicon-star"></span>
												<span class="glyphicon glyphicon-star-empty"></span>
												<span class="glyphicon glyphicon-star-empty"></span></font> |
												Hướng dẫn sử dụng
									</h5>
									</li>
								</ul>
								</li>
							</ul>
							<h5 style="text-align: left">Kỹ năng nghề</h5>
							<ul class="nav">
								<li>Lập trình
								<ul>
									<li>
									<h5>
									<a>X</a> | <font color="#ff0000">Bắt buộc</font> |
									<font color="#ffd700">
												<span class="glyphicon glyphicon-star"></span>
												<span class="glyphicon glyphicon-star"></span>
												<span class="glyphicon glyphicon-star"></span>
												<span class="glyphicon glyphicon-star-empty"></span>
												<span class="glyphicon glyphicon-star-empty"></span></font> |
												Lập trình PHP
									</h5>
									</li>
									<li>
									<h5>
									<a>X</a> | Bắt buộc |
									<font color="#ffd700">
												<span class="glyphicon glyphicon-star"></span>
												<span class="glyphicon glyphicon-star"></span>
												<span class="glyphicon glyphicon-star-empty"></span>
												<span class="glyphicon glyphicon-star-empty"></span>
												<span class="glyphicon glyphicon-star-empty"></span></font> |
												Cắt PSD thành HTML
									</h5>
									</li>
								</ul>
								</li>
								<li>Thiết kế
								<ul>
									<li>
									<h5>
									<a>X</a> | Bắt buộc |
									<font color="#ffd700">
												<span class="glyphicon glyphicon-star"></span>
												<span class="glyphicon glyphicon-star"></span>
												<span class="glyphicon glyphicon-star-empty"></span>
												<span class="glyphicon glyphicon-star-empty"></span>
												<span class="glyphicon glyphicon-star-empty"></span></font> |
												Thiết kế Web
									</h5>
									</li>
									<li>
									<h5>
									<a>X</a> | Bắt buộc |
									<font color="#ffd700">
												<span class="glyphicon glyphicon-star"></span>
												<span class="glyphicon glyphicon-star"></span>
												<span class="glyphicon glyphicon-star"></span>
												<span class="glyphicon glyphicon-star-empty"></span>
												<span class="glyphicon glyphicon-star-empty"></span></font> |
												Thiết kế Logo
									</h5>
									</li>
								</ul>
								</li>
							</ul>

				</div>
				<div>
						<h4 style="text-align: left">Kiến thức</h4>

				</div>
			</div>
			<div class="col-md-3">
			<h3>Thông tin Job
						</h3>
						<hr>
						<form>
							<button type="button" class="btn btn-primary">Lưu Job</button>
							<button type="button" class="btn btn-success">Xem Job</button>
						</form>
						<br>
				<form>
						<input type="text" class="form-control" id="jobname" placeholder="Tên Công việc">
						<br>
						<textarea class="form-control" rows="4" id="jobcontact" placeholder="Thông tin liên lạc Bộ phận tuyển dụng"></textarea>
						<form>
						<br>
						<div class="panel panel-default">
							<div class="panel-heading" role="tab" id="headingTwo">
								<h4 class="panel-title">
									<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
									Thông tin bổ sung cho Công việc
									</a>
								</h4>
							</div>
							<div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
								<div class="panel-body">
									<form>

									<h4>Địa điểm làm việc</h4>
									<select class="form-control" id="jobkinhnghiem">
										<option>Chọn Tỉnh/Thành</option>
										<option>Hà Nội</option>
										<option>Tp HCM</option>
										<option>Đà Nẵng</option>
										<option>An Giang</option>
										<option>Bắc Ninh</option>
									</select>
										<h4>Số năm kinh nghiệm</h4>
										<select class="form-control" id="jobkinhnghiem">
											<option>Không yêu cầu</option>
											<option>1 năm</option>
											<option>2 năm</option>
											<option>3 năm</option>
											<option>4 năm</option>
											<option>5 năm trở lên</option>
										</select>
										<h4>Yêu cầu giới tính</h4>
										<select class="form-control" id="jobkinhnghiem">
											<option>Không yêu cầu</option>
											<option>Nam</option>
											<option>Nữ</option>
										</select>
										<h4>Bằng cấp tối thiểu</h4>
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
										<h4>Mức lương dự kiến</h4>
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
										<h4>Thời gian đăng tin tuyển dụng</h4>
										<select class="form-control" id="jobkinhnghiem">
											<option>1 tuần</option>
											<option>2 tuần</option>
											<option>1 tháng</option>
											<option>2 tháng</option>
											<option>3 tháng</option>
											<option>Thường xuyên tuyển</option>
										</select>

										<br>
										<textarea class="form-control" rows="7" id="jobmota" placeholder="Mô tả thêm về Công việc"></textarea>
										<br>
										<textarea class="form-control" rows="7" id="jobphucloi" placeholder="Quyền lợi được hưởng"></textarea>
										<br>
										<textarea class="form-control" rows="7" id="jobkhac" placeholder="Thông tin bổ sung khác"></textarea>

									</form>
								</div>
							</div>
						</div>



			</div>
		</div>
	</div>