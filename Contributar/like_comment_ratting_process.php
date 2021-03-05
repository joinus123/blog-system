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
					<div class="media-body">
							&nbsp&nbsp<?php echo $m_record['first_name']." ".$m_record['middle_name']." ".$m_record['last_name'] ?>
						<h5 class="mt-0" style="margin-left:10px"> </h5>
						<p style="margin-left:10px"> <?php echo $m_record['message'] ?></p>

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
	<div class="row">
                <div class="col-lg-8 col-md-12">
                    <div class="card">
                        <div class="blogitem">
                    <?php 
                    $query="SELECT blog_post.*,user.*,category.`category_name`,post_status.added_on
                    FROM USER,category,blog_post,STATUS,post_status
                    WHERE user.`user_id` = blog_post.`user_id`
                    AND category.`category_id` = blog_post.`category_id`
                    AND blog_post.`post_id` = post_status.`post_id`
                    AND status.`status_id` = post_status.`status_id`
                    AND post_status.`status_id` = 3 ORDER BY blog_post.post_id DESC"; 
                    $result=mysqli_query($connection,$query);
                    if($result->num_rows)
                    {   $post_id = NULL;
                        while($record=mysqli_fetch_assoc($result))
                        { 
                            $post_id=$record['post_id'];
                            $image_query="SELECT post_attachment.`attachment_name`
                            FROM blog_post,attachment,post_attachment
                            WHERE blog_post.`post_id` = post_attachment.`post_id`
                            AND attachment.`attachment_type_id` = post_attachment.`attachment_type_id`
                            AND blog_post.`post_id` = $post_id"; 
                            $image_result = mysqli_query($connection,$image_query);
                            $image_record = mysqli_fetch_assoc($image_result); ?>
                            <div class="blogitem-image">
                                <a href="blog-details.html"><img src="../Files Attachment/<?php echo $image_record['attachment_name']; ?>" alt="blog image"></a>
                                <span class="blogitem-date"><?php echo $record['added_on'];?></span>
                            </div>
                            <div class="blogitem-content">
                                <div class="blogitem-header">
                                    <div class="blogitem-meta">
                                        <span><i class="zmdi zmdi-account"></i>By <a href="javascript:void(0);">
                                            <b style="color:purple"><?php echo $record['first_name']." ".$record['middle_name']." ".$record['last_name'] ?></b></a></span>
                                        <span style="margin-left:10%">
                                            <?php
                                            $comment_query="SELECT COUNT(*) AS t_comments
                                            FROM COMMENT 
                                            WHERE comment.`post_id` =$post_id
                                            AND comment.`is_active`=3 "; 
                                            $comment_result=mysqli_query($connection,$comment_query);
                                            $comment_row = mysqli_fetch_assoc($comment_result);
                                            ?>
                                            <i class="zmdi zmdi-comment-text col-red"></i><a href="javascript:void(0);">Comments ( <b style="color:black"><?php echo $comment_row['t_comments'];  ?></b> )</a>
                                        </span>
                                         <span style="margin-left:10%">
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
                                                        ?><a style="color:orange;" href="JavaScript:void(0);" onclick="multiple_post_likes( <?php echo $post_id ?>)">
                                                              <i class="zmdi zmdi-favorite" class="mb-0 text-muted"></i>  
                                                             <b style="color:#FF1493">
                                                               unlike (<b style="color:black"> <?php echo $total_likes['total_likes'];?> </b>)
                                                            </b>
                                                        </a><?php
                                                    }
                                                    else
                                                    {

                                                       $total_likes=mysqli_fetch_assoc($like_result);
                                                        ?><a style="color:black;" href="JavaScript:void(0);" onclick="multiple_post_likes( <?php echo $post_id ?>)">
                                                              <i class="zmdi zmdi-favorite" class="mb-0 text-muted"></i>  
                                                             <b style="color:blue">
                                                               like (<b style="color:black"> <?php echo $total_likes['total_likes'];?> </b>)
                                                            </b>
                                                        </a><?php
                                                    }
                                                
                                                }
                                            }
                                            ?>
                                        </span>
                                   
                                    <div class="blogitem-share">
                                        <span id="multiple_post_ratting_response<?php echo $record['post_id'];?>">
                                            <?php
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
                                            <span>
