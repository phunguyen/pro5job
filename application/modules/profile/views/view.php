<?php
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
<div class="modal-dialog modal-lg">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			<span style="font-size: 24px"><?php echo $profile_data['profile_name']; ?></span>
			
		</div>
		<div class="modal-body">
		<div class="row">
			<div class="col-md-7">
				<span style="font-size: 20px">ASK của Profile</span>
				<hr>
				<?php echo buildSelectedCats($ask_cats, $list_asks); ?>
			</div>
			<div class="col-md-5">
				<strong>Ngày sinh</strong><br>
				<?php echo $profile_data['profile_birthdate']; ?><br><br>
				<strong>Giới tính</strong><br>
				<?php echo $profile_data['profile_gender']['name']; ?><br><br>
				<strong>Thông tin Liên hệ</strong><br>
				<?php echo $profile_data['profile_contact']; ?><br><br>
				<strong>Địa điểm làm việc mong muốn</strong><br>
				<?php echo $profile_data['location']['name']; ?><br><br>
				<strong>Số năm kinh nghiệm bạn có</strong><br>
				<?php echo $profile_data['experience']['name']; ?><br><br>
				<strong>Bằng cấp cao nhất bạn có</strong><br>
				<?php echo $profile_data['graduation']['name']; ?><br><br>
				<strong>Mức lương tối thiếu yêu cầu</strong><br>
				<?php echo $profile_data['salary']['name']; ?><br><br>
				<strong>Quá trình đào tạo</strong><br>
				<?php echo $profile_data['background']; ?><br><br>
				<strong>Kinh nghiệm làm việc</strong><br>
				<?php echo $profile_data['work_experience']; ?><br><br>
				<strong>Thông tin bổ sung khác</strong><br>
				<?php echo $profile_data['other']; ?><br><br>
			</div>
		</div>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
		</div>
	</div>
</div>
<script type="text/javascript">
<?php
	if(isset($linked_asks)) {
		foreach($linked_asks as $ask) {
			echo 'profile_viewSelectAsk('.$ask['ask_id'].','.$ask['rating'].');';
		}
	}
?>
</script>