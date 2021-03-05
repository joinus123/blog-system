</script>
<!-- Font Awesome Icon Library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.checked {
  color: orange;
}
</style>
<script type="text/javascript">
	function read_more(read_more)
	{
		document.getElementById('read_more_message'+read_more).innerHTML=
		" &nbsp&nbsp<b style='color:red'>For more description kindly <b> <a style='color:green' href='login.php'>&nbspSIGN-IN&nbsp</a></b> first.</b>";
	}
	function comment(comment)
	{
		document.getElementById('comment'+comment).innerHTML=
		" &nbsp&nbsp<b style='color:red'>you can't comment still kindly <b> <a style='color:green' href='login.php'>&nbspSIGN-IN&nbsp</a></b> first.</b>";
	}
	function like(like)
	{
		document.getElementById('comment'+like).innerHTML=
		" &nbsp&nbsp<b style='color:red'>you can't like still kindly <b> <a style='color:green' href='login.php'>&nbspSIGN-IN&nbsp</a></b> first.</b>";
	}
	function star_rating(rating_value,rating_p_id)
	{
		document.getElementById('star_rating'+rating_p_id).innerHTML=
		" &nbsp&nbsp<b style='color:red'>you can't give rating kindly <b> <a style='color:green' href='login.php'>&nbspSIGN-IN&nbsp</a></b> first.</b>";
	}
</script>
<section class="main-content-w3layouts-agileits">
		<div class="container">
			<div class="row">
				<!--left-->
				<div class="col-lg-8 left-blog-info-w3layouts-agileits text-left">
					<div class="blog-grid-top"> <?php
						   	if(isset($_REQUEST['category_id']))
							{
								$c= $_REQUEST['category_id'];
								$query="SELECT blog_post.*,user.*,category.*,post_status.added_on
								FROM USER,category,blog_post,STATUS,post_status
								WHERE user.`user_id` = blog_post.`user_id`
								AND category.`category_id` = blog_post.`category_id`
								AND blog_post.`post_id` = post_status.`post_id`
								AND status.`status_id` = post_status.`status_id` 
								AND blog_post.category_id = $c
								AND post_status.`status_id` = 3 ORDER BY blog_post.post_id DESC"; 
							}
							else
							{
								$query="SELECT blog_post.*,user.*,category.*,post_status.added_on
								FROM USER,category,blog_post,STATUS,post_status
								WHERE user.`user_id` = blog_post.`user_id`
								AND category.`category_id` = blog_post.`category_id`
								AND blog_post.`post_id` = post_status.`post_id`
								AND status.`status_id` = post_status.`status_id`
								AND post_status.`status_id` = 3 ORDER BY blog_post.post_id DESC"; 
							}
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
												<a href="JavaScript:void(0);">
													<img src="Files Attachment/<?php echo $image_record['attachment_name']; ?>" class="img-fluid" alt="">
												</a>
											</div>
											<div class="blog-info-middle">
												<ul>
													<li>
														<a href="JavaScript:void(0);">
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
													$total_likes=mysqli_fetch_assoc($like_result); ?>
														<a href="JavaScript:void(0);" onclick="like( <?php echo $post_id ?>)">
															<i class="far fa-thumbs-up"></i> <?php echo $total_likes['total_likes']; ?> Likes
														</a> <?php
												} ?>
													</li>
													<li>
														<?php
														$user_id=$record['user_id'];
														$comment_query="SELECT COUNT(*) AS comments
														FROM COMMENT 
														WHERE comment.`post_id` =$post_id
														AND comment.`is_active`=3 "; 
														$comment_result=mysqli_query($connection,$comment_query);
														$comment_row = mysqli_fetch_assoc($comment_result);
														?>
														<a href="JavaScript:void(0);" onclick="comment( <?php echo $post_id ?>)">
															<i class="far fa-comment"></i>&nbsp<b><?php echo $comment_row['comments']; ?>  Comments</b></a>
														</a>
													</li>
													<li style="margin-left:30px">
														<a href="index.php?category_id=<?php echo $record['category_id'] ?>">
															<b style="color:red">Category : </b> <?php echo $record['category_name'] ?></a>
													</li>
												</ul>
											</div>
										</div>
										<span id="comment<?php echo $post_id ?>"></span>
										<div><b style="color:brown;margin:10px">Author : </b>
											<img style="height:35px;border-radius:100px;margin:8px" src="Upload_Images/<?php echo $record['image']; ?>"  alt="">
											<b style="color:purple">&nbsp<?php echo $record['first_name']." ".$record['middle_name']." ".$record['last_name'] ?></b>
											<span id="multiple_post_ratting_response<?php echo $record['post_id'];?>">
											<?php
											$rating_q="SELECT rating.`rating_status` FROM rating WHERE rating.`post_id`='$post_id' "; 
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
<span style="font-size:20px" onclick="star_rating(5,<?php echo $record['post_id'];?>)" class="fa fa-star <?php echo  $arr[$post_id][5]??'' ;?>"></span><b style="color:blue">&nbsp&nbsp Average rating:&nbsp <b style="color:#008080"><?php echo $avg;?></b></b></span></span>
										</div>
										<span id="star_rating<?php echo $post_id ?>"></span>
										<h4 style="color:green;">
											<b><?php echo $record['title'] ?></b>
										</h4>
										<br>
										<h5 style="color:black;font-size:16px"><b><?php echo $record['summary'] ?></b></h5>
										<br>
										<button name="read_more" class="btn btn-primary read-m" onclick="read_more( <?php echo $post_id ?>)">Read More</button>
										<span id="read_more_message<?php echo $post_id ?>"></span>
										<div style="clear: both; margin:30px;"></div>
										
									<?php
									}
								}
							?>
					</div>
						<nav aria-label="Page navigation example">
						<ul class="pagination justify-content-left">
							<li class="page-item disabled">
								<a class="page-link" href="#" tabindex="-1">Previous</a>
							</li>
							<li class="page-item">
								<a class="page-link" href="#">1</a>
							</li>
							<li class="page-item">
								<a class="page-link" href="#">2</a>
							</li>
							<li class="page-item">
								<a class="page-link" href="#">3</a>
							</li>
							<li class="page-item">
								<a class="page-link" href="#">Next</a>
							</li>
						</ul>
					</nav>
					
				</div>
				
				<!--//left-->