<span style="font-size:17px" onclick="star_rating(1,<?php echo $record['post_id'];?>)" class="fa fa-star <?php echo  $arr[$post_id][1]??'' ;?>"></span>
<span style="font-size:17px" onclick="star_rating(2,<?php echo $record['post_id'];?>)" class="fa fa-star <?php echo  $arr[$post_id][2]??'' ;?>"></span>
<span style="font-size:17px" onclick="star_rating(3,<?php echo $record['post_id'];?>)" class="fa fa-star <?php echo  $arr[$post_id][3]??'' ;?>"></span>
<span style="font-size:17px" onclick="star_rating(4,<?php echo $record['post_id'];?>)" class="fa fa-star <?php echo  $arr[$post_id][4]??'' ;?>"></span>
<span style="font-size:17px" onclick="star_rating(5,<?php echo $record['post_id'];?>)" class="fa fa-star <?php echo  $arr[$post_id][5]??'' ;?>"></span><b style="color:red">&nbsp&nbsp Average rating:&nbsp <b style="color:#008080"><?php echo $avg;?></b></b></span></span>
                                    </div>
                                </div> </div>
                                <h5><a href="blog-details.html"><?php echo $record['title'] ?></a></h5>
                                <p><?php echo $record['summary'] ?></p>
                                <a href="blog-details.html" class="btn btn-info">Read More</a>
                            </div>
                             <?php
                        }
                    } ?>
                        </div>
                    </div>
                    <div class="card">
                        <ul class="pagination pagination-primary">
                            <li class="page-item"><a class="page-link" href="javascript:void(0);">Previous</a></li>
                            <li class="page-item active"><a class="page-link" href="javascript:void(0);">1</a></li>
                            <li class="page-item"><a class="page-link" href="javascript:void(0);">2</a></li>
                            <li class="page-item"><a class="page-link" href="javascript:void(0);">3</a></li>
                            <li class="page-item"><a class="page-link" href="javascript:void(0);">Next</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="card">
                        <div class="body search">
                            <div class="input-group mb-0">
                                <input type="text" class="form-control" placeholder="Search...">
                                <div class="input-group-append">
                                    <span class="input-group-text" id="basic-addon2"><i class="zmdi zmdi-search"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>                    
                    <div class="card">
                        <div class="header">
                            <h2><strong>Categories</strong></h2>                        
                        </div>
                        <div class="body">
                            <ul class="list-unstyled mb-0 widget-categories">
                                <?php 
                                $q="SELECT *FROM category WHERE status_id=3";
                                $r=mysqli_query($connection,$q);
                                if($r->num_rows)
                                {
                                    while($category=mysqli_fetch_assoc($r))
                                    {
                                        ?>
                                         <li><a href="javascript:void(0);"> <?php echo $category['category_name'] ?></a></li>
                                        <?php
                                    }
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                    <div class="card">
                        <div class="header">
                            <h2><strong>Recent</strong> Posts</h2>
                        </div>
                        <div class="body">
                            <ul class="list-unstyled mb-0 widget-recentpost">
                                 <?php 
                    $query="SELECT blog_post.*,user.*,category.`category_name`,post_status.added_on
                    FROM USER,category,blog_post,STATUS,post_status
                    WHERE user.`user_id` = blog_post.`user_id`
                    AND category.`category_id` = blog_post.`category_id`
                    AND blog_post.`post_id` = post_status.`post_id`
                    AND status.`status_id` = post_status.`status_id`
                    AND post_status.`status_id` = 3 ORDER BY blog_post.post_id DESC"; 
                    $result=mysqli_query($connection,$query);
                    if($result->num_rows)
                    {   $post_id = NULL;
                        while($record=mysqli_fetch_assoc($result))
                        { 
                            $post_id=$record['post_id'];
                            $image_query="SELECT post_attachment.`attachment_name`
                            FROM blog_post,attachment,post_attachment
                            WHERE blog_post.`post_id` = post_attachment.`post_id`
                            AND attachment.`attachment_type_id` = post_attachment.`attachment_type_id`
                            AND blog_post.`post_id` = $post_id"; 
                            $image_result = mysqli_query($connection,$image_query);
                            $image_record = mysqli_fetch_assoc($image_result); ?>
                                <li>
                                    <a href="blog-details.html"><img src="../Files Attachment/<?php echo $image_record['attachment_name']; ?>" alt="blog thumbnail"></a>
                                    <div class="recentpost-content">
                                        <a href="blog-details.html"><?php echo $record['title'] ?></a>
                                        <span><?php echo $record['added_on'] ?></span>
                                    </div>
                                </li>
                    <?php
                    }
                        }

                    ?>
                            </ul>
                        </div>
                    </div>

                    <div class="card">
                        <div class="header">
                            <h2><strong>Tag</strong> Clouds</h2>                        
                        </div>
                        <div class="body">
                            <ul class="list-unstyled mb-0 tag-clouds">
                                <li><a href="javascript:void(0);" class="tag badge badge-default">Design</a></li>
                                <li><a href="javascript:void(0);" class="tag badge badge-success">Project</a></li>
                                <li><a href="javascript:void(0);" class="tag badge badge-info">Creative UX</a></li>
                                <li><a href="javascript:void(0);" class="tag badge badge-success">Wordpress</a></li>
                                <li><a href="javascript:void(0);" class="tag badge badge-warning">HTML5</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card">
                        <div class="header">
                            <h2><strong>Instagram</strong> Post</h2>                        
                        </div>
                        <div class="body">
                            <ul class="list-unstyled mb-0 instagram-plugin">
                                <li><a href="javascript:void(0);"><img src="assets/images/blog/05-img.jpg" alt="image description"></a></li>
                                <li><a href="javascript:void(0);"><img src="assets/images/blog/06-img.jpg" alt="image description"></a></li>
                                <li><a href="javascript:void(0);"><img src="assets/images/blog/07-img.jpg" alt="image description"></a></li>
                                <li><a href="javascript:void(0);"><img src="assets/images/blog/08-img.jpg" alt="image description"></a></li>
                                <li><a href="javascript:void(0);"><img src="assets/images/blog/09-img.jpg" alt="image description"></a></li>
                                <li><a href="javascript:void(0);"><img src="assets/images/blog/10-img.jpg" alt="image description"></a></li>
                                <li><a href="javascript:void(0);"><img src="assets/images/blog/11-img.jpg" alt="image description"></a></li>
                                <li><a href="javascript:void(0);"><img src="assets/images/blog/12-img.jpg" alt="image description"></a></li>
                                <li><a href="javascript:void(0);"><img src="assets/images/blog/13-img.jpg" alt="image description"></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card">
                        <div class="header">
                            <h2><strong>Email</strong> Newsletter</h2>
                        </div>
                        <div class="body newsletter">                            
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Enter Email">
                                <div class="input-group-append">
                                    <span class="input-group-text" id="basic-addon2"><i class="zmdi zmdi-mail-send"></i></span>
                                </div>
                            </div>
                            <small>Get our products/news earlier than others, let’s get in touch.</small>
                        </div>
                    </div>
                </div>
            </div>
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
                                            <span>
<span style="font-size:17px" onclick="star_rating(1,<?php echo $record['post_id'];?>)" class="fa fa-star <?php echo  $arr[$post_id][1]??'' ;?>"></span>
<span style="font-size:17px" onclick="star_rating(2,<?php echo $record['post_id'];?>)" class="fa fa-star <?php echo  $arr[$post_id][2]??'' ;?>"></span>
<span style="font-size:17px" onclick="star_rating(3,<?php echo $record['post_id'];?>)" class="fa fa-star <?php echo  $arr[$post_id][3]??'' ;?>"></span>
<span style="font-size:17px" onclick="star_rating(4,<?php echo $record['post_id'];?>)" class="fa fa-star <?php echo  $arr[$post_id][4]??'' ;?>"></span>
<span style="font-size:17px" onclick="star_rating(5,<?php echo $record['post_id'];?>)" class="fa fa-star <?php echo  $arr[$post_id][5]??'' ;?>"></span><b style="color:red">&nbsp&nbsp Average rating:&nbsp <b style="color:#008080"><?php echo $avg;?></b></b></span><?php
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
            ?><a style="color:orange;" href="JavaScript:void(0);" onclick="multiple_post_likes( <?php echo $post_id ?>)">
                  <i class="zmdi zmdi-favorite" class="mb-0 text-muted"></i>  
                 <b style="color:#FF1493">
                   unlike (<b style="color:black"> <?php echo $total_likes['total_likes'];?> </b>)
                </b>
            </a><?php
        }
        else
        {

           $total_likes=mysqli_fetch_assoc($like_result);
            ?><a style="color:black;" href="JavaScript:void(0);" onclick="multiple_post_likes( <?php echo $post_id ?>)">
                  <i class="zmdi zmdi-favorite" class="mb-0 text-muted"></i>  
                 <b style="color:blue">
                   like (<b style="color:black"> <?php echo $total_likes['total_likes'];?> </b>)
                </b>
            </a><?php
        }
    
    }
}
	

	}
	?>