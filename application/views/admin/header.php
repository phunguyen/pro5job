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
					<li><a href="askcat.html"><span class="glyphicon glyphicon-home"></span> Danh mục ASK</a></li>
					<li><a href="<?php echo $baseUrl;?>ask"><span class="glyphicon glyphicon-bullhorn"></span> Quản lý ASK</a></li>
					<li><a href="taoprofile.html"><span class="glyphicon glyphicon-bullhorn"></span> Users</a></li>
					<li><a href="locjob.html"><span class="glyphicon glyphicon-filter"></span> Profiles</a></li>
					<li><a href="thongke.html"><span class="glyphicon glyphicon-stats"></span> Jobs</a></li>
					<li><a href="taoprofile.html"><span class="glyphicon glyphicon-user"></span> admin@gmail.com</a></li>
					<li><a href="<?php echo $baseUrl;?>auth/logout">Đăng xuất</a></li>
				</ul>
			</div>
		</div>
	</nav>
</header>