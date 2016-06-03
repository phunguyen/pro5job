<?php
// echo '<pre>';print_r($filter_data);echo '</pre>';
?>
<style>
#filter_matchSlider .slider-selection {
    background: #BABABA;
}
.slider.slider-horizontal {
    width: 185px;
    height: 20px;
}
</style>
<div class="heading">
    <div class="container">
        <hr>
        <div class="row">
            <div class="col-md-4">
                <h4>Chọn Profile để lọc</h4>
            </div>
            <div class="col-md-8">
                <select class="form-control filter-select" id="filter_profile">
            	<?php
            		foreach($list_profiles as $p) {
            			echo '<option value="'.$p['profile_id'].'"';
                        if(isset($filter_data['filter_profile']) && $filter_data['filter_profile'] == $p['profile_id']) echo ' selected="selected" ';
                        echo '>'.$p['profile_name'].'</option>';
            		}
            	?>
                </select>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col">
                <h2>Lọc ra Jobs phù hợp với Profile đã chọn</h2>
                <hr>
                <h4>Chọn các tiêu chí trong Bộ lọc Công việc ở Cột 1. Các công việc phù hợp hiển thị ở Cột 2</h4>
                <h4>Xem chi tiết từng Công việc ở Cột 2, chọn Công việc phù hợp nhất. Hiển thị ở Cột 3</h4>
            </div>
        </div>
    </div>
</div>
<hr>
<div class="container">
    <div class="row">
        <div class="col-md-2">
            <div >
                <h3 style="text-align: left">Lọc Công việc</h3>
                <hr>
                <h5 style="text-align: left">Độ phù hợp</h5>
                <form>
                    <!-- <div class="progress">
                        <div id="match_percent" class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
                            60%
                        </div>
                    </div> -->
                    <div>
                        <input id="filter_match" data-slider-id='filter_matchSlider' type="text" data-slider-min="0" data-slider-max="100" data-slider-step="5" data-slider-value="<?php echo isset($filter_data['filter_match']) ? $filter_data['filter_match'] : 50; ?>"/>&nbsp;&nbsp;&nbsp;<span id="filter_matchSliderVal" style="font-weight: bold;"><?php echo isset($filter_data['filter_match']) ? $filter_data['filter_match'] : 50; ?></span>%

                    </div>
                    <h5>Địa điểm làm việc</h5>
                    <select class="form-control filter-select" id="filter_location">
                        <option value="">Tỉnh/Thành</option>
                        <?php
							foreach ($locations as $loc) {
								echo '<option value="'.$loc['code'].'"';
                                if(isset($filter_data['filter_location']) && $filter_data['filter_location'] == $loc['code']) echo ' selected="selected" ';
                                echo '>'.$loc['name'].'</option>';
							}
						?>
                    </select>
                    <h5>Số năm kinh nghiệm</h5>
                    <select class="form-control filter-select" id="filter_experience">
                        <option value="">Không yêu cầu</option>
                        <?php
							foreach ($experiences as $exp) {
								echo '<option value="'.$exp['code'].'"';
                                if(isset($filter_data['filter_experience']) && $filter_data['filter_experience'] == $exp['code']) echo ' selected="selected" ';
                                echo '>'.$exp['name'].'</option>';
							}
						?>
                    </select>
                    <h5>Yêu cầu giới tính</h5>
                    <select class="form-control filter-select" id="filter_gender">
                        <option value="">Không yêu cầu</option>
                        <?php
							foreach ($genders as $gen) {
								echo '<option value="'.$gen['code'].'"';
                                if(isset($filter_data['filter_gender']) && $filter_data['filter_gender'] == $gen['code']) echo ' selected="selected" ';
                                echo '>'.$gen['name'].'</option>';
							}
						?>
                    </select>
                    <h5>Bằng cấp tối thiểu</h5>
                    <select class="form-control filter-select" id="filter_graduation">
                        <option value="">Không yêu cầu</option>
                        <?php
							foreach ($graduations as $gra) {
								echo '<option value="'.$gra['code'].'"';
                                if(isset($filter_data['filter_graduation']) && $filter_data['filter_graduation'] == $gra['code']) echo ' selected="selected" ';
                                echo '>'.$gra['name'].'</option>';
							}
						?>
                    </select>
                    <h5>Mức lương dự kiến</h5>
                    <select class="form-control filter-select" id="filter_salary">
                        <option value="">Thỏa thuận</option>
                        <?php
							foreach ($salaries as $sal) {
								echo '<option value="'.$sal['code'].'"';
                                if(isset($filter_data['filter_salary']) && $filter_data['filter_salary'] == $sal['code']) echo ' selected="selected" ';
                                echo '>'.$sal['name'].'</option>';
							}
						?>
                    </select>
                </form>
            </div>
            <hr>
        </div>
        <div class="col-md-4">
            <div>
                <h3>
                    Công việc phù hợp đã lọc
                </h3>
                <hr>
                <ul id="list_jobs">
                </ul>
                <hr>
            </div>
        </div>
        <div class="col-md-3">
            <div>
                <h3 style="text-align: left">Công việc đã chọn</h3>
                <hr>
                <ul id="list_selected_jobs">
                </ul>
            </div>
            <hr>
        </div>
        <div class="col-md-3">
            <h3 style="text-align: left">Tác vụ</h3>
            <hr>
            <h5>Gửi thông báo về các Công việc mới phù hợp Bộ lọc này vào email của tôi</h5>
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
                <input type="button" value="Lưu bộ lọc" class="btn btn-primary btn-block save-filter">
                <input type="hidden" name="filter_id" id="filter_id" value="<?php echo isset($filter_data['filter_id']) ? $filter_data['filter_id'] : 0; ?>">
                <br>
                <input type="button" value="Gửi thư Nhà tuyển dụng" class="btn btn-primary btn-block">
            </form>
        </div>
    </div>
</div>
<div id="modalViewJob" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <!-- CONTENT -->
</div>
<script>
$(function() {
    profile_registerFilterJobs();
});
</script>