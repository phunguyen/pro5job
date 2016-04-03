<?php
function buildAskCats($ask_cats) {
	foreach ($ask_cats as $cat) {
		if($cat['ask_cat_parent'] == 0) {
			echo '<div><h4 style="text-align: left" class="job-cat-parent" data-cat-id="'.$cat['ask_cat_id'].'">'.$cat['ask_cat_name'].'</h4>';
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
    foreach ($ask_cats as $cat) {
    	echo '<div class="job-cat-asks" data-cat-id="'.$cat['ask_cat_id'].'" style="display: none;"><h4>'.getCatNavigation($ask_cats, $cat['ask_cat_id']).'</h4><hr><ul>';
        foreach ($list_asks as $ask) {
            if($ask['ask_cat_id'] == $cat['ask_cat_id']) {
                echo '<li class="job-ask" data-ask-id="'.$ask['ask_id'].'" id="ask_'.$ask['ask_id'].'">
                        <h5>
                            <c class="job-ask-require" data-require="1">Bắt buộc</c>
                            |
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
	                            <a class="remove-selected-ask">X</a> |
                                <c class="selected-ask-require">Bắt buộc</c> |
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
                <h4>Danh sách Jobs</h4>
            </div>
            <div class="col-md-5">
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
            <div class="col-md-4">
                <input type="button" value="Sửa Job" class="btn btn-primary edit-job"> &nbsp;&nbsp;
				<input type="button" value="Xóa Job" class="btn btn-danger delete-job"> &nbsp;&nbsp;
                <input type="button" value="Tạo mới Job" class="btn btn-success new-job">				
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col">
                <h2>Tạo/Sửa Job</h2>
                <hr>
                Hãy chọn các ASK(Thái độ, Kỹ Năng, Kiến thức) mà Công việc cần ở các Ứng viên<br>
                Càng cụ thể, chi tiết, sát với nhu cầu thực tế sẽ dễ lọc ra các Ứng viên phù hợp<br>
                Nếu ASK bạn muốn không có trong thư viện, Hãy bổ sung bằng chức năng Thêm ASK ở dưới
            </div>
        </div>
    </div>
</div>
<hr><br>
<div class="container">
    <div class="row">
        <div class="col-md-2">
            <div>
                <span style="font-size: 24px">Danh mục ASK</span>
                <hr>
            </div>

            <?php buildAskCats($ask_cats); ?>
        </div>
        <div class="col-md-3">
            <div>
                <span style="font-size: 24px">ASK trong danh mục</span>					
						<a title="Trợ giúp" tabindex="0" role="button" data-toggle="popover" data-trigger="focus" data-placement="bottom" data-content="Click vào 1 trong 5 ngôi sao để chọn ASK; 
						1 sao: chỉ biết; 2 sao: làm được; 3 sao: thành thạo; 4 sao: dạy lại; 5 sao: sáng tạo. 
						Click vào Bắt buộc để chọn ASK này là bắt buộc hay không đối với Công việc">
						<span style="font-size: 24px;" class="glyphicon glyphicon-question-sign"></span></a>
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
                            <?php echo form_open("job/add_ask"); ?>
                                <input type="hidden" id="selected_cat_id" name="selected_cat_id" value="">
                                <input type="text" class="form-control" id="new_ask_name" placeholder="Tên ASK">
                                <br>
                                <textarea class="form-control" rows="7" id="new_ask_desc" placeholder="Mô tả ASK"></textarea>
                                <br>
                                <input type="button" class="btn btn-primary btn-add-ask" value="Thêm ASK">
                            </form>
                        </div>
                    </div>
                </div>
                <hr>
            </div>
        </div>
        <div class="col-md-4">
            <span style="font-size: 24px">ASK đã chọn</span>
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
                <input type="hidden" id="selected_asks_require" name="selected_asks_require" value="">
                <input type="hidden" id="selected_asks_rating" name="selected_asks_rating" value="">

                <!-- FORM -->
                <span style="font-size: 24px">Thông tin Job</span>
                
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
                            <select class="form-control" id="jobsub_location" name="jobsub_location">
                                <option>Chọn Tỉnh/Thành</option>
                                <?php
                                    $aLocations = array('Hà Nội', 'Tp HCM', 'Dà Nẵng', 'An Giang', 'Bắc Ninh');
                                    foreach($aLocations as $loc) {
                                        echo '<option value="'.$loc.'"';
                                        if(isset($sub_data['jobsub_location']) && $loc == $sub_data['jobsub_location']) echo ' selected';
                                        echo '>'.$loc.'</option>';
                                    }
                                ?>
                            </select>
                            <h4>Số năm kinh nghiệm</h4>
                            <select class="form-control" id="jobsub_experience" name="jobsub_experience">
                                <?php
                                    $aLocations = array('Không yêu cầu', '1 năm', '2 năm', '3 năm', '4 năm', '5 năm trở lên');
                                    foreach($aLocations as $loc) {
                                        echo '<option value="'.$loc.'"';
                                        if(isset($sub_data['jobsub_location']) && $loc == $sub_data['jobsub_experience']) echo ' selected';
                                        echo '>'.$loc.'</option>';
                                    }
                                ?>
                            </select>
                            <h4>Yêu cầu giới tính</h4>
                            <select class="form-control" id="jobsub_gender" name="jobsub_gender">
                                <?php
                                    $aLocations = array('Không yêu cầu', 'Nam', 'Nữ');
                                    foreach($aLocations as $loc) {
                                        echo '<option value="'.$loc.'"';
                                        if(isset($sub_data['jobsub_gender']) && $loc == $sub_data['jobsub_gender']) echo ' selected';
                                        echo '>'.$loc.'</option>';
                                    }
                                ?>
                            </select>
                            <h4>Bằng cấp tối thiểu</h4>
                            <select class="form-control" id="jobsub_graduation" name="jobsub_graduation">
                                <?php
                                    $aLocations = array('Không yêu cầu', 'Tốt nghiệp THCS', 'Tốt nghiệp THPT', 'Trung cấp', 'Cao đẳng', 'Đại học', 'Thạc sỹ', 'Tiến sỹ');
                                    foreach($aLocations as $loc) {
                                        echo '<option value="'.$loc.'"';
                                        if(isset($sub_data['jobsub_graduation']) && $loc == $sub_data['jobsub_graduation']) echo ' selected';
                                        echo '>'.$loc.'</option>';
                                    }
                                ?>
                            </select>
                            <h4>Mức lương dự kiến</h4>
                            <select class="form-control" id="jobsub_salary" name="jobsub_salary">
                                <?php
                                    $aLocations = array('Thoả thuận', '1-3 triệu', '3-5 triệu', '5-8 triệu', '8-12 triệu', '12-17 triệu', '17-25 triệu', 'Trên 25 triệu');
                                    foreach($aLocations as $loc) {
                                        echo '<option value="'.$loc.'"';
                                        if(isset($sub_data['jobsub_salary']) && $loc == $sub_data['jobsub_salary']) echo ' selected';
                                        echo '>'.$loc.'</option>';
                                    }
                                ?>
                            </select>
							<h4>Ngày bắt đầu tuyển</h4>
                            <select class="form-control" id="jobsub_startdate" name="jobsub_startdate">
                                <?php
                                    $aLocations = array('Hôm nay', '3 ngày nữa', '1 tuần nữa', '2 tuần nữa', '1 tháng nữa');
                                    foreach($aLocations as $loc) {
                                        echo '<option value="'.$loc.'"';
                                        if(isset($sub_data['jobsub_startdate']) && $loc == $sub_data['jobsub_startdate']) echo ' selected';
                                        echo '>'.$loc.'</option>';
                                    }
                                ?>
                            </select>
                            <br>
                            <h4>Thời gian đăng tuyển</h4>
                            <select class="form-control" id="jobsub_duration" name="jobsub_duration">
                                <?php
                                    $aLocations = array('1 tuần', '2 tuần', '1 tháng', '2 tháng', '3 tháng', 'Thường xuyên tuyển');
                                    foreach($aLocations as $loc) {
                                        echo '<option value="'.$loc.'"';
                                        if(isset($sub_data['jobsub_duration']) && $loc == $sub_data['jobsub_duration']) echo ' selected';
                                        echo '>'.$loc.'</option>';
                                    }
                                ?>
                            </select>
                            <br>
                            <textarea class="form-control" rows="7" id="jobsub_desc" name="jobsub_desc" placeholder="Mô tả thêm về Công việc"><?php if(isset($sub_data['jobsub_desc'])) echo $sub_data['jobsub_desc']; ?></textarea>
                            <br>
                            <textarea class="form-control" rows="7" id="jobsub_phucloi" name="jobsub_phucloi" placeholder="Quyền lợi được hưởng"><?php if(isset($sub_data['jobsub_phucloi'])) echo $sub_data['jobsub_phucloi']; ?></textarea>
                            <br>
                            <textarea class="form-control" rows="7" id="jobsub_other" name="jobsub_other" placeholder="Thông tin bổ sung khác"><?php if(isset($sub_data['jobsub_other'])) echo $sub_data['jobsub_other']; ?></textarea>
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
        if(isset($linked_asks))
        foreach($linked_asks as $ask) {
            echo 'job_displaySelectedAsk('.$ask['ask_id'].', '.$ask['require'].', '.$ask['rating'].');';
        }
    ?>
});
</script>