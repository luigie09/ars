<?php 
error_reporting(0);
include("database.php");
session_start();
$eid = $_GET['eid'];
$flight = $_GET['flight'];
$class = $_GET['class'];
if(isset($_POST['add_pass_flight'])){

$pass_num = $rand = substr(md5(microtime()),rand(0, 26), 6);
$passname = $_POST['passenger_name'];
$flight_op = mysql_query("SELECT * FROM flights WHERE flight_number = '$flight'")or die(mysql_error());
$ayt = mysql_fetch_array($flight_op);
if($class == 0){
$num = $ayt['zero'] - 1;
$num1 = $ayt['seats_available'] - 1;
$new = mysql_query("UPDATE flights SET zero = '$num', seats_available = '$num1' WHERE flight_number = '$flight' ")or die(mysql_error());
}
else{
$num = $ayt['one'] - 1;
$num1 = $ayt['seats_available'] - 1;
$new = mysql_query("UPDATE flights SET one = '$num', seats_available = '$num1' WHERE flight_number = '$flight' ")or die(mysql_error());	
}
$query = mysql_query("INSERT INTO $flight (flight_type, passenger_num, passenger_name) VALUES ('$class','$pass_num','$passname')")or die(mysql_error());
$_SESSION['flight_modified'] = 1;

header("location:/ars/pages/view_flight.php?eid=$eid&flight=$flight&class=$class");

}
else{
	echo "ERROR 404";
}



