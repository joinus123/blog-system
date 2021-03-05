<?php
	require_once("../require/connection.php");
	include_once("include/session_maintenance.php");
	include_once("../include/header.php");
	if(isset($_REQUEST['post_id'])){
		$_SESSION['p_id']=$_REQUEST['post_id'];
		$_SESSION['c_id']=$_REQUEST['category_id'];
	}
	
?>
</script>
<!-- Font Awesome Icon Library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.checked {
  color: orange;
}
</style>
<script type="text/javascript">
	function single_post_likes(post_id)
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
                document.getElementById("single_post").innerHTML=ajax_request.responseText;
                //location.href = "single.php";
            }
        }
        ajax_request.open("POST","like_comment_ratting_process.php");
        ajax_request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        ajax_request.send("flag=single_post_likes&post_id="+post_id);
	}
	function send_comment(m_p_id)
	{
		var send_message= document.getElementById('send_message').value;
   
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
                document.getElementById("comment_message").innerHTML=ajax_request.responseText;
                var send_message= document.getElementById('send_message').value="";
            }
        }
        ajax_request.open("POST","like_comment_ratting_process.php");
        ajax_request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        ajax_request.send("flag=send_comment&m_p_id="+m_p_id+"&send_message="+send_message);
    }
    function comment_auto_call()
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
                document.getElementById("comment_message_response").innerHTML=ajax_request.responseText;
            }
        }
        ajax_request.open("POST","like_comment_ratting_process.php");
        ajax_request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        ajax_request.send("flag=comment_auto_call");
    }
    function single_post_like_auto_call()
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
                document.getElementById("like_message_response").innerHTML=ajax_request.responseText;
            }
        }
        ajax_request.open("POST","like_comment_ratting_process.php");
        ajax_request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        ajax_request.send("flag=single_post_like_auto_call");
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
    setInterval("comment_auto_call()",1000);
    setInterval("single_post_like_auto_call()",500);
