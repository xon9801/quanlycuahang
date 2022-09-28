<?php
include('../../config/config.php');

$tensanpham = $_POST['tensanpham'];
$masp = $_POST['masp'];
$giasp = $_POST['giasp'];
//xuly hinh anh
$hinhanh = $_FILES['hinhanh']['name'];
$hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
$hinhanh = time().'_'.$hinhanh;
$xuatxu = $_POST['xuatxu'];
$tinhtrang = $_POST['tinhtrang'];
$danhmuc = $_POST['danhmuc'];


if(isset($_POST['themsanpham'])){
	//them
	$masp_query = "SELECT * FROM tbl_sanpham WHERE masp='$masp' ";
		$masp_query_run = mysqli_query($mysqli, $masp_query);
		if(mysqli_num_rows($masp_query_run) > 0) {
			echo "
			<script> 
			 alert('Trùng mã sản phẩm');window.location='../../index.php?action=quanlysp&query=them' 
			</script>";	
		}else{
	    $sql_them = "INSERT INTO tbl_sanpham(tensanpham,masp,giasp,hinhanh,xuatxu,tinhtrang,id_danhmuc) VALUE('".$tensanpham."','".$masp."','".$giasp."','".$hinhanh."','".$xuatxu."','".$tinhtrang."','".$danhmuc."')";
	     mysqli_query($mysqli,$sql_them);
	       move_uploaded_file($hinhanh_tmp,'uploads/'.$hinhanh);
	      if($sql_them){
		  echo "<script> alert('Thêm thành công');window.location='../../index.php?action=quanlysp&query=them' </script>";
	}
}
}elseif(isset($_POST['suasanpham'])){
	//sua
	if(!empty($_FILES['hinhanh']['name'])){
		move_uploaded_file($hinhanh_tmp,'uploads/'.$hinhanh);
		
		$sql_update = "UPDATE tbl_sanpham SET tensanpham='".$tensanpham."',masp='".$masp."',giasp='".$giasp."',hinhanh='".$hinhanh."',xuatxu='".$xuatxu."',tinhtrang='".$tinhtrang."',id_danhmuc='".$danhmuc."' WHERE id_sanpham='$_GET[idsanpham]'";
		//xoa hinh anh cu
		$sql = "SELECT * FROM tbl_sanpham WHERE id_sanpham = '$_GET[idsanpham]' LIMIT 1";
		$query = mysqli_query($mysqli,$sql);
		while($row = mysqli_fetch_array($query)){
			unlink('uploads/'.$row['hinhanh']);
		}

	}else{
		$sql_update = "UPDATE tbl_sanpham SET tensanpham='".$tensanpham."',masp='".$masp."',giasp='".$giasp."',xuatxu='".$xuatxu."',tinhtrang='".$tinhtrang."',id_danhmuc='".$danhmuc."' WHERE id_sanpham='$_GET[idsanpham]'";
	}
	mysqli_query($mysqli,$sql_update);
	if($sql_update){
		echo "<script> alert('Sửa sản phẩm thành công');window.location='../../index.php?action=quanlysp&query=them' </script>";
	}
}else{
	$id=$_GET['idsanpham'];
	$sql = "SELECT * FROM tbl_sanpham WHERE id_sanpham = '$id' LIMIT 1";
	$query = mysqli_query($mysqli,$sql);
	while($row = mysqli_fetch_array($query)){
		unlink('uploads/'.$row['hinhanh']);
	}
	$sql_xoa = "DELETE FROM tbl_sanpham WHERE id_sanpham='".$id."'";
	mysqli_query($mysqli,$sql_xoa);
	header('Location:../../index.php?action=quanlysp&query=them');
}

?>