<center>
	<h5>Thêm sản phẩm</h5>
</center>
<table class="table bordered">
 <form method="POST" action="modules/quanlysp/xuly.php" enctype="multipart/form-data">
  	<tr>
	  	<td>Tên sản phẩm</td>
	  	<td>
	  		<input required="true"class="form-control" type="text" name="tensanpham">
	  	</td>
  	</tr>
    <tr>
	  	<td>Mã sp</td>
	  	<td>
	  		<input required="true"type="text" name="masp"class="form-control">
	  	</td>
	  </tr>
	  <tr>
	  	<td>Giá sp</td>
	  	<td><input required="true"type="number" name="giasp"class="form-control"></td>
	  </tr>
	  <tr>
	  	<td>Xuất xứ</td>
	  	<td><input required="true"type="text" name="xuatxu"class="form-control"></td>
	  </tr>
	   <tr>
	  	<td>Hình ảnh</td>
	  	<td><input required="true"type="file" name="hinhanh"></td>
	  </tr>
	    <td>Danh mục sản phẩm</td>
	    <td>
	    	<select name="danhmuc">
	    		<?php
	    		$sql_danhmuc = "SELECT * FROM tbl_danhmuc ORDER BY id_danhmuc DESC";
	    		$query_danhmuc = mysqli_query($mysqli,$sql_danhmuc);
	    		while($row_danhmuc = mysqli_fetch_array($query_danhmuc)){
	    		?>
	    		<option value="<?php echo $row_danhmuc['id_danhmuc'] ?>"><?php echo $row_danhmuc['tendanhmuc'] ?></option>
	    		<?php
	    		} 
	    		?>
	    	</select>
	    </td>
	  </tr>
	  <tr>
	    <td>Tình trạng</td>
	    <td>
	    	<select name="tinhtrang">
	    		<option value="Còn hàng">Còn hàng</option>
	    		<option value="Hết hàng">Hết hàng</option>
	    	</select>
	    </td>
	  </tr>
	   <tr >
	    <td colspan="2"><input style="margin-left:600px" class="btn btn-success" type="submit" name="themsanpham" value="Thêm sản phẩm"></td>
	  </tr>
 </form>
</table>