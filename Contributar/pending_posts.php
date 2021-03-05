<?php
    include_once("include/session_maintenance.php");
    require_once("../require/connection.php");
    include_once("include/new_users_header.php");
    include_once("include/right_icon_menu_bar.php");
    include_once("include/left_side_bar.php");
    include_once("include/right_side_bar.php");
?>
<script type="text/javascript">
    function show_post(post_id,user_id)
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
                document.getElementById("show_new_post_data").innerHTML=ajax_request.responseText;
                //location.href = "index.php";
            }
        }
        ajax_request.open("POST","post_process.php");
        ajax_request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        ajax_request.send("flag=show_new_post&post_id="+post_id+"&user_id="+user_id);
    }
    function show_post_attachment(post_id,user_id)
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
                document.getElementById("show_new_post_data").innerHTML=ajax_request.responseText;
                //location.href = "index.php";
            }
        }
        ajax_request.open("POST","post_process.php");
        ajax_request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        ajax_request.send("flag=show_post_attachment&post_id="+post_id+"&user_id="+user_id);
    }
    function approve_rejected_post(post_id)
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
                document.getElementById("post_process_response").innerHTML=ajax_request.responseText;
                //location.href = "index.php";
            }
        }
        ajax_request.open("POST","draft_process.php");
        ajax_request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        ajax_request.send("flag=approve_rejected_post&post_id="+post_id);
    }
    function delete_draft_post(post_id)
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
                document.getElementById("post_process_response").innerHTML=ajax_request.responseText;
                //location.href = "index.php";
            }
        }
        ajax_request.open("POST","draft_process.php");
        ajax_request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        ajax_request.send("flag=delete_pending_post&post_id="+post_id);
    }
    function edit_active_post(post_id)
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
                document.getElementById("show_new_post_data").innerHTML=ajax_request.responseText;
                //location.href = "index.php";
            }
        }
        ajax_request.open("POST","draft_process.php");
        ajax_request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        ajax_request.send("flag=edit_pending_post&post_id="+post_id);
    }
</script>
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Pending Post</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php"><i class="zmdi zmdi-home"></i> Contributar Dasboard</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Tables</a></li>
                        <li class="breadcrumb-item active">Post Table</li>
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
                            <h2><strong>All Pending</strong> Posts </h2>
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
                        <div class="body" id="post_process_response">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable" >
                                    <thead class="thead-dark" align="center">
                                        <tr>
                                            <th>S:No</th>
                                            <th>Picture</th>
                                            <th>Full Name</th>
                                             <th>Gender</th>
                                             <th>Category</th>
                                              <th>Added on</th>
                                            <th>View Post</th>
                                            <th style="width:165px">Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot class="thead-dark" align="center">
                                        <tr>
                                          <th>S:No</th>
                                            <th>Picture</th>
                                            <th>Full Name</th>
                                             <th>Gender</th>
                                             <th>Category</th>
                                            <th>Added on</th>
                                            <th>View Post</th>
                                            <th style="width:165px">Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        
                                        <?php
                                            require_once("../require/connection.php");
                                            $user_id=$_SESSION['user']['user_id'];
                                            $query="SELECT blog_post.*,user.*,category.*,post_status.added_on,status.status_type
                                            FROM USER,category,blog_post,STATUS,post_status
                                            WHERE user.`user_id` = blog_post.`user_id`
                                            AND category.`category_id` = blog_post.`category_id`
                                            AND blog_post.`post_id` = post_status.`post_id`
                                            AND status.`status_id` = post_status.`status_id`
                                            AND post_status.`status_id` = 4
                                            AND blog_post.user_id='$user_id'
                                            ORDER BY blog_post.post_id DESC"; 
                                            $result=mysqli_query($connection,$query);
                                            if($result->num_rows)
                                            {   $c=1;
                                                while($row=mysqli_fetch_assoc($result))
                                                {
                                                    ?>
                                                    <tr align="center">
                                                        <td><b style="color:#FF5722"><?php echo $c++ ?></b></td>
                                                        <td style="width:40px"><img class="rounded-circle" src="../Upload_Images/<?php echo $row['image']?>" alt="User"></td>
                                                        <td><b><?php echo $row['first_name']." ".$row['last_name'] ?></b></td>
                                                    <td align="center"><b><?php echo $row['gender'] ?></b></td>
                                                        <td><b><?php echo $row['category_name'] ?></b></td>
                                                         <td><b><?php echo $row['added_on'] ?></b></td>
                                                         <td style="width:175px">
                                                           <button class="btn btn-info" aria-controls="DataTables_Table_0" onclick="show_post(<?php echo $row['post_id'];?>,<?php echo $row['user_id'];?>)">Data</button>
                                                            <button class="btn btn-default" aria-controls="DataTables_Table_0" onclick="show_post_attachment(<?php echo $row['post_id'];?>,<?php echo $row['user_id'];?>)">Attachment</button>
                                                        </td>
                                                        <td>
                                                           <button class="btn btn-primary btn-sm" onclick="edit_active_post(<?php echo $row['post_id'];?>)"><i class="zmdi zmdi-edit"></i></button>
                                                            <button class="btn btn-danger btn-sm" onclick="delete_draft_post(<?php echo $row['post_id'];?>)">
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
</section>


<?php
 include_once("include/end_file.php");
?>