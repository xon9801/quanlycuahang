<?php
	$sql_sua_danhmucsp = "SELECT * FROM tbl_danhmuc WHERE id_danhmuc='$_GET[iddanhmuc]' LIMIT 1";
	$query_sua_danhmucsp = mysqli_query($mysqli,$sql_sua_danhmucsp);
?>
<center>
  <h5>Sửa danh mục sản phẩm</h5>
</center>
<table class="table bordered">
 <form method="POST" action="modules/quanlydanhmucsp/xuly.php?iddanhmuc=<?php echo $_GET['iddanhmuc'] ?>">
 	<?php
 	while($dong = mysqli_fetch_array($query_sua_danhmucsp)) {
 	?>
	  <tr >
	  	<td style="text-align:center">Tên danh mục</td>
	  	<td>
	  	<input type="text" value="<?php echo $dong['tendanhmuc'] ?>" name="tendanhmuc">
	  	</td>
	  </tr>
	  <tr>
	    <td style="text-align:center">Thứ tự</td>
	    <td  >
	    <input type="text" value="<?php echo $dong['madanhmuc'] ?>" name="madanhmuc">
	    </td>
	  </tr>
	   <tr >
	    <td colspan="2"><input  style="float:right" type="submit"class="btn btn-success"name="suadanhmuc" value="Sửa danh mục sản phẩm"></td>
	  </tr>
 </form>
</table>
	  
	  <?php
	  } 
	  ?>

 </form>
</table>