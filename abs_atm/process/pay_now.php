
<?php 
include("database.php");
session_start();

if(isset($_POST['pay_now'])){

	$card_num = $_GET['card_num'];
	$amount = $_GET['money'];

	$query = mysql_query("SELECT * FROM client WHERE card_number = '$card_num'")or die(mysql_error());
	$sakto = mysql_fetch_array($query);

	if($sakto['savings'] >= 0){
		$value = $sakto['savings'] - $amount;
		$pasok = mysql_query("UPDATE client SET savings = $value WHERE card_number = '$card_num'")or die(mysql_error());
		$_SESSION['paid'] = 1;
		echo "<script>window.close();</script>";
	}
	else{

		$_SESSION['no_money_left'] = 1;
		echo "<script>window.close();</script>";
	}


}
else{
	echo "ERROR 404";
}

?>

