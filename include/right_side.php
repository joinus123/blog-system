<!--right-->
				<aside class="col-lg-4 agileits-w3ls-right-blog-con text-right">
					<div class="right-blog-info text-left">
						<div class="tech-btm">
							<img src="images/banner1.jpg" class="img-fluid" alt="">
						</div>
						<div class="single-gd my-5 tech-btm">
							<h4>Our Progress</h4>
							<div class="progress">
								<div class="progress-bar progress-bar-striped" role="progressbar" style="width: 10%" aria-valuenow="10" aria-valuemin="0"
								    aria-valuemax="100"></div>
							</div>
							<div class="progress">
								<div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0"
								    aria-valuemax="100"></div>
							</div>
							<div class="progress">
								<div class="progress-bar progress-bar-striped bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0"
								    aria-valuemax="100"></div>
							</div>
							<div class="progress">
								<div class="progress-bar progress-bar-striped bg-warning" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0"
								    aria-valuemax="100"></div>
							</div>
							<div class="progress">
								<div class="progress-bar progress-bar-striped bg-danger" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0"
								    aria-valuemax="100"></div>
							</div>
						</div>
						<div class="tech-btm">
							<h4>Categories</h4>
							<ul class="list-group single">
							<?php 
								$q="SELECT *FROM category WHERE status_id=3";
								$r=mysqli_query($connection,$q);
								if($r->num_rows)
								{
									while($category=mysqli_fetch_assoc($r))
									{
										?>
											<li class="list-group-item d-flex justify-content-between align-items-center">
												<a style="color:black" href="index.php?category_id=<?php echo $category['category_id'] ?>"><b><?php echo $category['category_name'] ?></b></a>
												<span class="badge badge-primary badge-pill">0</span>
											</li>
										<?php
									}
								}
							?>
							</ul>
						</div>
						<div class="tech-btm">
							<h4>Recent Posts</h4>
						<div class="blog-grids row mb-3">
							<?php 
							if(isset($_REQUEST['category_id']))
							{
								$c= $_REQUEST['category_id'];
								$query="SELECT blog_post.*,user.*,category.`category_name`,post_status.added_on
								FROM USER,category,blog_post,STATUS,post_status
								WHERE user.`user_id` = blog_post.`user_id`
								AND category.`category_id` = blog_post.`category_id`
								AND blog_post.`post_id` = post_status.`post_id`
								AND status.`status_id` = post_status.`status_id` 
								AND blog_post.category_id = $c
								AND post_status.`status_id` = 3 ORDER BY blog_post.post_id DESC limit 10"; 
							}
							else
							{
								$query="SELECT blog_post.*,user.*,category.`category_name`,post_status.added_on
								FROM USER,category,blog_post,STATUS,post_status
								WHERE user.`user_id` = blog_post.`user_id`
								AND category.`category_id` = blog_post.`category_id`
								AND blog_post.`post_id` = post_status.`post_id`
								AND status.`status_id` = post_status.`status_id`
								AND post_status.`status_id` = 3 ORDER BY blog_post.post_id DESC limit 10"; 
							}
								$result=mysqli_query($connection,$query);
								if($result->num_rows)
								{
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
											<div class="col-md-5 blog-grid-left">
												<a href="single.html">
													<img src="Files Attachment/<?php echo $image_record['attachment_name']; ?>" class="img-fluid" alt="">
												</a>
											</div>
											<div class="col-md-7 blog-grid-right">
												<h5>
													<a href="single.html"><?php echo $record['title'] ?></a>
												</h5>
												<div class="sub-meta">
													<span><i class="far fa-clock"></i><?php echo $record['added_on'] ?></span>
												</div>
											</div>
										<?php
									}
								}
							?>
						</div>
					</div>


					<div class="tech-btm">
							<h4>Top stories of the week</h4>

							<div class="blog-grids row mb-3">
								<div class="col-md-5 blog-grid-left">
									<a href="single.html">
										<img src="images/1.jpg" class="img-fluid" alt="">
									</a>
								</div>
								<div class="col-md-7 blog-grid-right">

									<h5>
										<a href="single.html">Pellentesque dui, non felis. Maecenas male non felis </a>
									</h5>
									<div class="sub-meta">
										<span>
											<i class="far fa-clock"></i> 20 Jan, 2018</span>
									</div>
								</div>

							</div>
							<div class="blog-grids row mb-3">
								<div class="col-md-5 blog-grid-left">
									<a href="single.html">
										<img src="images/6.jpg" class="img-fluid" alt="">
									</a>
								</div>
								<div class="col-md-7 blog-grid-right">
									<h5>
										<a href="single.html">Pellentesque dui, non felis. Maecenas male non felis </a>
									</h5>
									<div class="sub-meta">
										<span>
											<i class="far fa-clock"></i> 20 Feb, 2018</span>
									</div>
								</div>

							</div>
						</div>
						





				</aside>
				<!--//right-->
			</div>
		</div>
	</section>
	<!--//main-->
	
	