<?php
	$sql_lietke_sp = "SELECT * FROM tbl_sanpham,tbl_danhmuc 
  WHERE tbl_sanpham.id_danhmuc=tbl_danhmuc.id_danhmuc ORDER BY id_sanpham DESC";
	$query_lietke_sp = mysqli_query($mysqli,$sql_lietke_sp);
?>
<center>
  <h5>Liệt kê  sản phẩm</h5>
</center>
<table class="table bordered">
  <thead class="thead-dark">
    <tr>
    <th>Id</th>
    <th>Mã sp</th>
    <th>Tên sản phẩm</th>
    <th>Hình ảnh</th>
    <th>Giá sp</th>
    <th>Xuất xứ</th>
    <th>Danh mục</th>
    <th>Tình trạng</h>
    <th>Quản lý</th>
  </tr>
  </thead>
  <?php
  $i = 0;
  while($row = mysqli_fetch_array($query_lietke_sp)){
  	$i++;
  ?>
  <tr>
  	<td><?php echo $i ?></td>
    <td><?php echo $row['masp'] ?></td>
    <td><?php echo $row['tensanpham'] ?></td>
    <td><img src="modules/quanlysp/uploads/<?php echo $row['hinhanh'] ?>" width="150px"></td>
    <td><?php echo $row['giasp'] ?></td>
    <td><?php echo $row['xuatxu'] ?></td>
    <td><?php echo $row['tendanhmuc'] ?></td>
    
    <td><?php if($row['tinhtrang']=='Còn hàng'){
        echo 'Còn hàng';
      }else{
        echo 'Hết hàng';
      } 
      ?>
      
    </td>
   	<td>
   		
      <a class="btn btn-warning" href="?action=quanlysp&query=sua&idsanpham=<?php echo $row['id_sanpham'] ?>">Sửa</a> 
      <a class="btn btn-danger"  onclick="if (confirm('Bạn có chắc muốn sản phẩm này không?')) window.location.href='modules/quanlysp/xuly.php?idsanpham=<?php echo $row['id_sanpham'] ?>';">Xoá</a> 
   	</td>
   
  </tr>
  <?php
  } 
  ?>
 
</table>