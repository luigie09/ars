<?php 
error_reporting(0);
session_start();
include("database.php");
$eid = $_GET['eid'];
$flight = $_GET['flight_num'];
$client = $_GET['client_num'];
$class = $_GET['class'];
$flight_op = mysql_query("SELECT * FROM flights WHERE flight_number = '$flight'")or die(mysql_error());
$ayt = mysql_fetch_array($flight_op);
if($class == 0){
$num = $ayt['zero'] + 1;
$num1 = $ayt['seats_available'] + 1;
$new = mysql_query("UPDATE flights SET zero = '$num', seats_available = '$num1' WHERE flight_number = '$flight' ")or die(mysql_error());
}
else{
$num = $ayt['one'] + 1;
$num1 = $ayt['seats_available'] + 1;
$new = mysql_query("UPDATE flights SET one = '$num', seats_available = '$num1' WHERE flight_number = '$flight' ")or die(mysql_error());	
}
$query = mysql_query("DELETE FROM $flight WHERE flight_inc = $client")or die(mysql_error());
$_SESSION['cancelled'] = 1;
header("location:/ars/pages/view_flight.php?eid=$eid&flight=$flight");





?>