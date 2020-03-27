<?php
    error_reporting(E_ALL ^ E_NOTICE);
    session_start();
    require_once 'ConnectDB.php';
    $item_name=$_POST['item_name'];
    $item_price=$_POST['item_price'];
    $item_detail=$_POST['item_detail'];
    $item_amount=$_POST['item_amount'];
    $button=$_POST['button'];
    $file=$_FILES['fileToUpload'];
    
//    if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],"pix/".$_FILES["fileToUpload"]["name"]))
//{
//        $p = "pix/";
//        $a = $p.$file[name];
//        echo "'File name '".$a."<br>";
//}
//    $file=$_FILES['pro_image'];
//    $place2place="pix";
//    
////    echo "'File name '".$file[name]."<br>";
////    echo "'Temp name '".$file[tem_name]."<br>";
//    if(move_uploaded_file($file[tem_name],"$place2place/".$file[name])){
//        echo "A";
//    }
//    else {
//        echo 'B';
//    }
    //upload image
    $ext = pathinfo(basename($_FILES['fileToUpload']['name']),PATHINFO_EXTENSION);
    $new_image_name = 'img_'.uniqid().".".$ext;
    echo $new_image_name;
    $image_path = "fileupload/";
    $upload_path = $image_path.$new_image_name;
    echo $upload_path;
    //uploading
    //$success = move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $upload_path);
    if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $upload_path)){
        echo $upload_path;
    }
    else {
        echo "AAA";
    }
    $pro_image = $upload_path;
    
    $con=new ConnectDB();
    $con->connect();
    $con->AddProduct($item_name,$item_price,$item_detail,$item_amount,$pro_image);
?>
