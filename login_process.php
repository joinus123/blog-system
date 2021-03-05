<?php
	session_start();
	require_once("require/connection.php");
	if(isset($_POST['login']))
	{
		extract($_POST);
		$email;
		$password;
		$query="SELECT user.first_name,user.last_name,user.user_id,user.email,user.password,user.home_town,user.cnic,user.image,
		user_role_assign.role_id,user_status.status_id,user_role_assign.is_active_status,role.role_type 
		FROM USER,role,STATUS,user_role_assign,user_status 
		WHERE user.user_id = user_role_assign.user_id 
		AND role.role_id = user_role_assign.role_id 
		AND user.user_id = user_status.user_id
		AND status.status_id = user_status.status_id
		AND email='$email' AND password='$password'";  
		$result=mysqli_query($connection,$query);
		if($result->num_rows)
		{ 
			$row=mysqli_fetch_assoc($result);
			$_SESSION['user']=$row;
			/*echo "<pre>";
			print_r($row); die;*/
			date_default_timezone_set("asia/Karachi");
			$login_time=date('l jS F Y h:i:s A');
			$user_id=$_SESSION['user']['user_id']; 
			$role_id=$_SESSION['user']['role_id'];
			$_SESSION['login_time']=$login_time;
			$query="INSERT INTO log_manage (user_id,role_id,login_time,is_active)
			VALUES ('$user_id','$role_id','$login_time',1)"; 

			

			if($role_id==1 && $_SESSION['user']['is_active_status']==3 && $_SESSION['user']['status_id']!=2 && $_SESSION['user']['status_id']!=4 && $_SESSION['user']['status_id']!=5 && $_SESSION['user']['status_id']!=6)
			{ 
				mysqli_query($connection,$query);
				header("location:Admin/index.php");
			}
			else if($role_id==2 && $_SESSION['user']['is_active_status']==3 && $_SESSION['user']['status_id']!=2 && $_SESSION['user']['status_id']!=4 && $_SESSION['user']['status_id']!=5 && $_SESSION['user']['status_id']!=6)
			{ 
				mysqli_query($connection,$query);
				header("location:Contributar/index.php");
			}
			else if($role_id==3 && $_SESSION['user']['is_active_status']==3 && $_SESSION['user']['status_id']!=2 && $_SESSION['user']['status_id']!=4 && $_SESSION['user']['status_id']!=5 && $_SESSION['user']['status_id']!=6)
			{ 
				mysqli_query($connection,$query);
				header("location:User/index.php");
			}
			else 
			{
				if($_SESSION['user']['status_id']==6)
				{
					header("location:login.php?message=<b style='color:blue'>Sorry Your Account Still Not Activated By Admin Please Wait For the Confirmation Email..!</b>");
				}
				if($_SESSION['user']['status_id']==4)
				{
					header("location:login.php?message=<b style='color:red'>Sorry..! Your Account is Deactivated due to Some Reasons.</b>");
				}
				if($_SESSION['user']['is_active_status']==4)
				{
					header("location:login.php?message=<b style='color:orange'>Sorry..! Your all Role are Deactived thats why you can't Sin-in Now .</b>");
				}
			}
		}
		else 
		{
			header("location:login.php?message=<b style='color:red'>Invalid Email/Password Please Try Again..!</b>");
		}
	}
?>