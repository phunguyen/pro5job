<?php
function buildAskCats($ask_cats) {
	foreach ($ask_cats as $cat) {
		if($cat['ask_cat_parent'] == 0) {
			echo '<div><h4 style="text-align: left">'.$cat['ask_cat_name'].'</h4>';
	        buildChildCats($ask_cats, $cat['ask_cat_id'], 0);
	        echo '</div>';
	    }
	}
}
function buildChildCats($ask_cats, $cat_id, $level) {
	foreach ($ask_cats as $cat) {
		if($cat['ask_cat_parent'] == $cat_id) {
			echo '<h5 style="text-align: left;padding-left: '.(10 * $level).'px;">'.$cat['ask_cat_name'].'</h5>';
	        buildChildCats($ask_cats, $cat['ask_cat_id'], $level + 1);
	    }
	}
}
?>
<div class="heading">
		<div class="container">
			<hr>
			<div class="row">
				<div class="col-md-3">
				<h4>Danh sách Profile</h4>
				</div>
				<div class="col-md-6">
				<select class="form-control" id="profiles">
					<option>Nguyễn Văn A</option>
					<option>Trần Văn B</option>
					<option>Lê Thị C</option>
				</select>
				</div>
				<div class="col-md-3">
				<input type="submit" value="Sửa Profile" class="btn btn-primary"> &nbsp;&nbsp;
						<input type="submit" value="Tạo mới Profile" class="btn btn-success">
				</div>
			</div>
			<hr>
			<div class="row">
			<div class="col">
				<h2>Tạo/Sửa Profile</h2>
				<hr>
				<h4>Hãy chọn các Thái độ, Kỹ Năng, Kiến thức mà bạn có cùng với cấp độ 1-5 sao</h4>
				<h4>Càng cụ thể, chi tiết, sát với thực tế sẽ giúp bạn dễ lọc ra các Job phù hợp</h4>
			</div>
			</div>

		</div>
	</div>
	<hr>
	<div class="container">
		<div class="row">
			<div class="col-md-2">
				<div >
					<h3 style="text-align: left">Danh mục ASK</h3>
					<hr>
				</div>
				<?php buildAskCats($ask_cats); ?>
			</div>
			<div class="col-md-3">
				<div>
						<h3>ASK trong Danh mục:</h3>
						<hr>
						<h4>Kỹ năng nghề | Lập trình</h4>

							<ul>
								<li>
								<h5>

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



				</div>
			</div>
			<div class="col-md-3">
				<div>
					<h3 style="text-align: left">ASK đã chọn</h3>
						<hr>
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
									<a>X</a> |
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
									<a>X</a> |
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
									<a>X</a>
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
									<a>X</a>
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
									<a>X</a>
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
									<a>X</a>
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
									<a>X</a>
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
									<a>X</a>
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
			<div class="col-md-4">

					<h3>Thông tin Profile</h3>

						<hr>
						<input type="submit" value="Lưu Profile" class="btn btn-primary"> &nbsp;&nbsp;
						<input type="submit" value="Xem Profile" class="btn btn-success">
						<br><br>
				<form>
						<input type="text" class="form-control" id="profilename" placeholder="Họ và Tên">
						<br>
						<input type="text" class="form-control" id="profilebirth" placeholder="Ngày tháng năm sinh">

						<br>
										<select class="form-control" id="profilesex">
											<option>Nam</option>
											<option>Nữ</option>
											<option>Khác</option>
										</select>
										<br>
						<textarea class="form-control" rows="4" id="profilecontact" placeholder="Thông tin liên lạc: Số điện thoại, địa chỉ"></textarea>
						<form>
						<br>
						<div class="panel panel-default">
							<div class="panel-heading" role="tab" id="headingTwo">
								<h4 class="panel-title">
									<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
									Thông tin bổ sung cho Profile
									</a>
								</h4>
							</div>
							<div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
								<div class="panel-body">
									<form>

									<h4>Địa điểm làm việc mong muốn</h4>
									<select class="form-control" id="profileplace">
										<option>Chọn Tỉnh/Thành</option>
										<option>Hà Nội</option>
										<option>Tp HCM</option>
										<option>Đà Nẵng</option>
										<option>An Giang</option>
										<option>Bắc Ninh</option>
									</select>
										<h4>Số năm kinh nghiệm bạn có</h4>
										<select class="form-control" id="profilekinhnghiem">
											<option>Không có</option>
											<option>1 năm</option>
											<option>2 năm</option>
											<option>3 năm</option>
											<option>4 năm</option>
											<option>5 năm trở lên</option>
										</select>

										<h4>Bằng cấp cao nhất bạn có</h4>
										<select class="form-control" id="profilegrade">
											<option>Không có</option>
											<option>Tốt nghiệp THCS</option>
											<option>Tốt nghiệp THPT</option>
											<option>Trung cấp</option>
											<option>Cao đẳng</option>
											<option>Đại học</option>
											<option>Thạc sỹ</option>
											<option>Tiến sỹ</option>
										</select>
										<h4>Mức lương tối thiếu yêu cầu</h4>
										<select class="form-control" id="profilesalary">
											<option>Thỏa thuận</option>
											<option>1-3 triệu</option>
											<option>3-5 triệu</option>
											<option>5-8 triệu</option>
											<option>8-12 triệu</option>
											<option>12-17 triệu</option>
											<option>17-25 triệu</option>
											<option>Trên 25 triệu</option>
										</select>


										<br>
										<textarea class="form-control" rows="7" id="profilebackground" placeholder="Quá trình đào tạo"></textarea>
										<br>
										<textarea class="form-control" rows="7" id="profileexperience" placeholder="Kinh nghiệm làm việc"></textarea>
										<br>
										<textarea class="form-control" rows="7" id="profileother" placeholder="Thông tin bổ sung khác"></textarea>

									</form>
								</div>
							</div>
						</div>


			</div>
		</div>
	</div>