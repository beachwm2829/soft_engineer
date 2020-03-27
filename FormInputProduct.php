<html>
<head>
    <link rel="stylesheet" type="text/css" href="css/table.css">
    <link rel="stylesheet" type="text/css" href="css/imagecss.css">
    <title> Boy & Girl </title>
</head>
<body>
    <?php
        require_once './ConnectDB.php';
        error_reporting(E_ALL ^ E_NOTICE);
        $iid = $_REQUEST['iid'];
        $con = new connectDB();
            $sql = "select * from product WHERE p_id ='".$iid."'";
            $result= mysqli_query($con->connect(), $sql);
            $row= mysqli_fetch_array($result);
            $s = $_REQUEST['s'];
            if($s == 1){
                $text="UpdateProduct";
            }else{
                $text="AddProduct";
            }
        ?>
    <div class="box">
        <div id="container">
              <?php
                        session_start();
                        require_once './ConnectDB.php';
                        error_reporting(E_ALL ^ E_NOTICE);
                        echo "<CENTER>".$_REQUEST['text']."</CENTER>";
                        //echo "User=".$_SESSION['user'];
                        //echo "<p>pass=".$_SESSION['pass'];
                       //echo "<p>status=".$_SESSION['status'];
                        
            ?>
            <form name="FormInputProduct" action="checkaction.php" method="POST" enctype="multipart/form-data">
                <script src="newjavascript.js"></script>
           <label class="LabelText" for="id">ID</label>
            <?php
                        echo "<input type='text' id=iid name ='iid' value='".$row['p_id']."'>";
             ?>
           <label class="LabelText" for="id">รูปสินค้า</label>
            <?php
                    echo "<input type='file' name='upload[]' if='fileupload' multiple='muliple' size='45'>";
                   # echo "<input type='text' value='".$row['image']."'>";
                        ##echo "<input type='file' id=image name ='image' value='".$row['image']."'>";
             ?>
            <label class="LabelText" for="id">ชื่อสินค้า</label>
            <?php
                        echo "<input type='text' id=name name ='name' maxlength=20 value='".$row['p_name']."'>";
             ?>
            <label class="LabelText" for="id">ประเภท</label>
            <?php
                        echo "<input type='text' id=type name ='type' value='".$row['p_type']."'>";
             ?>
           <label class="LabelText" for="id">ราคา</label>
            <?php
                        echo "<input type='text' id=price name ='price' value='".$row['p_price']."'>";
             ?>
            <label class="LabelText" for="id">จำนวนสินค้า</label>
            <?php
                        echo "<input type='text' id=amount name ='amount' value='".$row['p_amount']."'>";
             ?>
                 <?php 
                    echo "<p><input type='submit' name='submit' value='".$text."'>";
                    ?>
    </form>             
        </div>
    </div>
    <?php
        echo "<center><a href=FormProduct.php?</a>กลับหน้าหลัก</center>";
     ?>
</body>
</html>