<?php 
error_reporting(0);
include("database.php");

session_start();
if(isset($_POST['login_ats'])){
	$password = mysql_escape_string($_POST['password']);
	$password = md5($password);
	$username = $_POST['username'];
	$query = mysql_query("SELECT * FROM emp_db WHERE username = '$username' AND password = '$password'")or die(mysql_error());
	$check = mysql_num_rows($query);
	if($check == 1){
		$_SESSION['emp'] = $password;
		$_SESSION['logged_emp'] = 1;
		$_SESSION['error_log'] = 0;
		header("location: /ars/pages/scheduler.php?eid=$password");
	}
	else{
		$_SESSION['error_log'] = 1;
		$_SESSION['logged_emp'] = 0;
		header("location: /ars/");
	}
}
else{
	echo 404;
}


?>