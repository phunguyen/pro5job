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
					<li><a href="<?php echo $baseUrl;?>auth"><span class="glyphicon glyphicon-bullhorn"></span> Users</a></li>
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
</header>