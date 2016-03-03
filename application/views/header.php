<?php
$baseUrl = base_url();
?>
<header>
	<nav class="navbar navbar-default navbar-static-top">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a href="<?php echo $baseUrl;?>" class="navbar-brand">
					<img src="<?php echo $baseUrl;?>public/images/logo.png" height="40">
				</a>
			</div>
			<div id="navbar" class="collapse navbar-collapse">
				<ul class="nav navbar-nav navbar-right">
					<li><a href="<?php echo $baseUrl;?>aboutus">Giới thiệu</a></li>
					<li><a href="<?php echo $baseUrl;?>job">Tuyển dụng</a></li>
					<li><a href="timviec.html">Tìm việc</a></li>
					<li><a href="<?php echo $baseUrl;?>filter">Bộ lọc</a></li>
					<li><a href="<?php echo $baseUrl;?>report">Thống kê</a></li>
					<li><a href="lienhe.html">Liên hệ</a></li>
					<li><a href="dangky.html">Đăng ký</a></li>
					<li><a href="<?php echo $baseUrl;?>auth">Đăng nhập</a></li>
				</ul>
			</div>
		</div>
	</nav>
</header>