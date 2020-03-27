<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="css/table.css">
        <title> Owner Page </title>
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
<!--        <form action="checkaction.php"  method="POST">-->
        <table>
            <tr><th>แก้ไข</th><th>ID</th><th>ชื่อ</th><th>นามสกุล</th><th>สถานะ</th><th>กระเป๋าตัง</th><th>ที่อยู่</th></tr>
            <?php
            while($row = mysqli_fetch_array($objquery)){
                echo "<tr>";
                //echo "<td><input type='checkbox' name='checkbox[]' value='".$row['mid']."'</td>";
                echo "<td><a href=FormInput.php?s=1&user=".$row['user_tel'].">แก้ไข</a></td>";
                echo "<td>".$row['user_id']."</td>";
                echo "<td>".$row['user_username']."</td>";
                echo "<td>".$row['user_pass']."</td>";
                echo "<td>".$row['user_name']."</td>";
                echo "<td>".$row['user_sex']."</td>";
                echo "<td>".$row['user_tel']."</td>";
                echo "<td>".$row['user_status']."</td>";
                echo "</tr>";
            }
            ?>
            
        </table>
        <center>
            <a href="FormInput.php"><button class ="button button1">เพิ่มสมาชิก</button></a>
            <a href="FormProduct.php"><button class ="button button1">คลังสินค้า</button></a>
            <a href=""><button class ="button button1">โปรโมชัน</button></a>
            <a href=""><button class ="button button1">การชำระเงิน</button></a>
        </center>
        <button class ="button button3"><a href="login.php" </a>Logout</button>
<!--    </from>-->
    </body>
</html>
