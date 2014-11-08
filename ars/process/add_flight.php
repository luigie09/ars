<?php 
error_reporting(0);
include("database.php");
session_start();
$eid = $_GET['eid'];
if(isset($_POST['add_flight'])){

$flight_number = $rand = substr(md5(microtime()),rand(0, 26), 6);
$flight_destination = $_POST['flight_d'];
$seats_avail = $_POST['seats_available'];
$flight_date = $_POST['flight_date'];


switch ($flight_destination) {
	case 'Manila to Butuan':
		$price_business = 1550;
		$price_economy = 450;
		break;
	case 'Manila to Cagayan de Oro':
		$price_business = 1650;
		$price_economy = 550;
		break;
	case 'Manila to Cotabato':
		$price_business = 1750;
		$price_economy = 650;
		break;
	case 'Manila to Davao':
		$price_business = 1850;
		$price_economy = 750;
		break;
	case 'Manila to Dipolog':
		$price_business = 1950;
		$price_economy = 850;
		break;
	case 'Manila to Gen San':
		$price_business = 2050;
		$price_economy = 950;
		break;
	case 'Manila to Ozamiz':
		$price_business = 2150;
		$price_economy = 1050;
		break;
	case 'Manila to Surigao':
		$price_business = 2250;
		$price_economy = 1150;
		break;
	case 'Manila to Zamboanga':
		$price_business = 2350;
		$price_economy = 1250;
		break;
	case 'Manila to Jolo':
		$price_business = 2450;
		$price_economy = 1350;
		break;	
}







$seats_avail1 = $seats_avail / 2;
$seats = round($seats_avail1); 

$create = mysql_query("CREATE TABLE $flight_number (flight_inc int not null auto_increment primary key,flight_type int,reserved_seats int, passenger_name varchar (50))")or die(mysql_error());


$query = mysql_query("INSERT INTO flights (flight_number,flight_fare_business,flight_fare_economy,one,zero,flight_destination,seats_available,flight_date) VALUES ('$flight_number','$price_business','$price_economy','$seats','$seats','$flight_destination','$seats_avail','$flight_date')")or die(mysql_error());
$_SESSION['flight_added'] = 1;
$_SESSION['flight_deleted'] = 0;
header("location:/ars/pages/scheduler.php?eid=$eid");

}
else{
	echo "ERROR 404";
}



