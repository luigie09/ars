<?php

if(isset($_POST['passiton_user'])){

	error_reporting(0);
	session_start();
	include("database.php");
	$card_num = mysql_real_escape_string($_POST['card_num']);
	$atm_pass = mysql_real_escape_string($_POST['atm_pass']);
	$atm_pass = md5($atm_pass);
	$query = mysql_query("SELECT * FROM client WHERE card_number = '$card_num' AND atm_pass = '$atm_pass'") or die(mysql_error());
	$seen = mysql_num_rows($query);
	$content = mysql_fetch_array($query);
	if($seen == 1){
		if($_SESSION['airline'] == 1){
			$payment = $_SESSION['payment'];
			header("location: /abs_atm/pages/airline_payment.php?money=$payment&card_num=$card_num");
		}
		else{
			header("location: /abs_atm/pages/user.php?uid=$atm_pass&card_num=$card_num");
		}
		
	}
	else{
		$_SESSION['log_error'] = 1;
		header("location: /abs_atm/");
	}
}
else{

	echo "ERROR 404";
}
?>