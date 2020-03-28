<html lang="en">
<head>
	<title>เพิ่มสินค้า</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
        <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
        <link href="css/login.css" type="text/css" rel="stylesheet" media="screen,projection"/>
        <link href="css/buttons.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body class="gay">
    <script src="js/java.js">
            
    </script>
    <div class="row">
    <nav class="black" role="navigation">
    <div class="nav-wrapper container">
        <a id="logo-container" href="controItem.php" class="brand-logo">จัดการสินค้า</a>
      <ul class="right hide-on-med-and-down">
        <li><a href="#">|</a></li>
      </ul>
      <ul  class="right hide-on-med-and-down">
          <li><a data-target="nav-mobile" href="FormAdmin.php">หน้าแรก</a></li>
      </ul>
      <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
    </div>
  </nav>   
    </div>
    <center><a class="bodylogin">เพิ่มสินค้า</a></center>
     <hr class="headHR">
     <form class="login-form" action='inputItem.php' method='POST' enctype="multipart/form-data" name="formjs">
    <div class="reg2">
        <div class="reg3">
            <input type="text" placeholder="ชื่อสินค้า" name='item_name'>
            <input type="text" placeholder="ราคาสินค้า" name='item_price'>
            <input type="text" placeholder="ลักษณะสินค้า" name='item_detail'>
            <input type="text" placeholder="จำนวนสินค้า" name='item_amount'>
            <div class="file-field input-field">
                <div class="btn">
                    <span>เลือกรูปสินค้า</span>
                    <input type="file" name="fileToUpload" id="fileToUpload">
                 </div>
                <div class="file-path-wrapper">
                    <input class="file-path validate" type="text">
                </div>
            </div>
        </div>
    </div>
     <center>
         <button class="botY" value="2" name="button" onclick="return azz()">
                <a class="botN" >ยืนยัน</a>
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