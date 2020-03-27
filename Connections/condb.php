<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
#$hostname_condb = "localhost";
#$database_condb = "website_std_shop";
#$username_condb = "root";
#$password_condb = "";
#$condb = mysql_pconnect($hostname_condb, $username_condb, $database_condb, $password_condb) or trigger_error(mysql_error(),E_USER_ERROR); 
#mysql_query("SET NAMES UTF8");
#error_reporting( error_reporting() & ~E_NOTICE );



$dbhost = "localhost";
$dbuser = "root";
$dbpass = "" ;
$dbdatabase = "website_std_shop";
$condb = new mysqli($dbhost,$dbuser,$dbpass,$dbdatabase)or die("ไม่สามารถติดต่อ sver ได้");
mysqli_set_charset($condb, "utf8");
?>