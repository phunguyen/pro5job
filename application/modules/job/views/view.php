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
<div class="modal-dialog modal-lg">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			<span style="font-size: 24px"><?php echo $job_data['job_name']; ?></span>
		</div>
		<div class="modal-body">
		<div class="row">
			<div class="col-md-7">
				<span style="font-size: 20px">ASK của Job</span>
				<hr>
				<?php echo buildSelectedCats($ask_cats, $list_asks); ?>
			</div>
			<div class="col-md-5">
				<strong>Thông tin Liên hệ</strong><br>
				<?php echo $job_data['job_contact']; ?><br><br>
				<strong>Địa điểm làm việc</strong><br>
				<?php echo isset($job_data['location']['name']) ? $job_data['location']['name'] : ''; ?><br><br>
				<strong>Số năm kinh nghiệm</strong><br>
				<?php echo isset($job_data['experience']['name']) ? $job_data['experience']['name'] : ''; ?><br><br>
				<strong>Yêu cầu giới tính</strong><br>
				<?php echo isset($job_data['gender']['name']) ? $job_data['gender']['name'] : ''; ?><br><br>
				<strong>Bằng cấp tối thiểu</strong><br>
				<?php echo isset($job_data['graduation']['name']) ? $job_data['graduation']['name'] : ''; ?><br><br>
				<strong>Mức lương dự kiến</strong><br>
				<?php echo isset($job_data['salary']['name']) ? $job_data['salary']['name'] : ''; ?><br><br>
				<strong>Ngày bắt đầu tuyển</strong><br>
				<?php echo $job_data['startdate']; ?><br><br>
				<strong>Ngày hết hạn</strong><br>
				<?php echo $job_data['duration']; ?><br><br>
				<strong>Mô tả thêm về công việc</strong><br>
				<?php echo $job_data['description']; ?><br><br>
				<strong>Quyền lợi được hưởng</strong><br>
				<?php echo $job_data['interest']; ?><br><br>
				<strong>Thông tin bổ sung khác</strong><br>
				<?php echo $job_data['other']; ?><br><br>
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
			echo 'job_viewSelectAsk('.$ask['ask_id'].','.$ask['rating'].','.$ask['require'].');';
		}
	}
?>
</script>