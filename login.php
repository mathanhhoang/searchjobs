﻿<?php include 'inc/header.php' ?>
<head>
	<link href="css/register.css" rel="stylesheet" type="text/css" media="all" />
</head>

<div class="main-w3layouts wrapper">
	<h1>Đăng nhập</h1>
	<div class="main-agileinfo">
		<div class="agileits-top">
			<form action="#" method="post">
				<input class="text email" type="email" name="email" placeholder="Email" required="">
				<input class="text" type="password" name="password" placeholder="Password" required="">
				<div class="wthree-text">
					<br><br/>
					<label class="anim">
						<input type="checkbox" class="checkbox" required="">
						<span>Nhớ mật khẩu?</span>
					</label>
					<div class="clear"> </div>
				</div>
				<input type="submit" value="ĐĂNG NHẬP">
			</form>
			<p>Bạn chưa có tài khoản?<a href="register.php"> Đăng kí</a></p>
		</div>
	</div>
</div>
<?php include 'inc/footer.php'; ?>
<meta charset ="utf8">
<?php
	$taikhoan = $_POST['email'];
	$matkhau = $_POST['password'];
	//
	$kn = mysqli_connect("localhost","root","","a") or die("Không thể kết nối");
	mysqli_select_db($kn, "a");
	//
	mysqli_query($kn,"SET NAMES 'utf8'");
	//
	$caulenh ="SELECT * FROM taikhoan WHERE EMAIL = '".$taikhoan."'";
	//
	$kq = mysqli_query($kn,$caulenh);
	//
	if($dong = mysqli_fetch_array($kq))
	{
		if($dong['MATKHAU']==$matkhau)
		{
			header('Location: http://localhost:81/searchjobs/');
		}
		else
			echo"Sai password";
	}
	else
		echo"Tài khoản chưa tồn tại";
?>