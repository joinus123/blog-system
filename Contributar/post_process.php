<?php
	include_once("include/session_maintenance.php");
    require_once("../require/connection.php");
	if($_REQUEST['flag']=='show_new_post')
	{
		$user_id=$_REQUEST['user_id'];
		$post_id=$_REQUEST['post_id'];
		$query="SELECT blog_post.* FROM blog_post 
		WHERE blog_post.`post_id`='$post_id' 
		AND blog_post.`user_id`='$user_id' 
		ORDER BY blog_post.post_id DESC"; 
        $result=mysqli_query($connection,$query);
        if($result->num_rows)
        { 
            $row=mysqli_fetch_assoc($result); ?>
                <div class="table-responsive">
                    <div align="center"><h4 style="color:blue">VIEW POST DATA</h4></div>
            <table class="table table-bordered table-striped table-hover js-basic-example dataTable" >
                <thead  align="center" style="color:white;background-color:#673AB7">
                    <tr align="center">
                        <th>Title</th>
                        <th>Summary</th>
                         <th>Description</th>
                    </tr>
                </thead>
                <tfoot align="center" style="color:white;background-color:#673AB7">
                    <tr align="center">
                       <th>Title</th>
                        <th>Summary</th>
                         <th>Description</th>
                    </tr>
                </tfoot>
                <tbody>
                    <tr>
                        <td align="center"><b><?php echo $row['title'] ?></b></td>
                        <td align="center"><b><?php echo $row['summary'] ?></b></td>
                        <td align="center"><b><?php echo $row['description'] ?></b></td>
                    </tr> 
                </tbody>
            </table>
        </div>
        <?php
            
        }
	}
    else if($_REQUEST['flag']=='show_post_attachment')
    {
        $user_id=$_REQUEST['user_id'];
        $post_id=$_REQUEST['post_id'];
        $image_query="SELECT post_attachment.`attachment_name`
        FROM blog_post,attachment,post_attachment
        WHERE blog_post.`post_id` = post_attachment.`post_id`
        AND attachment.`attachment_type_id` = post_attachment.`attachment_type_id`
        AND blog_post.`post_id` = $post_id"; 
        $image_result = mysqli_query($connection,$image_query);
        if( $image_result->num_rows)
        { ?> <div align="center"><span> <h4 style='color:brown'>VIEW POST ATTACHMENTS</h4> <?php
            while($image_record = mysqli_fetch_assoc($image_result))
            {
                ?>
                   <span> <img style="width:200px;height:200px" src="../Files Attachment/<?php echo $image_record['attachment_name']; ?>" alt=""></span>
                <?php
            }
        } ?> </span></div><?php
    }
	else if($_REQUEST['flag']=='approve_post')
	{
		$post_id=$_REQUEST['post_id'];
		$query="UPDATE post_status SET post_status.`status_id`=3 WHERE post_status.`post_id` = '$post_id'"; 
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
            $query="SELECT blog_post.*,user.*,category.*,post_status.added_on
            FROM USER,category,blog_post,STATUS,post_status
            WHERE user.`user_id` = blog_post.`user_id`
            AND category.`category_id` = blog_post.`category_id`
            AND blog_post.`post_id` = post_status.`post_id`
            AND status.`status_id` = post_status.`status_id`
            AND post_status.`status_id` = 4 ORDER BY blog_post.post_id DESC"; 
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
                        <td style="width:175px">
                             <button class="btn btn-success" aria-controls="DataTables_Table_0" onclick="approve_post(<?php echo $row['post_id'];?>)">Approve</button>

                              <button class="btn btn-danger" aria-controls="DataTables_Table_0" onclick="unapprove_post(<?php echo $row['post_id'];?>)">Unapprove</button>
                          
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
	else if($_REQUEST['flag']=='unapprove_post')
	{
		$post_id=$_REQUEST['post_id'];
		$query="UPDATE post_status SET post_status.`status_id`=2 WHERE post_status.`post_id` = '$post_id'"; 
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
                $query="SELECT blog_post.*,user.*,category.*,post_status.added_on
                FROM USER,category,blog_post,STATUS,post_status
                WHERE user.`user_id` = blog_post.`user_id`
                AND category.`category_id` = blog_post.`category_id`
                AND blog_post.`post_id` = post_status.`post_id`
                AND status.`status_id` = post_status.`status_id`
                AND post_status.`status_id` = 4 ORDER BY blog_post.post_id DESC"; 
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
                            <td style="width:175px">
                                 <button class="btn btn-success" aria-controls="DataTables_Table_0" onclick="approve_post(<?php echo $row['post_id'];?>)">Approve</button>

                                  <button class="btn btn-danger" aria-controls="DataTables_Table_0" onclick="unapprove_post(<?php echo $row['post_id'];?>)">Unapprove</button>
                              
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
    else if($_REQUEST['flag']=='delete_active_post')
    {
        $post_id=$_REQUEST['post_id'];
        $query="UPDATE post_status SET post_status.`status_id`=5 WHERE post_status.`post_id` = '$post_id' AND post_status.status_id=3"; 
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
                         <th>Category</th>
                          <th>Added on</th>
                        <th>Status</th>
                        <th>View Post</th>
                        <th>Is_active</th>
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
                         <th>Status</th>
                        <th>View Post</th>
                        <th>Is_active</th>
                        <th style="width:165px">Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    
                    <?php
                        require_once("../require/connection.php");
                        $query="SELECT blog_post.*,user.*,category.*,post_status.added_on,status.status_type
                        FROM USER,category,blog_post,STATUS,post_status
                        WHERE user.`user_id` = blog_post.`user_id`
                        AND category.`category_id` = blog_post.`category_id`
                        AND blog_post.`post_id` = post_status.`post_id`
                        AND status.`status_id` = post_status.`status_id`
                        AND post_status.`status_id` = 3 ORDER BY blog_post.post_id DESC"; 
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
                                      <td><b>Active</b></td>
                                     <td style="width:175px">
                                       <button class="btn btn-info" aria-controls="DataTables_Table_0" onclick="show_post(<?php echo $row['post_id'];?>,<?php echo $row['user_id'];?>)">Data</button>
                                        <button class="btn btn-default" aria-controls="DataTables_Table_0" onclick="show_post_attachment(<?php echo $row['post_id'];?>,<?php echo $row['user_id'];?>)">Attachment</button>
                                    </td>
                                    <td style="width:175px">
                                         <button class="btn btn-warning" aria-controls="DataTables_Table_0" onclick="deactive_post(<?php echo $row['post_id'];?>)">Deactive</button>
                                    </td>
                                    <td>
                                       <button class="btn btn-primary btn-sm"><i class="zmdi zmdi-edit"></i></button>
                                        <button class="btn btn-danger btn-sm" onclick="delete_active_post(<?php echo $row['post_id'];?>)">
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
	else if($_REQUEST['flag']=='approve_rejected_post')
	{
		$post_id=$_REQUEST['post_id'];
		$query="UPDATE post_status SET post_status.`status_id`=3 WHERE post_status.`post_id` = '$post_id'"; 
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
                    $query="SELECT blog_post.*,user.*,category.*,post_status.added_on
                    FROM USER,category,blog_post,STATUS,post_status
                    WHERE user.`user_id` = blog_post.`user_id`
                    AND category.`category_id` = blog_post.`category_id`
                    AND blog_post.`post_id` = post_status.`post_id`
                    AND status.`status_id` = post_status.`status_id`
                    AND post_status.`status_id` = 2 ORDER BY blog_post.post_id DESC"; 
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
                                <td style="width:175px">
                                     <button class="btn btn-success" aria-controls="DataTables_Table_0" onclick="approve_rejected_post(<?php echo $row['post_id'];?>)">Approve</button>
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
	else if($_REQUEST['flag']=='deactive_post')
	{
		$post_id=$_REQUEST['post_id'];
		$query="UPDATE post_status SET post_status.`status_id`=2 WHERE post_status.`post_id` = '$post_id'"; 
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
                 <th>Category</th>
                  <th>Added on</th>
                <th>Status</th>
                <th>View Post</th>
                <th>Is_active</th>
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
                 <th>Status</th>
                <th>View Post</th>
                <th>Is_active</th>
                <th style="width:165px">Action</th>
            </tr>
        </tfoot>
        <tbody>
            
            <?php
                require_once("../require/connection.php");
                $query="SELECT blog_post.*,user.*,category.*,post_status.added_on,status.status_type
                FROM USER,category,blog_post,STATUS,post_status
                WHERE user.`user_id` = blog_post.`user_id`
                AND category.`category_id` = blog_post.`category_id`
                AND blog_post.`post_id` = post_status.`post_id`
                AND status.`status_id` = post_status.`status_id`
                AND post_status.`status_id` = 3 ORDER BY blog_post.post_id DESC"; 
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
                              <td><b>Active</b></td>
                             <td style="width:175px">
                               <button class="btn btn-info" aria-controls="DataTables_Table_0" onclick="show_post(<?php echo $row['post_id'];?>,<?php echo $row['user_id'];?>)">Data</button>
                                <button class="btn btn-default" aria-controls="DataTables_Table_0" onclick="show_post_attachment(<?php echo $row['post_id'];?>,<?php echo $row['user_id'];?>)">Attachment</button>
                            </td>
                            <td style="width:175px">
                                 <button class="btn btn-warning" aria-controls="DataTables_Table_0" onclick="deactive_post(<?php echo $row['post_id'];?>)">Deactive</button>
                            </td>
                            <td>
                               <button class="btn btn-primary btn-sm"><i class="zmdi zmdi-edit"></i></button>
                                <button class="btn btn-danger btn-sm" onclick="delete_active_post(<?php echo $row['post_id'];?>)">
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
    else if($_REQUEST['flag']=='edit_active_post')
    {
        $post_id=$_REQUEST['post_id'];
        $query="SELECT blog_post.* FROM blog_post 
        WHERE blog_post.`post_id`='$post_id' 
        ORDER BY blog_post.post_id DESC"; 
        $result=mysqli_query($connection,$query);
        if($result->num_rows)
        { 
            $row=mysqli_fetch_assoc($result); ?>
                <div class="table-responsive">
                    <div align="center"><h4 style="color:purple">UPDATE POST DATA</h4></div>
            <form action="require/post_process.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="post_id" value="<?php echo $post_id ?>">
            <table class="table table-bordered table-striped table-hover js-basic-example dataTable" >
                <thead  align="center" style="color:white;background-color:gray">
                    <tr align="center">
                        <th>Title</th>
                        <th>Summary</th>
                         <th>Description</th>
                    </tr>
                </thead>
                <tfoot align="center" style="color:white;background-color:gray">
                    <tr align="center">
                       <th>Title</th>
                        <th>Summary</th>
                         <th>Description</th>
                    </tr>
                </tfoot>
                <tbody>
                    <tr>
                        <td align="center"><textarea name="p_title" cols="20"><?php echo $row['title'] ?></textarea></td>
                        <td align="center"><textarea name="p_summary" cols="30"><?php echo $row['summary'] ?></textarea></td>
                        <td align="center"><textarea name="p_description" cols="50"><?php echo $row['description'] ?></textarea></td>
                    </tr> 
                    <tr align="center">
                        <td colspan="3">
                           
                        <?php
                        $image_query="SELECT post_attachment.*
                        FROM blog_post,attachment,post_attachment
                        WHERE blog_post.`post_id` = post_attachment.`post_id`
                        AND attachment.`attachment_type_id` = post_attachment.`attachment_type_id`
                        AND blog_post.`post_id` = $post_id"; 
                        $image_result = mysqli_query($connection,$image_query);
                        if( $image_result->num_rows)
                        { ?> <div align="center"><span><?php
                            $i=0;
                            while($image_record = mysqli_fetch_assoc($image_result))
                            {        
                                $_SESSION['post_attachment'][$i++]=$image_record;
                                ?>
                                   <span> <img style="width:200px;height:200px" src="../Files Attachment/<?php echo $image_record['attachment_name']; ?>" alt=""></span>
                                <?php
                            }
                        } ?> </span></div>
                        </td>
                    </tr>
                     <tr align="center">
                        <td colspan="3">
                        <?php
                        $image_query="SELECT post_attachment.`attachment_name`
                        FROM blog_post,attachment,post_attachment
                        WHERE blog_post.`post_id` = post_attachment.`post_id`
                        AND attachment.`attachment_type_id` = post_attachment.`attachment_type_id`
                        AND blog_post.`post_id` = $post_id"; 
                        $image_result = mysqli_query($connection,$image_query);
                        if( $image_result->num_rows)
                        { ?> <div align="center"><span><?php
                            while($image_record = mysqli_fetch_assoc($image_result))
                            {
                                ?>
                                   <span><input type="file" name="files[]"></span>
                                <?php
                            }
                        } ?> </span></div>
                        </td>
                    </tr>
                    <tr align="center">
                        <td colspan="3">
                            <button type="submit" name="update_post_record" class="btn btn-primary btn-round" aria-controls="DataTables_Table_0" >Update Post</button>
                       </td>
                       
                    </tr> 
                </tbody>
            </table>
        </form>
        </div>
        <?php
    }
}
