<?php

$db['db_host']='localhost';
$db['db_user']='root';
$db['db_pass']='';
//$db['db_user']='aateeq';
//$db['db_pass']='12345';
$db['db_name']='3ateeq';

$conn = mysqli_connect($db['db_host'], $db['db_user'], $db['db_pass'],$db['db_name']);

if ($conn) {
}else
    die ("error".mysqli_connect_error());
?>