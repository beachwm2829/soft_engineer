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
                    $sql = "select * from items";
                    $objquery = mysqli_query($con->connect(), $sql);
            } else {
                        echo 'connect failed:' . mysql_error();
            }
            ?>
        <form action="checkaction.php"  method="POST">
        <table>
            <tr><th>แก้ไข</th><th>ID</th><th>ชื่อ</th><th>ราคา</th><th>จำนวน</th><th>ประเภท</th><th>ตำแหน่งรูป</th></tr>
            <?php
            while($row = mysqli_fetch_array($objquery)){
                echo "<tr>";
                //echo "<td><input type='checkbox' name='checkbox[]' value='".$row['mid']."'</td>";
                echo "<td><a href=FormInputProduct.php?s=1&iid=".$row['item_id'].">แก้ไข</a></td>";
                echo "<td>".$row['item_id']."</td>";
                echo "<td>".$row['item_name']."</td>";
                echo "<td>".$row['item_price']."</td>";
                echo "<td>".$row['item_amount']."</td>";
                echo "<td>".$row['item_type']."</td>";
                echo "<td>".$row['img']."</td>";
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
            <button class ="button button1"><a href="FormInputProduct.php"</a>เพิ่มข้อมูล</button>
        </center>
        </form>
    <from>
        <button class ="button button3"><a href="FormAdmin.php" </a>กลับหน้าหลัก</button>
    </from>
    </body>
</html>
