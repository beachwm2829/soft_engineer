<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="css/botton.css">
        <link rel="stylesheet" type="text/css" href="css/table.css">
       <title> Boy & Girl </title>
    </head>
    <body>
        <?php
             error_reporting(E_ALL ^ E_NOTICE);
            session_start();
            require_once  './ConnectDB.php';
            $user = $_SESSION['user'];
            $status = $_SESSION['user_status'];
            $con = new connectDB();
            if ($con->connect()) {
                    $sql = "SELECT * FROM user WHERE user_username='".$user."'";
                    $objquery = mysqli_query($con->connect(), $sql);
            } else {
    echo 'connect failed:' . mysql_error();
}
?>
        <table>
            <tr><th>แก้ไข</th><th>Username</th><th>ชื่อ</th><th>เพศ</th><th>เบอร์โทร</th><th>ที่อยู่</th></tr>
            <?php
            while($row = mysqli_fetch_array($objquery)){
                echo "<tr>";
                //echo "<td><input type='checkbox' name='checkbox[]' value='".$row['mid']."'</td>";
                echo "<td><a href=FormInput.php?s=1&user=".$row['user_username'].">แก้ไข</a></td>";
                echo "<td>".$row['user_username']."</td>";
                echo "<td>".$row['user_name']."</td>";
                echo "<td>".$row['user_sex']."</td>";
                echo "<td>".$row['user_tel']."</td>";
                echo "<td>".$row['user_address']."</td>";
                echo "</tr>";
            }
            ?>
            <?php
                        echo "<CENTER><h1>".$_SESSION['text']."</h1></CENTER>";
            ?>
        </table>
    </body>
</html>
