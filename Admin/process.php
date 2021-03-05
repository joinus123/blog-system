<?php
	include_once("include/session_maintenance.php");
    require_once("../require/connection.php");
	if($_REQUEST['flag']=='approve')
	{
		$user_id=$_REQUEST['user_id'];
		$email=$_REQUEST['email']; 
		$password =$_REQUEST['password']; 
		$role_id =$_REQUEST['role_id']; 
		$query="UPDATE user_status SET user_status.status_id =1 WHERE user_status.user_id='$user_id'";
		$result=mysqli_query($connection,$query);
		if($result)
		{
			date_default_timezone_set("asia/Karachi");
            $u_s_time=date('l jS F Y h:i:s A');
			$s_time_query="INSERT INTO user_status_timing (user_id,role_id,status_id,user_status_time) VALUES ('$user_id','$role_id','1','$u_s_time')";
			mysqli_query($connection,$s_time_query);
			require_once ("../require/PHPMailer-master/PHPMailerAutoload.php");
			date_default_timezone_set("Asia/Karachi");
			$mail = new PHPMailer;
			$mail->isSMTP();
			$mail->SMTPDebug = 0;
			$mail->Debugoutput="html";
			$mail->Host = "smtp.gmail.com";
			$mail->Port=587;
			$mail->SMTPSecure = 'tls';
			$mail->SMTPAuth = true;
			$mail->Username="salam.14cs17@gmail.com";
			$mail->Password="MuhammadSalam@17";
			$mail->setFrom("salam.14cs17@gmail.com","Muhammad Salam");
			$mail->addAddress($email,"HIST ADMIN");
			$mail->Subject="ONLINE BLOGGER SYSTEM:- Account Request is Approved.";
			$mail->msgHTML("<div align='center' style='border-radius: 50px;border:2px soloid gray;background-color:white;width:35%;margin-left:30%'></br><h3>Congrats..! Your Account is Activited Successfully.Thanks</h3>
				<h4>Email: <p style='color:white'>"." ".$email."</p>Password: "." <p style='color:blue'>".$password."</p><br/></h4>");
	
			$mail->send();
			header("location:new_users_request.php");
		}
	}
	else if($_REQUEST['flag']=='unapprove')
	{
		$user_id=$_REQUEST['user_id'];
		$email=$_REQUEST['email']; 
		$password =$_REQUEST['password']; 
		$role_id =$_REQUEST['role_id']; 
		$query="UPDATE user_status SET user_status.status_id =2 WHERE user_status.user_id='$user_id'";
		$result=mysqli_query($connection,$query);
		if($result)
		{
			date_default_timezone_set("asia/Karachi");
            $u_s_time=date('l jS F Y h:i:s A');
			$s_time_query="INSERT INTO user_status_timing (user_id,role_id,status_id,user_status_time) VALUES ('$user_id','$role_id','2','$u_s_time')"; 
			mysqli_query($connection,$s_time_query);
			require_once ("../require/PHPMailer-master/PHPMailerAutoload.php");
			date_default_timezone_set("Asia/Karachi");
			$mail = new PHPMailer;
			$mail->isSMTP();
			$mail->SMTPDebug = 0;
			$mail->Debugoutput="html";
			$mail->Host = "smtp.gmail.com";
			$mail->Port=587;
			$mail->SMTPSecure = 'tls';
			$mail->SMTPAuth = true;
			$mail->Username="salam.14cs17@gmail.com";
			$mail->Password="MuhammadSalam@17";
			$mail->setFrom("salam.14cs17@gmail.com","Muhammad Salam");
			$mail->addAddress($email,"HIST ADMIN");
			$mail->Subject="ONLINE BLOGGER SYSTEM:- Account Request is Unapproved.";
			$mail->msgHTML("<div align='center' style='border-radius: 50px;border:2px soloid gray;background-color:white;width:35%;margin-left:30%'></br><h3>Sorry..! Your Request has not been approved, Please you can apply next time...Thank you So Much for your contact.</h3>");
	
			$mail->send();
			header("location:new_users_request.php");
		}
	}
?>
