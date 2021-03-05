<?php
	require_once("../require/connection.php");
	$query="SELECT *FROM user_status WHERE user_status.status_id=6"; 
    $result=mysqli_query($connection,$query);
    if($result->num_rows)
    {   $count=0;
        while($rows=mysqli_fetch_assoc($result))
        {
            $count++;
        }
    }
    $query_2="SELECT blog_post.*,user.*,category.*,post_status.added_on
    FROM USER,category,blog_post,STATUS,post_status
    WHERE user.`user_id` = blog_post.`user_id`
    AND category.`category_id` = blog_post.`category_id`
    AND blog_post.`post_id` = post_status.`post_id`
    AND status.`status_id` = post_status.`status_id`
    AND post_status.`status_id` = 4 ORDER BY blog_post.post_id DESC"; 
    $result_2=mysqli_query($connection,$query_2);
    if($result_2->num_rows)
    {   $new_post=0;
        while($rows_2=mysqli_fetch_assoc($result_2))
        {
            $new_post++;
        }
    }
    $query_3="SELECT user.*,comment.*,blog_post.*
    FROM USER,COMMENT,blog_post
    WHERE user.`user_id`=comment.`user_id`
    AND blog_post.`post_id` = comment.`post_id`
    AND comment.`is_active`=4 ORDER BY blog_post.post_id DESC"; 
    $result_3=mysqli_query($connection,$query_3);
    if($result_3->num_rows)
    {   $new_comment=0;
        while($rows_3=mysqli_fetch_assoc($result_3))
        {
             $new_comment++;
        }
    }
	include_once("include/session_maintenance.php");
	include_once("include/header.php");
	include_once("include/right_icon_menu_bar.php");
	include_once("include/left_side_bar.php");
	include_once("include/right_side_bar.php");
	include_once("include/main_content.php");
	include_once("include/end_file.php");
?>

 
