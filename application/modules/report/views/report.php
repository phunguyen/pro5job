<?php
function buildAskCats($ask_cats) {
	foreach ($ask_cats as $cat) {
		if($cat['ask_cat_parent'] == 0) {
			echo '<div><h3 style="text-align: left" class="job-cat-parent" data-cat-id="'.$cat['ask_cat_id'].'">'.$cat['ask_cat_name'].'</h3><hr>';
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
    	echo '<div class="job-cat-asks" data-cat-id="'.$cat['ask_cat_id'].'" style="display: none;"><h3>'.getCatNavigation($ask_cats, $cat['ask_cat_id']).'</h3><hr><ul>';
        foreach ($list_asks as $ask) {
            if($ask['ask_cat_id'] == $cat['ask_cat_id']) {
                echo '<li class="job-ask" data-ask-id="'.$ask['ask_id'].'" id="ask_'.$ask['ask_id'].'">
                        <a title="'.$ask['ask_name'].'" tabindex="0" role="button" data-toggle="popover" data-trigger="focus" data-placement="bottom" data-content="'.$ask['description'].'">'.$ask['ask_name'].'</a>
                        &nbsp;<span class="badge">'.$ask['count_asks'].'</span>
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
?>
<div class="heading">
	<div class="container">
		<div class="row col-md-8 col-md-offset-2">
			<h1>Thống kê các Thái độ, Kỹ Năng, Kiến thức xuất hiện nhiều nhất trong các Công việc đang tuyển</h1>
		</div>
	</div>
</div>
<hr>
<div class="container">
    <div class="row">
        <div class="col-md-2">
            <?php buildAskCats($ask_cats); ?>
        </div>
        <div class="col-md-7">
            <?php buildAsksInCats($ask_cats, $list_asks); ?>
        </div>
        <div class="col-md-3">
            <div>
                <h3 style="text-align: left">Quảng cáo</h3>
                <hr>
                <h5 style="text-align: left">Quản trị</h5>
                <h5 style="text-align: left">Công nghệ thông tin</h5>
                <h5 style="text-align: left">Bán hàng</h5>
                <h5 style="text-align: left">Nông nghiệp</h5>
            </div>
            <div>
                <h3 style="text-align: left">Quảng cáo</h3>
                <hr>
                <h5 style="text-align: left">Quản trị</h5>
                <h5 style="text-align: left">Công nghệ thông tin</h5>
                <h5 style="text-align: left">Bán hàng</h5>
                <h5 style="text-align: left">Nông nghiệp</h5>
            </div>
        </div>
    </div>
</div>
<br><br>
<script>
$(function() {
    report_registerEvents();
});
</script>