<?php

$db_host = "ap-cdbr-azure-southeast-b.cloudapp.net";
$db_user = "bc5defb4b6ac2b";
$db_pass = "cfd1e86d";
$db_name = "tubes1";

$connect = mysql_connect($db_host, $db_user, $db_pass);
$select_db = mysql_select_db($db_name, $connect);

?>
