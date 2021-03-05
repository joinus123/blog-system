<!DOCTYPE html>
<html lang="zxx">

<head>
	<title>Weblog a Blogging Category Bootstrap responsive WebTemplate | Home :: w3layouts</title>
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
	<!-- <script type="text/javascript">
		function search_article()
		{
			var search =document.getElementById('search').value;
			//alert(search);
			if(search=="")
			{
				document.getElementById("show_articles_response").innerHTML="<span style='color:red'><b>Please Write Somethingfor search. </b></span>"
			}
			else
			{
				var ajax_request=null;

				if(window.XMLHttpRequest)
				{
					ajax_request = new XMLHttpRequest();
				}
				else
				{
					ajax_request = ActiveXObject("Microsoft.XMLHTTP");
				}
				ajax_request.onreadystatechange = function()
				{
					if(ajax_request.readyState==4 && ajax_request.status==200)
					{
						document.getElementById("show_articles_response").innerHTML=ajax_request.responseText;
					}
				}
				ajax_request.open("POST","search_process.php");
				ajax_request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
				ajax_request.send("flag=search_article&search="+search);
			}
			
		}
	</script> -->
	<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
	<link rel="stylesheet" href="css/jquery.desoslide.css">
	<link href="css/style.css" rel='stylesheet' type='text/css' />
	<link href="css/fontawesome-all.css" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800"
	    rel="stylesheet">
</head>

<body>
	<!--Header-->

	<header>
		<div class="top-bar_sub_w3layouts container-fluid">
			<div class="row">
				<div class="col-md-12 logo text-center">
					<a class="navbar-brand" href="index.php">
						<i class="fab fa-linode"></i> ONLINE BLOGGER SYSTEM</a>
				</div>
			</div>

	<div align="center">
		<form action="search_process.php"  method="post" class="form-inline my-2 my-lg-0 header-search">
			<input class="form-control mr-sm-2" type="search" id="search" placeholder="Search here..." name="search" required="">
			<button class="btn btn1 my-2 my-sm-0" type="submit" name="submit"><i class="fas fa-search"></i>
			</button>
		</form>
	</div>
		</div>
			<div class="header_top" id="home">
				<nav class="navbar navbar-expand-lg navbar-light bg-light">
					<button class="navbar-toggler navbar-toggler-right mx-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
						aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
				   </button>


					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						
						<?php
						
						if(!isset($_SESSION['user']['role_id']))
						{
						?>
						<ul class="navbar-nav mr-auto">
							<li class="nav-item active">
								<a class="nav-link" href="index.php">Home
									<span class="sr-only">(current)</span>
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="about.php">About</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="contact.php">Contact</a>
							</li>
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" href="JavaScript:void(0);" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
								    aria-expanded="false">
									Categories
								</a>
								<div class="dropdown-menu" aria-labelledby="navbarDropdown">
								<?php 
									$q="SELECT *FROM category WHERE status_id=3";
									$r=mysqli_query($connection,$q);
									if($r->num_rows)
									{
										while($category=mysqli_fetch_assoc($r))
										{
											?>
												<a class="dropdown-item" href="index.php?category_id=<?php echo $category['category_id'] ?>"><?php echo $category['category_name'] ?></a>
												<div class="dropdown-divider"></div>
											<?php
										}
									}
								?>
								</div>
							</li>

						</ul>
						<div class="col-md-4 log-icons text-right">

							<span class="mx-lg-4 mx-md-2  mx-1">
								<a style="color:black"  href="login.php">
								<i class="fas fa-lock" class="nav-item"></i> Sign In</a>
							</span>
							<span>
								<a style="color:black" href="register.php">
								<i class="far fa-user"></i> Register</a>
							</span>
						</div>
					</div>
				<?php }
					  else if($_SESSION['user']['role_id']==3)
					  { ?>

					  	<ul class="navbar-nav mr-auto">
							<li class="nav-item active">
								<a class="nav-link" href="index.php">Home
									<span class="sr-only">(current)</span>
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="about.php">About</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="contact.php">Contact</a>
							</li>
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" href="JavaScript:void(0);" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
								    aria-expanded="false">
									Categories
								</a>
								<div class="dropdown-menu" aria-labelledby="navbarDropdown">
								<?php 
									$q="SELECT *FROM category WHERE status_id=3";
									$r=mysqli_query($connection,$q);
									if($r->num_rows)
									{
										while($category=mysqli_fetch_assoc($r))
										{
											?>
												<a class="dropdown-item" href="index.php?category_id=<?php echo $category['category_id'] ?>"><?php echo $category['category_name'] ?></a>
												<div class="dropdown-divider"></div>
											<?php
										}
									}
								?>
								</div>
							</li>

						</ul>
					  	<div align="center"><h4 style="color:blue"><b>USER DASHBOARD</b></h4></div>
					  	<li class="nav-item dropdown" style="color:#212529;" >
								<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
								    aria-expanded="false" style="color:black">
									Switch Role
								</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdown">
							<?php
							 require_once("../require/connection.php");
					          $query="SELECT role.role_type
					            FROM USER,role,user_role_assign
					            WHERE user.`user_id` = user_role_assign.`user_id`
					            AND role.`role_id` = user_role_assign.`role_id`
					            AND user_role_assign.`is_active_status`=3
					            AND role.role_id!=3
					            AND user.user_id='".$_SESSION['user']['user_id']."'";
					            $result=mysqli_query($connection,$query);
					            if($result->num_rows)
					            {
					                while($row=mysqli_fetch_assoc($result)) 
					                {
					                    ?>
					                   		
											<a class="dropdown-item" href="../switch_role_type.php?flag=user_role_type_<?php echo $row['role_type']?>&user_id=<?php echo $_SESSION['user']['user_id'] ?>"><?php echo $row['role_type'] ?></a>
											
										 <?php
					                }
					            }
					             ?>
								</div>
							</li> 
					 
							<div class="col-md-4 log-icons text-right">
							<span class="mx-lg-4 mx-md-2  mx-1">
								<b style="color:purple"><?php echo $_SESSION['user']['first_name']." ".$_SESSION['user']['last_name']; ?></b>
							</span>
							<span class="mx-lg-4 mx-md-2  mx-1">
								<a href="user_profile.php"><img src="../Upload_Images/<?php echo $_SESSION['user']['image']?>" style="width:30px;height:30px" ></a>
							</span>
							<span class="mx-lg-4 mx-md-2  mx-1">
								<a style="color:black"  href="../logout.php">
								<i class="fas fa-lock" class="nav-item"></i>Logout</a>
							</span>
						</div>
					</div>
					<?php } ?>
				</nav>

			</div>
	</header>
	<!--//header-->
