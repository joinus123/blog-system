<!-- Left Sidebar -->

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
                        <img src="../Upload_Images/<?php echo $_SESSION['user']['image']?>" alt="User"></a>
                    <div class="detail">
                        <h4><b style="color:green"><?php echo $_SESSION['user']['first_name']." ".$_SESSION['user']['last_name']; ?></b></h4>
                        <small>Contributar</small>                        
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
            AND role.role_id!=2
            AND user.user_id='".$_SESSION['user']['user_id']."'";
            $result=mysqli_query($connection,$query);
            if($result->num_rows)
            {
                while($row=mysqli_fetch_assoc($result)) 
                {
                    ?>
                    
                            <li><a href="../switch_role_type.php?flag=contributar_role_type_<?php echo $row['role_type']?>&user_id=<?php echo $_SESSION['user']['user_id'] ?>"><?php echo $row['role_type'] ?></a></li>
                    <?php
                }
            }
             ?>
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
                    <li><a href="show_active_post.php">Active Post</a></li>
                    <li><a href="pending_posts.php">Pending Post</a></li>
                    <li><a href="draft_posts.php">Draft Post</a></li>
                    <li><a href="deleted_post.php">Deleted Post</a></li>
                    <li><a href="blog_list.php">List View</a></li>
                    <li><a href="blog-grid.html">Grid View</a></li>
                    <li><a href="blog-details.html">Blog Details</a></li>
                </ul>
            </li>               
        </ul>
    </div>
</aside>