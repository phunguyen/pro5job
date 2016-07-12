<<<<<<< HEAD
<link rel="stylesheet" href="<?php echo base_url();?>public/css/bootstrap-datepicker.min.css">
<link rel="stylesheet" href="<?php echo base_url();?>public/css/bootstrap-slider.css">
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
					<li><a href="<?php echo $baseUrl;?>aboutus"><span class="glyphicon glyphicon-home"></span> Giới thiệu</a></li>
					<li><a href="<?php echo $baseUrl;?>report"><span class="glyphicon glyphicon-stats"></span> Thống kê</a></li>
					<li><a href="<?php echo $baseUrl;?>profile"><span class="glyphicon glyphicon-heart"></span> Profiles</a></li>
					<li><a href="<?php echo $baseUrl;?>filter/jobs"><span class="glyphicon glyphicon-filter"></span> Lọc Jobs</a></li>
					<li><a href="<?php echo $baseUrl;?>manage/jobs"><span class="glyphicon glyphicon-star"></span> Jobs</a></li>
					<li><a data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-comment"></span> Góp ý</a></li>
					<div class="modal fade" id="myModal" role="dialogtabindex="-1" role="dialog">
					<div class="modal-dialog" role="document">
    
						<!-- Modal content-->
						<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<span style="font-size: 24px">Góp ý</span>
							
						</div>
						<div class="modal-body">
							
							<textarea class="form-control" rows="7"></textarea>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-primary">Gửi góp ý</button>
						</div>
					</div>
      
					</div>
					</div>
					
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
							<span class="glyphicon glyphicon-user"></span> <?php echo $current_user->email; ?><span class="caret"></span>
						</a>
						<ul class="dropdown-menu">
							<li><a href="<?php echo $baseUrl.'auth/edit_user/'.$current_user->user_id; ?>">Edit Info</a></li>
							<li role="separator" class="divider"></li>
							<li><a href="<?php echo $baseUrl;?>auth/logout">Log Out</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</nav>
=======
<link rel="stylesheet" href="<?php echo base_url();?>public/css/bootstrap-datepicker.min.css">
<link rel="stylesheet" href="<?php echo base_url();?>public/css/bootstrap-slider.css">
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
					<li><a href="<?php echo $baseUrl;?>aboutus"><span class="glyphicon glyphicon-home"></span> Giới thiệu</a></li>
					<li><a href="<?php echo $baseUrl;?>report"><span class="glyphicon glyphicon-stats"></span> Thống kê</a></li>
					<li><a href="<?php echo $baseUrl;?>profile"><span class="glyphicon glyphicon-heart"></span> Profiles</a></li>
					<li><a href="<?php echo $baseUrl;?>filter/jobs"><span class="glyphicon glyphicon-filter"></span> Lọc Jobs</a></li>
					<li><a href="<?php echo $baseUrl;?>manage/jobs"><span class="glyphicon glyphicon-star"></span> Jobs</a></li>
					<li><a data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-comment"></span> Góp ý</a></li>
					<div class="modal fade" id="myModal" role="dialogtabindex="-1" role="dialog">
					<div class="modal-dialog" role="document">
    
						<!-- Modal content-->
						<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<span style="font-size: 24px">Góp ý</span>
							
						</div>
						<div class="modal-body">
							
							<textarea class="form-control" rows="7"></textarea>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-primary">Gửi góp ý</button>
						</div>
					</div>
      
					</div>
					</div>
					
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
							<span class="glyphicon glyphicon-user"></span> <?php echo $current_user->email; ?><span class="caret"></span>
						</a>
						<ul class="dropdown-menu">
							<li><a href="<?php echo $baseUrl.'auth/edit_user/'.$current_user->user_id; ?>">Edit Info</a></li>
							<li role="separator" class="divider"></li>
							<li><a href="<?php echo $baseUrl;?>auth/logout">Log Out</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</nav>
>>>>>>> d8c413e2023fabe2d0c222473e8c84d1ce1e4965
</header>