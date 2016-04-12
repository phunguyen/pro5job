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
            <div class="col-md-5">
                <select class="form-control" id="list_profiles">
                    <?php
                        foreach($list_profiles as $profile) {
                            echo '<option value="'.$profile['profile_id'].'"';
                            if(isset($profile_data['profile_id']) && $profile_data['profile_id'] == $profile['profile_id']) echo ' selected="true"';
                            echo '>'.$profile['profile_name'].'</option>';
                        }
                    ?>
                </select>
            </div>
            <div class="col-md-4">
                <input type="submit" value="Sửa Profile" class="btn btn-primary edit-profile"> &nbsp;&nbsp;
                <input type="button" value="Xóa Profile" class="btn btn-danger delete-profile"> &nbsp;&nbsp;
                <input type="submit" value="Tạo mới Profile" class="btn btn-success new-profile">
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col">
                <h2>Tạo/Sửa Profile</h2>
                <hr>
                <h4>Hãy chọn các Thái độ, Kỹ Năng, Kiến thức mà bạn có cùng với cấp độ 1-5 sao</h4>
                <h4>Càng cụ thể, chi tiết, sát với thực tế sẽ giúp bạn dễ lọc ra các profile phù hợp</h4>
            </div>
        </div>
    </div>
</div>
<hr>
<br>
<div class="container">
    <div class="row">
        <div class="col-md-2">
            <div >
                <span style="font-size: 24px">Danh mục ASK</span>
                <hr>
            </div>
            <?php buildAskCats($ask_cats); ?>
        </div>
        <div class="col-md-3">
            <div>
                <span style="font-size: 24px">ASK trong danh mục</span>					
                <a title="Trợ giúp" tabindex="0" role="button" data-toggle="popover" data-trigger="focus" data-placement="bottom" data-content="Click vào 1 trong 5 ngôi sao để chọn ASK; 
                    1 sao: chỉ biết; 2 sao: làm được; 3 sao: thành thạo; 4 sao: dạy lại; 5 sao: sáng tạo. ">
                <span style="font-size: 24px;" class="glyphicon glyphicon-question-sign"></span></a>
                <hr>
                <?php buildAsksInCats($ask_cats, $list_asks); ?>
            </div>
        </div>
        <div class="col-md-3">
            <span style="font-size: 24px">ASK đã chọn</span>
            <hr>
            <?php buildSelectedCats($ask_cats, $list_asks); ?>
        </div>
        <div class="col-md-4">
        <?php
            if(isset($profile_data['profile_id']) && $profile_data['profile_id'] != '') {
                echo form_open("profile/edit/".$profile_data['profile_id']);
            } else {
                echo form_open("profile/create");
            }
        ?>
            <span style="font-size: 24px">Thông tin Profile</span>
            <hr>
            <!-- HIDDEN FIELDS -->
            <input type="hidden" id="selected_asks" name="selected_asks" value="">
            <input type="hidden" id="selected_asks_rating" name="selected_asks_rating" value="">
            <input type="submit" value="Lưu Profile" class="btn btn-primary"> &nbsp;&nbsp;
            <input type="submit" value="Xem Profile" class="btn btn-success">
            <br><br>
            <input type="text" class="form-control" id="profile_name" name="profile_name" placeholder="Họ và Tên" value="<?php echo(isset($profile_data['profile_name']) ? $profile_data['profile_name'] : ''); ?>">
            <br>
            <input type="text" class="form-control" id="profile_birthdate" name="profile_birthdate" placeholder="Ngày tháng năm sinh" value="<?php echo(isset($profile_data['profile_birthdate']) ? $profile_data['profile_birthdate'] : ''); ?>">
            <br>
            <select class="form-control" id="profilesub_gender" name="profilesub_gender">
                <?php
                    foreach($genders as $g) {
                        echo '<option value="'.$g['code'].'"';
                        if(isset($profile_data['profile_gender']) && $g['code'] == $profile_data['profile_gender']) echo ' selected';
                        echo '>'.$g['name'].'</option>';
                    }
                ?>
            </select>
            <br>
            <textarea class="form-control" rows="4" id="profile_contact" name="profile_contact" placeholder="Thông tin liên lạc: Số điện thoại, địa chỉ"><?php echo(isset($profile_data['profile_contact']) ? $profile_data['profile_contact'] : ''); ?></textarea>
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
			            <h4>Địa điểm làm việc mong muốn</h4>
			            <select class="form-control" id="profilesub_location" name="profilesub_location">
                            <?php
                                foreach($locations as $l) {
                                    echo '<option value="'.$l['code'].'"';
                                    if(isset($profile_data['location']) && $l['code'] == $profile_data['location']) echo ' selected';
                                    echo '>'.$l['name'].'</option>';
                                }
                            ?>
                        </select>
			            <h4>Số năm kinh nghiệm bạn có</h4>
			            <select class="form-control" id="profilesub_experience" name="profilesub_experience">
                            <?php
                                foreach($experiences as $e) {
                                    echo '<option value="'.$e['code'].'"';
                                    if(isset($profile_data['experience']) && $e['code'] == $profile_data['experience']) echo ' selected';
                                    echo '>'.$e['name'].'</option>';
                                }
                            ?>
                        </select>
			            <h4>Bằng cấp cao nhất bạn có</h4>
			            <select class="form-control" id="profilesub_graduation" name="profilesub_graduation">
                            <?php
                                foreach($graduations as $g) {
                                    echo '<option value="'.$g['code'].'"';
                                    if(isset($profile_data['graduation']) && $g['code'] == $profile_data['graduation']) echo ' selected';
                                    echo '>'.$g['name'].'</option>';
                                }
                            ?>
                        </select>
			            <h4>Mức lương tối thiếu yêu cầu</h4>
			            <select class="form-control" id="profilesub_salary" name="profilesub_salary">
                            <?php
                                foreach($salaries as $s) {
                                    echo '<option value="'.$s['code'].'"';
                                    if(isset($profile_data['salary']) && $s['code'] == $profile_data['salary']) echo ' selected';
                                    echo '>'.$s['name'].'</option>';
                                }
                            ?>
                        </select>
			            <br>
			            <textarea class="form-control" rows="7" id="profilesub_background" name="profilesub_background" placeholder="Quá trình đào tạo"><?php echo(isset($profile_data['background']) ? $profile_data['background'] : ''); ?></textarea>
			            <br>
			            <textarea class="form-control" rows="7" id="profilesub_work_experience" name="profilesub_work_experience" placeholder="Kinh nghiệm làm việc"><?php echo(isset($profile_data['work_experience']) ? $profile_data['work_experience'] : ''); ?></textarea>
			            <br>
			            <textarea class="form-control" rows="7" id="profilesub_other" name="profilesub_other" placeholder="Thông tin bổ sung khác"><?php echo(isset($profile_data['other']) ? $profile_data['other'] : ''); ?></textarea>
        			</div>
        		</div>
            </div>
        </form>
        </div>
    </div>
</div>
<script>
$(function() {
    profile_registerEvents();
    <?php
        if(isset($linked_asks))
        foreach($linked_asks as $ask) {
            echo 'profile_displaySelectedAsk('.$ask['ask_id'].', '.$ask['rating'].');';
        }
    ?>
});
</script>