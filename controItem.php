<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <title>ControItem</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/login.css" type="text/css" rel="stylesheet" media="screen,projection"/>
        <title></title>
    </head>
    <body>
<div class="row">
       <nav class="white" role="navigation">
    <div class="nav-wrapper container">
      <a id="logo-container" href="#" class="brand-logo">Herbs for life</a>
      <ul class="right hide-on-med-and-down">
          <li><a href="index.php">ออกจากระบบ</a></li>
      </ul>
      <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
    </div>
        </nav> 
      <div class="col s12 m4 l3"> <!-- Note that "m4 l3" was added -->
          <div class="bodycorom"> MENU </div>
          <HR>
          <div class="menu">  -->จัดการสินค้า </div>
          <HR>
          
      </div>

      <div class="col s12 m8 l9"> <!-- Note that "m8 l9" was added -->
          <div class="bodycorom"> จัดการสินค้า </div>
          <HR>
          <?php
            require_once 'ConnectDB.php';
            $conn = new ConnectDB();
            if($conn->connect()){
                echo"Connect";
                $sql="select * from items";
                $objquery= mysqli_query($conn->connect(), $sql);
            }
            else echo "Connect fail".myaqli_eror();
        ?>
          <form action="deleteItem.php" method="POST">
            
        <table>
            <tr>
                <th>ลบ</th><th>แก้ไข</th><th>ID</th><th>ชื่อสินค้า</th><th>ราคาสินค้า</th><th>ลักษณะ</th><th>จำนวนสินค้า</th>
            </tr>
            
            <?php
            while($row= mysqli_fetch_array($objquery)){
                echo "<tr>"; 
                echo "<td><p><label><input type='checkbox' name='checkbox' value='".$row['item_id']."'><span></span></label></p></td>";
                echo "<td><a href = reg_1.php?s=1&id=".$row['item_id'].">แก้ไข</td>";
                echo "<td>".$row['item_id']."</td>";  
                echo "<td>".$row['item_name']."</td>";
                echo "<td>".$row['item_price']."</td>";
                echo "<td>".$row['item_detail']."</td>";
                echo "<td>".$row['item_amount']."</td>";
                echo "</tr>";
            }
            
            ?>
            
        </table>
            <br>
    <center>
        <button class="botR"><a class="botN">ลบ</a></button>
            </form>
    </center>
            <center>
                <br>
                <button class="botG"><a href="reg_2.php" class="botN">เพิ่มข้อมูล</a></button>
            </center>
      </div>

</div>
    <footer class="food"> 
            <div class="footer-copyright">
            <div class="container">
            Made by <a class="brown-text text-lighten-3">© Phonlawat Khunjorn</a>
            </div>
            </div>
        </footer>
    </body>
</html>
