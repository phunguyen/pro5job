<?php
// echo '<pre>';print_r($list_profiles);echo '</pre>';
?>
<div class="heading">
    <div class="container">
        <hr>
        <div class="row">
            <div class="col-md-4">
                <h4>Chọn Profile để lọc</h4>
            </div>
            <div class="col-md-8">
                <select class="form-control" id="profiles">
            	<?php
            		foreach($list_profiles as $p) {
            			echo '<option value="'.$p['profile_id'].'">'.$p['profile_name'].'</option>';
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
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
                            60%
                        </div>
                    </div>
                    <h5>Địa điểm làm việc</h5>
                    <select class="form-control filter-select" id="filter_location">
                        <option value="">Tỉnh/Thành</option>
                        <?php
							foreach ($locations as $loc) {
								echo '<option value="'.$loc['code'].'">'.$loc['name'].'</option>';
							}
						?>
                    </select>
                    <h5>Số năm kinh nghiệm</h5>
                    <select class="form-control filter-select" id="filter_experience">
                        <option value="">Không yêu cầu</option>
                        <?php
							foreach ($experiences as $exp) {
								echo '<option value="'.$exp['code'].'">'.$exp['name'].'</option>';
							}
						?>
                    </select>
                    <h5>Yêu cầu giới tính</h5>
                    <select class="form-control filter-select" id="filter_gender">
                        <option value="">Không yêu cầu</option>
                        <?php
							foreach ($genders as $gen) {
								echo '<option value="'.$gen['code'].'">'.$gen['name'].'</option>';
							}
						?>
                    </select>
                    <h5>Bằng cấp tối thiểu</h5>
                    <select class="form-control filter-select" id="filter_graduation">
                        <option value="">Không yêu cầu</option>
                        <?php
							foreach ($graduations as $gra) {
								echo '<option value="'.$gra['code'].'">'.$gra['name'].'</option>';
							}
						?>
                    </select>
                    <h5>Mức lương dự kiến</h5>
                    <select class="form-control filter-select" id="filter_salary">
                        <option value="">Thỏa thuận</option>
                        <?php
							foreach ($salaries as $sal) {
								echo '<option value="'.$sal['code'].'">'.$sal['name'].'</option>';
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
            </form>
            <input type="submit" value="Lưu bộ lọc" class="btn btn-primary btn-block">
            <br>
            <form>
                <input type="submit" value="Gửi thư Nhà tuyển dụng" class="btn btn-primary btn-block">
            </form>
        </div>
    </div>
</div>
<script>
$(function() {
    profile_registerFilterJobs();
});
</script>