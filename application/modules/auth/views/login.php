<div class="wrapper">
	<div class="container">
		<div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-6">
				<div id="login-form">
					<div class="block-body">
						<h2 style="text-align: center">Đăng nhập</h2><hr>
						<form action="auth/login" method="post">
						<p><input placeholder="Email" name="identity" class="form-control" type="email" value=""></p>
						<p><input placeholder="Mật khẩu" name="password" class="form-control" type="password" value=""></p>
						<p class="agree-term">
							<label>
							<input type="checkbox" name="remember" value="1">
							Ghi nhớ tài khoản
							</label>
						</p>
						<p>
							<div class="col-md-6">
								<input type="submit" value="Đăng nhập" class="btn btn-info btn-block">
							</div>
							<div class="col-md-2"></div>
							<div class="col-md-6">
								<input type="submit" value="Lấy lại Mật khẩu" class="btn btn-danger btn-block">
							</div>
						</p>
					</form>
					</div>
				</div>
			</div>
			<div class="col-md-3"></div>
		</div>
	</div>
</div>