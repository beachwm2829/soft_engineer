<?php include('h.php'); ?>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="css/botton.css">
        <link rel="stylesheet" type="text/css" href="css/table.css">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style type="text/css">
            input[type=number]{
                width:40px;
                text-align:center;
                color:red;
                font-weight:600;
            }
        </style>
    </head>
    <body>
        <?php
        error_reporting(E_ALL ^ E_NOTICE);
        session_start();
        require_once './ConnectDB.php';
        $user = $_SESSION['uid'];
        $status = $_SESSION['user_status'];
        $con = new connectDB();
        if ($con->connect()) {
            $sql = "SELECT * FROM `payment` WHERE `User _ID`='" . $user . "'";
            $objquery = mysqli_query($con->connect(), $sql);
        } else {
            echo 'connect failed:' . mysql_error();
        }
        ?>
        <div class="container">
            <div class="row">
                <?php include('banner.php'); ?>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <?php
                    session_start();
                    if (isset($_SESSION['uid'])) {
                        include('navbar_user.php');
                    } else {
                        include('navbar.php');
                    }
                    ?>
                </div>
            </div>
        </div>
        <table>
            <tr><th>แก้ไข</th><th>สินค้า</th><th>จำนวนเงิน</th><th>วันเวลา</th><th>สถานนะ</th></tr>
            <?php
            while ($row = mysqli_fetch_array($objquery)) {
                $sql = "SELECT * FROM `items` WHERE `item_id`='" . $row['Item_ID'] . "'";
                $objitem = mysqli_query($con->connect(), $sql);
                $row_item = mysqli_fetch_array($objitem);
                echo "<tr>";
                echo "<td><a href=payment.php?s=5&user=" . $row['Cdit_ID'] . ">ยกเลิกรายการ</a></td>";
                echo "<td>" . $row_item['item_name'] . "</td>";
                echo "<td>" . $row_item['item_price'] . "</td>";
                echo "<td>" . $row['Cdit_Date'] . "</td>";
                echo "<td>" . $row['Cdit_Status'] . "</td>";
                echo "</tr>";
            }
            ?>
            <?php
            echo "<CENTER><h1>" . $_SESSION['text'] . "</h1></CENTER>";
            ?>
        </table>
    </body>
</html>
