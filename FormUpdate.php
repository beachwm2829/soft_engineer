<?php include('h.php');?>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="css/table.css">
    <title> Boy & Girl </title>
</head>
<body>
    <?php
        require_once './ConnectDB.php';
        error_reporting(E_ALL ^ E_NOTICE);
        $con = new connectDB();
        $user = $_REQUEST['user'];
        $text="UpdateNow";
        $sql = "select * from munber WHERE m_phone='".$user."'";
        $result = mysqli_query($con->connect(), $sql);
        $row = mysqli_fetch_array($result);
        ?>
    <div class="box">
        <div id="container">
              <?php
                        session_start();
                       // echo "User=".$_SESSION['user'];
                       // echo "<p>pass=".$_SESSION['pass'];
                        //echo "<p>status=".$_SESSION['status'];
            ?>
            <form action="checkaction.php" method="POST" name="FormUpdate">
                <script src="js/checkupdate.js"></script>

            <label class="LabelText" for="id">ชื่อ</label>
            <?php
                        echo "<input type='text' id=fname name ='fname' value='".$row['m_fname']."'>";
             ?>
            <label class="LabelText" for="id">นามสกุล</label>
            <?php
                        echo "<input type='text' id=lname name ='lname' value='".$row['m_lname']."'>";
             ?>
            <label class="LabelText" for="id">Password</label>
            <?php
                        echo "<input type='text' id=pass name ='pass' maxlength=20 value='".$row['m_password']."'>";
             ?>
            <label class="LabelText" for="id">เบอร์โทร</label>
            <?php
                        echo "<input type='text' id=phone name ='phone' maxlength=10 value='".$row['m_phone']."'>";
             ?>
            <label class="LabelText" for="id">ที่อยู่</label>
            <?php
                        echo "<input type='text' id=address name ='address' value='".$row['m_address']."'>";
             ?>
             <?php 
                    echo "<p><input type='submit' name='submit' value='".$text."' onclick='return checkUpdate()'>";
                    ?>
    </form>  
        </div>
    </div>
    <?php
        echo "<center><a href=FormUser.php?</a>กลับหน้าหลัก</center>";
     ?>
</body>
</html>
