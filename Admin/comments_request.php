<?php
    include_once("include/session_maintenance.php");
    require_once("../require/connection.php");
    include_once("include/new_users_header.php");
    include_once("include/right_icon_menu_bar.php");
    include_once("include/left_side_bar.php");
    include_once("include/right_side_bar.php");
?>
<script type="text/javascript">
    function all_active_comments()
    {
        //alert(post_id);
        //alert(user_id);
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
                document.getElementById("all_comments_response").innerHTML=ajax_request.responseText;
                //location.href = "index.php";
            }
        }
        ajax_request.open("POST","comment_process.php");
        ajax_request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        ajax_request.send("flag=all_active_comments");
    }
     function all_new_comments()
    {
        //alert(post_id);
        //alert(user_id);
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
                document.getElementById("all_comments_response").innerHTML=ajax_request.responseText;
                //location.href = "index.php";
            }
        }
        ajax_request.open("POST","comment_process.php");
        ajax_request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        ajax_request.send("flag=all_new_comments");
    }
     function all_rejected_comments()
    {
        //alert(post_id);
        //alert(user_id);
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
                document.getElementById("all_comments_response").innerHTML=ajax_request.responseText;
                //location.href = "index.php";
            }
        }
        ajax_request.open("POST","comment_process.php");
        ajax_request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        ajax_request.send("flag=all_rejected_comments");
    }
    function all_deleted_comments()
    {
        //alert(post_id);
        //alert(user_id);
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
                document.getElementById("all_comments_response").innerHTML=ajax_request.responseText;
                //location.href = "index.php";
            }
        }
        ajax_request.open("POST","comment_process.php");
        ajax_request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        ajax_request.send("flag=all_deleted_comments");
    }
    function deactive_comments(post_id,comment_id)
    {
        //alert(post_id);
        //alert(user_id);
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
                document.getElementById("show_comments_table_comments_response").innerHTML=ajax_request.responseText;
                //location.href = "index.php";
            }
        }
        ajax_request.open("POST","comment_process.php");
        ajax_request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        ajax_request.send("flag=deactive_comments&post_id="+post_id+"&comment_id="+comment_id);
    }
    function delete_active_comments(post_id,comment_id)
    {
        //alert(post_id);
        //alert(user_id);
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
                document.getElementById("show_comments_table_comments_response").innerHTML=ajax_request.responseText;
                //location.href = "index.php";
            }
        }
        ajax_request.open("POST","comment_process.php");
        ajax_request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        ajax_request.send("flag=delete_active_comments&post_id="+post_id+"&comment_id="+comment_id);
    }
    function approve_comments(post_id,comment_id)
    {
        //alert(post_id);
        //alert(user_id);
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
                document.getElementById("is_active_post").innerHTML=ajax_request.responseText;
                //location.href = "index.php";
            }
        }
        ajax_request.open("POST","comment_process.php");
        ajax_request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        ajax_request.send("flag=approve_comments&post_id="+post_id+"&comment_id="+comment_id);
    }
    function unapprove_comments(post_id,comment_id)
    {
        //alert(post_id);
        //alert(user_id);
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
                document.getElementById("is_active_post").innerHTML=ajax_request.responseText;
                //location.href = "index.php";
            }
        }
        ajax_request.open("POST","comment_process.php");
        ajax_request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        ajax_request.send("flag=unapprove_comments&post_id="+post_id+"&comment_id="+comment_id);
    }
</script>
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
               
<div  style="margin-left:300px">
     <button class="btn btn-primary" aria-controls="DataTables_Table_0" onclick="all_active_comments()">Active Comments</button>
        <button class="btn btn-success" aria-controls="DataTables_Table_0" onclick="all_new_comments()">New Comments</button>
         <button class="btn btn-warning" aria-controls="DataTables_Table_0" onclick="all_rejected_comments()">Rejected Comments</button>
          <button class="btn btn-default" aria-controls="DataTables_Table_0" onclick="all_deleted_comments()">Deleted Comments</button>
          
</div>
              
            </div>
        </div>
    </div>
</section>
<section class="content" id="all_comments_response">
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
</section>


<?php
 include_once("include/end_file.php");
?>