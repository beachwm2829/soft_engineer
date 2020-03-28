<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="css/table.css">
        <title> Boy & Girl </title>
    </head>
    <body>
        <?php
            session_start();
            require_once  './ConnectDB.php';
            $con = new connectDB();
            if ($con->connect()) {
                    $sql = "select * from user";
                    $objquery = mysqli_query($con->connect(), $sql);
            } else {
                        echo 'connect failed:' . mysql_error();
            }
            ?>
        <form action="checkaction.php"  method="POST">
        <table>
            <tr><th>ID</th><th>Username</th><th>ชื่อ</th><th>เพศ</th><th>เบอร์โทร</th><th>ที่อยู่</th><th>แก้ไข</th><th>ลบ</th></tr>
            <?php
            while($row = mysqli_fetch_array($objquery)){
                echo "<tr>";
                //echo "<td><input type='checkbox' name='checkbox[]' value='".$row['mid']."'</td>";
                echo "<td>".$row['user_id']."</td>";
                echo "<td>".$row['user_username']."</td>";
                echo "<td>".$row['user_name']."</td>";
                echo "<td>".$row['user_sex']."</td>";
                echo "<td>".$row['user_tel']."</td>";
                echo "<td>".$row['user_address']."</td>";
                echo "<td><a href=FormInput.php?s=1&user=".$row['user_id'].">แก้ไข</a></td>";
                echo "<td><input type='checkbox' name='checkbox[]' value='".$row['user_id']."'</td>";
                echo "</tr>";
            }
            ?>
            <?php
                       // echo "User=".$_SESSION['user'];
                        //echo "<p>pass=".$_SESSION['pass'];
                        //secho "<p>status=".$_SESSION['status'];
            ?>
        </table>
        <center>
            <input 
            <button class ="button button1"><a href="FormInput.php"</a>เพิ่มข้อมูล</button>
            <button class ="button button3"><a href="login.php" </a>Logout</button>
        </center>
        </form>
    <from>
        <button class ="button button2"><a href="controItem.php"</a>คลังสินค้า</button>
    </from>
    </body>
</html>
