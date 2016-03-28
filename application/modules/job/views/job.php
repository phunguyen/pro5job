<?php
function buildAskCats($ask_cats) {
	foreach ($ask_cats as $cat) {
		if($cat['ask_cat_parent'] == 0) {
			echo '<div><h4 style="text-align: left" class="job-cat" data-cat-id="'.$cat['ask_cat_id'].'">'.$cat['ask_cat_name'].'</h4>';
	        buildChildCats($ask_cats, $cat['ask_cat_id'], 0);
	        echo '</div>';
	    }
	}
}
function buildChildCats($ask_cats, $cat_id, $level) {
	foreach ($ask_cats as $cat) {
		if($cat['ask_cat_parent'] == $cat_id) {
			echo '<h5 style="text-align: left;padding-left: '.(10 * $level).'px;" class="job-cat" data-cat-id="'.$cat['ask_cat_id'].'">'.$cat['ask_cat_name'].'</h5>';
	        buildChildCats($ask_cats, $cat['ask_cat_id'], $level + 1);
	    }
	}
}
function buildAsksInCats($ask_cats, $list_asks) {
	$displayCat = false;
    foreach ($ask_cats as $cat) {
    	if(!$displayCat && $cat['ask_cat_parent'] > 0) {
        	echo '<div class="job-cat-asks" data-cat-id="'.$cat['ask_cat_id'].'"><h4>'.getCatNavigation($ask_cats, $cat['ask_cat_id']).'</h4><hr><ul>';
        	$displayCat = true;
        } else {
        	echo '<div class="job-cat-asks" data-cat-id="'.$cat['ask_cat_id'].'" style="display: none;"><h4>'.getCatNavigation($ask_cats, $cat['ask_cat_id']).'</h4><hr><ul>';
        }
        foreach ($list_asks as $ask) {
            if($ask['ask_cat_id'] == $cat['ask_cat_id']) {
                echo '<li class="job-ask" data-ask-id="'.$ask['ask_id'].'" id="ask_'.$ask['ask_id'].'">
                        <h5>
                            <c>Bắt buộc</c>
                            |
                            <font color="#ffd700">
                            <span class="glyphicon glyphicon-star-empty"></span>
                            <span class="glyphicon glyphicon-star-empty"></span>
                            <span class="glyphicon glyphicon-star-empty"></span>
                            <span class="glyphicon glyphicon-star-empty"></span>
                            <span class="glyphicon glyphicon-star-empty"></span></font> |
                            <a title="'.$ask['ask_name'].'" data-toggle="popover" data-placement="bottom" data-content="'.$ask['description'].'">'.$ask['ask_name'].'</a>
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
			echo '<div><h4 id="selected_cat_'.$cat['ask_cat_id'].'" style="text-align: left;display: none;" class="job-selected-cat" data-cat-id="'.$cat['ask_cat_id'].'" data-level="0">'.$cat['ask_cat_name'].'</h4>';
	        buildSelectedChildCats($ask_cats, $cat['ask_cat_id'], 0, $list_asks);
	        echo '</div>';
	    }
	}
}
function buildSelectedChildCats($ask_cats, $cat_id, $level, $list_asks) {
	foreach ($ask_cats as $cat) {
		if($cat['ask_cat_parent'] == $cat_id) {
			echo '<h5 id="selected_cat_'.$cat['ask_cat_id'].'" style="text-align: left;padding-left: '.(10 * $level).'px;display: none;" class="job-selected-cat" data-cat-id="'.$cat['ask_cat_id'].'" data-level="'.($level + 1).'">'.$cat['ask_cat_name'].'</h5><ul class="nav"><li><ul>';
			foreach ($list_asks as $ask) {
	            if($ask['ask_cat_id'] == $cat['ask_cat_id']) {
	                echo '<li id="selected_ask_'.$ask['ask_id'].'" style="display: none;" class="selected-ask" data-ask-id="'.$ask['ask_id'].'">
	                        <h5>
	                            <a class="remove-selected-ask">X</a> | <font color="#ff0000">Bắt buộc</font> |
	                            <font color="#ffd700">
	                            <span class="glyphicon glyphicon-star"></span>
	                            <span class="glyphicon glyphicon-star"></span>
	                            <span class="glyphicon glyphicon-star"></span>
	                            <span class="glyphicon glyphicon-star-empty"></span>
	                            <span class="glyphicon glyphicon-star-empty"></span></font> |
	                            '.$ask['ask_name'].'
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
                <h4>Danh sách Jobs</h4>
            </div>
            <div class="col-md-6">
                <select class="form-control" id="list_jobs">
                    <?php
                        foreach($list_jobs as $job) {
                            echo '<option value="'.$job['job_id'].'"';
                            if(isset($job_data['job_id']) && $job_data['job_id'] == $job['job_id']) echo ' selected="true"';
                            echo '>'.$job['job_name'].'</option>';
                        }
                    ?>
                </select>
            </div>
            <div class="col-md-3">
                <input type="button" value="Sửa Job" class="btn btn-primary" onclick="job_editJob();"> &nbsp;&nbsp;
                <input type="button" value="Tạo mới Job" class="btn btn-success">
            </div>
        </div>
        <hr>
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
            <div>
                <h3>Danh mục ASK</h3>
                <hr>
            </div>
            <?php buildAskCats($ask_cats); ?>
        </div>
        <div class="col-md-3">
            <div>
                <h3>
                    ASK trong Danh mục
                </h3>
                <hr>

                <!-- list asks in selected cat -->
                <?php buildAsksInCats($ask_cats, $list_asks); ?>

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
                            <?php echo form_open("job/add_ask/".$job_data['job_id']); ?>
                                <input type="hidden" id="selected_cat_id" name="selected_cat_id" value="">
                                <input type="text" class="form-control" id="askname" placeholder="Tên ASK">
                                <br>
                                <textarea class="form-control" rows="7" id="askmota"placeholder="Mô tả ASK"></textarea>
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
            <?php buildSelectedCats($ask_cats, $list_asks); ?>
        </div>
        <div class="col-md-3">
            <?php
                if(isset($job_data['job_id']) && $job_data['job_id'] != '') {
                    echo form_open("job/edit/".$job_data['job_id']);
                } else {
                    echo form_open("job/create");
                }
            ?>
                <!-- HIDDEN FIELDS -->
                <input type="hidden" id="selected_asks" name="selected_asks" value="">

                <!-- FORM -->
                <h3>Thông tin Job
                </h3>
                <hr>
                <button type="submit" class="btn btn-primary">Lưu Job</button>
                <button type="button" class="btn btn-success">Xem Job</button>
                <br><br>
                <input type="text" class="form-control" name="job_name" placeholder="Tên Công việc" value="<?php echo(isset($job_data['job_name']) ? $job_data['job_name'] : ''); ?>">
                <br>
                <textarea class="form-control" rows="4" name="job_contact" placeholder="Thông tin liên lạc Bộ phận tuyển dụng"><?php echo(isset($job_data['job_contact']) ? $job_data['job_contact'] : ''); ?></textarea>
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
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
$(function() {
    job_registerEvents();
    <?php
        foreach($linked_asks as $ask_id) {
            echo '$("#ask_'.$ask_id.'").trigger("click");';
        }
    ?>
});
</script>