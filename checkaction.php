<?php
error_reporting(E_ALL ^ E_NOTICE);
require_once './ConnectDB.php';
/////////////////////////////////User////////////////////////////////////////////////////
$user_id = $_POST['user_id'];
$user_username = $_POST['user_username'];
$user_pass = $_POST['user_pass'];
$user_name = $_POST['user_name'];
$user_sex = $_POST['user_sex'];
$user_tel = $_POST['user_tel'];
$user_address = $_POST['user_address'];
$user_status = $_POST['user_status'];
///////////////////////////Product////////////////////////////////////////////
$p_id= $_POST['iid'];
$p_name = $_POST['name'];
$p_type = $_POST['type'];
$p_amount = $_POST['amount'];
$p_detail = $_POST['detail'];
$p_price = $_POST['price'];
$file = $_FILES["upload"];
$place = "fileupload";
$submit = $_POST['submit'];
if(strcmp($submit, "Insert")==0){
    $obj = new ConnectDB();
    $obj ->insert($m_fname, $m_phone, $m_address, $m_lname, $m_status, $m_password, $m_wallet);
}else if  (strcmp($submit, "Update")==0){
        $obj = new ConnectDB();
        $obj ->update($user_id, $user_username, $user_pass, $user_name, $user_sex, $user_tel, $user_address, $user_status);
}else if  (strcmp($submit, "UpdateNow")==0){
        $obj = new ConnectDB();
        $obj ->updateUser($m_id, $m_fname, $m_phone, $m_address, $m_lname, $m_status, $m_password, $m_wallet);
}else if  (strcmp($submit, "Logout")==0){
        header("Location:login.php");
}else if  (strcmp($submit, "สมัครสมาชิก")==0){
        $obj = new ConnectDB();
        $obj ->add($m_id,$m_user, $m_password, $m_name, $m_phone, $m_address,$m_gender,$m_status='User');   

}else if (strcmp($submit, "UpdateProduct")==0){
            $obj = new ConnectDB();
            $obj->updateProduct($p_id, $p_name, $p_price, $p_image, $p_type);
}else if (strcmp($submit, "AddProduct")==0){
 
            $obj = new ConnectDB();
            $obj->AddProduct($p_name, $p_price, $p_detail ,$p_amount , $p_type, $p_image);
}
else if (strcmp($submit, "ลบข้อมูล")==0){       
        $con = new connectdb();
        for($i=0;$i< count($_POST["checkbox"]);$i++){
             $del =  $_POST["checkbox"][$i];
        $sql = "DELETE FROM user where user_id=".$del;
        if (mysqli_query($con->connect(), $sql)){
            header("Location:FormAdmin.php");
        } else {
            echo "Error deleting record: " .$sql;
        }
    }
}
else if (strcmp($submit, "เพิ่มข้อมูล")==0){       
    header("Location:FormInput.php");
}
else if (strcmp($submit, "ออกจากระบบ")==0){       
    header("Location:login.php");
}
else{
    echo $submit;
}
?>
