<?php
class ConnectDB {
    public function connect(){
        $dbhost="localhost";
        $dbuser ="root";
        $dbpassword="";
        $db="bd_se";
        $con=new mysqli($dbhost,$dbuser,$dbpassword,$db)
                or die("Connect failed: %s\n".$con->error);
        mysqli_set_charset($con,"utf8");
        return $con;
    }
    public function checkuser($user,$password) {
        $sql = "SELECT * FROM user WHERE  user_username='".$user."' and user_pass='".$password."'";
        $result=mysqli_query($this->connect(),$sql);
        if(mysqli_num_rows($result)==1){
            session_start();
            $row = mysqli_fetch_array($result);
            $_SESSION['user']=$row['user_username'];
            $_SESSION['pass']=$row['user_pass'];
    
            $status = $row['user_status'];
            if(strcmp($status,"Admin")==0){
                $_SESSION['user_status']="Admin";
                header("Location:FormAdmin.php");
            }else if(strcmp($status,"Owner")==0){
                $_SESSION['user_status']="Owner";
                header("");
            }else{
                $_SESSION['user_status']="User";
                header("Location:information.php");
            }
            }else{
            header("Location:login.php");
        }
    }
    public function add($m_id,$m_user, $m_password, $m_name, $m_phone, $m_address,$m_gender,$m_status){
        session_start();
        $sql = "INSERT INTO `user`(`user_id`, `user_username`, `user_pass`, `user_name`, `user_sex`, `user_tel`, `user_address`, `user_status`) VALUES
        ('".$m_id."', '".$m_user."', '".$m_password."','".$m_name."', '".$m_gender."', '".$m_phone."', '".$m_address."', '".$m_status."')";
        
        if(mysqli_query($this->connect(), $sql)){
            header("Location:login.php");
        }else{
            echo $sql;
        }
       
    }
    public function update($user_id, $user_pass,$user_name, $user_sex, $user_tel, $user_address){
        session_start();
        $sql = "UPDATE user SET  user_pass='$user_pass', user_name='$user_name', user_sex='$user_sex', user_tel='$user_tel', user_address='$user_address' WHERE user_id='".$user_id."'";
        if(mysqli_query($this->connect(), $sql)){
            if($_SESSION['user_status']=="User"){
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
    public function updateProduct($item_id, $item_name, $item_price, $item_detail, $item_amount, $item_img, $item_type){
        session_start();
        $sql = "UPDATE `items` SET `item_name`= '".$item_name."',`item_price`='".$item_price."',`item_detail`='".$item_detail."',`item_amount`='".$item_amount."',`img`='".$item_img."',`item_type`='".$item_type."' WHERE `item_id` ='".$item_id."'";
        if(mysqli_query($this->connect(), $sql)){
                $_SESSION['text']="ข้อมูลสินค้าถูกอัพเดทแล้ว";
                header("Location:FormProduct.php");
        }else{
            $_SESSION['text']="มีข้อผิดพลาดในการอัพเดทข้อมูลสินค้า ".$sql;
        }
    }
   public function AddProduct($item_name,$item_price,$item_detail,$item_amount,$pro_image){
        session_start();
        $sql = "INSERT INTO `items`(`item_name`, `item_price`, `item_detail`, `item_amount`, `img`, `user_id`)"
                . "VALUES ('$item_name', '$item_price', '$item_detail', '$item_amount', '$pro_image', '1')";
        if(mysqli_query($this->connect(), $sql)){
                $_SESSION['text']="ข้อมูลสินค้าถูกเพิ่มแล้ว";
                header("Location:controItem.php");
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
