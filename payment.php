<?php

session_start();
require_once './ConnectDB.php';
error_reporting(E_ALL ^ E_NOTICE);
$uid = $_SESSION['uid'];
$tid = $_SESSION['tid'];

$date = date("Y-m-d H:i:s");
$status = "รอดำเนินการ";
if (isset($_SESSION["uid"])) {
    $con = new ConnectDB();
    $query_prd = "SELECT * FROM items WHERE item_id='" . $_SESSION['tid'] . "'";
    $prd = mysqli_query($con->connect(), $query_prd) or die(mysql_error());
    $row_prd = mysqli_fetch_assoc($prd);
    $totalRows_prd = mysqli_num_rows($prd);
    $con->AddPayment($uid, $tid, $date, $row_prd['item_price'], $row_prd['img'], $status);
} else {
    echo '<script language="javascript">';
    echo 'alert("กรุณาเข้าสู่ระบบ");window.location="login.php"';
    echo '</script>';
}
?>


