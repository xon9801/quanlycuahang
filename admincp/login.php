<?php
	session_start();
	include('config/config.php');
	if(isset($_POST['dangnhap'])){
		$taikhoan = $_POST['username'];
		$matkhau = md5($_POST['password']);
		$sql = "SELECT * FROM tbl_admin WHERE username='".$taikhoan."' AND password='".$matkhau."' LIMIT 1";
		$row = mysqli_query($mysqli,$sql);
		$count = mysqli_num_rows($row);
		if($count>0){
			$_SESSION['dangnhap'] = $taikhoan;
			header("Location:index.php");
		}else{
			echo '<script>alert("Tài khoản hoặc Mật khẩu không đúng,vui lòng nhập lại.");</script>';
			header("Location:login.php");
		}
	} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<p>tài khoản đăng nhập : admin</p>
	<p>password : 123456789</p>
	<title>Đăng nhập Admincp</title>
	<link rel="stylesheet" type="text/css" href="css/login.css">
</head>
<body>
	<center>
    <table id="main">
    <form action=""autocomplete="off" method="POST" >
        <tr>
            <td><h2>Đăng nhập</h2></td>
        </tr>
    <tr>
        <td><input required="true" type="text" name="username" placeholder="Tên đăng nhập...">
        </td>
    </tr>
    <tr>
        <td><input required="true" type="password" name="password" placeholder="Nhập mật khẩu...">
        </td>
    </tr>

    
    <tr>
        <td colspan="3" align="center">

            <button id="login"type="submit" name="dangnhap">Đăng nhập</button>
            <button  id="login"type="submit" ><a style="color:white; text-decoration:none" text href="../index.php">Trang chủ</a></button>
        </td>
    </tr>
    
    </form>
    <table>
    </center>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</body>
</html>
