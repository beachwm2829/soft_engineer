<?php

class ConnectDB {

    public function connect() {
        $dbhost = "localhost";
        $dbuser = "root";
        $dbpassword = "";
        $db = "bd_se";
        $con = new mysqli($dbhost, $dbuser, $dbpassword, $db)
                or die("Connect failed: %s\n" . $con->error);
        mysqli_set_charset($con, "utf8");
        return $con;
    }

    public function checkuser($user, $password) {
        $sql = "SELECT * FROM user WHERE  user_username='" . $user . "' and user_pass='" . $password . "'";
        $result = mysqli_query($this->connect(), $sql);
        if (mysqli_num_rows($result) == 1) {
            session_start();
            $row = mysqli_fetch_array($result);
            $_SESSION["uid"] = $row['user_id'];
            $_SESSION['user'] = $row['user_username'];
            $_SESSION['pass'] = $row['user_pass'];

            $status = $row['user_status'];
            if (strcmp($status, "Admin") == 0) {
                $_SESSION['user_status'] = "Admin";
                header("Location:FormAdmin.php");
            } else if (strcmp($status, "Owner") == 0) {
                $_SESSION['user_status'] = "Owner";
                header("Location:Formowner.php");
            } else {
                $_SESSION['user_status'] = "User";
                header("Location:information.php");
            }
        } else {
            header("Location:login.php");
        }
    }

    public function add($m_id, $m_user, $m_password, $m_name, $m_phone, $m_address, $m_gender, $m_status) {
        session_start();
        $sql = "INSERT INTO `user`(`user_id`, `user_username`, `user_pass`, `user_name`, `user_sex`, `user_tel`, `user_address`, `user_status`) VALUES
        ('" . $m_id . "', '" . $m_user . "', '" . $m_password . "','" . $m_name . "', '" . $m_gender . "', '" . $m_phone . "', '" . $m_address . "', '" . $m_status . "')";

        if (mysqli_query($this->connect(), $sql)) {
            header("Location:login.php");
        } else {
            echo $sql;
        }
    }

    public function update($user_id, $user_username, $user_pass, $user_name, $user_sex, $user_tel, $user_adrress, $user_status) {
        session_start();
        $sql = "UPDATE `user` SET  `user_username` = '".$user_username."', `user_pass`='".$user_pass."', `user_name`='".$user_name."', `user_sex`='".$user_sex."', `user_tel`='".$user_tel."', `user_address`='".$user_adrress."', `user_status`='".$user_status."' WHERE `user_id`='".$user_id."'";
        if (mysqli_query($this->connect(), $sql)) {
            if ($_SESSION['user_status'] == "User") {
                $_SESSION['text'] = "ข้อมูลถูกอัพเดทแล้ว";
                header("Location:information.php");
            } else {
                $_SESSION['text'] = $spl;
                echo $sql;
                header("Location:FormAdmin.php");
            }
        } else {
            $_SESSION['text'] = "มีข้อผิดพลาดในการอัพเดท";
            echo $sql;
        }
    }

    public function updateProduct($item_id, $item_name, $item_price, $item_detail, $item_amount, $item_img, $item_type) {
        session_start();
        $sql = "UPDATE `items` SET `item_name`= '" . $item_name . "',`item_price`='" . $item_price . "',`item_detail`='" . $item_detail . "',`item_amount`='" . $item_amount . "',`img`='" . $item_img . "',`item_type`='" . $item_type . "' WHERE `item_id` ='" . $item_id . "'";
        if (mysqli_query($this->connect(), $sql)) {
            $_SESSION['text'] = "ข้อมูลสินค้าถูกอัพเดทแล้ว";
            header("Location:FormProduct.php");
        } else {
            $_SESSION['text'] = "มีข้อผิดพลาดในการอัพเดทข้อมูลสินค้า " . $sql;
        }
    }

    public function AddProduct($item_name,$item_price,$item_detail,$item_amount,$pro_image) {
        session_start();
        $sql = "INSERT INTO `items`(`item_name`, `item_price`, `item_detail`, `item_amount`, `img`, `user_id`)"
                . "VALUES ('$item_name', '$item_price', '$item_detail', '$item_amount', '$pro_image', '1')";
        if (mysqli_query($this->connect(), $sql)) {
            $_SESSION['text'] = "ข้อมูลสินค้าถูกเพิ่มแล้ว";
            header("Location:controItem.php");
        } else {
            $_SESSION['text'] = "มีข้อผิดพลาดในการเพิ่มข้อมูลสินค้า " . $sql;
        }
    }

    public function deleteItem($del) {
        $sql = "Delete from items where item_id='" . $del . "'";
        echo $sql;
        $result = mysqli_query($this->connect(), $sql);

        if ($result)
            header("location:controItem.php");
    }

    public function UpdateItem($item_name, $item_price, $item_detail, $item_amount, $pro_image, $item_id) {
        echo $item_id;
        $sql = "UPDATE `items` SET `item_name`='" . $item_name . "',`item_price`='" . $item_price . "',`item_detail`='" . $item_detail . "',`item_amount`='" . $item_amount . "',`img`='" . $pro_image . "' WHERE item_id='" . $item_id . "'";
        if (mysqli_query($this->connect(), $sql)) {
            header("location:controItem.php");
        } else {
            echo "Connet F";
            echo $sql;
        }
    }

    public function AddPayment($user_id, $item_id, $date, $pay, $img, $status) {
        session_start();
        $sql = "INSERT INTO `payment`(`User _ID`, `Item_ID`, `Cdit_Date`, `Cdit_Pay`, `Cdit_Photo`, `Cdit_Status`)"
                . "VALUES ($user_id,$item_id,'$date',$pay,'$img','$status')";
        if (mysqli_query($this->connect(), $sql)) {
            $_SESSION['text'] = "ข้อมูลการสั่งซื้อถูกเพิ่มแล้ว";
            echo 'if';
            header("Location:information.php");
        } else {
            $_SESSION['text'] = "มีข้อผิดพลาดในการเพิ่มข้อมูลสั่งซื้อ " . $sql;
            echo $sql;
        }
    }

    public function DelPayment($cid) {
        session_start();
        $sql = "DELETE FROM `payment` WHERE `Cdit_ID` = '" . $cid . "'";
        if (mysqli_query($this->connect(), $sql)) {
            $_SESSION['text'] = "ข้อมูลการสั่งซื้อถูกยกเลิกแล้ว";
            echo 'if';
            header("Location:information.php");
        } else {
            $_SESSION['text'] = "มีข้อผิดพลาดในการเพิ่มข้อมูลสั่งซื้อยกเลิก " . $sql;
            echo $sql;
        }
    }

    public function UpdatePayment($cid) {
        session_start();
        $sql = "UPDATE `payment` SET `Cdit_Status`= 'จัดส่งสินค้า' WHERE `Cdit_ID` = '" . $cid . "'";
        if (mysqli_query($this->connect(), $sql)) { 
            header("Location:checkpayment.php");
        } else { 
            echo $sql;
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
