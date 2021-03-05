<?php
	session_start();
	require_once("require/connection.php"); 
	date_default_timezone_set("asia/Karachi");
	$date=date('l jS F Y h:i:s A');
	$login_time=$_SESSION['login_time'];
	$user_id=$_SESSION['user']['user_id']; 
	$first_name=$_SESSION['user']['first_name'];
	$last_name=$_SESSION['user']['last_name'];
	$is_active=0;
	$query_template="UPDATE log_manage SET logout_time=?,is_active=? WHERE user_id=? AND login_time=?";
	$query_statement = mysqli_prepare($connection,$query_template);
	mysqli_stmt_bind_param($query_statement,"siis",$date,$is_active,$user_id,$login_time);
	$result=mysqli_stmt_execute($query_statement); 

		/*date_default_timezone_set("asia/Karachi");
		$date=date('l jS F Y h:i:s A');
		$logout="\r\n"."logOut Time : ".$date;
		$mode="a";
		$file_name = "$first_name$last_name$user_id"."."."txt"; 
		$handle=fopen($file_name,$mode);
		fwrite($handle,$logout);*/

	session_destroy();
	header("location:login.php");
?>