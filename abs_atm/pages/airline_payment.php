<?php 
session_start();
error_reporting(0);
include("database.php");
$doll = $_SESSION['pin_number'];
$voodoo = md5($doll);
?>
<html>
	<head>
		<title>User Account </title>
		<link href="/abs/css/bootstrap.min.css" rel="stylesheet">
		<link href="/abs/css/bootstrap.css" rel="stylesheet">
		
		<style>
			@import url("/abs/css/bootstrap-glyphicons.css");


			@font-face {
			    font-family: LatoBold;
			    src: url(/abs/fonts/Lato-Bold.ttf);
			}
			@font-face {
			    font-family: LatoHair;
			    src: url(/abs/fonts/Lato-Hairline.ttf);
			}

			html {
				background-color: #35B0CF;
				font-family: LatoBold;
			}

			body {
				margin-top: 13%;				
				background: transparent;
				font-family: LatoBold;
			}

			h3{ 
				font-size: 5vw;
				font-family: LatoBold;

			}

			.navbar-brand{
				padding-left: 40%;
				margin-top:-4%;
			}

			text1{
				font-family: LatoHair;
			}

			text{
				font-family: LatoBold;
			}

			.links{
				padding-top: 2.5%;
				padding-left: 5%;
				padding-right: 5%;
				font-size: 15pt;
			}

			li:hover{
				font-weight: bold;
			}

			.dropdown-menu{
				padding-top: 30px;
				width: 300px;
			}

			li:hover{
				background-color: #E5F3FF;
			}
			.nav .active a { 
				background:white!important;
				text-decoration: underline;
				font-weight: bold;
			 } 
			 .client_name{
			 	font-size: 15pt;
			 }

			 .big_text h4{
			 	font-family: LatoBold;
			 }

			
		</style>

	</head>
	<body>
		
		<!-- START OF NAV -->
		<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
		  	<div class="container-fluid">
		    <!-- Brand and toggle get grouped for better mobile display -->
			    <div class="navbar-header">
			      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
			        <span class="sr-only">Toggle navigation</span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			      </button>
			      <a class="navbar-brand" href="#"><h3>ABS<text1>inc.</text1></h3></a>
			    </div>

			<?php

				$query = mysql_query("SELECT * FROM client WHERE client_pin = '$voodoo'") or die(mysql_error());
				$witch = mysql_fetch_array($query);

			 ?>
		    <!-- Collect the nav links, forms, and other content for toggling -->
		    
		  </div><!-- /.container-fluid -->
		</nav>
		<!-- END OF NAV -->

		<div class="container-fluid">
			<div class="row">
				<div class="big_text panel panel-default col-md-10 col-xs-10 col-md-offset-1 col-xs-offset-1">	<br/>
					<h4><center> | PAYMENT FORM | </center></h4>
						<div class="col-md-8 col-xs-8 col-md-offset-2 col-xs-offset-2">

					<form role="form" action="/abs_atm/process/pay_now.php?money=<?php echo $_SESSION['payment']; ?>&card_num=<?php echo $_GET['card_num']; ?>" method="POST" >
						<?php
						if($_SESSION['deposit_error'] == 1){ ?>
						<div class="alert alert-danger" role="alert"><strong>SORRY.</strong> Wrong Pin number</div>

						<?php 
							}

						?>
						
							<center><p id="card_number"><h3>P <?php echo number_format($_SESSION['payment'],2); ?></h3></p>
							<label for="card_number">AMOUNT IN PESO</label>
						</center>
					
					<br/>
						<i><small><p>By using our system as part of the airline system, you agree to all the terms and conditions while using the system.</p>
						<p>The users of this system are advised to not share their passwords to other people</p>
						<p>We assure you that the system is secured.</p></small></i>
					<br/> 
					<br/> 
					 <input type="submit" class="btn btn-info col-md-12 col-xs-12" name="pay_now" value="Pay Now">
					</form>
						</div>
					<br/>
				</div>
			</div>
		</div>
	
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
	<script src="/abs/js/bootstrap.js" type="text/javascript"></script>
	<script type="text/javascript">
		causeRepaintsOn = $("h1, h2, h3, p");
		$(window).resize(function() {
		causeRepaintsOn.css("z-index", 1);
		});
	</script>
	</body>
</html>