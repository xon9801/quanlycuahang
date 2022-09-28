<?php
	include('../../config/config.php');
	if(isset($_GET['code'])){
		$code_cart = $_GET['code'];
		$sql_update ="UPDATE tbl_cart SET cart_status=0 WHERE code_cart='".$code_cart."'";
		$query = mysqli_query($mysqli,$sql_update);
		header('Location:../../index.php?action=quanlydonhang&query=lietke');
	}
		if(isset($_GET['xacnhanhuy'])&& isset($_GET['madonhang'])){
			$cancel = $_GET['xacnhanhuy'];
			$madonhang= $_GET['madonhang'];
		  }else{
			$cancel = '';
			$madonhang = '';
		  }
		  $sql_update = "UPDATE tbl_cart SET cancel='".$cancel."' WHERE code_cart='$madonhang'";
			  mysqli_query($mysqli,$sql_update);
			  header('Location:../../index.php?action=quanlydonhang&query=lietke');		  

?>