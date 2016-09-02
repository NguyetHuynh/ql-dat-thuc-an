<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<meta charset="utf-8">
	<!-- Boostrap CSS -->
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
	<header>
		<div class="container">
			<div class="col-md-3">
				<img src="logo.png" alt="logo">
			</div>
			<div class="col-md-7">
				<h1>NHÀ HÀNG CỦA TÔI</h1>
			</div>
		</div>
	</header><!--./header-->
	
	<section id="main">
		<div class="container">
			<div class="col-md-3 col-sm-0"></div>
			<!--Login form-->
			<div class="col-md-6 col-sm-12 center-form">
				<form action="" method="POST" role="form">
					<legend>Đăng Nhập</legend>
				
					<div class="form-group">
						<label for="">Mã nhân viên</label>
						<input type="text" class="form-control" id="" placeholder="Mã nhân viên" required>
					</div>
				
					<div class="form-group">
						<label for="">Mật khẩu</label>
						<input type="password" class="form-control" id="" placeholder="Mật khẩu" required>
					</div>
					
					<button type="submit" class="btn btn-link">Quên mật khẩu</button>
					<button type="submit" class="btn btn-primary">Đăng Nhập</button>
				</form>
			</div>
			<div class="col-md-3 col-sm-0"></div>
		</div><!--./container-->	
		
	</section><!--./#main-->

	<footer>
		
	</footer><!--./footer-->
	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<!-- Latest compiled JavaScript -->
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>