</script>
	<section class="main-content-w3layouts-agileits">
		<div class="container">
			<div class="row">
				<!--left-->
				<div class="col-lg-8 left-blog-info-w3layouts-agileits text-left">
				<?php 
				$p_id=$_SESSION['p_id'];
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
					?>
					<div class="b-grid-top">
	<section style="margin-top:-7%;width:755px;">
		<div class="container">
			<div class="row inner-sec" >
				<div class="col-md-4 news-left" >
					<ul id="demo1_thumbs" class="list-inline">
							<?php
							if($image_result->num_rows)
							{	$c=1;
								while($image_record = mysqli_fetch_assoc($image_result))
								{ ?> <?php
									$ext = pathinfo($image_record['attachment_name'], PATHINFO_EXTENSION);
									$video =  array('mp4','MP4');
									$audio =  array('mp3','MP3','WAV','wav');
									$text =  array('doc','pdf','xlsx','ppt','DOC','PDF','XLSX','PPT');
									$ext = pathinfo($image_record['attachment_name'], PATHINFO_EXTENSION);
									if(in_array($ext,$video))
									{ ?>
										<div>
											<video width="700" height="600" controls>
	  											<source src="../Files Attachment/<?php echo $image_record['attachment_name']; ?>"  data-desoslide-caption="<h3 style='color:purple'><?php echo $record['first_name']." ".$record['middle_name']." ".$record['last_name'] ?></h3>">
											</video>
										</div> <?php 
									} 
									else if(in_array($ext,$audio))
									{ ?>
										<div>
											<audio width="700" height="600" controls>
	  											<source src="../Files Attachment/<?php echo $image_record['attachment_name']; ?>"  data-desoslide-caption="<h3 style='color:purple'><?php echo $record['first_name']." ".$record['middle_name']." ".$record['last_name'] ?></h3>">
											</audio>
										</div> <?php 
									} 
									else 
									{
										?>
										<li>
										<a href="../Files Attachment/<?php echo $image_record['attachment_name']; ?>">

										<img  src="../Files Attachment/<?php echo $image_record['attachment_name']; ?>" alt="" data-desoslide-caption="<h3 style='color:purple'><?php echo $record['first_name']." ".$record['middle_name']." ".$record['last_name'] ?></h3>">
										<div class="mid-text-info">
											<h4><?php echo $record['category_name'];//echo $record['title'] ?></h4>
											<p><?php //echo $record['category_name'] ?> </p>
											<div class="sub-meta">
												<span>
													<i></i> Image-<?php echo $c++;?></span>
											</div>
										</div>
										</a>
										</li>
										<?php
									}
									?>
									
									<?php
								}
							}
							?>

					</ul>
				</div>
				<div id="demo1_main_image" class="col-md-8  news-right"></div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</section>
			<div style="clear: both; margin:30px;">
										</div><br/>
										<p id="single_post"></p>
							<div class="blog-info-middle">
								<ul id="like_message_response">
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
														$arr[$i]='checked'; 
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
<span style="font-size:20px" onclick="star_rating(1,<?php echo $record['post_id'];?>)" class="fa fa-star <?php echo  $arr[1]??'' ;?>"></span>
<span style="font-size:20px" onclick="star_rating(2,<?php echo $record['post_id'];?>)" class="fa fa-star <?php echo  $arr[2]??'' ;?>"></span>
<span style="font-size:20px" onclick="star_rating(3,<?php echo $record['post_id'];?>)" class="fa fa-star <?php echo  $arr[3]??'' ;?>"></span>
<span style="font-size:20px" onclick="star_rating(4,<?php echo $record['post_id'];?>)" class="fa fa-star <?php echo  $arr[4]??'' ;?>"></span>
<span style="font-size:20px" onclick="star_rating(5,<?php echo $record['post_id'];?>)" class="fa fa-star <?php echo  $arr[5]??'' ;?>"></span><b style="color:blue">&nbsp&nbsp Average rating:&nbsp <b style="color:#008080"><?php echo $avg;?></b></b></span></span>
						</div>
						<h4 style="color:green;">
							<b><?php echo $record['title'] ?></b>
						</h4>
						<br>
						<h5 style="color:black;font-size:16px"><b><?php echo $record['summary'] ?></b></h5>
						<br>
						<p style="color:black">
							<?php echo $record['description'] ?> 
						</p>
						<br/>
						<!-- <a href="slider.php" class="btn btn-primary read-m">Read More</a> -->
		<?php
			}
		}
	?>
	<p id="comment_message"></p>		
	<section >
		<div class="container">
			<div style="clear: both; margin:30px;"></div>				
			<div class="comment-top" id="comment_message_response">
				<h4 style="color:blue">Comments</h4><br/>
				<div style="clear: both; margin:30px;"></div>	
				<div class="media">
					<img style="width:50px" src="../Upload_Images/<?php echo $m_record['image']; ?>" alt="" class="img-fluid" />
					<div class="media-body">
						<h5 class="mt-0" style="margin-left:10px"><b style="color:green"> 
							&nbsp&nbsp<?php echo $m_record['first_name']." ".$m_record['middle_name']." ".$m_record['last_name'] ?></b>
						</h5>
						<p style="margin-left:10px;font-size:20"><b style="color:black"><?php echo $m_record['message'] ?></b></p>

						<div class="media mt-3">
							<a class="d-flex pr-3" href="#">
								<img src="../Upload_Images/salam.png" alt="" class="img-fluid" />
							</a>
							<div class="media-body">
								<h5 class="mt-0"> Richard Spark</h5>
								<p>Lorem Ipsum convallis diam consequat magna vulputate malesuada. id dignissim sapien velit id felis ac cursus eros.
									Cras a ornare elit.</p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="comment-top" id="comment_message"><br/>
				<h4 style="color:purple">Leave a Comment</h4>
				<div class="comment-bottom">
					<form>
						<!-- <input  type="text" name="Message" id="send_message" placeholder="Enter your comment here..."> -->
				<textarea id="send_message" rows="3" class="form-control" name="Message" placeholder="Enter your comment here..."></textarea><br/>   
						<button name="submit" type="button" class="btn btn-primary submit" onclick="send_comment(<?php echo $_SESSION['p_id']; ?>)" > Submit</button>
					</form>
				</div>
			</div>
		</div>
	</section>
