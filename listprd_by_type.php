<?php //require_once('Connections/condb.php'); ?>
<?php

$t_id = $_GET['tid'];
require_once  './ConnectDB.php';
$con = new connectDB();
$query_prd = "SELECT * FROM items WHERE item_type=$t_id ORDER BY item_type ASC";
$prd = mysqli_query($con->connect(),$query_prd) or die(mysql_error());
$row_prd = mysqli_fetch_assoc($prd);
$totalRows_prd = mysqli_num_rows($prd);

if($totalRows_prd > 0) { ?>

<?php do { ?>
  <div class="col-sm-4" align="center">
      <img src="fileupload/<?php echo $row_prd['p_image'];?>" width="80%" />
    <p align="center">
      <b><?php echo $row_prd['p_name']; ?> <font color="red">  <?php echo $row_prd['p_price']; ?>  บาท </font> </b>
      <br />
      <a href="product-detail.php?iid=<?php echo $row_prd['p_id'];?>&act=product-detail" class="btn btn-info btn-xs" target="_blank">สั่งซื้อ </a>
      
     
      
      <br><br>
      </p>
    </div>
  <?php } while ($row_prd = mysqli_fetch_assoc($prd)); ?>

  <?php } else{
      echo "<h4 align='center'>";
      echo "ไม่มีสินค้า";
      echo "</h4>";
   }?>
<?php
mysqli_free_result($prd);
?>
