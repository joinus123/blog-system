<?php
	require_once("require/connection.php");
	include_once("include/header.php");
	//include_once("include/banner.php");
	//include_once("include/main_content.php");
?>
	<!--/main-->
	<section class="main-content-w3layouts-agileits">
		<div class="container">
				<h3 class="tittle">Sign In Now</h3>
				<?php
			         if(isset($_GET['message']))
			         {
			          ?><div style="color:red;" align="center"><br/><?php echo $_GET['message'];?></div><br/><?php
			         }
			        ?>
				<div class="row inner-sec">
					<div class="login p-5 bg-light mx-auto mw-100">
					<form method="POST" action="login_process.php">
							<div class="form-group">
							  <label for="exampleInputEmail1 mb-2">Email address</label>
							  <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="" required="" name="email">
							  <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
							</div>
							<div class="form-group">
							  <label for="exampleInputPassword1 mb-2">Password</label>
							  <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="" required="">
							</div>
							<div class="form-check mb-2">
							  <input type="checkbox" class="form-check-input" id="exampleCheck1">
							  <label class="form-check-label" for="exampleCheck1">Check me out</label>
							</div>
							<button type="submit" class="btn btn-primary submit mb-4" name="login" >Sign In</button>
							<p><a href="register.php"> Don't have an account?</a></p>
						  </form>
		</div>
		</div>
	</div>
	</section>
	<!--//main-->
<?php
	//include_once("include/left_side.php");
	//include_once("include/right_side.php");
	include_once("include/footer.php");
?>
	