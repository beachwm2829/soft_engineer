<?php
error_reporting(E_ALL ^ E_NOTICE);
require_once './ConnectDB.php';
/////////////////////////////////Member////////////////////////////////////////////////////
$m_id = $_POST['mid'];
$m_fname = $_POST['fname'];
$m_lname = $_POST['lname'];
$m_password = $_POST['pass'];
$m_phone = $_POST['phone'];
$m_address = $_POST['address'];
$m_status = $_POST['status'];
$m_wallet = $_POST['$m_wallet'];
///////////////////////////Product////////////////////////////////////////////
$p_id= $_POST['iid'];
$p_name = $_POST['name'];
$p_type = $_POST['type'];
$p_price = $_POST['price'];
$file = $_FILES["upload"];
$place = "fileupload";
$submit = $_POST['submit'];
if(strcmp($submit, "Insert")==0){
    $obj = new ConnectDB();
    $obj ->insert($m_fname, $m_phone, $m_address, $m_lname, $m_status, $m_password, $m_wallet);
}else if  (strcmp($submit, "Update")==0){
        $obj = new ConnectDB();
        $obj ->update($m_id, $m_fname, $m_phone, $m_address, $m_lname, $m_password, $m_wallet);
}else if  (strcmp($submit, "UpdateNow")==0){
        $obj = new ConnectDB();
        $obj ->updateUser($m_id, $m_fname, $m_phone, $m_address, $m_lname, $m_status, $m_password, $m_wallet);
}else if  (strcmp($submit, "Logout")==0){
        header("Location:login.php");
}else if  (strcmp($submit, "สมัครสมาชิก")==0){
        $obj = new ConnectDB();
        $obj ->add($m_fname, $m_phone, $m_address, $m_lname, $m_password);
}else if (strcmp($submit, "UpdateProduct")==0){
            $obj = new ConnectDB();
            $obj->updateProduct($p_id, $p_name, $p_price, $p_image, $p_type);
}else if (strcmp($submit, "AddProduct")==0){
            $obj = new ConnectDB();
            $obj->AddProduct($p_name, $p_price, $p_image, $p_type);
}else{
    echo $submit;
}
?>
