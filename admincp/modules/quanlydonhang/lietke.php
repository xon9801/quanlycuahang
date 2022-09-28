
<?php
	$sql_lietke_dh = "SELECT * FROM tbl_cart,tbl_dangky WHERE tbl_cart.id_khachhang=tbl_dangky.id_dangky ORDER BY tbl_cart.id_cart DESC";
	$query_lietke_dh = mysqli_query($mysqli,$sql_lietke_dh);
?>
<center>
  <h5>Liệt kê đơn hàng</h5>
</center>
<table class="table bordered">
  <thead class="thead-dark">
  <tr>
  	<th>Id</th>
    <th>Mã đơn hàng</th>
    <th>Tên khách hàng</th>
    <th>Địa chỉ</th>
    <th>Số điện thoại</th>
    <th>Ngày đặt</th>
    <th>Tình trạng</th>
    <th>Hủy đơn</th>
  	<th>Quản lý</th>
  </tr>
  </thead>
  <?php
  $i = 0;
  while($row = mysqli_fetch_array($query_lietke_dh)){
  	$i++;
  ?>
  <tr>
  	<td><?php echo $i ?></td>
    <td><?php echo $row['code_cart'] ?></td>
    <td><?php echo $row['tenkhachhang'] ?></td>
    <td><?php echo $row['diachi'] ?></td>
   
    <td><?php echo $row['dienthoai'] ?></td>
    <td><?php echo $row['ngaythang'] ?></td>
    <td>
    	<?php if($row['cart_status']==1){
    		echo '<a href="modules/quanlydonhang/xuly.php?code='.$row['code_cart'].'">Đơn hàng mới</a>';
    	}else{
    		echo 'Đã xử lý';
    	}
    	?>
    </td>
    <td>
    	<?php if($row['cancel']==0){ }elseif($row['cancel']==1){
        echo'<a href="modules/quanlydonhang/xuly.php?madonhang='.$row['code_cart'].'&xacnhanhuy=2">Xác nhận hủy đơn</a>';
      }else{
        echo 'Đã hủy';
      }
       ?></td>
   	<td>
   		<a class="btn btn-primary" href="index.php?action=donhang&query=xemdonhang&code=<?php echo $row['code_cart'] ?>">Xem đơn hàng</a>
    
       
   	</td>
   
  </tr>
  <?php
  } 
  ?>
 
</table>