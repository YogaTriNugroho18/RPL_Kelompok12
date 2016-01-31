<?php

function isSecure($data)
{
	$filter_sql = trim(mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data, ENT_QUOTES)))));
	return $filter_sql;
}

?>