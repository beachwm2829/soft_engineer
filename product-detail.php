<?php include('h.php'); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
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
        session_start();
        if (isset($_SESSION['uid'])) {
            include('navbar_user.php');
        } else {
            include('navbar.php');
        }
        $t_id = $_GET['itemid'];
        require_once './ConnectDB.php';
        $con = new connectDB();
        $query_prd = "SELECT * FROM items WHERE item_id=$t_id";
        $prd = mysqli_query($con->connect(), $query_prd) or die(mysql_error());
        $row_prd = mysqli_fetch_assoc($prd);
        $totalRows_prd = mysqli_num_rows($prd);
        $_SESSION['tid'] = $row_prd['item_id'];
        ?>
        <!--start show  product--> 
        <div class="container" >
            <div class="card" style="background-color: white;">
                <div class="card-header" align="center" style=" height: 100px;">
                    <br>
                    <h1><?php echo $row_prd['item_name']; ?></h1>
                    <br>
                </div>
                <div class="card-body"><div class="container" >

                        <div class="row">
                            <div class="col-sm-4"> 
                                <img src="fileupload/<?php echo $row_prd['img']; ?>" width="100%" style="margin-left: 20px"/>
                            </div>
                            <div class="col-sm-8">
                                <div align="center">
                                    <h3 align="left">รายละเอียดสินค้า : <?php echo $row_prd['item_detail']; ?></h3>
                                    <h2 align="left">ราคา : <?php echo $row_prd['item_price']; ?> บาท</h2>
                                </div>
                            </div>
                        </div>

                    </div></div>
                <div class="card-footer">
                    <div align="center">
                        <br>
                        <a href="payment.php" class="btn btn-info" style="width: 300px;"> สั่งซื้อ </a>
                        <br>
                        <br>
                    </div>
                </div>


                <div class="container" >


                </div>

            </div>
    </body>
</html>
<?php include('f.php'); ?>

