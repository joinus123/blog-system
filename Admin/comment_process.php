<?php
	include_once("include/session_maintenance.php");
    require_once("../require/connection.php");
	if($_REQUEST['flag']=='approve_comments')
	{
		$post_id=$_REQUEST['post_id'];
        $comment_id=$_REQUEST['comment_id'];
        $query="UPDATE comment SET comment.is_active=3 WHERE comment.post_id='$post_id' AND comment.comment_id='$comment_id'"; 
        $result=mysqli_query($connection,$query);
        if($result)
        {
            ?>
               <div class="table-responsive">
<table class="table table-bordered table-striped table-hover js-basic-example dataTable" >
    <thead class="thead-dark" align="center">
        <tr>
            <th>S:No</th>
            <th>Picture</th>
            <th>Full Name</th>
             <th>Gender</th>
            <th>Added on</th>
             <th>Post</th>
               <th>Comments</th>
            <th style="width:165px">Action</th>
        </tr>
    </thead>
    <tfoot class="thead-dark" align="center">
        <tr>
         <th>S:No</th>
            <th>Picture</th>
            <th>Full Name</th>
             <th>Gender</th>
              <th>Added on</th>
             <th>Post</th>
                <th>Comments</th>
            <th style="width:165px">Action</th>
        </tr>
    </tfoot>
    <tbody>
        
        <?php
            require_once("../require/connection.php");
            $query="SELECT user.*,comment.*,blog_post.*
            FROM USER,COMMENT,blog_post
            WHERE user.`user_id`=comment.`user_id`
            AND blog_post.`post_id` = comment.`post_id`
            AND comment.`is_active`=4 ORDER BY blog_post.post_id DESC"; 
            $result=mysqli_query($connection,$query);
            if($result->num_rows)
            {   $c=1;
                while($row=mysqli_fetch_assoc($result))
                {
                    ?>
                    <tr align="center">
                        <td><b style="color:#FF5722"><?php echo $c++ ?></b></td>
                        <td style="width:40px"><img class="rounded-circle" src="../Upload_Images/<?php echo $row['image']?>" alt="User"></td>
                        <td><b><?php echo $row['first_name']." ".$row['middle_name']." ".$row['last_name'] ?></b></td>
                    <td align="center"><b><?php echo $row['gender'] ?></b></td>
                     <td><b><?php echo $row['comment_time'] ?></b></td>
                     <td><b><textarea disabled=""><?php echo $row['title'] ?></textarea></b></td>
                        <td><textarea disabled=""><?php echo $row['message'] ?></textarea></td>
                        <td style="width:175px">
                             <button class="btn btn-success" aria-controls="DataTables_Table_0" onclick="approve_comments(<?php echo $row['post_id'];?>,<?php echo $row['comment_id'];?>)">Approve</button>

                              <button class="btn btn-danger" aria-controls="DataTables_Table_0" onclick="unapprove_comments(<?php echo $row['post_id'];?>,<?php echo $row['comment_id'];?>)">Unapprove</button>
                        </td>
                    </tr>
                    <?php
                }
            }
        ?>
        
    </tbody>
</table>
</div>
            <?php
        }
    }
    else if($_REQUEST['flag']=='unapprove_comments')
    {
        $post_id=$_REQUEST['post_id'];
        $comment_id=$_REQUEST['comment_id'];
        $query="UPDATE comment SET comment.is_active=2 WHERE comment.post_id='$post_id' AND comment.comment_id='$comment_id'"; 
        $result=mysqli_query($connection,$query);
        if($result)
        {
             ?>
    <div class="table-responsive">
    <table class="table table-bordered table-striped table-hover js-basic-example dataTable" >
        <thead class="thead-dark" align="center">
            <tr>
                <th>S:No</th>
                <th>Picture</th>
                <th>Full Name</th>
                 <th>Gender</th>
                <th>Added on</th>
                 <th>Post</th>
                   <th>Comments</th>
                <th style="width:165px">Action</th>
            </tr>
        </thead>
        <tfoot class="thead-dark" align="center">
            <tr>
             <th>S:No</th>
                <th>Picture</th>
                <th>Full Name</th>
                 <th>Gender</th>
                  <th>Added on</th>
                 <th>Post</th>
                    <th>Comments</th>
                <th style="width:165px">Action</th>
            </tr>
        </tfoot>
        <tbody>
            
            <?php
                require_once("../require/connection.php");
                $query="SELECT user.*,comment.*,blog_post.*
                FROM USER,COMMENT,blog_post
                WHERE user.`user_id`=comment.`user_id`
                AND blog_post.`post_id` = comment.`post_id`
                AND comment.`is_active`=4 ORDER BY blog_post.post_id DESC"; 
                $result=mysqli_query($connection,$query);
                if($result->num_rows)
                {   $c=1;
                    while($row=mysqli_fetch_assoc($result))
                    {
                        ?>
                        <tr align="center">
                            <td><b style="color:#FF5722"><?php echo $c++ ?></b></td>
                            <td style="width:40px"><img class="rounded-circle" src="../Upload_Images/<?php echo $row['image']?>" alt="User"></td>
                            <td><b><?php echo $row['first_name']." ".$row['middle_name']." ".$row['last_name'] ?></b></td>
                        <td align="center"><b><?php echo $row['gender'] ?></b></td>
                         <td><b><?php echo $row['comment_time'] ?></b></td>
                         <td><b><textarea disabled=""><?php echo $row['title'] ?></textarea></b></td>
                            <td><textarea disabled=""><?php echo $row['message'] ?></textarea></td>
                            <td style="width:175px">
                                 <button class="btn btn-success" aria-controls="DataTables_Table_0" onclick="approve_comments(<?php echo $row['post_id'];?>,<?php echo $row['comment_id'];?>)">Approve</button>

                                  <button class="btn btn-danger" aria-controls="DataTables_Table_0" onclick="unapprove_comments(<?php echo $row['post_id'];?>,<?php echo $row['comment_id'];?>)">Unapprove</button>
                            </td>
                        </tr>
                        <?php
                    }
                }
            ?>
            
        </tbody>
    </table>
</div>
            <?php
        }
    }
    else if($_REQUEST['flag']=='deactive_comments')
    {
        $post_id=$_REQUEST['post_id'];
        $comment_id=$_REQUEST['comment_id'];
        $query="UPDATE comment SET comment.is_active=2 WHERE comment.post_id='$post_id' AND comment.comment_id='$comment_id'"; 
        $result=mysqli_query($connection,$query);
        if($result)
        {
             ?>
             <div class="table-responsive">
<table class="table table-bordered table-striped table-hover js-basic-example dataTable" >
    <thead class="thead-dark" align="center">
        <tr>
            <th>S:No</th>
            <th>Picture</th>
            <th>Full Name</th>
             <th>Gender</th>
            <th>Added on</th>
            <th>Status</th>
             <th>Post</th>
               <th>Comments</th>
                 <th>Is Active</th>
            <th style="width:165px">Action</th>
        </tr>
    </thead>
    <tfoot class="thead-dark" align="center">
        <tr>
         <th>S:No</th>
            <th>Picture</th>
            <th>Full Name</th>
             <th>Gender</th>
              <th>Added on</th>
              <th>Status</th>
             <th>Post</th>
                <th>Comments</th>
                  <th>Is Active</th>
            <th style="width:165px">Action</th>
        </tr>
    </tfoot>
    <tbody>
        
        <?php
            require_once("../require/connection.php");
            $query="SELECT user.*,comment.*,blog_post.*
            FROM USER,COMMENT,blog_post
            WHERE user.`user_id`=comment.`user_id`
            AND blog_post.`post_id` = comment.`post_id`
            AND comment.`is_active`=3 ORDER BY blog_post.post_id DESC"; 
            $result=mysqli_query($connection,$query);
            if($result->num_rows)
            {   $c=1;
                while($row=mysqli_fetch_assoc($result))
                {
                    ?>
                    <tr align="center">
                        <td><b style="color:#FF5722"><?php echo $c++ ?></b></td>
                        <td style="width:40px"><img class="rounded-circle" src="../Upload_Images/<?php echo $row['image']?>" alt="User"></td>
                        <td><b><?php echo $row['first_name']." ".$row['middle_name']." ".$row['last_name'] ?></b></td>
                    <td align="center"><b><?php echo $row['gender'] ?></b></td>
                     <td><b><?php echo $row['comment_time'] ?></b></td>
                      <td><b>Active</b></td>
                     <td><b><textarea disabled=""><?php echo $row['title'] ?></textarea></b></td>
                        <td><textarea disabled=""><?php echo $row['message'] ?></textarea></td>
                        <td style="width:175px">
                             <button class="btn btn-warning" aria-controls="DataTables_Table_0" 
                             onclick="deactive_comments(<?php echo $row['post_id'];?>,<?php echo $row['comment_id'];?>)">Deactive</button>
                        </td>
                         <td>
                           <button class="btn btn-primary btn-sm" onclick="edit_active_comments(<?php echo $row['post_id'];?>,<?php echo $row['comment_id'];?>)"><i class="zmdi zmdi-edit"></i></button>
                            <button class="btn btn-danger btn-sm" onclick="delete_active_comments(<?php echo $row['post_id'];?>,<?php echo $row['comment_id'];?>)">
                            <i class="zmdi zmdi-delete"></i></button>
                                   
                        </td>
                    </tr>
                    <?php
                }
            }
        ?>
    </tbody>
</table>
</div>
             <?php
        }
    }
     else if($_REQUEST['flag']=='delete_active_comments')
    {
        $post_id=$_REQUEST['post_id'];
        $comment_id=$_REQUEST['comment_id'];
        $query="UPDATE comment SET comment.is_active=5 WHERE comment.post_id='$post_id' AND comment.comment_id='$comment_id'"; 
        $result=mysqli_query($connection,$query);
        if($result)
        {
             ?>
             <div class="table-responsive">
<table class="table table-bordered table-striped table-hover js-basic-example dataTable" >
    <thead class="thead-dark" align="center">
        <tr>
            <th>S:No</th>
            <th>Picture</th>
            <th>Full Name</th>
             <th>Gender</th>
            <th>Added on</th>
            <th>Status</th>
             <th>Post</th>
               <th>Comments</th>
                 <th>Is Active</th>
            <th style="width:165px">Action</th>
        </tr>
    </thead>
    <tfoot class="thead-dark" align="center">
        <tr>
         <th>S:No</th>
            <th>Picture</th>
            <th>Full Name</th>
             <th>Gender</th>
              <th>Added on</th>
              <th>Status</th>
             <th>Post</th>
                <th>Comments</th>
                  <th>Is Active</th>
            <th style="width:165px">Action</th>
        </tr>
    </tfoot>
    <tbody>
        
        <?php
            require_once("../require/connection.php");
            $query="SELECT user.*,comment.*,blog_post.*
            FROM USER,COMMENT,blog_post
            WHERE user.`user_id`=comment.`user_id`
            AND blog_post.`post_id` = comment.`post_id`
            AND comment.`is_active`=3 ORDER BY blog_post.post_id DESC"; 
            $result=mysqli_query($connection,$query);
            if($result->num_rows)
            {   $c=1;
                while($row=mysqli_fetch_assoc($result))
                {
                    ?>
                    <tr align="center">
                        <td><b style="color:#FF5722"><?php echo $c++ ?></b></td>
                        <td style="width:40px"><img class="rounded-circle" src="../Upload_Images/<?php echo $row['image']?>" alt="User"></td>
                        <td><b><?php echo $row['first_name']." ".$row['middle_name']." ".$row['last_name'] ?></b></td>
                    <td align="center"><b><?php echo $row['gender'] ?></b></td>
                     <td><b><?php echo $row['comment_time'] ?></b></td>
                      <td><b>Active</b></td>
                     <td><b><textarea disabled=""><?php echo $row['title'] ?></textarea></b></td>
                        <td><textarea disabled=""><?php echo $row['message'] ?></textarea></td>
                        <td style="width:175px">
                             <button class="btn btn-warning" aria-controls="DataTables_Table_0" 
                             onclick="deactive_comments(<?php echo $row['post_id'];?>,<?php echo $row['comment_id'];?>)">Deactive</button>
                        </td>
                         <td>
                           <button class="btn btn-primary btn-sm" onclick="edit_active_comments(<?php echo $row['post_id'];?>,<?php echo $row['comment_id'];?>)"><i class="zmdi zmdi-edit"></i></button>
                            <button class="btn btn-danger btn-sm" onclick="delete_active_comments(<?php echo $row['post_id'];?>,<?php echo $row['comment_id'];?>)">
                            <i class="zmdi zmdi-delete"></i></button>
                                   
                        </td>
                    </tr>
                    <?php
                }
            }
        ?>
    </tbody>
</table>
</div>
             <?php
        }
    }
    else if($_REQUEST['flag']=='all_active_comments')
    {
        ?>
           <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>All Active Comments</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php"><i class="zmdi zmdi-home"></i> Admin Dasboard</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Tables</a></li>
                        <li class="breadcrumb-item active">Comments Table</li>
                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">                
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>                                
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>ACTIVE</strong> COMMENTS </h2>
                            <ul class="header-dropdown">
                                <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="zmdi zmdi-more"></i> </a>
                                    <ul class="dropdown-menu dropdown-menu-right slideUp">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else</a></li>
                                    </ul>
                                </li>
                                <li class="remove">
                                    <a role="button" class="boxs-close"><i class="zmdi zmdi-close"></i></a>
                                </li>
                            </ul>
                        </div>
                        <div class="body" id="show_comments_table_comments_response">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable" >
                                    <thead class="thead-dark" align="center">
                                        <tr>
                                            <th>S:No</th>
                                            <th>Picture</th>
                                            <th>Full Name</th>
                                             <th>Gender</th>
                                            <th>Added on</th>
                                            <th>Status</th>
                                             <th>Post</th>
                                               <th>Comments</th>
                                                 <th>Is Active</th>
                                            <th style="width:165px">Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot class="thead-dark" align="center">
                                        <tr>
                                         <th>S:No</th>
                                            <th>Picture</th>
                                            <th>Full Name</th>
                                             <th>Gender</th>
                                              <th>Added on</th>
                                              <th>Status</th>
                                             <th>Post</th>
                                                <th>Comments</th>
                                                  <th>Is Active</th>
                                            <th style="width:165px">Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        
                                        <?php
                                            require_once("../require/connection.php");
                                            $query="SELECT user.*,comment.*,blog_post.*
                                            FROM USER,COMMENT,blog_post
                                            WHERE user.`user_id`=comment.`user_id`
                                            AND blog_post.`post_id` = comment.`post_id`
                                            AND comment.`is_active`=3 ORDER BY blog_post.post_id DESC"; 
                                            $result=mysqli_query($connection,$query);
                                            if($result->num_rows)
                                            {   $c=1;
                                                while($row=mysqli_fetch_assoc($result))
                                                {
                                                    ?>
                                                    <tr align="center">
                                                        <td><b style="color:#FF5722"><?php echo $c++ ?></b></td>
                                                        <td style="width:40px"><img class="rounded-circle" src="../Upload_Images/<?php echo $row['image']?>" alt="User"></td>
                                                        <td><b><?php echo $row['first_name']." ".$row['middle_name']." ".$row['last_name'] ?></b></td>
                                                    <td align="center"><b><?php echo $row['gender'] ?></b></td>
                                                     <td><b><?php echo $row['comment_time'] ?></b></td>
                                                      <td><b>Active</b></td>
                                                     <td><b><textarea disabled=""><?php echo $row['title'] ?></textarea></b></td>
                                                        <td><textarea disabled=""><?php echo $row['message'] ?></textarea></td>
                                                        <td style="width:175px">
                                                             <button class="btn btn-warning" aria-controls="DataTables_Table_0" onclick="deactive_comments(<?php echo $row['post_id'];?>,<?php echo $row['comment_id'];?>)">Deactive</button>
                                                        </td>
                                                         <td>
                                                           <button class="btn btn-primary btn-sm" onclick="edit_active_comments(<?php echo $row['post_id'];?>,<?php echo $row['comment_id'];?>)"><i class="zmdi zmdi-edit"></i></button>
                                                            <button class="btn btn-danger btn-sm" onclick="delete_active_comments(<?php echo $row['post_id'];?>,<?php echo $row['comment_id'];?>)">
                                                            <i class="zmdi zmdi-delete"></i></button>
                                                                   
                                                        </td>
                                                    </tr>
                                                    <?php
                                                }
                                            }
                                        ?>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
        <?php
    }
    else if($_REQUEST['flag']=='all_new_comments')
    {
        ?>
          <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>New Comments Request</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php"><i class="zmdi zmdi-home"></i> Admin Dasboard</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Tables</a></li>
                        <li class="breadcrumb-item active">Comments Table</li>
                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">                
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>                                
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>COMMENTS</strong> REQUEST </h2>
                            <ul class="header-dropdown">
                                <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="zmdi zmdi-more"></i> </a>
                                    <ul class="dropdown-menu dropdown-menu-right slideUp">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else</a></li>
                                    </ul>
                                </li>
                                <li class="remove">
                                    <a role="button" class="boxs-close"><i class="zmdi zmdi-close"></i></a>
                                </li>
                            </ul>
                        </div>
                        <div class="body" id="show_new_post_data">
                        </div>
                        <div class="body" id="is_active_post">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable" >
                                    <thead class="thead-dark" align="center">
                                        <tr>
                                            <th>S:No</th>
                                            <th>Picture</th>
                                            <th>Full Name</th>
                                             <th>Gender</th>
                                            <th>Added on</th>
                                             <th>Post</th>
                                               <th>Comments</th>
                                            <th style="width:165px">Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot class="thead-dark" align="center">
                                        <tr>
                                         <th>S:No</th>
                                            <th>Picture</th>
                                            <th>Full Name</th>
                                             <th>Gender</th>
                                              <th>Added on</th>
                                             <th>Post</th>
                                                <th>Comments</th>
                                            <th style="width:165px">Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        
                                        <?php
                                            require_once("../require/connection.php");
                                            $query="SELECT user.*,comment.*,blog_post.*
                                            FROM USER,COMMENT,blog_post
                                            WHERE user.`user_id`=comment.`user_id`
                                            AND blog_post.`post_id` = comment.`post_id`
                                            AND comment.`is_active`=4 ORDER BY blog_post.post_id DESC"; 
                                            $result=mysqli_query($connection,$query);
                                            if($result->num_rows)
                                            {   $c=1;
                                                while($row=mysqli_fetch_assoc($result))
                                                {
                                                    ?>
                                                    <tr align="center">
                                                        <td><b style="color:#FF5722"><?php echo $c++ ?></b></td>
                                                        <td style="width:40px"><img class="rounded-circle" src="../Upload_Images/<?php echo $row['image']?>" alt="User"></td>
                                                        <td><b><?php echo $row['first_name']." ".$row['middle_name']." ".$row['last_name'] ?></b></td>
                                                    <td align="center"><b><?php echo $row['gender'] ?></b></td>
                                                     <td><b><?php echo $row['comment_time'] ?></b></td>
                                                     <td><b><textarea disabled=""><?php echo $row['title'] ?></textarea></b></td>
                                                        <td><textarea disabled=""><?php echo $row['message'] ?></textarea></td>
                                                        <td style="width:175px">
                                                             <button class="btn btn-success" aria-controls="DataTables_Table_0" onclick="approve_comments(<?php echo $row['post_id'];?>,<?php echo $row['comment_id'];?>)">Approve</button>

                                                              <button class="btn btn-danger" aria-controls="DataTables_Table_0" onclick="unapprove_comments(<?php echo $row['post_id'];?>,<?php echo $row['comment_id'];?>)">Unapprove</button>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                }
                                            }
                                        ?>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
        <?php
    }
    else if($_REQUEST['flag']=='all_rejected_comments')
    {
        ?>
          <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>All Rejected Comments</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php"><i class="zmdi zmdi-home"></i> Admin Dasboard</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Tables</a></li>
                        <li class="breadcrumb-item active">Comments Table</li>
                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">                
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>                                
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>REJECTED</strong> &nbspCOMMENTS </h2>
                            <ul class="header-dropdown">
                                <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="zmdi zmdi-more"></i> </a>
                                    <ul class="dropdown-menu dropdown-menu-right slideUp">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else</a></li>
                                    </ul>
                                </li>
                                <li class="remove">
                                    <a role="button" class="boxs-close"><i class="zmdi zmdi-close"></i></a>
                                </li>
                            </ul>
                        </div>
                        <div class="body" id="show_new_post_data">
                        </div>
                        <div class="body" id="is_active_post">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable" >
                                    <thead class="thead-dark" align="center">
                                        <tr>
                                            <th>S:No</th>
                                            <th>Picture</th>
                                            <th>Full Name</th>
                                             <th>Gender</th>
                                            <th>Added on</th>
                                             <th>Post</th>
                                               <th>Comments</th>
                                            <th style="width:165px">Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot class="thead-dark" align="center">
                                        <tr>
                                         <th>S:No</th>
                                            <th>Picture</th>
                                            <th>Full Name</th>
                                             <th>Gender</th>
                                              <th>Added on</th>
                                             <th>Post</th>
                                                <th>Comments</th>
                                            <th style="width:165px">Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        
                                        <?php
                                            require_once("../require/connection.php");
                                            $query="SELECT user.*,comment.*,blog_post.*
                                            FROM USER,COMMENT,blog_post
                                            WHERE user.`user_id`=comment.`user_id`
                                            AND blog_post.`post_id` = comment.`post_id`
                                            AND comment.`is_active`=2 ORDER BY blog_post.post_id DESC"; 
                                            $result=mysqli_query($connection,$query);
                                            if($result->num_rows)
                                            {   $c=1;
                                                while($row=mysqli_fetch_assoc($result))
                                                {
                                                    ?>
                                                    <tr align="center">
                                                        <td><b style="color:#FF5722"><?php echo $c++ ?></b></td>
                                                        <td style="width:40px"><img class="rounded-circle" src="../Upload_Images/<?php echo $row['image']?>" alt="User"></td>
                                                        <td><b><?php echo $row['first_name']." ".$row['middle_name']." ".$row['last_name'] ?></b></td>
                                                    <td align="center"><b><?php echo $row['gender'] ?></b></td>
                                                     <td><b><?php echo $row['comment_time'] ?></b></td>
                                                     <td><b><textarea disabled=""><?php echo $row['title'] ?></textarea></b></td>
                                                        <td><textarea disabled=""><?php echo $row['message'] ?></textarea></td>
                                                        <td style="width:175px">
                                                             <button class="btn btn-success" aria-controls="DataTables_Table_0" onclick="approve_comments(<?php echo $row['post_id'];?>,<?php echo $row['comment_id'];?>)">Approve</button>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                }
                                            }
                                        ?>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
        <?php
    }
    else if($_REQUEST['flag']=='all_deleted_comments')
    {
        ?>
          <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>All Deleted Comments</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php"><i class="zmdi zmdi-home"></i> Admin Dasboard</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Tables</a></li>
                        <li class="breadcrumb-item active">Comments Table</li>
                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">                
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>                                
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>DELETED</strong> &nbspCOMMENTS </h2>
                            <ul class="header-dropdown">
                                <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="zmdi zmdi-more"></i> </a>
                                    <ul class="dropdown-menu dropdown-menu-right slideUp">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else</a></li>
                                    </ul>
                                </li>
                                <li class="remove">
                                    <a role="button" class="boxs-close"><i class="zmdi zmdi-close"></i></a>
                                </li>
                            </ul>
                        </div>
                        <div class="body" id="show_new_post_data">
                        </div>
                        <div class="body" id="is_active_post">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable" >
                                    <thead class="thead-dark" align="center">
                                        <tr>
                                            <th>S:No</th>
                                            <th>Picture</th>
                                            <th>Full Name</th>
                                             <th>Gender</th>
                                            <th>Added on</th>
                                             <th>Post</th>
                                               <th>Comments</th>
                                        </tr>
                                    </thead>
                                    <tfoot class="thead-dark" align="center">
                                        <tr>
                                         <th>S:No</th>
                                            <th>Picture</th>
                                            <th>Full Name</th>
                                             <th>Gender</th>
                                              <th>Added on</th>
                                             <th>Post</th>
                                                <th>Comments</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        
                                        <?php
                                            require_once("../require/connection.php");
                                            $query="SELECT user.*,comment.*,blog_post.*
                                            FROM USER,COMMENT,blog_post
                                            WHERE user.`user_id`=comment.`user_id`
                                            AND blog_post.`post_id` = comment.`post_id`
                                            AND comment.`is_active`=5 ORDER BY blog_post.post_id DESC"; 
                                            $result=mysqli_query($connection,$query);
                                            if($result->num_rows)
                                            {   $c=1;
                                                while($row=mysqli_fetch_assoc($result))
                                                {
                                                    ?>
                                                    <tr align="center">
                                                        <td><b style="color:#FF5722"><?php echo $c++ ?></b></td>
                                                        <td style="width:40px"><img class="rounded-circle" src="../Upload_Images/<?php echo $row['image']?>" alt="User"></td>
                                                        <td><b><?php echo $row['first_name']." ".$row['middle_name']." ".$row['last_name'] ?></b></td>
                                                    <td align="center"><b><?php echo $row['gender'] ?></b></td>
                                                     <td><b><?php echo $row['comment_time'] ?></b></td>
                                                     <td><b><textarea disabled=""><?php echo $row['title'] ?></textarea></b></td>
                                                        <td><textarea disabled=""><?php echo $row['message'] ?></textarea></td>
                                                    </tr>
                                                    <?php
                                                }
                                            }
                                        ?>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
        <?php
    }