<?php
	ob_start();
require_once("require/connection.php");
if(isset($_POST['submit']))
{
	include_once("include/header.php");
?>
	<script type="text/javascript">
		function read_more()
		{
			document.getElementById('read_more_message').innerHTML=
			" &nbsp&nbsp<b style='color:red'>For more description kindly <b> <a style='color:green' href='login.php'>&nbspSIGN-IN&nbsp</a></b> first.</b>";
		}
	</script>
<section class="main-content-w3layouts-agileits">
		<div class="container">
			<div class="row">
				<!--left-->
				<div class="col-lg-8 left-blog-info-w3layouts-agileits text-left">
					<div class="blog-grid-top"><?php 
					$search=$_REQUEST['search'];
				$query="SELECT blog_post.*,user.*,category.`category_name`,post_status.added_on
					FROM USER,category,blog_post,STATUS,post_status
		WHERE (title LIKE '%$search%' OR summary LIKE '%$search%' OR description LIKE '%$search%' OR category_name LIKE '%$search%' OR first_name LIKE '%$search%' OR middle_name LIKE '%$search%' OR last_name LIKE '%$search%')
					AND user.`user_id` = blog_post.`user_id`
					AND category.`category_id` = blog_post.`category_id`
					AND blog_post.`post_id` = post_status.`post_id`
					AND status.`status_id` = post_status.`status_id`
					AND post_status.`status_id` = 3 ORDER BY blog_post.post_id DESC"; 
					$result=mysqli_query($connection,$query);
					if($result->num_rows)
					{	$post_id = NULL;
						while($record=mysqli_fetch_assoc($result))
						{ 
							$post_id=$record['post_id'];
							$image_query="SELECT post_attachment.`attachment_name`
							FROM blog_post,attachment,post_attachment
							WHERE blog_post.`post_id` = post_attachment.`post_id`
							AND attachment.`attachment_type_id` = post_attachment.`attachment_type_id`
							AND blog_post.`post_id` = $post_id"; 
							$image_result = mysqli_query($connection,$image_query);
							$image_record = mysqli_fetch_assoc($image_result);
						?>
							<div class="b-grid-top">
								<div class="blog_info_left_grid">
									<a href="single.php">
										<img src="Files Attachment/<?php echo $image_record['attachment_name']; ?>" class="img-fluid" alt="">
									</a>
								</div>
								<div class="blog-info-middle">
									<ul>
										<li>
											<a href="#">
												<i class="far fa-calendar-alt"></i> <?php echo $record['added_on'] ?></a>
										</li>
										<li class="mx-2">
											<a href="login.php">
												<i class="far fa-thumbs-up"></i> 201 Likes</a>
										</li>
										<li>
											<a href="login.php">
												<i class="far fa-comment"></i> 15 Comments</a>
										</li>
										<li style="margin-left:30px">
											<a href="login.php">
												<b style="color:red">Category : </b> <?php echo $record['category_name'] ?>
											</a>
										</li>
									</ul>
								</div>
							</div>
							<div><b style="color:brown;margin:10px">Author : </b>
								<img style="height:35px;border-radius:100px;margin:8px" src="Upload_Images/<?php echo $record['image']; ?>"  alt="">
								<b style="color:purple">&nbsp<?php echo $record['first_name']." ".$record['middle_name']." ".$record['last_name'] ?></b>
							</div>
							<h3>
								<a href="single.php"><?php echo $record['title'] ?></a>
							</h3>
							<p><?php echo $record['summary'] ?></p>
							<button name="read_more" class="btn btn-primary read-m" onclick="read_more()">Read More</button>
							<span id="read_more_message"></span>
							<div style="clear: both; margin:30px;"></div>
						
							<?php
						}
					?></div> </div><?php
					include_once("include/right_side.php");
					include_once("include/footer.php"); 
					}	
					else
					{
						?><div align="center" style="margin-left:50%"><b style='color:red'>Record Not Found Please Try Again</b></div><?php
					} 

					
} 
else
{
	header("location:index.php");
} 
?>
					