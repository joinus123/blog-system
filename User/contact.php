<?php
	require_once("../require/connection.php");
	include_once("../include/header.php");
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
	<title>Weblog a Blogging Category Bootstrap responsive WebTemplate | Contact :: w3layouts</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">
	<meta name="keywords" content="Weblog a Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />

	<script>
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
	<link href="css/contact.css" rel='stylesheet' type='text/css' />
	<link href="css/style.css" rel='stylesheet' type='text/css' />
	<link href="css/fontawesome-all.css" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800"
	    rel="stylesheet">
</head>

<body>

	<!--//header-->

	<!--/banner-->
	<!-- <div class="banner-inner">
	</div> -->
	<!--//banner-->
	<!--/main-->
	<section class="main-content-w3layouts-agileits">

		<h3 class="tittle">Contact US</h3><br/>
		<p class="sub text-center"><b>We love to discuss your idea</b></p><br/><br/>
		<!-- <div class="contact-map inner-sec">

			<iframe src="https://www.google.com/maps/place/The+jamshoro+boys+hostil/@25.4100592,68.2690987,17z/data=!4m22!1m16!4m15!1m6!1m2!1s0x394c7984603cc195:0x4c87541743c7331b!2sThe+jamshoro+boys+hostil!2m2!1d68.2712783!2d25.4100148!1m6!1m2!1s0x394c796478cfb74b:0xcdace31f1a1f3356!2zSGlkYXlhIEluc3RpdHV0ZSBvZiBTY2llbmNlIGFuZCBUZWNobm9sb2d5LCBKYW1zaG9ybyAo2YfYr9in2YrbgSDYp9mG2LPZvdmK2b3ZitmI2b0g2KLZgSDYs9in2KbZhtizINin2YrZhtqKINm92YraqtmG2KfZhNin2KzZiiksIEJ1bmdhbG93IE5vLiBBMTfYjCBTdHJlZXQgTm8uIDAxLCBQaGFzZSAtIEkgU2luZGggVW5pdmVyc2l0eSBFbXBsb3llZXMgQ0hTLCBKYW1zaG9ybywgU2luZGgsIFBha2lzdGFu!2m2!1d68.2709152!2d25.4108436!3e0!3m4!1s0x394c7984603cc195:0x4c87541743c7331b!8m2!3d25.4100148!4d68.2712783"
			    class="map" style="border:0" allowfullscreen=""></iframe>
		</div> -->
		<div class="ad-inf-sec bg-light">
			<div class="container">
				<div class="address row">

					<div class="col-lg-4 address-grid">
						<div class="row address-info">
							<div class="col-md-4 address-left text-center">
								<i class="far fa-map"></i>
							</div>
							<div class="col-md-8 address-right text-left">
								<h6>Address</h6>
								<p> Phase - I Sindh University Employees CHS, Jamshoro, Sindh, Pakistan

								</p>
							</div>
						</div>

					</div>
					<div class="col-lg-4 address-grid">
						<div class="row address-info">
							<div class="col-md-4 address-left text-center">
								<i class="far fa-envelope"></i>
							</div>
							<div class="col-md-8 address-right text-left">
								<b style="color:black">Email :</b>
								<p>
									<a href="mailto:example@email.com">salam.14cs17@gmail.com</a>

								</p>
							</div>

						</div>
					</div>
					<div class="col-lg-4 address-grid">
						<div class="row address-info">
							<div class="col-md-4 address-left text-center">
								<i class="fas fa-mobile-alt"></i>
							</div>
							<div class="col-md-8 address-right text-left">
								<h6>Phone</h6>
								<p>+92-331-2477922</p>

							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="contact_grid_right">
				<?php 
								ob_start();
								//require_once("require/connection.php");
								if(isset($_REQUEST['contact']))
								{
									date_default_timezone_set("asia/Karachi");
									$contact_time=date('l jS F Y h:i:s A');
									extract($_REQUEST);
									$query="INSERT INTO contact_us (full_name,email,subject,message,added_on) 
									VALUES ('$full_name','$email','$subject','$message','$contact_time')"; 
									$result = mysqli_query($connection,$query)or die(mysqli_error($connection));
									if($result)
									{
										echo "<div align='center'><b style='color:purple'>Thank You So Much For Your Suggestion.</b></div><br/>";
									}
									else
									{
										echo "<b style='color:red'>Sorry Try Again</b>";
									}
								}

						?>
				<form  method="POST">
					<div class="row contact_left_grid">
						<div class="col-md-6 con-left">
							<div class="form-group">
								<label for="validationCustom01 my-2">Name</label>
								<input class="form-control" type="text" name="full_name" placeholder="Enter Your Full Name Please" required="">
							</div>
							<div class="form-group">
								<label for="exampleFormControlInput1">Email</label>
								<input class="form-control" type="email" name="email" placeholder="Enter Your Email Please" required="">
							</div>
							<div class="form-group">
								<label for="validationCustom03 my-2">Subject</label>
								<input class="form-control" type="text" name="subject" placeholder="Enter Subject" required="">
							</div>
						</div>
						<div class="col-md-6 con-right">
							<div class="form-group">
								<label for="textarea">Message</label>
								<textarea id="textarea" name="message" placeholder="Enter Your Suggestion Here Please"></textarea>
							</div>
							<input class="form-control" type="submit" value="Submit" name="contact">

						</div>
					</div>

				</form>
			</div>
		</div>
	</section>
	<!--//main-->
<?php
	include_once("../include/footer.php");
?>