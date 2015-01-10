<?php
$connect = mysql_connect('localhost','bucky_name','TSXG9GJWNn96pba5');
if (!$connect) {
	die('Could not connect '.mysql_error());
}

$db_selected = mysql_select_db('bucky_lisa');
if (!$db_selected) {
	die('Could not select database'.mysql_error());
}

?>
