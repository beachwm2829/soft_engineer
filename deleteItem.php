<?php
    require_once './ConnectDB.php';
    $del=$_POST['checkbox'];
    $obj =new ConnectDB();
    $obj->deleteItem($del);