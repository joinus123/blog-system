<?php
	session_start();
	if(!($_SESSION['user']['user_id'])|| $_SESSION['user']['role_id']!=1)
	{
		session_destroy();
		header("location:../login.php?message=Please Kindly Login");
	}
?>