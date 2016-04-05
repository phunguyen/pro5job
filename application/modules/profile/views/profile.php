<?php
function buildAskCats($ask_cats) {
	foreach ($ask_cats as $cat) {
		if($cat['ask_cat_parent'] == 0) {
			echo '<div><h4 style="text-align: left" class="profile-cat-parent" data-cat-id="'.$cat['ask_cat_id'].'">'.$cat['ask_cat_name'].'</h4>';
	        buildChildCats($ask_cats, $cat['ask_cat_id'], 0);
	        echo '</div>';
	    }
	}
}
function buildChildCats($ask_cats, $cat_id, $level) {
	foreach ($ask_cats as $cat) {
		if($cat['ask_cat_parent'] == $cat_id) {
			echo '<h5 style="text-align: left;padding-left: '.(10 * $level).'px;" class="profile-cat" data-cat-id="'.$cat['ask_cat_id'].'">'.$cat['ask_cat_name'].'</h5>';
	        buildChildCats($ask_cats, $cat['ask_cat_id'], $level + 1);
	    }
	}
}
function buildAsksInCats($ask_cats, $list_asks) {
    foreach ($ask_cats as $cat) {
    	echo '<div class="profile-cat-asks" data-cat-id="'.$cat['ask_cat_id'].'" style="display: none;"><h4>'.getCatNavigation($ask_cats, $cat['ask_cat_id']).'</h4><hr><ul>';
        foreach ($list_asks as $ask) {
            if($ask['ask_cat_id'] == $cat['ask_cat_id']) {
                echo '<li class="profile-ask" data-ask-id="'.$ask['ask_id'].'" id="ask_'.$ask['ask_id'].'">
                        <h5>
                            <font color="#ffd700" class="star-rating">
                            <span class="glyphicon glyphicon-star-empty" data-rating="1"></span>
                            <span class="glyphicon glyphicon-star-empty" data-rating="2"></span>
                            <span class="glyphicon glyphicon-star-empty" data-rating="3"></span>
                            <span class="glyphicon glyphicon-star-empty" data-rating="4"></span>
                            <span class="glyphicon glyphicon-star-empty" data-rating="5"></span>
                            </font> |
                            <a title="'.$ask['ask_name'].'" tabindex="0" role="button" data-toggle="popover" data-trigger="focus" data-placement="bottom" data-content="'.$ask['description'].'">'.$ask['ask_name'].'</a>
                        </h5>
                    </li>';
            }
        }
        echo '</ul></div>';
    }
}
function getCatNavigation($ask_cats, $cat_id) {
    $cat_nav = '';
    while($cat_id > 0) {
        foreach ($ask_cats as $cat) {
            if($cat['ask_cat_id'] == $cat_id) {
                $cat_nav = $cat['ask_cat_name'].' | '.$cat_nav;
                $cat_id = $cat['ask_cat_parent'];
                break;
            }
        }
    }
    return rtrim($cat_nav, ' | ');
}
function buildSelectedCats($ask_cats, $list_asks) {
	foreach ($ask_cats as $cat) {
		if($cat['ask_cat_parent'] == 0) {
			echo '<div><h4 id="selected_cat_'.$cat['ask_cat_id'].'" style="text-align: left;display: none;" class="profile-selected-cat" data-cat-id="'.$cat['ask_cat_id'].'" data-level="0">'.$cat['ask_cat_name'].'</h4>';
	        buildSelectedChildCats($ask_cats, $cat['ask_cat_id'], 0, $list_asks);
	        echo '</div>';
	    }
	}
}
function buildSelectedChildCats($ask_cats, $cat_id, $level, $list_asks) {
	foreach ($ask_cats as $cat) {
		if($cat['ask_cat_parent'] == $cat_id) {
			echo '<h5 id="selected_cat_'.$cat['ask_cat_id'].'" style="text-align: left;padding-left: '.(10 * $level).'px;display: none;" class="profile-selected-cat" data-cat-id="'.$cat['ask_cat_id'].'" data-level="'.($level + 1).'">'.$cat['ask_cat_name'].'</h5><ul class="nav"><li><ul>';
			foreach ($list_asks as $ask) {
	            if($ask['ask_cat_id'] == $cat['ask_cat_id']) {
	                echo '<li id="selected_ask_'.$ask['ask_id'].'" style="display: none;" class="selected-ask" data-ask-id="'.$ask['ask_id'].'">
	                        <h5>
	                            <a class="remove-selected-ask">X</a> |
	                            <font color="#ffd700">
	                            <span class="star-rating">
                                    <span class="glyphicon glyphicon-star-empty" data-rating="1"></span>
                                    <span class="glyphicon glyphicon-star-empty" data-rating="2"></span>
                                    <span class="glyphicon glyphicon-star-empty" data-rating="3"></span>
                                    <span class="glyphicon glyphicon-star-empty" data-rating="4"></span>
                                    <span class="glyphicon glyphicon-star-empty" data-rating="5"></span>
                                    <input type="hidden" name="whatever" class="rating-value" value="3">
                                </span>
                                </font> |
	                            <a title="'.$ask['ask_name'].'" tabindex="0" role="button" data-toggle="popover" data-trigger="focus" data-placement="bottom" data-content="'.$ask['description'].'">'.$ask['ask_name'].'</a>
	                        </h5>
	                    </li>';
	            }
	        }
			echo '</ul></li></ul>';
	        buildSelectedChildCats($ask_cats, $cat['ask_cat_id'], $level + 1, $list_asks);
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
						<?php buildAsksInCats($ask_cats, $list_asks); ?>
				</div>
			</div>
			<div class="col-md-3">
				<h3 style="text-align: left">ASK đã chọn</h3>
				<hr>
				<?php buildSelectedCats($ask_cats, $list_asks); ?>
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
<script>
$(function() {
    profile_registerEvents();
    <?php
        if(isset($linked_asks))
        foreach($linked_asks as $ask) {
            echo 'profile_displaySelectedAsk('.$ask['ask_id'].', '.$ask['require'].', '.$ask['rating'].');';
        }
    ?>
});
</script>