<?php

$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "tubes";

$connect = mysql_connect($db_host, $db_user, $db_pass);
$select_db = mysql_select_db($db_name, $connect);

?>