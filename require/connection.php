<?php

	$localhost="localhost";
	$username ="root";
	$password ="admin";
	$database ="online_blog_system_dbms";

	$connection=mysqli_connect($localhost,$username,$password,$database);

	if(!$connection)
	{
		echo "There is error with connect DBMS<br/>";
		echo "The Error Number is: ".mysqli_connect_errno()."<br/>";
		echo "The Error is : ".mysqli_connect_error();
		die;
	}
?>
