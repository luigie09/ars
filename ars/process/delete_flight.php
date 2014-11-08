<?php 
error_reporting(0);
session_start();
include("database.php");
$eid = $_GET['eid'];
$flight = $_GET['flight'];

$drop_tb = mysql_query("DROP TABLE IF EXISTS `airline`.`$flight`")or die(mysql_error());
$query = mysql_query("DELETE FROM  flights  WHERE flight_number = '$flight'")or die(mysql_error());
$_SESSION['flight_deleted'] = 1;
$_SESSION['flight_added'] = 0;
header("location:/ars/pages/scheduler.php?eid=$eid");





?>