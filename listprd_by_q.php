<?php
$q = $_GET['q'];
 require_once  './ConnectDB.php';
 $con = new connectDB();
$sql = "SELECT * FROM items WHERE item_name LIKE '%$q%' ORDER BY item_id ASC";
$prd = mysqli_query($con->connect(), $sql);
$row_prd = mysqli_fetch_assoc($prd);
$totalRows_prd = mysqli_num_rows($prd);
?>
<?php do { ?>
  <div class="col-sm-4" align="center">
      <img src="fileupload/<?php echo $row_prd['img'];?>" width="80%" />
    <p align="center">
      <b><?php echo $row_prd['item_name']; ?> <font color="red">  <?php echo $row_prd['item_price']; ?>  บาท </font> </b>
      <br />
      <a href="product-detail.php?type=<?php echo $row_prd['item_type'];?>&act=product-detail" class="btn btn-info btn-xs" target="_blank"> สั่งซื้อ </a>
      <br><br>
      </p>
    </div>
  <?php } while ($row_prd = mysqli_fetch_assoc($prd)); ?>
<?php
mysqli_free_result($prd);
?>
