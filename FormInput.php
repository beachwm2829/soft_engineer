<html>
<head>
    <link rel="stylesheet" type="text/css" href="css/table.css">
    <title> Boy & Girl </title>
    <script src="js/checkinput.js"></script>
</head>
<body>
    <?php
        require_once './ConnectDB.php';
        error_reporting(E_ALL ^ E_NOTICE);
        $con = new connectDB();
        $s = $_REQUEST['s'];
        $user = $_REQUEST['user'];
        if($s == 1){
            $text="Update";
            $sql = "select * from munber WHERE m_phone='".$user."'";
            $result= mysqli_query($con->connect(), $sql);
            $row= mysqli_fetch_array($result);
            $position=$row['m_status'];
        }else if ($s == 2){
            $text="สมัครสมาชิก";
        }else {
            $text="Insert";
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
            <form name="FormInput" action="checkaction.php" method="POST" onsubmit="return checkformInput()">
            <label class="LabelText" for="id">ID</label>
            <?php
                        echo "<input type='text' id='mid' name ='mid'  disabled='disabled' value='".$row['m_id']."' >";
             ?>
            <label class="LabelText" for="id">PASSWORD</label>
            <?php
                        echo "<input type='password' id='pass' name ='pass' value='".$row['m_password']."'>";
             ?>
            <label class="LabelText" for="id">ชื่อ</label>
            <?php
                        echo "<input type='text' id='fname' name='fname' value='".$row['m_fname']."'>";
             ?>
            <label class="LabelText" for="id">นามสกุล</label>
            <?php
                        echo "<input type='text' id='lname' name ='lname' value='".$row['m_lname']."'>";
             ?>
           <label class="LabelText" for="id">เบอร์โทร</label>
            <?php
                        echo "<input type='text' id='phone' name ='phone' maxlength=10 value='".$row['m_phone']."'>";
             ?>
           <label class="LabelText" for="id">ที่อยู่</label>
            <?php
                        echo "<input type='text' id='address' name ='address' value='".$row['m_address']."'>";
             ?>
            <label class="LabelText" for="id">สถานะ</label>
            <input type="radio" name="status" value="Admin" <?php echo ($row['m_status']=='Admin')?'checked' : ' ' ?>>Admin
            <input type="radio" name="status" value="User" <?php echo ($row['m_status']=='User')?'checked' : ' ' ?>>User
                 <?php 
                    echo "<p><input type='submit' name='submit' value='".$text."'onclick=''>";
                    ?>
    </form>             
        </div>
    </div>
    <?php
    if($text=="สมัครสมาชิก"){}
    else if ($_SESSION['m_status']=="User"){
        echo "<center><a href=information.php?</a>ยกเลิก</center>";
    }else{
        echo "<center><a href=FormAdmin.php?</a>กลับหน้าหลัก</center>";
    }     
     ?>
</body>
</html>