<html lang="en">
<head>
        <?php 
        error_reporting(E_ALL^E_NOTICE);
        require_once './ConnectDB.php';
        ?>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
        <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
        <link href="css/login.css" type="text/css" rel="stylesheet" media="screen,projection"/>
        <link href="css/buttons.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body class="gay">
     <script src="java.js">
            
     </script>
    <?php
        $s=$_REQUEST['s'];
        $id=$_REQUEST['id'];
        $conn = new ConnectDB();
        if($s==1){
            $text="Update";
            $sql = "select * from items where item_id ='".$id."'";
            $result = mysqli_query($conn->connect(),$sql);
            $row= mysqli_fetch_array($result);
        }
        else $text="Insert";
        ?>
    <div class="row">
    <nav class="white" role="navigation">
    <div class="nav-wrapper container">
      <a id="logo-container" href="#" class="brand-logo">Herbs for life</a> 
      <ul  class="right hide-on-med-and-down">
          <li><a data-target="nav-mobile" href="manu_2.php">กลับ</a></li>
      </ul>
      <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
    </div>
  </nav>   
    </div>
    <center><a class="bodylogin">แก้ไขสินค้า</a></center>
     <hr class="headHR">
     <form class="login-form" action='UpdeatItem.php' enctype="multipart/form-data" method='POST' name="formjs">
    <div class="reg2">
        <div class="reg3">
            
            <center>
                    <img src="<?php echo $row['img']; ?>" alt="Unsplashed background img 1" width="50%" height="50%">
            </center> 
            <input type="text" placeholder="ชื่อสินค้า" name='item_name' value="<?php echo $row['item_name']; ?>">
            <input type="text" placeholder="ราคาสินค้า" name='item_price' value="<?php echo $row['item_price']; ?>">
            <input type="text" placeholder="ลักษณะสินค้า" name='item_detail' value="<?php echo $row['item_detail']; ?>">
            <input type="text" placeholder="จำนวนสินค้า" name='item_amount' value="<?php echo $row['item_amount']; ?>">
            <input type="hidden" name='img' value="<?php echo $row['img']; ?>">
            <div class="file-field input-field">
                <div class="btn">
                    <span>เลือกรูปสินค้า</span>
                    <input type="file" name="fileToUpload"  id="fileToUpload">
                 </div>
                <div class="file-path-wrapper">
                    <input class="file-path validate" type="text">
                </div>
            </div>
        </div>
    </div>
     <center>
         <button class="botY" value="<?php echo $id; ?>" name="button" onclick="return azz()>
                <a class= "botN" >ยืนยัน</a>
        </button>
     </center>
     </form>
     <br><br><br>
     <footer class="food"> 
            <div class="footer-copyright">
            <div class="container">
            Made by <a class="brown-text text-lighten-3">© Phonlawat Khunjorn</a>
            </div>
            </div>
        </footer>
</body>
</html>