</div>
<?php
	include_once("right_side.php");
?>
<!--footer-->
	<footer>
		<div class="container">
			<!-- footer -->
			<div class="footer-cpy text-center">
				<div class="footer-social">
					<div class="copyrighttop">
						<ul>
							<li class="mx-3">
								<a class="facebook" href="#">
									<i class="fab fa-facebook-f"></i>
									<span>Facebook</span>
								</a>
							</li>
							<li>
								<a class="facebook" href="#">
									<i class="fab fa-twitter"></i>
									<span>Twitter</span>
								</a>
							</li>
							<li class="mx-3">
								<a class="facebook" href="#">
									<i class="fab fa-google-plus-g"></i>
									<span>Google+</span>
								</a>
							</li>
							<li>
								<a class="facebook" href="#">
									<i class="fab fa-pinterest-p"></i>
									<span>Pinterest</span>
								</a>
							</li>
						</ul>

					</div>
				</div>
				<div class="w3layouts-agile-copyrightbottom">
					<p>@.<script>document.write(new Date().getFullYear())</script> Online Blog System | Design by
						<a href="http://salam.move.pk/?i=1" target="http://salam.move.pk/?i=1">Muhammad Salam Samon</a>
					</p>

				</div>
			</div>

			<!-- //footer -->
		</div>
	</footer>
	<!---->
	<!---->
	<!-- js -->
	<script src="js/jquery-2.2.3.min.js"></script>
	<!-- //js -->
	<!-- desoslide-JavaScript -->
	<script src="js/jquery.desoslide.js"></script>
	<script>
		$('#demo1_thumbs').desoSlide({
			main: {
				container: '#demo1_main_image',
				cssClass: 'img-responsive'
			},
			effect: 'sideFade',
			caption: true
		});
	</script>

	<!-- requried-jsfiles-for owl -->
	<script>
		$(window).load(function () {
			$("#flexiselDemo1").flexisel({
				visibleItems: 3,
				animationSpeed: 1000,
				autoPlay: true,
				autoPlaySpeed: 3000,
				pauseOnHover: true,
				enableResponsiveBreakpoints: true,
				responsiveBreakpoints: {
					portrait: {
						changePoint: 480,
						visibleItems: 1
					},
					landscape: {
						changePoint: 640,
						visibleItems: 2
					},
					tablet: {
						changePoint: 768,
						visibleItems: 3
					}
				}
			});

		});
	</script>
	<script>
		$(window).load(function () {
			$("#flexiselDemo2").flexisel({
				visibleItems: 3,
				animationSpeed: 1000,
				autoPlay: true,
				autoPlaySpeed: 3000,
				pauseOnHover: true,
				enableResponsiveBreakpoints: true,
				responsiveBreakpoints: {
					portrait: {
						changePoint: 480,
						visibleItems: 1
					},
					landscape: {
						changePoint: 640,
						visibleItems: 2
					},
					tablet: {
						changePoint: 768,
						visibleItems: 3
					}
				}
			});

		});
	</script>
	<script src="js/jquery.flexisel.js"></script>
	<!-- //password-script -->
	<!--/ start-smoth-scrolling -->
	<script src="js/move-top.js"></script>
	<script src="js/easing.js"></script>
	<script>
		jQuery(document).ready(function ($) {
			$(".scroll").click(function (event) {
				event.preventDefault();
				$('html,body').animate({
					scrollTop: $(this.hash).offset().top
				}, 900);
			});
		});
	</script>
	<!--// end-smoth-scrolling -->

	<script>
		$(document).ready(function () {
			
									var defaults = {
							  			containerID: 'toTop', // fading element id
										containerHoverID: 'toTopHover', // fading element hover id
										scrollSpeed: 1200,
										easingType: 'linear' 
							 		};
									

			$().UItoTop({
				easingType: 'easeOutQuart'
			});

		});
	</script>
	<a href="#home" class="scroll" id="toTop" style="display: block;">
		<span id="toTopHover" style="opacity: 1;"> </span>
	</a>

	<!-- //Custom-JavaScript-File-Links -->
	<script src="js/bootstrap.js"></script>
</body>

</html>