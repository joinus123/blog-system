<?php
	session_start();
	session_destroy();
	require_once("require/connection.php");
	include_once("include/header.php");
	if(!isset($_REQUEST['category_id']))
	{
		include_once("include/banner.php");
		include_once("include/main_content.php");
	}
	
	
	include_once("include/left_side.php");
	include_once("include/right_side.php");
	include_once("include/footer.php");
?>