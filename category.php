<?php
 require_once  './ConnectDB.php';
error_reporting(E_ALL ^ E_NOTICE);
$con = new connectDB();
$sql = "SELECT * FROM type ORDER BY ty_id ASC";
$typeprd = mysqli_query($con->connect(), $sql);
$row_typeprd = mysqli_fetch_assoc($typeprd);
$totalRows_typeprd = mysqli_num_rows($typeprd);
?>
<div class="list-group">
              <a href="index.php?t_id=<?php echo '';?>" class="list-group-item active">หมวดสินค้า</a>
              
<?php do { ?>
                <a href="index.php?tid=<?php echo $row_typeprd['ty_id'];?>&type-name=<?php echo $row_typeprd['ty_name'];?>" class="list-group-item"> <?php echo $row_typeprd['ty_name']; ?></a>
<?php } while ($row_typeprd = mysqli_fetch_assoc($typeprd)); ?>
                <a href="login.php" class="list-group-item list-group-item-success"> login </a>      
</div>
<?php
mysqli_free_result($typeprd);
?>
