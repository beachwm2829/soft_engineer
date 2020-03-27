<html>
<head>
    <link rel="stylesheet" type="text/css" href="css/table.css">
    <title> Boy & Girl </title>
    <script src="js/checkinput.js" ></script>
</head>
<body>
    <?php
        error_reporting(E_ALL ^ E_NOTICE); 
        $s = $_REQUEST['s'];
        if ($s == 2){
            $text="สมัครสมาชิก";
        }else {}
        ?>
    <div class="box">
        <div id="container">
            <form name="Formregister" action="checkaction.php" method="POST" onsubmit="return check()">
            <label class="LabelText" for="id">ชื่อ</label>
            <?php
                        echo "<input type='text' id=fname name ='fname' value=''>";
             ?>
            <label class="LabelText" for="id">นามสกุล</label>
            <?php
                        echo "<input type='text' id=lname name ='lname' value=''>";
             ?>
           <label class="LabelText" for="id">PASSWORD</label>
          
            <?php
                        echo "<input type='password' id='pass'  name ='pass' maxlength=20 value=''>";
             ?>
            <label class="LabelText" for="id">เบอร์โทร</label>
            <?php
                        echo "<input type='text' id=phone name ='phone' maxlength=10 value=''>";
             ?>
                 <?php 
                    echo "<input type='submit' name='submit' value='".$text."'>";
                    ?>
    </form>
        </div>
    </div>
    <?php
         echo "<center><a href=login.php?</a>กลับหน้าหลัก</center>";
     ?>
</body>
</html>