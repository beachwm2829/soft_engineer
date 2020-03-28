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
            $sql = "select * from user WHERE user_id='".$user."'";
            $result= mysqli_query($con->connect(), $sql);
            $row= mysqli_fetch_array($result);
            $position=$row['user_status'];
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
            <label class="LabelText" for="id">ID <?php echo $row['user_id']; ?></label>            
            <label class="LabelText" >Username</label>
            <?php
                        echo "<input type='text' id='user_username' name ='user_username' value='".$row['user_username']."' >";
             ?>
            <label class="LabelText" for="id">PASSWORD</label>
            <?php
                        echo "<input type='password' id='user_pass' name ='user_pass' value='".$row['user_pass']."'>";
             ?>
            <label class="LabelText" for="id">ชื่อ</label>
            <?php
                        echo "<input type='text' id='user_name' name='user_name' value='".$row['user_name']."'>";
             ?>
            <label class="LabelText" for="id">เพศ</label>
                <input type="radio" name="user_sex" value="male" <?php echo ($row['user_sex']=='male')?'checked' : ' ' ?>>Male
                <input type="radio" name="user_sex" value="female" <?php echo ($row['user_sex']=='female')?'checked' : ' ' ?>>Female
           <label class="LabelText" for="id">เบอร์โทร</label>
            <?php
                        echo "<input type='text' id='user_tel' name ='user_tel' maxlength=10 value='".$row['user_tel']."'>";
             ?>
           <label class="LabelText" for="id">ที่อยู่</label>
            <?php
                        echo "<input type='text' id='user_address' name ='user_address' value='".$row['user_address']."'>";
             ?>
            <label class="LabelText" for="id">สถานะ</label>
            <input type="radio" name="user_status" value="Admin" <?php echo ($row['user_status']=='Admin')?'checked' : ' ' ?>>Admin
            <input type="radio" name="user_status" value="User" <?php echo ($row['user_status']=='User')?'checked' : ' ' ?>>User
            <?php 
                    echo "<p><input type='submit' name='submit' value='".$text."'onclick=''>";
            ?>
    </form>             
        </div>
    </div>
    <?php
    if($text=="สมัครสมาชิก"){}
    else if ($_SESSION['user_status']=="User"){
        echo "<center><a href=information.php?</a>ยกเลิก</center>";
    }else{
        echo "<center><a href=FormAdmin.php?</a>กลับหน้าหลัก</center>";
    }     
     ?>
</body>
</html>