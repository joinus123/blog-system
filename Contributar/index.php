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
	include_once("include/session_maintenance.php");
	include_once("include/header.php");
	include_once("include/right_icon_menu_bar.php");
	include_once("include/left_side_bar.php");
	include_once("include/right_side_bar.php");
?>
<?php
    include_once("include/session_maintenance.php");
    require_once("../require/connection.php");
    include_once("include/new_users_header.php");
    include_once("include/right_icon_menu_bar.php");
    include_once("include/left_side_bar.php");
    include_once("include/right_side_bar.php");
?>
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
        //alert(r_post_id);
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
  color: green;
}
</style>
<section class="content blog-page">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Blog List</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i> Contributar Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="blog-dashboard.html">Blog</a></li>
                        <li class="breadcrumb-item active">Blog List</li>
                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">                
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
                </div>
            </div>
        </div>
        <div class="container">
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

                                         <span style="margin-left:5%" id="multiple_likes<?php echo $record['post_id'];?>">
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
        </div>
    </div>
</section>
<?php
 include_once("include/end_file.php");
?>
<?php
	//include_once("include/main_content.php");
	include_once("include/end_file.php");
?>

 
