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
        include('navbar.php');
        $t_id = $_GET['itemid'];
        require_once './ConnectDB.php';
        $con = new connectDB();
        $query_prd = "SELECT * FROM items WHERE item_id=$t_id";
        $prd = mysqli_query($con->connect(), $query_prd) or die(mysql_error());
        $row_prd = mysqli_fetch_assoc($prd);
        $totalRows_prd = mysqli_num_rows($prd);
        ?>
        <!--start show  product--> 
        <div class="container">
            <div class="row">
                <div class="col-12">
            <div class="panel panel-info">
                <div class="panel-heading">    
                    <div class="row">
                        <div class="col-sm" align="left">
                            <img src="fileupload/<?php echo $row_prd['img']; ?>" width="40%" style="margin-left: 20px"/>
                        </div>
                        <div class="col-sm" align="right">
                             <img src="fileupload/<?php echo $row_prd['img']; ?>" width="40%" style="margin-left: 20px"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
                </div></div>
        
<!--         <div class="row">
                        <div class="col-sm" align="left">
                            <img src="fileupload/<?php // echo $row_prd['img']; ?>" width="40%" style="margin-left: 20px"/>
                        </div>
                        <div class="col-sm" align="right">
                            <h5><?php // echo $row_prd['item_name']; ?></h5>
                            <a href="index.php" class="btn btn-info" style="margin-left: 22%"> ทั้งหมด </a>
                        </div>
                    </div>-->
        <!--end show  product-->
    </body>
</html>
<?php include('f.php'); ?>