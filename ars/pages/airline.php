<?php 
session_start();
error_reporting(0);


?>
<html>
	<head>
		<title>ATS | Airline Ticketing System</title>
		<link href="/abs/css/bootstrap.min.css" rel="stylesheet">
		<link href="/abs/css/bootstrap.css" rel="stylesheet">
	
		<style>

			@font-face {
			    font-family: LatoBold;
			    src: url(/abs/fonts/Lato-Bold.ttf);
			}
			@font-face {
			    font-family: LatoHair;
			    src: url(/abs/fonts/Lato-Hairline.ttf);
			}

			html {
				background-color: #FF9E22;
			}

			body {
				
				background: transparent;
				font-family: LatoBold;
			}

			h1{ 
				font-size: 10vw;
				font-family: LatoBold;
			}

			text{
				font-family: LatoHair;
			}

			.bord-only{
				border: 2px solid;
				border-color: #A66716;
				border-
			}



	</style>
		</style>

	</head>

	<body>
		<div class="container-fluid">
			<div class="row">
				
				<div class="col-md-12">

					<center>
						<h1><text>Airline Ticketing System</text></h1>
						<p style="font-size:14pt;">Travel Anywhere. Travel Fast. Travel Safe. Travel Light.</p>
					</center>
				</div>
				<br/>
				<br/>
				<br/>
				<br/>
				<br/>
				<div class="col-md-4 col-md-offset-4 col-xs-8 col-xs-offset-2">
					<center>
						<div class="alert alert-default bord-only" role="alert"><strong><span class="glyphicon glyphicon-user"></span>&nbsp&nbsp&nbsp CLIENT LOGIN</strong></div>
					</center>
				</div>
				<?php
				if($_SESSION['look_alike'] == 1){?>
				<div class="col-md-4 col-md-offset-4 col-xs-8 col-xs-offset-2">
					<div class="alert alert-danger" role="alert"><strong><span class="glyphicon glyphicon-remove"></span>&nbsp&nbsp&nbsp EMAIL ALREADY IN USE</strong></div>
				</div>
				<?php 
				}
				?>
				<button type="button" class="btn btn-warning col-md-4 col-md-offset-4 col-xs-offset-2 col-xs-8 " data-toggle="collapse" data-target="#login">LOGIN</button>

				<div class="col-md-4 col-md-offset-4 collapse col-xs-8 col-xs-offset-2" id="login">
										
					
					<form role="form" action="/ars/process/verify.php" method="POST" >
						<br/><br/>
						<label for="card_number"><strong>EMAIL ADDRESS</strong></label>
							<input type="text" class="form-control" id="card_number" placeholder="Email" name="email" REQUIRED>
					
					<br/>
						<label for="card_number"><strong>PASSWORD</strong></label>
							<input type="password" class="form-control" id="card_number" placeholder="Enter Password" name="password" REQUIRED>
					<br/> 
					<br/> 
					 <input type="submit" class="btn btn-warning col-md-12 col-xs-12" name="login_ats" value="LOGIN">

					</form>
				</div>
				<br/>
				<br/>
				<br/>
				<br/>
				<br/>
				<br/>
				<button type="button" class="btn btn-warning col-md-4 col-md-offset-4 col-xs-offset-2 col-xs-8 " data-toggle="collapse" data-target="#register">REGISTER</button>

				<div class="col-md-4 col-md-offset-4 collapse col-xs-8 col-xs-offset-2" id="register">
										
					
					<form role="form" action="/ars/process/add_client.php" method="POST" >
						<br/><br/>
						<label for="card_number"><strong>LAST NAME</strong></label>
							<input type="text" class="form-control" id="card_number" placeholder="Enter Last Name" name="lastname" >
					<br/>
						<label for="card_number"><strong>FIRST NAME</strong></label>
							<input type="text" class="form-control" id="card_number" placeholder="Enter First Name" name="firstname" >
					<br/>
						<label for="card_number"><strong>ADDRESS</strong></label>
							<input type="text" class="form-control" id="card_number" placeholder="Enter Home Address" name="address" >
					<br/>
						<label for="card_number"><strong>EMAIL ADDRESS</strong></label>
							<input type="text" class="form-control" id="card_number" placeholder="Enter Email Address" name="email" >
					<br/>						
						<label for="card_number"><strong>PASSWORD</strong></label>
							<input type="password" class="form-control" id="card_number" placeholder="Enter Password" name="password" >
					<br/> 
					<br/> 
					 <input type="submit" class="btn btn-warning col-md-12 col-xs-12" name="register_ats" value="REGISTER">

					</form>
				</div>
			</div>
		</div>
		
		<script src="/abs/js/jquery-1.11.1.min.js"></script>
		<script src="/abs/js/bootstrap.js" type="text/javascript"></script>
		<script type="text/javascript">
			causeRepaintsOn = $("h1, h2, h3, p");
			$(window).resize(function() {
			  causeRepaintsOn.css("z-index", 1);
			});
		</script>
</body>
</html>
