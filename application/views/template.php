<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<link rel="canonical" href="http://www.pro5job.com/">
	<link rel="publisher" href="https://plus.google.com/u/0/+pro5job">
	<title>Pro5Job.com | <?php echo $title; ?></title>

	<meta name="description" content="Pro5Job là công cụ trực tuyến giúp Nhà tuyển dụng, Người tìm việc tìm được nhau một cách nhanh chóng.">
	<meta name="keywords" content="tuyen dung, tim viec, dao tao, ask">
	<meta name="twitter:card" content="Dựa trên Mô hình ASK và Độ phù hợp, Nhà tuyển dụng nhanh chóng lọc ra Ứng viên phù hợp và Người tìm việc nhanh chóng lọc ra Công việc phù hợp.">
	<meta name="twitter:site" content="Pro5Job">
	<meta name="twitter:title" content="Pro5Job.com | Tuyển dụng, Tìm việc, Đào tạo">
	<meta name="twitter:description" content="Pro5Job là công cụ trực tuyến giúp Nhà tuyển dụng, Người tìm việc tìm được nhau một cách nhanh chóng.">
	<meta property="og:locale" content="vi_VN">
	<meta property="og:locale:alternate" content="en_US">
	<meta name="og:title" content="Pro5Job.com | Tuyển dụng, Tìm việc, Đào tạo">
	<meta name="og:description" content="Pro5Job là công cụ trực tuyến giúp Nhà tuyển dụng, Người tìm việc tìm được nhau một cách nhanh chóng.">
	<meta name="og:site_name" content="Pro5Job">
	<meta property="og:image" content="http://www.topcv.vn/images/cover.jpg">

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<link rel="icon" href="<?php echo base_url();?>public/images/favicon.png" type="image/x-icon">

	<link rel="stylesheet" href="<?php echo base_url();?>public/css/font.css">
	<link rel="stylesheet" href="<?php echo base_url();?>public/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url();?>public/css/style.css">
	<link rel="stylesheet" href="<?php echo base_url();?>public/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo base_url();?>public/css/animate.css">
	<link rel="stylesheet" href="<?php echo base_url();?>public/css/page.css">

	<style type="text/css"></style>
</head>
<body>
	<div id="fb-root"></div>
	<?php echo $header ?>
	<div id="main">
		<?php echo $content; ?>
	</div>
	<br><br>
	<?php echo $footer; ?>

	<!-- <script async="" src="<?php echo base_url();?>public/js/fbevents.js"></script> -->
	<script src="<?php echo base_url();?>public/js/jquery-1.11.2.min.js"></script>
	<script src="<?php echo base_url();?>public/js/bootstrap.js"></script>
	<script src="<?php echo base_url();?>public/js/bootstrap.min.js"></script>
	<script>
		$(function () {
			$('[data-toggle="popover"]').popover();
		    $(".dropdown-toggle").dropdown();
		});
	</script>
</body>

</html>