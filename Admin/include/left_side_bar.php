<?php 
    include_once("session_maintenance.php");
    require_once("../require/connection.php");
    $querys="SELECT *FROM user WHERE user_id=".$_SESSION['user']['user_id'];
    $results=mysqli_query($connection,$querys);
    if($results->num_rows)
    {
        while($record=mysqli_fetch_assoc($results))
        {  
           /* echo "<pre>"; print_r($row);*/
        
    
?>

<aside id="leftsidebar" class="sidebar">
    <div class="navbar-brand">
        <button class="btn-menu ls-toggle-btn" type="button"><i class="zmdi zmdi-menu"></i></button>
        <a href="index.php"><img src="assets/images/logo.svg" width="25" alt="Aero"><span class="m-l-10"><b>BLOGGER SYSTEM</b></span></a>
    </div>
    <div class="menu">
        <ul class="list">
            <li>
                <div class="user-info">
                    <a class="image" href="profile.php">
                        <img src="../Upload_Images/<?php echo $record['image']?>" alt="User"></a>
                    <div class="detail">
                        <h4><b style="color:green"><?php echo $record['first_name']." ".$record['middle_name']; ?></b></h4>
                        <small>Super Admin</small>                        
                    </div>
                </div>
            </li>

            <li class="active open"><a href="index.php"><i class="zmdi zmdi-home"></i><span>Dashboard</span></a></li>
            <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-grid"></i><span>Switch Role</span></a>
                        <ul class="ml-menu">
             <?php
            $query="SELECT role.role_type
            FROM USER,role,user_role_assign
            WHERE user.`user_id` = user_role_assign.`user_id`
            AND role.`role_id` = user_role_assign.`role_id`
            AND user_role_assign.`is_active_status`=3
            AND role.role_id!=1
            AND user.user_id='".$_SESSION['user']['user_id']."'";
            $result=mysqli_query($connection,$query);
            if($result->num_rows)
            {
                while($row=mysqli_fetch_assoc($result)) 
                {
                    ?>
                    
                    <li><a href="../switch_role_type.php?flag=admin_role_type_<?php echo $row['role_type']?>&user_id=<?php echo $_SESSION['user']['user_id'] ?>"><?php echo $row['role_type'] ?></a></li>
                    <?php
                }
            }
             ?>
                </ul>
                    </li> 
              <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-grid"></i><span>Users</span></a>
                <ul class="ml-menu">
                    <li><a href="add_user_form.php">Add User Form</a></li>
                    <li><a href="new_users_request.php">View New Users</a></li>
                    <li><a href="view_users.php">View All Users</a></li>
                    <li><a href="view_users_role.php">View Users Role</a></li>
                    <li><a href="view_unapprove_users.php">View Unapprove Users</a></li>
                    <li><a href="view_deleted_users.php">View Deleted Users</a></li>
                </ul>
            </li>     
            <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-apps"></i><span>App</span></a>
                <ul class="ml-menu">
                    <li><a href="group_discussion.php">Chat Apps</a></li>                
                </ul>
            </li>
            <li> <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-blogger"></i><span>Blog</span></a>
                <ul class="ml-menu">
                    <li><a href="post_form.php">Blog Post Form</a></li>
                    <li><a href="category.php">Manage Category</a></li>
                      <li><a href="blog-list.php">Blog List</a></li>
                    <li><a href="show_active_post.php">All Active Posts</a></li>
                    <li><a href="draft_posts.php">Draft Posts</a></li>
                    <li><a href="post_request.php">Post Request</a></li>
                    <li><a href="unapprove.php">Unapprove Posts</a></li>
                    <li><a href="deleted_post.php">Deleted Posts</a></li>
                </ul>
            </li>
             <li> <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-blogger"></i><span>Blog Comments</span></a>
                <ul class="ml-menu">
                    <li><a href="comments_request.php">Comments Request Table</a></li>
                </ul>
            </li>                       
        </ul>
    </div>
</aside>
<?php
    }
}

?>