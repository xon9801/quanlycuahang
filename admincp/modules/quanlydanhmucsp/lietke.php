<?php
	$sql_lietke_danhmucsp = "SELECT * FROM tbl_danhmuc ORDER BY madanhmuc DESC";
	$query_lietke_danhmucsp = mysqli_query($mysqli,$sql_lietke_danhmucsp);
?>
<center>
  <h5>Liệt kê danh mục sản phẩm</h5>
</center>
<table class="table bordered">
  <thead class="thead-dark">
    <tr>
    <th ></th>
    <th width="25%" >Id</th>
    <th width="25%">Mã danh mục</th>
    <th width="35%">Tên danh mục</th>
    <th width="15%">Quản lý</th>
  </tr>
  </thead>
  <?php
  $i = 0;
  while($row = mysqli_fetch_array($query_lietke_danhmucsp)){
  	$i++;
  ?>
  <tr>
    <td><?php ?></td>
  	<td><?php echo $i ?></td>
    <td><?php echo $row['madanhmuc'] ?></td>
    <td><?php echo $row['tendanhmuc'] ?></td>
   	<td>
     <a class="btn btn-warning" href="?action=quanlydanhmucsanpham&query=sua&iddanhmuc=<?php echo $row['id_danhmuc'] ?>">Sửa</a> 
   		<a class="btn btn-danger" onclick="if (confirm('Bạn có chắc muốn xoá danh mục này không?')) window.location.href='modules/quanlydanhmucsp/xuly.php?iddanhmuc=<?php echo $row['id_danhmuc'] ?>';">Xoá</a> 
       
   	</td>
   
  </tr>
  <?php
  } 
  ?>
 
</table>
