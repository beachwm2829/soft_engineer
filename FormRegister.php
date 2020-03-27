<html>
<head>
    <link rel="stylesheet" type="text/css" href="css/table.css">
    <title> Boy & Girl </title>
</head>
<body>
    <script src="js/checkinput.js" ></script>
    <?php
        error_reporting(E_ALL ^ E_NOTICE); 
        $s = $_REQUEST['s'];
        if ($s == 2){
            $text="สมัครสมาชิก";
        }else {}
        ?>
    <div class="box">
        <div id="container">
            <form action="checkaction.php" method="POST" name="formjs">
            
            <label class="LabelText" for="id">Username</label>
          
            <?php
                        echo "<input type='text' id='user'  name ='user'>";
             ?>
            <label class="LabelText" for="id">Password</label>
          
            <?php
                        echo "<input type='password' id='pass'  name ='pass'>";
             ?>
            <label class="LabelText" for="id">ชื่อ</label>
            <?php
                        echo "<input type='text' id='fname' name ='name'>";
             ?>
            <label class="LabelText" for="id">เบอร์</label>
            <?php
                        echo "<input type='text' id='phone' name ='phone'>";
             ?>
           
            <label class="LabelText" for="id">ที่อยู่</label>
            <?php
                        echo "<input type='text' id='address' name ='address' maxlength=10>";
             ?>
            <label class="LabelText" for="id">เพศ</label>
            <?php
                        echo "<input type=radio  name=gender value='male'> Male";
                        echo "<input type=radio  name=gender value='female'> FeMale <br>";
             ?>
            <br><input type='submit' name='submit' value="<?php echo $text; ?>" onclick="return check()">
                    
    </form>
        </div>
    </div>
    <?php
         echo "<center><a href=login.php?</a>กลับหน้าหลัก</center>";
     ?>
</body>
</html>