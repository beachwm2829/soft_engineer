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
                    $sql = "select * from munber";
                    $objquery = mysqli_query($con->connect(), $sql);
            } else {
                        echo 'connect failed:' . mysql_error();
            }
            ?>
        <form action="checkaction.php"  method="POST">
        <table>
            <tr><th>แก้ไข</th><th>ID</th><th>ชื่อ</th><th>นามสกุล</th><th>สถานะ</th><th>กระเป๋าตัง</th><th>ที่อยู่</th></tr>
            <?php
            while($row = mysqli_fetch_array($objquery)){
                echo "<tr>";
                //echo "<td><input type='checkbox' name='checkbox[]' value='".$row['mid']."'</td>";
                echo "<td><a href=FormInput.php?s=1&user=".$row['m_phone'].">แก้ไข</a></td>";
                echo "<td>".$row['m_id']."</td>";
                echo "<td>".$row['m_fname']."</td>";
                echo "<td>".$row['m_lname']."</td>";
                echo "<td>".$row['m_status']."</td>";
                echo "<td>".$row['m_wallet']."</td>";
                echo "<td>".$row['m_address']."</td>";
                echo "</tr>";
            }
            ?>
            
            <?php
                       // echo "User=".$_SESSION['user'];
                        //echo "<p>pass=".$_SESSION['pass'];
                        //secho "<p>status=".$_SESSION['status'];
                        echo "<CENTER>".$_SESSION['text']."</CENTER>";
            ?>
        </table>
        <center>
            <button class ="button button1"><a href="FormInput.php"</a>เพิ่มข้อมูล</button>
            <button class ="button button2"><a href="FormProduct.php?"</a>คลังสินค้า</button>
        </center>
        <button class ="button button3"><a href="login.php" </a>Logout</button>
    </from>
    </body>
</html>
