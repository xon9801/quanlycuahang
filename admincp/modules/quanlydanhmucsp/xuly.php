<?php
include('../../config/config.php');

$tenloaisp = $_POST['tendanhmuc'];
$madanhmuc = $_POST['madanhmuc'];
if(isset($_POST['themdanhmuc'])){
	//them
	$madanhmuc_query = "SELECT * FROM tbl_danhmuc WHERE madanhmuc='$madanhmuc' ";
	$madanhmuc_query_run = mysqli_query($mysqli, $madanhmuc_query);
	if(mysqli_num_rows($madanhmuc_query_run) > 0) {
		echo "
		<script> 
		 alert('Trùng mã danh mục');window.location='../../index.php?action=quanlydanhmucsanpham&query=them' 
		</script>";	
	}else{
	$sql_them = "INSERT INTO tbl_danhmuc(tendanhmuc,madanhmuc) VALUE('".$tenloaisp."','".$madanhmuc."')";
	mysqli_query($mysqli,$sql_them);
	if($sql_them){
		echo "<script> alert('Thêm thành công');window.location='../../index.php?action=quanlydanhmucsanpham&query=them' </script>";
	}
}
}elseif(isset($_POST['suadanhmuc'])){
	//sua
	
	$sql_update = "UPDATE tbl_danhmuc SET tendanhmuc='".$tenloaisp."',madanhmuc='".$madanhmuc."' WHERE id_danhmuc='$_GET[iddanhmuc]'";
	mysqli_query($mysqli,$sql_update);
	if($sql_update){
		echo "<script> alert('Sửa danh mục thành công');window.location='../../index.php?action=quanlydanhmucsanpham&query=them' </script>";
	}
	//xoa
}else{

	$id=$_GET['iddanhmuc'];
	$sql_xoa = "DELETE FROM tbl_danhmuc WHERE id_danhmuc='".$id."'";
	mysqli_query($mysqli,$sql_xoa);
	header('Location:../../index.php?action=quanlydanhmucsanpham&query=them');
}

?>