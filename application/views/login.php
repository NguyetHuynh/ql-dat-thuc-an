<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<meta charset="utf-8">
	<!-- Boostrap CSS -->
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo public_url() ?>style/login.css">
</head>
<body>
	<h1 class="text-center">Nhà Hàng Nguyệt Huỳnh</h1>

	<section class="container">
		<div class="row" id="main" >

			<!--Login form-->
			<div class="col-md-6 col-md-offset-3 col-sm-12 center-form">
				<form action="" method="post" role="form">
					<legend class="text-center">Đăng Nhập</legend>
				
					<div class="form-group">
						<label for="ID">Mã nhân viên</label>
                                                <input type="text" pattern="(\d){1,255}" class="form-control" id="ID" name="ID" placeholder="Mã nhân viên" required>
					</div>
				
					<div class="form-group">
						<label for="pass">Mật khẩu</label>
						<input type="password" class="form-control" id="pass" name="password" placeholder="Mật khẩu" required>
					</div>
                                        <div class="error" style="color: #F50808"><?php echo form_error('login')?></div>
					<button type="submit" class="btn btn-primary btn-block">Đăng Nhập</button>
				</form>
			</div>
		</div><!--./container-->	
		
	</section><!--./#main-->
	s
	<div class="clear-fix"></div>

	<footer>
		<p class="text-center">&copy Nguyet Huynh 2016</p>
	</footer><!--./footer-->
	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<!-- Latest compiled JavaScript -->
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>