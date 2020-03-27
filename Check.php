<?php
require_once './ConnectDB.php';
error_reporting(E_ALL ^ E_NOTICE);
$user = $_POST['user'];
$password = $_POST['pass'];
$con = new ConnectDB();
$con->checkuser($user, $password);
?>
