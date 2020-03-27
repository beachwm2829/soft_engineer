<?php
class ConnectDB {
    public function connect(){
        $dbhost="localhost";
        $dbuser ="root";
        $dbpassword="";
        $db="test";
        $con=new mysqli($dbhost,$dbuser,$dbpassword,$db)
                or die("Connect failed: %s\n".$con->error);
        mysqli_set_charset($con,"utf8");
        return $con;
    }
    public function checkuser($user,$password) {
        $sql = "SELECT * FROM munber WHERE  m_phone='".$user."' and m_password='".$password."'";
        $result=mysqli_query($this->connect(),$sql);
        if(mysqli_num_rows($result)==1){
            session_start();
            $row = mysqli_fetch_array($result);
            $_SESSION['user']=$row['m_phone'];
            $_SESSION['pass']=$row['m_password'];
            $_SESSION['text']="ยินดีตอนรับเข้าสู่ระบบ";
            $status = $row['m_status'];
            if(strcmp($status,"Admin")==0){
                $_SESSION['m_status']="Admin";
                header("Location:FormAdmin.php");
            }else  {
                $_SESSION['m_status']="User";
                header("Location:information.php");
            }
            }else{
            header("Location:login.php");
        }
    }
       public function insert($m_fname, $m_phone,$m_address, $m_lname, $m_status, $m_password, $m_wallet){
        session_start();
        $sql = "INSERT INTO munber(m_fname, m_phone,m_address, m_lname, m_status, m_password, m_wallet) VALUES ('$m_fname', '$m_phone','$m_address', '$m_lname', '$m_status', '$m_password', '$m_wallet')";
        if(mysqli_query($this->connect(), $sql)){
            if($_SESSION['m_status']=="User"){
                $_SESSION['text']="ข้อมูลถูกเพิ่มแล้ว";
                header("Location:FormUser.php");
            }else{
                $_SESSION['text']="ข้อมูลถูกเพิ่มแล้ว";
                header("Location:FormAdmin.php");
            }
        }else{
            $_SESSION['text']="ข้อมูลไม่สามารถเพิ่มได้";
            header("Location:FormAdmin.php");
        }
    }
         public function add($m_fname, $m_phone, $m_address, $m_lname, $m_password){
            session_start();
                $sql = "INSERT INTO munber(m_fname, m_phone,m_address, m_lname, m_status, m_password, m_wallet) VALUES ('$m_fname', '$m_phone','$m_address', '$m_lname', 'User', '$m_password', '0')";
                $result=mysqli_query($this->connect(),$sql);
                if(mysqli_num_rows($result)==1){
                    header("Location:FormInput.php?text=มีข้อผิดพลาดในการสมัคร");
                }else{
                    header("Location:login.php?text=สมัครสมาชิกสำเร็จ");
                }
    }
    public function update($m_id, $m_fname, $m_phone, $m_address, $m_lname, $m_password, $m_wallet){
        session_start();
        $sql = "UPDATE munber SET  m_fname='$m_fname', m_phone='$m_phone',m_address='$m_address', m_lname='$m_lname', m_password='$m_password', m_wallet='$m_wallet' WHERE m_id='".$m_id."'  or m_phone='".$m_phone."'";
        if(mysqli_query($this->connect(), $sql)){
            if($_SESSION['m_status']=="User"){
                $_SESSION['text']="ข้อมูลถูกอัพเดทแล้ว";
                header("Location:information.php");
            }else{
                $_SESSION['text']=$spl;
                header("Location:FormAdmin.php");
            }
        }else{
            $_SESSION['text']="มีข้อผิดพลาดในการอัพเดท";
            echo '<p>Canot UPDATE';
        }
    }
     public function updateUser($m_id, $m_fname, $m_phone, $m_address, $m_lname, $m_status, $m_password, $m_wallet){
        session_start();
        $user =  $_SESSION['user'];
       $sql = "UPDATE munber SET  m_fname='$m_fname', m_phone='$m_phone',m_address='$m_address', m_lname='$m_lname', m_status='$m_status', m_password='$m_password', m_wallet='$m_wallet' WHERE m_id='".$m_id."'";
        if(mysqli_query($this->connect(), $sql)){
            //if($_SESSION['status']=="User"){
                $_SESSION['text']="ข้อมูลถูกอัพเดทแล้ว";
                header("Location:FormUser.php");
            //}else{}
        }else{
            $_SESSION['text']="มีข้อผิดพลาดในการอัพเดท ".$sql;
        }
    }
    public function updateProduct($p_id,$p_name, $p_price,$p_image, $p_type){
        session_start();
        $sql = "UPDATE product SET  p_name='$p_name',p_price='$p_price', p_type='$p_type' WHERE p_id ='".$p_id."'";
        if(mysqli_query($this->connect(), $sql)){
                $_SESSION['text']="ข้อมูลสินค้าถูกอัพเดทแล้ว";
                header("Location:FormProduct.php");
        }else{
            $_SESSION['text']="มีข้อผิดพลาดในการอัพเดทข้อมูลสินค้า ".$sql;
        }
    }
   public function AddProduct($p_name, $p_price,$p_image, $p_type){
        session_start();
        $sql = "INSERT INTO product(p_name,p_price,p_type) VALUES ('$p_name', '$p_price', '$p_type')";
        if(mysqli_query($this->connect(), $sql)){
                $_SESSION['text']="ข้อมูลสินค้าถูกเพิ่มแล้ว";
                header("Location:FormProduct.php");
        }else{
            $_SESSION['text']="มีข้อผิดพลาดในการเพิ่มข้อมูลสินค้า ".$sql;
        }
    }
//    public function delete($del){
//        session_start();
//        if (sizeof($del)!=0){
//            $array = sizeof($del);
//            for ($i= 0 ; $i<sizeof($del) ; $i++){
//            $sql = "DELETE FROM munber WHERE mid=$del[$i]";
//            $result = mysqli_query($this->connect(), $sql);
//            }
//            $_SESSION['text']="ข้อมูลถูกลบแล้ว";
//            header("Location:FormAdmin.php");
//        }else{
//            $_SESSION['text']="Canot DELETE";
//            echo 'Canot DELETE';
//        }
//    }
}