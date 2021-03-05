<script type="text/javascript">
	function multiple_post_likes(post_id)
	{
        //alert(post_id);
       	var ajax_request=null;

        if(window.XMLHttpRequest)
        {
            ajax_request = new XMLHttpRequest();
        }
        else
        {
            ajax_request = ActiveXObject("Microsoft.XMLHTTP");
        }
        ajax_request.onreadystatechange = function()
        {
            if(ajax_request.readyState==4 && ajax_request.status==200)
            {
                document.getElementById("multiple_likes"+post_id).innerHTML=ajax_request.responseText;
                //location.href = "index.php";
            }
        }
        ajax_request.open("POST","like_comment_ratting_process.php");
        ajax_request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        ajax_request.send("flag=multiple_post_likes&post_id="+post_id);
	}
	function star_rating(rating_value,r_post_id)
	{
		var ajax_request=null;

        if(window.XMLHttpRequest)
        {
            ajax_request = new XMLHttpRequest();
        }
        else
        {
            ajax_request = ActiveXObject("Microsoft.XMLHTTP");
        }
        ajax_request.onreadystatechange = function()
        {
            if(ajax_request.readyState==4 && ajax_request.status==200)
            {
            	//alert(ajax_request.responseText);
                document.getElementById("multiple_post_ratting_response"+r_post_id).innerHTML=ajax_request.responseText;
                //location.href = "index.php";
            }
        }
        ajax_request.open("POST","like_comment_ratting_process.php");
        ajax_request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        ajax_request.send("flag=multiple_post_ratting&r_post_id="+r_post_id+"&rating_value="+rating_value);

	}
</script>
<!-- Font Awesome Icon Library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.checked {
  color: orange;
}
</style>

<section class="main-content-w3layouts-agileits">
		<div class="container">
			<div class="row">
				<!--left-->
				<div class="col-lg-8 left-blog-info-w3layouts-agileits text-left">
					<div class="blog-grid-top">
						<?php 
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
												<a href="single.php">
													<img src="../Files Attachment/<?php echo $image_record['attachment_name']; ?>" class="img-fluid" alt="">
												</a>
											</div>
											<div class="blog-info-middle" id="multiple_likes<?php echo $post_id; ?>">
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
														<a href="index.php?category_id=<?php echo $record['category_id'];?>">
															<b style="color:red">Category : </b> <?php echo $record['category_name'] ?></a>
													</li>
												</ul>
											</div>
										</div>
										<div><b style="color:brown;margin:10px">Author : </b>
											<img style="height:35px;border-radius:100px;margin:8px" src="../Upload_Images/<?php echo $record['image']; ?>"  alt="">
											<b style="color:purple">&nbsp<?php echo $record['first_name']." ".$record['middle_name']." ".$record['last_name'] ?></b>
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
											<span style="margin-left:5%;" >
<span style="font-size:20px" onclick="star_rating(1,<?php echo $record['post_id'];?>)" class="fa fa-star <?php echo  $arr[$post_id][1]??'' ;?>"></span>
<span style="font-size:20px" onclick="star_rating(2,<?php echo $record['post_id'];?>)" class="fa fa-star <?php echo  $arr[$post_id][2]??'' ;?>"></span>
<span style="font-size:20px" onclick="star_rating(3,<?php echo $record['post_id'];?>)" class="fa fa-star <?php echo  $arr[$post_id][3]??'' ;?>"></span>
<span style="font-size:20px" onclick="star_rating(4,<?php echo $record['post_id'];?>)" class="fa fa-star <?php echo  $arr[$post_id][4]??'' ;?>"></span>
<span style="font-size:20px" onclick="star_rating(5,<?php echo $record['post_id'];?>)" class="fa fa-star <?php echo  $arr[$post_id][5]??'' ;?>"></span><b style="color:blue">&nbsp&nbsp Average rating:&nbsp <b style="color:#008080"><?php echo $avg;?></b></b></span></span>
										</div>
										<h4 style="color:green;">
											<b><?php echo $record['title'] ?></b>
										</h4>
										<br>
										<h5 style="color:black;font-size:16px"><b><?php echo $record['summary'] ?></b></h5>
										<br>
										<a href="single.php?post_id=<?php echo $record['post_id']; ?>&category_id=<?php echo $record['category_id']; ?>" class="btn btn-primary read-m">Read More</a>
										<div style="clear: both; margin:30px;">
										</div>
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