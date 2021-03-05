<?php
	include_once("include/session_maintenance.php");
	date_default_timezone_set("asia/Karachi");
    require_once("../require/connection.php");
	if($_REQUEST['flag']=='single_post_likes')
	{
		$added_on=date('j M Y,h A');
		$post_id = $_REQUEST['post_id'];
		$user_id = $_SESSION['user']['user_id']; 

		$q = "SELECT likes.`user_id` 
				FROM likes
				WHERE likes.`post_id` ='$post_id'
				AND like_status = 1
				AND likes.`user_id` = '$user_id'";
		$r_q = mysqli_query($connection,$q);
		if($r_q)
		{
			$record=mysqli_fetch_assoc($r_q);
			if($user_id==$record['user_id'])
			{
				$unlike_query ="UPDATE likes SET like_status=0,un_like_time='$added_on'
				WHERE user_id='$user_id' AND post_id='$post_id' AND like_status=1";
				$unlike_result = mysqli_query($connection,$unlike_query);
				if($unlike_result)
				{
					
					//single_post_like($connection);
				}
			}
			else
			{
				$like_query ="INSERT INTO likes (user_id,post_id,like_status,like_time)
				VALUES ('$user_id','$post_id',1,'$added_on')";
				$like_result = mysqli_query($connection,$like_query);
				if($like_result)
				{
					//single_post_like($connection);
				}
			}
		}
	}
	else if($_REQUEST['flag']=='multiple_post_likes')
	{
		$added_on=date('j M Y,h A');
		$post_id = $_REQUEST['post_id'];
		$_SESSION['m_p_id']=$_REQUEST['post_id'];
		$multiple_post_id=$_SESSION['m_p_id'];
		$user_id = $_SESSION['user']['user_id']; 

		$q = "SELECT likes.`user_id` 
				FROM likes
				WHERE likes.`post_id` ='$post_id'
				AND like_status = 1
				AND likes.`user_id` = '$user_id'";
		$r_q = mysqli_query($connection,$q);
		if($r_q)
		{
			$record=mysqli_fetch_assoc($r_q);
			if($user_id==$record['user_id'])
			{
				$unlike_query ="UPDATE likes SET like_status=0,un_like_time='$added_on'
				WHERE user_id='$user_id' AND post_id='$post_id' AND like_status=1";
				$unlike_result = mysqli_query($connection,$unlike_query);
				if($unlike_result)
				{
					multiple_post_like($connection);
				}
			}
			else
			{

				$like_query ="INSERT INTO likes (user_id,post_id,like_status,like_time)
				VALUES ('$user_id','$post_id',1,'$added_on')";
				$like_result = mysqli_query($connection,$like_query);
				if($like_result)
				{
					multiple_post_like($connection);
				}
			}
		}
	}
	else if($_REQUEST['flag']=='send_comment')
	{
		$added_on=date('j M Y, h A');
		$m_p_id = $_REQUEST['m_p_id'];
		$_SESSION['message_p_id']=$m_p_id;
		$send_message = $_REQUEST['send_message'];
		$user_id = $_SESSION['user']['user_id']; 

		$query="INSERT INTO comment (user_id,post_id,message,is_active,comment_time)
		VALUES ('$user_id','$m_p_id','$send_message',4,'$added_on')";
		$result = mysqli_query($connection,$query);
		if($result)
		{
			//send_message_response($connection);
		}
	}
	else if($_REQUEST['flag']=='comment_auto_call')
	{
		$p_id=$_SESSION['p_id'];
		$m_q="SELECT user.`first_name`,user.`middle_name`,user.`last_name`,user.`image`,comment.`message`
			FROM user,blog_post,comment
			WHERE user.`user_id` = comment.`user_id`
			AND blog_post.`post_id` = comment.`post_id`
			AND blog_post.post_id='$p_id'
			AND comment.is_active=3
			ORDER BY blog_post.post_id DESC";
		$m_result=mysqli_query($connection,$m_q);
		if($m_result->num_rows)
		{
			while($m_record=mysqli_fetch_assoc($m_result))
			{
				?>
				<div style="clear: both; margin:30px;"></div>	
				<div class="media">
					<img style="width:50px" src="../Upload_Images/<?php echo $m_record['image']; ?>" alt="" class="img-fluid" />
					<div class="media-body"><b style="color:green">
							&nbsp&nbsp<?php echo $m_record['first_name']." ".$m_record['middle_name']." ".$m_record['last_name'] ?></b>
						<h5 class="mt-0" style="margin-left:10px"> </h5>
						<p style="margin-left:10px;font-size:20"><b style="color:black"><?php echo $m_record['message'] ?></b></p>

						<div class="media mt-3">
							<a class="d-flex pr-3" href="#">
								<img src="images/t2.jpg" alt="" class="img-fluid" />
							</a>
							<div class="media-body">
								<h5 class="mt-0"> Richard Spark</h5>
								<p>Lorem Ipsum convallis diam consequat magna vulputate malesuada. id dignissim sapien velit id felis ac cursus eros.
									Cras a ornare elit.</p>
							</div>
						</div>
					</div>
				</div>
				<?php
			}
			?>
			
			<?php
		}
	}
	else if($_REQUEST['flag']=='single_post_like_auto_call')
	{
		$post_id=$p_id=$_SESSION['p_id'];
		$query="SELECT blog_post.*,user.*,category.`category_name`,post_status.added_on
		FROM USER,category,blog_post,STATUS,post_status
		WHERE user.`user_id` = blog_post.`user_id`
		AND category.`category_id` = blog_post.`category_id`
		AND blog_post.`post_id` = post_status.`post_id`
		AND status.`status_id` = post_status.`status_id`
		AND post_status.`status_id` = 3 
		AND blog_post.post_id='$p_id'
		ORDER BY blog_post.post_id DESC"; 
		$result=mysqli_query($connection,$query);
		$record = mysqli_fetch_assoc($result);
		?>
	<li>
										<a href="#">
											<i class="far fa-calendar-alt"></i> <?php echo $record['added_on'] ?></a>
									</li>
									<li class="mx-2" id="msg">			
									<?php
									$like = "SELECT SUM(like_status) AS 'total_likes'
									FROM likes,blog_post
									WHERE blog_post.`post_id` = likes.`post_id`
									AND blog_post.`post_id`='$post_id'"; 
									$like_result=mysqli_query($connection,$like);
									if($like_result->num_rows)
									{
										
										$user_id = $_SESSION['user']['user_id']; 
										$q = "SELECT likes.`user_id` 
												FROM likes
												WHERE likes.`post_id` ='$post_id'
												AND like_status = 1";
										$r_q = mysqli_query($connection,$q);
										if($r_q)
										{
											$r=mysqli_fetch_assoc($r_q);
											if($user_id==$r['user_id'])
											{
												$total_likes=mysqli_fetch_assoc($like_result);
												?><a style="color:white;" href="JavaScript:void(0);" onclick="single_post_likes( <?php echo $post_id ?>)">
													<i class="far fa-thumbs-up"></i> <b><?php echo $total_likes['total_likes']; ?> </b><b style="color:#FF1493">&nbsp unlike</b></a><?php
											}
											else
											{

												$total_likes=mysqli_fetch_assoc($like_result);
												?><a style="color:white" href="JavaScript:void(0);" onclick="single_post_likes( <?php echo $post_id ?>)">
													<i class="far fa-thumbs-up"></i><b> <?php echo $total_likes['total_likes']; ?> &nbsp likes</b></a><?php
											}
										
										}
									}
									?>
									</li>
									<li>
										<?php

										$comment_query="SELECT COUNT(*) AS t_comments
										FROM COMMENT 
										WHERE comment.`post_id` =$post_id
										AND comment.`is_active`=3 "; 
										$comment_result=mysqli_query($connection,$comment_query);
										$comment_row = mysqli_fetch_assoc($comment_result);
										?>
										<a href="single.php">
											<i class="far fa-comment"></i>
											<b><?php echo $comment_row['t_comments']; ?> Comments</b></a>
									</li>
									<li style="margin-left:30px">
										<a href="login.php">
											<b style="color:red">Category : </b> <?php echo $record['category_name'] ?></a>
									</li>
		<?php
	}
	else if($_REQUEST['flag']=='multiple_post_ratting')
	{

		$added_on=date('j M Y, h A');
		$rating_value=$_REQUEST['rating_value'];
		$r_post_id=$_REQUEST['r_post_id'];
		$_SESSION['r_post_id_s']=$r_post_id;
		$user_id=$_SESSION['user']['user_id']; 

		$q = "SELECT rating.`user_id`
				FROM rating
				WHERE rating.`post_id` = '$r_post_id'
				AND rating.`user_id` ='$user_id'"; 
		$r_q = mysqli_query($connection,$q);
		if($r_q)
		{
			$record=mysqli_fetch_assoc($r_q);
			if($user_id==$record['user_id'])
			{
				
					$unlike_query ="UPDATE rating SET rating_status='$rating_value',update_rating_time='$added_on'
					WHERE user_id='$user_id' AND post_id='$r_post_id'";
					$unlike_result = mysqli_query($connection,$unlike_query);
					if($unlike_result)
					{
						multiple_post_ratting($connection);
					}
				
			}
			else
			{
				$r_query="INSERT INTO rating (user_id,post_id,rating_status,rating_time) 
				VALUES('$user_id','$r_post_id','$rating_value','$added_on')";
				$r_result=mysqli_query($connection,$r_query);
				if($r_result)
				{
					multiple_post_ratting($connection);
				}
			}
		}

		

	}
	function multiple_post_ratting(&$connection)
	{
		$post_id=$_SESSION['r_post_id_s'];
		$user_id=$_SESSION['user']['user_id']; 
		$rating_q="SELECT rating.`rating_status` FROM rating WHERE rating.`post_id`='$post_id' AND rating.`user_id`='$user_id'"; 
		$rating_result=mysqli_query($connection,$rating_q);
		if($rating_result->num_rows)
		{
			if($rating_row=mysqli_fetch_assoc($rating_result))
			{
				$count=$rating_row['rating_status'];

				for($i=1;$i<=$count;$i++)
				{
					$arr[$post_id][$i]='checked';
				}
			}
		}
		$avg_rating="SELECT AVG(rating.`rating_status`) AS average_rating
		FROM rating WHERE rating.`post_id`='$post_id' ";
		$avg_result=mysqli_query($connection,$avg_rating);
		$avg_row=mysqli_fetch_assoc($avg_result);
		$avg = round($avg_row['average_rating'], 2);
		?>
		<span style="margin-left:5%;" >
		<span style="font-size:20px" onclick="star_rating(1,<?php echo $record['post_id'];?>)" class="fa fa-star <?php echo  $arr[$post_id][1]??'' ;?>"></span>
		<span style="font-size:20px" onclick="star_rating(2,<?php echo $record['post_id'];?>)" class="fa fa-star <?php echo  $arr[$post_id][2]??'' ;?>"></span>
		<span style="font-size:20px" onclick="star_rating(3,<?php echo $record['post_id'];?>)" class="fa fa-star <?php echo  $arr[$post_id][3]??'' ;?>"></span>
		<span style="font-size:20px" onclick="star_rating(4,<?php echo $record['post_id'];?>)" class="fa fa-star <?php echo  $arr[$post_id][4]??'' ;?>"></span>
		<span style="font-size:20px" onclick="star_rating(5,<?php echo $record['post_id'];?>)" class="fa fa-star <?php echo  $arr[$post_id][5]??'' ;?>"></span><b style="color:blue">&nbsp&nbsp Average rating:&nbsp <b style="color:#008080"><?php echo $avg;?></b></b></span></span><?php
	}
	function send_message_response(&$connection)
	{
		$p_id=$_SESSION['message_p_id'];
		$m_q="SELECT user.`first_name`,user.`middle_name`,user.`last_name`,user.`image`,comment.`message`
			FROM user,blog_post,comment
			WHERE user.`user_id` = comment.`user_id`
			AND blog_post.`post_id` = comment.`post_id`
			AND blog_post.post_id='$p_id'
			ORDER BY blog_post.post_id DESC";
		$m_result=mysqli_query($connection,$m_q);
		if($m_result->num_rows)
		{
			while($m_record=mysqli_fetch_assoc($m_result))
			{
				?>
				<img style="width:50px" src="../Upload_Images/<?php echo $m_record['image']; ?>" alt="" class="img-fluid" />
					<div class="media-body">
						<b class="mt-0" style="margin-left:10px"> 
							&nbsp<?php echo $m_record['first_name']." ".$m_record['middle_name']." ".$m_record['last_name'] ?>
						</b>
						<p style="margin-left:10px"> 
						<?php echo $m_record['message'] ?>
						</p>
					</div>
					<br/>
				<?php
			}
		}
							
	}
	function single_post_like(&$connection)
	{
		$post_id=$p_id=$_SESSION['p_id'];
		$query="SELECT blog_post.*,user.*,category.`category_name`,post_status.added_on
		FROM USER,category,blog_post,STATUS,post_status
		WHERE user.`user_id` = blog_post.`user_id`
		AND category.`category_id` = blog_post.`category_id`
		AND blog_post.`post_id` = post_status.`post_id`
		AND status.`status_id` = post_status.`status_id`
		AND post_status.`status_id` = 3 
		AND blog_post.post_id='$p_id'
		ORDER BY blog_post.post_id DESC"; 
		$result=mysqli_query($connection,$query);
		$record = mysqli_fetch_assoc($result);
		?>
	<ul>
		<li>
			<a href="#">
				<i class="far fa-calendar-alt"></i> <?php echo $record['added_on'] ?></a>
		</li>
		<li class="mx-2">
							
		<?php
		$like = "SELECT SUM(like_status) AS 'total_likes'
		FROM likes,blog_post
		WHERE blog_post.`post_id` = likes.`post_id`
		AND blog_post.`post_id`='$post_id'"; 
		$like_result=mysqli_query($connection,$like);
		if($like_result->num_rows)
		{
			
			$user_id = $_SESSION['user']['user_id']; 
			$q = "SELECT likes.`user_id` 
					FROM likes
					WHERE likes.`post_id` ='$post_id'
					AND like_status = 1
					AND likes.`user_id` = '$user_id'";
			$r_q = mysqli_query($connection,$q);
			if($r_q)
			{
				$r=mysqli_fetch_assoc($r_q);
				if($user_id==$r['user_id'])
				{
					$total_likes=mysqli_fetch_assoc($like_result);
					?><a style="color:white;" href="JavaScript:void(0);" onclick="single_post_likes( <?php echo $post_id ?>)">
						<i class="far fa-thumbs-up"></i> <b><?php echo $total_likes['total_likes']; ?> </b><b style="color:#FF1493">&nbsp unlike</b></a><?php
				}
				else
				{

					$total_likes=mysqli_fetch_assoc($like_result);
					?><a style="color:white" href="JavaScript:void(0);" onclick="single_post_likes( <?php echo $post_id ?>)">
						<i class="far fa-thumbs-up"></i><b> <?php echo $total_likes['total_likes']; ?> &nbsp likes</b></a><?php
				}
			
			}
		}
		?>
		</li>
		<li>
			<?php

			$comment_query="SELECT SUM(comment.`is_active`) AS comments
			FROM COMMENT 
			WHERE comment.`post_id` =$post_id
			AND comment.`is_active`=1 "; 
			$comment_result=mysqli_query($connection,$comment_query);
			$comment_row = mysqli_fetch_assoc($comment_result);
			?>
			<a href="single.php">
				<i class="far fa-comment"></i>&nbsp<b><?php echo $comment_row['comments']; ?>  Comments</b></a>
		</li>
		<li style="margin-left:30px">
			<a href="login.php">
				<b style="color:red">Category : </b> <?php echo $record['category_name'] ?></a>
		</li>
	</ul>
		<?php

	}
	function multiple_post_like(&$connection)
	{
		$multiple_post_id=$_SESSION['m_p_id'];
		$query="SELECT blog_post.*,user.*,category.`category_name`,post_status.added_on
		FROM USER,category,blog_post,STATUS,post_status
		WHERE user.`user_id` = blog_post.`user_id`
		AND category.`category_id` = blog_post.`category_id`
		AND blog_post.`post_id` = post_status.`post_id`
		AND status.`status_id` = post_status.`status_id`
		AND post_status.`status_id` = 3 
		AND blog_post.post_id='$multiple_post_id'
		ORDER BY blog_post.post_id DESC"; 
		$result=mysqli_query($connection,$query);
		$record = mysqli_fetch_assoc($result);
		$post_id = $record['post_id'];
		?>
	<ul>
		<li>
			<a href="#">
				<i class="far fa-calendar-alt"></i> <?php echo $record['added_on'] ?></a>
		</li>
		<li class="mx-2">
							
		<?php
		$like = "SELECT SUM(like_status) AS 'total_likes'
		FROM likes,blog_post
		WHERE blog_post.`post_id` = likes.`post_id`
		AND blog_post.`post_id`='$post_id'"; 
		$like_result=mysqli_query($connection,$like);
		if($like_result->num_rows)
		{
			
			$user_id = $_SESSION['user']['user_id']; 
			$q = "SELECT likes.`user_id` 
					FROM likes
					WHERE likes.`post_id` ='$post_id'
					AND like_status = 1
					AND likes.`user_id` = '$user_id'";
			$r_q = mysqli_query($connection,$q);
			if($r_q)
			{
				$r=mysqli_fetch_assoc($r_q);
				if($user_id==$r['user_id'])
				{
					$total_likes=mysqli_fetch_assoc($like_result);
					?><a style="color:white;" href="JavaScript:void(0);" onclick="multiple_post_likes( <?php echo $post_id ?>)">
						<i class="far fa-thumbs-up"></i> <b><?php echo $total_likes['total_likes']; ?> </b><b style="color:#FF1493">&nbsp unlike</b></a><?php
				}
				else
				{

					$total_likes=mysqli_fetch_assoc($like_result);
					?><a style="color:white" href="JavaScript:void(0);" onclick="multiple_post_likes( <?php echo $post_id ?>)">
						<i class="far fa-thumbs-up"></i><b> <?php echo $total_likes['total_likes']; ?> &nbsp likes</b></a><?php
				}
			
			}
		}
		?>
		</li>
		<li>
			<?php

			$comment_query="SELECT SUM(comment.`is_active`) AS comments
			FROM COMMENT 
			WHERE comment.`post_id` =$post_id
			AND comment.`is_active`=1 "; 
			$comment_result=mysqli_query($connection,$comment_query);
			$comment_row = mysqli_fetch_assoc($comment_result);
			?>
			<a href="single.php">
				<i class="far fa-comment"></i>&nbsp<b><?php echo $comment_row['comments']; ?>  Comments</b></a>
		</li>
		<li style="margin-left:30px">
			<a href="login.php">
				<b style="color:red">Category : </b> <?php echo $record['category_name'] ?></a>
		</li>
	</ul>
		<?php

	}
	?>