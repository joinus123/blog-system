<?php
	include_once("include/session_maintenance.php");
    require_once("../require/connection.php");
	if($_REQUEST['flag']=='admin')
	{
		$user_id=$_REQUEST['user_id'];
		date_default_timezone_set("asia/Karachi");
        $added_on=date('l jS F Y h:i:s A');
      	$query_r = "INSERT INTO user_role_assign(user_id,role_id,is_active_status,role_assign_time)
        VALUES ('$user_id',1,3,'$added_on')"; 
        $result = mysqli_query($connection,$query_r);
        if($result)
        { 
          ?>
  <div class="body_scroll" >
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <div id="msg"></div>
                    <h2>View Users Role</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php"><i class="zmdi zmdi-home"></i> Admin Dasboard</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Tables</a></li>
                        <li class="breadcrumb-item active">View Users Role</li>
                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">                
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>                                
                </div>
            </div>
        </div>

        <div class="container-fluid" >
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>USERS</strong> ROLE ASSIGN </h2>
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
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable" >
                                    <thead class="thead-dark" align="center">
                                        <tr>
                                            <th>S:No</th>
                                            <th>Picture</th>
                                            <th>F: name</th>
                                            <th>L: Name</th>
                                            <th>Email</th>
                                            <th>Password</th>
                                             <th>Gender</th>
                                            <th>Role Type</th>
                                            <th>Admin</th>
                                           <th>Contributar</th>
                                           <th>User</th>
                                        </tr>
                                    </thead>
                                    <tfoot class="thead-dark" align="center">
                                        <tr>
                                           <th>S:No</th>
                                            <th>Picture</th>
                                            <th>F: name</th>
                                            <th>L: Name</th>
                                            <th>Email</th>
                                            <th>Password</th>
                                             <th>Gender</th>
                                            <th>Role Type</th>
                                            <th>Admin</th>
                                           <th>Contributar</th>
                                           <th>User</th>
                                        </tr>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        
                                        <?php
                                        $s_user_id=$_SESSION['user']['user_id'];
                                            require_once("../require/connection.php");
                                         $query="SELECT DISTINCT user.user_id,user.first_name,user.middle_name,user.last_name,user.email,user.password,user.p_number,user.dob,user.cnic,user.home_town,user.gender,user.image
                                          FROM user,user_role_assign,role,user_status,status
                                          WHERE user.user_id = user_role_assign.user_id
                                          AND role.role_id = user_role_assign.role_id
                                          AND user.user_id=user_status.user_id
                                          AND status.status_id=user_status.status_id
                                          AND user_status.status_id!=2
                                          AND user_status.status_id!=4
                                          AND user_status.status_id!=5
                                          AND user_status.status_id!=6
                                          AND user.user_id!= '$s_user_id' ORDER BY user.user_id DESC "
                                          ; 
                                            $result=mysqli_query($connection,$query);
                                            if($result->num_rows)
                                            {   $c=1;
                                                while($row=mysqli_fetch_assoc($result))
                                                {
                                                    ?>
                                                    <tr align="center">
                                                        <td><b style="color:#FF5722"><?php echo $c++ ?></b></td>
                                                        <td style="width:50px"><img class="rounded-circle" src="../Upload_Images/<?php echo $row['image']?>" alt="User"></td>
                                                        <td><b><?php echo $row['first_name'] ?></b></td>
                                                        <td style="width:70px"><b><?php echo $row['last_name'] ?></b></td>
                                                        <td><b><?php echo $row['email'] ?></b></td>
                                                        <td><b><?php echo $row['password'] ?></b></td>
                                                        <td align="center"><b><?php echo $row['gender'] ?></b></td>
                                                       <td><b>
                                                         <?php
                                                        $r_query="SELECT role.role_type
                                                            FROM USER,role,user_role_assign
                                                            WHERE user.`user_id` = user_role_assign.`user_id`
                                                            AND role.`role_id` = user_role_assign.`role_id`
                                                            AND user_role_assign.`is_active_status`=3
                                                            AND user.user_id='".$row['user_id']."' "; 
                                                            $r_result=mysqli_query($connection,$r_query);
                                                            if($r_result->num_rows)
                                                            {
                                                                while($r_row=mysqli_fetch_assoc($r_result)) 
                                                                {
                                                                    ?>
                                                                    
                                                                <b style="color:green"><?php echo $r_row['role_type']."<br/>"; ?></b>
                                                                    <?php
                                                                }
                                                            }
                                                             ?>
                                                          </b>
                                                      </td>
                                                        <td>
                                                            <?php
                                                                $a_q="SELECT DISTINCT user.user_id,user.first_name,role.role_id,role.role_type
                                                                  FROM user,role,user_role_assign,status
                                                                  WHERE user.user_id = user_role_assign.user_id
                                                                  AND role.role_id = user_role_assign.role_id
                                                                  AND status.status_id = user_role_assign.is_active_status
                                                                  AND user_role_assign.role_id = 1
                                                                  AND user_role_assign.is_active_status=3
                                                                  AND user.user_id=".$row['user_id'];
                                                                  $a_r=mysqli_query($connection,$a_q);
                                                                  $a_row=mysqli_fetch_assoc($a_r);
                                                            if($a_row['role_type']=='ADMIN')
                                                            {
                                                            ?>
                                                            <label class="switch" >
                                                              <input  type="checkbox" onclick="role_assign_not_admin(<?php echo $row['user_id'] ?>)" checked="">
                                                              <span  class="slider round"></span>
                                                            </label> 
                                                            <?php
                                                            }
                                                            else
                                                            {
                                                              ?>
                                                            <label class="switch" >
                                                              <input id="input" type="checkbox" onclick="role_assign_admin(<?php echo $row['user_id'] ?>)">
                                                              <span  class="slider round"></span>
                                                              <p id="msg"></p>
                                                            </label> 
                                                            <?php
                                                            } ?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            $c_q="SELECT DISTINCT user.user_id,user.first_name,role.role_id,role.role_type
                                                                  FROM user,role,user_role_assign,status
                                                                  WHERE user.user_id = user_role_assign.user_id
                                                                  AND role.role_id = user_role_assign.role_id
                                                                  AND status.status_id = user_role_assign.is_active_status
                                                                  AND user_role_assign.role_id = 2
                                                                  AND user_role_assign.is_active_status=3
                                                                  AND user.user_id=".$row['user_id'];
                                                                  $c_r=mysqli_query($connection,$c_q);
                                                                  $c_row=mysqli_fetch_assoc($c_r);
                                                            if($c_row['role_type']=='CONTRIBUTAR')
                                                            {
                                                            ?>
                                                            <label class="switch" >
                                                              <input id="input" type="checkbox" onclick="role_assign_not_contributar(<?php echo $row['user_id'] ?>)" checked="">
                                                              <span  class="slider round"></span>
                                                              <p id="msg"></p>
                                                            </label> 
                                                            <?php
                                                            }
                                                            else
                                                            {
                                                              ?>
                                                            <label class="switch" >
                                                              <input id="input" type="checkbox" onclick="role_assign_contributar(<?php echo $row['user_id'] ?>)">
                                                              <span  class="slider round"></span>
                                                              <p id="msg"></p>
                                                            </label> 
                                                            <?php
                                                            } ?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            $u_q="SELECT DISTINCT user.user_id,user.first_name,role.role_id,role.role_type
                                                                  FROM user,role,user_role_assign,status
                                                                  WHERE user.user_id = user_role_assign.user_id
                                                                  AND role.role_id = user_role_assign.role_id
                                                                  AND status.status_id = user_role_assign.is_active_status
                                                                  AND user_role_assign.role_id = 3
                                                                  AND user_role_assign.is_active_status=3
                                                                  AND user.user_id=".$row['user_id'];
                                                                  $u_r=mysqli_query($connection,$u_q);
                                                                  $u_row=mysqli_fetch_assoc($u_r);
                                                            if($u_row['role_type']=='USER')
                                                            {
                                                            ?>
                                                            <label class="switch" >
                                                              <input id="input" type="checkbox" onclick="role_assign_not_user(<?php echo $row['user_id'] ?>)" checked="">
                                                              <span  class="slider round"></span>
                                                              <p id="msg"></p>
                                                            </label> 
                                                            <?php
                                                            }
                                                            else
                                                            {
                                                              ?>
                                                            <label class="switch" >
                                                              <input id="input" type="checkbox" onclick="role_assign_user(<?php echo $row['user_id'] ?>)">
                                                              <span  class="slider round"></span>
                                                              <p id="msg"></p>
                                                            </label> 
                                                            <?php
                                                            } ?>
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
	}
	else if($_REQUEST['flag']=='not_admin')
	{
		date_default_timezone_set("asia/Karachi");
        $added_on=date('l jS F Y h:i:s A');
		$user_id=$_REQUEST['user_id'];
       	$query="UPDATE user_role_assign SET user_role_assign.is_active_status=4,user_role_assign.role_deactive_time='$added_on' WHERE user_role_assign.user_id='$user_id' AND user_role_assign.role_id=1 AND user_role_assign.is_active_status=3"; 
      	 $result = mysqli_query($connection,$query);
         if($result)
         {
             ?>
  <div class="body_scroll" >
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <div id="msg"></div>
                    <h2>View Users Role</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php"><i class="zmdi zmdi-home"></i> Admin Dasboard</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Tables</a></li>
                        <li class="breadcrumb-item active">View Users Role</li>
                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">                
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>                                
                </div>
            </div>
        </div>

        <div class="container-fluid" >
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>USERS</strong> ROLE ASSIGN </h2>
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
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable" >
                                    <thead class="thead-dark" align="center">
                                        <tr>
                                            <th>S:No</th>
                                            <th>Picture</th>
                                            <th>F: name</th>
                                            <th>L: Name</th>
                                            <th>Email</th>
                                            <th>Password</th>
                                             <th>Gender</th>
                                            <th>Role Type</th>
                                            <th>Admin</th>
                                           <th>Contributar</th>
                                           <th>User</th>
                                        </tr>
                                    </thead>
                                    <tfoot class="thead-dark" align="center">
                                        <tr>
                                           <th>S:No</th>
                                            <th>Picture</th>
                                            <th>F: name</th>
                                            <th>L: Name</th>
                                            <th>Email</th>
                                            <th>Password</th>
                                             <th>Gender</th>
                                            <th>Role Type</th>
                                            <th>Admin</th>
                                           <th>Contributar</th>
                                           <th>User</th>
                                        </tr>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        
                                        <?php
                                        $s_user_id=$_SESSION['user']['user_id'];
                                            require_once("../require/connection.php");
                                         $query="SELECT DISTINCT user.user_id,user.first_name,user.middle_name,user.last_name,user.email,user.password,user.p_number,user.dob,user.cnic,user.home_town,user.gender,user.image
                                          FROM user,user_role_assign,role,user_status,status
                                          WHERE user.user_id = user_role_assign.user_id
                                          AND role.role_id = user_role_assign.role_id
                                          AND user.user_id=user_status.user_id
                                          AND status.status_id=user_status.status_id
                                          AND user_status.status_id!=2
                                          AND user_status.status_id!=4
                                          AND user_status.status_id!=5
                                          AND user_status.status_id!=6
                                          AND user.user_id!= '$s_user_id' ORDER BY user.user_id DESC "
                                          ; 
                                            $result=mysqli_query($connection,$query);
                                            if($result->num_rows)
                                            {   $c=1;
                                                while($row=mysqli_fetch_assoc($result))
                                                {
                                                    ?>
                                                    <tr align="center">
                                                        <td><b style="color:#FF5722"><?php echo $c++ ?></b></td>
                                                        <td style="width:50px"><img class="rounded-circle" src="../Upload_Images/<?php echo $row['image']?>" alt="User"></td>
                                                        <td><b><?php echo $row['first_name'] ?></b></td>
                                                        <td style="width:70px"><b><?php echo $row['last_name'] ?></b></td>
                                                        <td><b><?php echo $row['email'] ?></b></td>
                                                        <td><b><?php echo $row['password'] ?></b></td>
                                                        <td align="center"><b><?php echo $row['gender'] ?></b></td>
                                                       <td><b>
                                                         <?php
                                                        $r_query="SELECT role.role_type
                                                            FROM USER,role,user_role_assign
                                                            WHERE user.`user_id` = user_role_assign.`user_id`
                                                            AND role.`role_id` = user_role_assign.`role_id`
                                                            AND user_role_assign.`is_active_status`=3
                                                            AND user.user_id='".$row['user_id']."' "; 
                                                            $r_result=mysqli_query($connection,$r_query);
                                                            if($r_result->num_rows)
                                                            {
                                                                while($r_row=mysqli_fetch_assoc($r_result)) 
                                                                {
                                                                    ?>
                                                                    
                                                                <b style="color:green"><?php echo $r_row['role_type']."<br/>"; ?></b>
                                                                    <?php
                                                                }
                                                            }
                                                             ?>
                                                          </b>
                                                      </td>
                                                        <td>
                                                            <?php
                                                                $a_q="SELECT DISTINCT user.user_id,user.first_name,role.role_id,role.role_type
                                                                  FROM user,role,user_role_assign,status
                                                                  WHERE user.user_id = user_role_assign.user_id
                                                                  AND role.role_id = user_role_assign.role_id
                                                                  AND status.status_id = user_role_assign.is_active_status
                                                                  AND user_role_assign.role_id = 1
                                                                  AND user_role_assign.is_active_status=3
                                                                  AND user.user_id=".$row['user_id'];
                                                                  $a_r=mysqli_query($connection,$a_q);
                                                                  $a_row=mysqli_fetch_assoc($a_r);
                                                            if($a_row['role_type']=='ADMIN')
                                                            {
                                                            ?>
                                                            <label class="switch" >
                                                              <input  type="checkbox" onclick="role_assign_not_admin(<?php echo $row['user_id'] ?>)" checked="">
                                                              <span  class="slider round"></span>
                                                            </label> 
                                                            <?php
                                                            }
                                                            else
                                                            {
                                                              ?>
                                                            <label class="switch" >
                                                              <input id="input" type="checkbox" onclick="role_assign_admin(<?php echo $row['user_id'] ?>)">
                                                              <span  class="slider round"></span>
                                                              <p id="msg"></p>
                                                            </label> 
                                                            <?php
                                                            } ?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            $c_q="SELECT DISTINCT user.user_id,user.first_name,role.role_id,role.role_type
                                                                  FROM user,role,user_role_assign,status
                                                                  WHERE user.user_id = user_role_assign.user_id
                                                                  AND role.role_id = user_role_assign.role_id
                                                                  AND status.status_id = user_role_assign.is_active_status
                                                                  AND user_role_assign.role_id = 2
                                                                  AND user_role_assign.is_active_status=3
                                                                  AND user.user_id=".$row['user_id'];
                                                                  $c_r=mysqli_query($connection,$c_q);
                                                                  $c_row=mysqli_fetch_assoc($c_r);
                                                            if($c_row['role_type']=='CONTRIBUTAR')
                                                            {
                                                            ?>
                                                            <label class="switch" >
                                                              <input id="input" type="checkbox" onclick="role_assign_not_contributar(<?php echo $row['user_id'] ?>)" checked="">
                                                              <span  class="slider round"></span>
                                                              <p id="msg"></p>
                                                            </label> 
                                                            <?php
                                                            }
                                                            else
                                                            {
                                                              ?>
                                                            <label class="switch" >
                                                              <input id="input" type="checkbox" onclick="role_assign_contributar(<?php echo $row['user_id'] ?>)">
                                                              <span  class="slider round"></span>
                                                              <p id="msg"></p>
                                                            </label> 
                                                            <?php
                                                            } ?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            $u_q="SELECT DISTINCT user.user_id,user.first_name,role.role_id,role.role_type
                                                                  FROM user,role,user_role_assign,status
                                                                  WHERE user.user_id = user_role_assign.user_id
                                                                  AND role.role_id = user_role_assign.role_id
                                                                  AND status.status_id = user_role_assign.is_active_status
                                                                  AND user_role_assign.role_id = 3
                                                                  AND user_role_assign.is_active_status=3
                                                                  AND user.user_id=".$row['user_id'];
                                                                  $u_r=mysqli_query($connection,$u_q);
                                                                  $u_row=mysqli_fetch_assoc($u_r);
                                                            if($u_row['role_type']=='USER')
                                                            {
                                                            ?>
                                                            <label class="switch" >
                                                              <input id="input" type="checkbox" onclick="role_assign_not_user(<?php echo $row['user_id'] ?>)" checked="">
                                                              <span  class="slider round"></span>
                                                              <p id="msg"></p>
                                                            </label> 
                                                            <?php
                                                            }
                                                            else
                                                            {
                                                              ?>
                                                            <label class="switch" >
                                                              <input id="input" type="checkbox" onclick="role_assign_user(<?php echo $row['user_id'] ?>)">
                                                              <span  class="slider round"></span>
                                                              <p id="msg"></p>
                                                            </label> 
                                                            <?php
                                                            } ?>
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
	}
	else if($_REQUEST['flag']=='contributar')
	{
		$user_id=$_REQUEST['user_id'];
		date_default_timezone_set("asia/Karachi");
        $added_on=date('l jS F Y h:i:s A');
      	$query_r = "INSERT INTO user_role_assign(user_id,role_id,is_active_status,role_assign_time)
        VALUES ('$user_id',2,3,'$added_on')"; 
         $result = mysqli_query($connection,$query_r);
         if($result)
         {
             ?>
  <div class="body_scroll" >
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <div id="msg"></div>
                    <h2>View Users Role</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php"><i class="zmdi zmdi-home"></i> Admin Dasboard</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Tables</a></li>
                        <li class="breadcrumb-item active">View Users Role</li>
                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">                
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>                                
                </div>
            </div>
        </div>

        <div class="container-fluid" >
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>USERS</strong> ROLE ASSIGN </h2>
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
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable" >
                                    <thead class="thead-dark" align="center">
                                        <tr>
                                            <th>S:No</th>
                                            <th>Picture</th>
                                            <th>F: name</th>
                                            <th>L: Name</th>
                                            <th>Email</th>
                                            <th>Password</th>
                                             <th>Gender</th>
                                            <th>Role Type</th>
                                            <th>Admin</th>
                                           <th>Contributar</th>
                                           <th>User</th>
                                        </tr>
                                    </thead>
                                    <tfoot class="thead-dark" align="center">
                                        <tr>
                                           <th>S:No</th>
                                            <th>Picture</th>
                                            <th>F: name</th>
                                            <th>L: Name</th>
                                            <th>Email</th>
                                            <th>Password</th>
                                             <th>Gender</th>
                                            <th>Role Type</th>
                                            <th>Admin</th>
                                           <th>Contributar</th>
                                           <th>User</th>
                                        </tr>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        
                                        <?php
                                        $s_user_id=$_SESSION['user']['user_id'];
                                            require_once("../require/connection.php");
                                         $query="SELECT DISTINCT user.user_id,user.first_name,user.middle_name,user.last_name,user.email,user.password,user.p_number,user.dob,user.cnic,user.home_town,user.gender,user.image
                                          FROM user,user_role_assign,role,user_status,status
                                          WHERE user.user_id = user_role_assign.user_id
                                          AND role.role_id = user_role_assign.role_id
                                          AND user.user_id=user_status.user_id
                                          AND status.status_id=user_status.status_id
                                          AND user_status.status_id!=2
                                          AND user_status.status_id!=4
                                          AND user_status.status_id!=5
                                          AND user_status.status_id!=6
                                          AND user.user_id!= '$s_user_id' ORDER BY user.user_id DESC "
                                          ; 
                                            $result=mysqli_query($connection,$query);
                                            if($result->num_rows)
                                            {   $c=1;
                                                while($row=mysqli_fetch_assoc($result))
                                                {
                                                    ?>
                                                    <tr align="center">
                                                        <td><b style="color:#FF5722"><?php echo $c++ ?></b></td>
                                                        <td style="width:50px"><img class="rounded-circle" src="../Upload_Images/<?php echo $row['image']?>" alt="User"></td>
                                                        <td><b><?php echo $row['first_name'] ?></b></td>
                                                        <td style="width:70px"><b><?php echo $row['last_name'] ?></b></td>
                                                        <td><b><?php echo $row['email'] ?></b></td>
                                                        <td><b><?php echo $row['password'] ?></b></td>
                                                        <td align="center"><b><?php echo $row['gender'] ?></b></td>
                                                       <td><b>
                                                         <?php
                                                        $r_query="SELECT role.role_type
                                                            FROM USER,role,user_role_assign
                                                            WHERE user.`user_id` = user_role_assign.`user_id`
                                                            AND role.`role_id` = user_role_assign.`role_id`
                                                            AND user_role_assign.`is_active_status`=3
                                                            AND user.user_id='".$row['user_id']."' "; 
                                                            $r_result=mysqli_query($connection,$r_query);
                                                            if($r_result->num_rows)
                                                            {
                                                                while($r_row=mysqli_fetch_assoc($r_result)) 
                                                                {
                                                                    ?>
                                                                    
                                                                <b style="color:green"><?php echo $r_row['role_type']."<br/>"; ?></b>
                                                                    <?php
                                                                }
                                                            }
                                                             ?>
                                                          </b>
                                                      </td>
                                                        <td>
                                                            <?php
                                                                $a_q="SELECT DISTINCT user.user_id,user.first_name,role.role_id,role.role_type
                                                                  FROM user,role,user_role_assign,status
                                                                  WHERE user.user_id = user_role_assign.user_id
                                                                  AND role.role_id = user_role_assign.role_id
                                                                  AND status.status_id = user_role_assign.is_active_status
                                                                  AND user_role_assign.role_id = 1
                                                                  AND user_role_assign.is_active_status=3
                                                                  AND user.user_id=".$row['user_id'];
                                                                  $a_r=mysqli_query($connection,$a_q);
                                                                  $a_row=mysqli_fetch_assoc($a_r);
                                                            if($a_row['role_type']=='ADMIN')
                                                            {
                                                            ?>
                                                            <label class="switch" >
                                                              <input  type="checkbox" onclick="role_assign_not_admin(<?php echo $row['user_id'] ?>)" checked="">
                                                              <span  class="slider round"></span>
                                                            </label> 
                                                            <?php
                                                            }
                                                            else
                                                            {
                                                              ?>
                                                            <label class="switch" >
                                                              <input id="input" type="checkbox" onclick="role_assign_admin(<?php echo $row['user_id'] ?>)">
                                                              <span  class="slider round"></span>
                                                              <p id="msg"></p>
                                                            </label> 
                                                            <?php
                                                            } ?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            $c_q="SELECT DISTINCT user.user_id,user.first_name,role.role_id,role.role_type
                                                                  FROM user,role,user_role_assign,status
                                                                  WHERE user.user_id = user_role_assign.user_id
                                                                  AND role.role_id = user_role_assign.role_id
                                                                  AND status.status_id = user_role_assign.is_active_status
                                                                  AND user_role_assign.role_id = 2
                                                                  AND user_role_assign.is_active_status=3
                                                                  AND user.user_id=".$row['user_id'];
                                                                  $c_r=mysqli_query($connection,$c_q);
                                                                  $c_row=mysqli_fetch_assoc($c_r);
                                                            if($c_row['role_type']=='CONTRIBUTAR')
                                                            {
                                                            ?>
                                                            <label class="switch" >
                                                              <input id="input" type="checkbox" onclick="role_assign_not_contributar(<?php echo $row['user_id'] ?>)" checked="">
                                                              <span  class="slider round"></span>
                                                              <p id="msg"></p>
                                                            </label> 
                                                            <?php
                                                            }
                                                            else
                                                            {
                                                              ?>
                                                            <label class="switch" >
                                                              <input id="input" type="checkbox" onclick="role_assign_contributar(<?php echo $row['user_id'] ?>)">
                                                              <span  class="slider round"></span>
                                                              <p id="msg"></p>
                                                            </label> 
                                                            <?php
                                                            } ?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            $u_q="SELECT DISTINCT user.user_id,user.first_name,role.role_id,role.role_type
                                                                  FROM user,role,user_role_assign,status
                                                                  WHERE user.user_id = user_role_assign.user_id
                                                                  AND role.role_id = user_role_assign.role_id
                                                                  AND status.status_id = user_role_assign.is_active_status
                                                                  AND user_role_assign.role_id = 3
                                                                  AND user_role_assign.is_active_status=3
                                                                  AND user.user_id=".$row['user_id'];
                                                                  $u_r=mysqli_query($connection,$u_q);
                                                                  $u_row=mysqli_fetch_assoc($u_r);
                                                            if($u_row['role_type']=='USER')
                                                            {
                                                            ?>
                                                            <label class="switch" >
                                                              <input id="input" type="checkbox" onclick="role_assign_not_user(<?php echo $row['user_id'] ?>)" checked="">
                                                              <span  class="slider round"></span>
                                                              <p id="msg"></p>
                                                            </label> 
                                                            <?php
                                                            }
                                                            else
                                                            {
                                                              ?>
                                                            <label class="switch" >
                                                              <input id="input" type="checkbox" onclick="role_assign_user(<?php echo $row['user_id'] ?>)">
                                                              <span  class="slider round"></span>
                                                              <p id="msg"></p>
                                                            </label> 
                                                            <?php
                                                            } ?>
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
	}
	else if($_REQUEST['flag']=='not_contributar')
	{
		date_default_timezone_set("asia/Karachi");
        $added_on=date('l jS F Y h:i:s A');
		$user_id=$_REQUEST['user_id'];
       	$query="UPDATE user_role_assign SET user_role_assign.is_active_status=4,user_role_assign.role_deactive_time='$added_on' WHERE user_role_assign.user_id='$user_id' AND user_role_assign.role_id=2 AND user_role_assign.is_active_status=3"; 
      	 $result = mysqli_query($connection,$query);
         if($result)
         {
             ?>
  <div class="body_scroll" >
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <div id="msg"></div>
                    <h2>View Users Role</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php"><i class="zmdi zmdi-home"></i> Admin Dasboard</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Tables</a></li>
                        <li class="breadcrumb-item active">View Users Role</li>
                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">                
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>                                
                </div>
            </div>
        </div>

        <div class="container-fluid" >
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>USERS</strong> ROLE ASSIGN </h2>
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
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable" >
                                    <thead class="thead-dark" align="center">
                                        <tr>
                                            <th>S:No</th>
                                            <th>Picture</th>
                                            <th>F: name</th>
                                            <th>L: Name</th>
                                            <th>Email</th>
                                            <th>Password</th>
                                             <th>Gender</th>
                                            <th>Role Type</th>
                                            <th>Admin</th>
                                           <th>Contributar</th>
                                           <th>User</th>
                                        </tr>
                                    </thead>
                                    <tfoot class="thead-dark" align="center">
                                        <tr>
                                           <th>S:No</th>
                                            <th>Picture</th>
                                            <th>F: name</th>
                                            <th>L: Name</th>
                                            <th>Email</th>
                                            <th>Password</th>
                                             <th>Gender</th>
                                            <th>Role Type</th>
                                            <th>Admin</th>
                                           <th>Contributar</th>
                                           <th>User</th>
                                        </tr>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        
                                        <?php
                                        $s_user_id=$_SESSION['user']['user_id'];
                                            require_once("../require/connection.php");
                                         $query="SELECT DISTINCT user.user_id,user.first_name,user.middle_name,user.last_name,user.email,user.password,user.p_number,user.dob,user.cnic,user.home_town,user.gender,user.image
                                          FROM user,user_role_assign,role,user_status,status
                                          WHERE user.user_id = user_role_assign.user_id
                                          AND role.role_id = user_role_assign.role_id
                                          AND user.user_id=user_status.user_id
                                          AND status.status_id=user_status.status_id
                                          AND user_status.status_id!=2
                                          AND user_status.status_id!=4
                                          AND user_status.status_id!=5
                                          AND user_status.status_id!=6
                                          AND user.user_id!= '$s_user_id' ORDER BY user.user_id DESC "
                                          ; 
                                            $result=mysqli_query($connection,$query);
                                            if($result->num_rows)
                                            {   $c=1;
                                                while($row=mysqli_fetch_assoc($result))
                                                {
                                                    ?>
                                                    <tr align="center">
                                                        <td><b style="color:#FF5722"><?php echo $c++ ?></b></td>
                                                        <td style="width:50px"><img class="rounded-circle" src="../Upload_Images/<?php echo $row['image']?>" alt="User"></td>
                                                        <td><b><?php echo $row['first_name'] ?></b></td>
                                                        <td style="width:70px"><b><?php echo $row['last_name'] ?></b></td>
                                                        <td><b><?php echo $row['email'] ?></b></td>
                                                        <td><b><?php echo $row['password'] ?></b></td>
                                                        <td align="center"><b><?php echo $row['gender'] ?></b></td>
                                                       <td><b>
                                                         <?php
                                                        $r_query="SELECT role.role_type
                                                            FROM USER,role,user_role_assign
                                                            WHERE user.`user_id` = user_role_assign.`user_id`
                                                            AND role.`role_id` = user_role_assign.`role_id`
                                                            AND user_role_assign.`is_active_status`=3
                                                            AND user.user_id='".$row['user_id']."' "; 
                                                            $r_result=mysqli_query($connection,$r_query);
                                                            if($r_result->num_rows)
                                                            {
                                                                while($r_row=mysqli_fetch_assoc($r_result)) 
                                                                {
                                                                    ?>
                                                                    
                                                                <b style="color:green"><?php echo $r_row['role_type']."<br/>"; ?></b>
                                                                    <?php
                                                                }
                                                            }
                                                             ?>
                                                          </b>
                                                      </td>
                                                        <td>
                                                            <?php
                                                                $a_q="SELECT DISTINCT user.user_id,user.first_name,role.role_id,role.role_type
                                                                  FROM user,role,user_role_assign,status
                                                                  WHERE user.user_id = user_role_assign.user_id
                                                                  AND role.role_id = user_role_assign.role_id
                                                                  AND status.status_id = user_role_assign.is_active_status
                                                                  AND user_role_assign.role_id = 1
                                                                  AND user_role_assign.is_active_status=3
                                                                  AND user.user_id=".$row['user_id'];
                                                                  $a_r=mysqli_query($connection,$a_q);
                                                                  $a_row=mysqli_fetch_assoc($a_r);
                                                            if($a_row['role_type']=='ADMIN')
                                                            {
                                                            ?>
                                                            <label class="switch" >
                                                              <input  type="checkbox" onclick="role_assign_not_admin(<?php echo $row['user_id'] ?>)" checked="">
                                                              <span  class="slider round"></span>
                                                            </label> 
                                                            <?php
                                                            }
                                                            else
                                                            {
                                                              ?>
                                                            <label class="switch" >
                                                              <input id="input" type="checkbox" onclick="role_assign_admin(<?php echo $row['user_id'] ?>)">
                                                              <span  class="slider round"></span>
                                                              <p id="msg"></p>
                                                            </label> 
                                                            <?php
                                                            } ?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            $c_q="SELECT DISTINCT user.user_id,user.first_name,role.role_id,role.role_type
                                                                  FROM user,role,user_role_assign,status
                                                                  WHERE user.user_id = user_role_assign.user_id
                                                                  AND role.role_id = user_role_assign.role_id
                                                                  AND status.status_id = user_role_assign.is_active_status
                                                                  AND user_role_assign.role_id = 2
                                                                  AND user_role_assign.is_active_status=3
                                                                  AND user.user_id=".$row['user_id'];
                                                                  $c_r=mysqli_query($connection,$c_q);
                                                                  $c_row=mysqli_fetch_assoc($c_r);
                                                            if($c_row['role_type']=='CONTRIBUTAR')
                                                            {
                                                            ?>
                                                            <label class="switch" >
                                                              <input id="input" type="checkbox" onclick="role_assign_not_contributar(<?php echo $row['user_id'] ?>)" checked="">
                                                              <span  class="slider round"></span>
                                                              <p id="msg"></p>
                                                            </label> 
                                                            <?php
                                                            }
                                                            else
                                                            {
                                                              ?>
                                                            <label class="switch" >
                                                              <input id="input" type="checkbox" onclick="role_assign_contributar(<?php echo $row['user_id'] ?>)">
                                                              <span  class="slider round"></span>
                                                              <p id="msg"></p>
                                                            </label> 
                                                            <?php
                                                            } ?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            $u_q="SELECT DISTINCT user.user_id,user.first_name,role.role_id,role.role_type
                                                                  FROM user,role,user_role_assign,status
                                                                  WHERE user.user_id = user_role_assign.user_id
                                                                  AND role.role_id = user_role_assign.role_id
                                                                  AND status.status_id = user_role_assign.is_active_status
                                                                  AND user_role_assign.role_id = 3
                                                                  AND user_role_assign.is_active_status=3
                                                                  AND user.user_id=".$row['user_id'];
                                                                  $u_r=mysqli_query($connection,$u_q);
                                                                  $u_row=mysqli_fetch_assoc($u_r);
                                                            if($u_row['role_type']=='USER')
                                                            {
                                                            ?>
                                                            <label class="switch" >
                                                              <input id="input" type="checkbox" onclick="role_assign_not_user(<?php echo $row['user_id'] ?>)" checked="">
                                                              <span  class="slider round"></span>
                                                              <p id="msg"></p>
                                                            </label> 
                                                            <?php
                                                            }
                                                            else
                                                            {
                                                              ?>
                                                            <label class="switch" >
                                                              <input id="input" type="checkbox" onclick="role_assign_user(<?php echo $row['user_id'] ?>)">
                                                              <span  class="slider round"></span>
                                                              <p id="msg"></p>
                                                            </label> 
                                                            <?php
                                                            } ?>
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
	}
	else if($_REQUEST['flag']=='user')
	{
		$user_id=$_REQUEST['user_id'];
		date_default_timezone_set("asia/Karachi");
        $added_on=date('l jS F Y h:i:s A');
      	$query_r = "INSERT INTO user_role_assign(user_id,role_id,is_active_status,role_assign_time)
        VALUES ('$user_id',3,3,'$added_on')"; 
          $result = mysqli_query($connection,$query_r);
        if($result)
        {
           ?>
  <div class="body_scroll" >
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <div id="msg"></div>
                    <h2>View Users Role</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php"><i class="zmdi zmdi-home"></i> Admin Dasboard</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Tables</a></li>
                        <li class="breadcrumb-item active">View Users Role</li>
                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">                
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>                                
                </div>
            </div>
        </div>

        <div class="container-fluid" >
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>USERS</strong> ROLE ASSIGN </h2>
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
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable" >
                                    <thead class="thead-dark" align="center">
                                        <tr>
                                            <th>S:No</th>
                                            <th>Picture</th>
                                            <th>F: name</th>
                                            <th>L: Name</th>
                                            <th>Email</th>
                                            <th>Password</th>
                                             <th>Gender</th>
                                            <th>Role Type</th>
                                            <th>Admin</th>
                                           <th>Contributar</th>
                                           <th>User</th>
                                        </tr>
                                    </thead>
                                    <tfoot class="thead-dark" align="center">
                                        <tr>
                                           <th>S:No</th>
                                            <th>Picture</th>
                                            <th>F: name</th>
                                            <th>L: Name</th>
                                            <th>Email</th>
                                            <th>Password</th>
                                             <th>Gender</th>
                                            <th>Role Type</th>
                                            <th>Admin</th>
                                           <th>Contributar</th>
                                           <th>User</th>
                                        </tr>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        
                                        <?php
                                        $s_user_id=$_SESSION['user']['user_id'];
                                            require_once("../require/connection.php");
                                         $query="SELECT DISTINCT user.user_id,user.first_name,user.middle_name,user.last_name,user.email,user.password,user.p_number,user.dob,user.cnic,user.home_town,user.gender,user.image
                                          FROM user,user_role_assign,role,user_status,status
                                          WHERE user.user_id = user_role_assign.user_id
                                          AND role.role_id = user_role_assign.role_id
                                          AND user.user_id=user_status.user_id
                                          AND status.status_id=user_status.status_id
                                          AND user_status.status_id!=2
                                          AND user_status.status_id!=4
                                          AND user_status.status_id!=5
                                          AND user_status.status_id!=6
                                          AND user.user_id!= '$s_user_id' ORDER BY user.user_id DESC "
                                          ; 
                                            $result=mysqli_query($connection,$query);
                                            if($result->num_rows)
                                            {   $c=1;
                                                while($row=mysqli_fetch_assoc($result))
                                                {
                                                    ?>
                                                    <tr align="center">
                                                        <td><b style="color:#FF5722"><?php echo $c++ ?></b></td>
                                                        <td style="width:50px"><img class="rounded-circle" src="../Upload_Images/<?php echo $row['image']?>" alt="User"></td>
                                                        <td><b><?php echo $row['first_name'] ?></b></td>
                                                        <td style="width:70px"><b><?php echo $row['last_name'] ?></b></td>
                                                        <td><b><?php echo $row['email'] ?></b></td>
                                                        <td><b><?php echo $row['password'] ?></b></td>
                                                        <td align="center"><b><?php echo $row['gender'] ?></b></td>
                                                       <td><b>
                                                         <?php
                                                        $r_query="SELECT role.role_type
                                                            FROM USER,role,user_role_assign
                                                            WHERE user.`user_id` = user_role_assign.`user_id`
                                                            AND role.`role_id` = user_role_assign.`role_id`
                                                            AND user_role_assign.`is_active_status`=3
                                                            AND user.user_id='".$row['user_id']."' "; 
                                                            $r_result=mysqli_query($connection,$r_query);
                                                            if($r_result->num_rows)
                                                            {
                                                                while($r_row=mysqli_fetch_assoc($r_result)) 
                                                                {
                                                                    ?>
                                                                    
                                                                <b style="color:green"><?php echo $r_row['role_type']."<br/>"; ?></b>
                                                                    <?php
                                                                }
                                                            }
                                                             ?>
                                                          </b>
                                                      </td>
                                                        <td>
                                                            <?php
                                                                $a_q="SELECT DISTINCT user.user_id,user.first_name,role.role_id,role.role_type
                                                                  FROM user,role,user_role_assign,status
                                                                  WHERE user.user_id = user_role_assign.user_id
                                                                  AND role.role_id = user_role_assign.role_id
                                                                  AND status.status_id = user_role_assign.is_active_status
                                                                  AND user_role_assign.role_id = 1
                                                                  AND user_role_assign.is_active_status=3
                                                                  AND user.user_id=".$row['user_id'];
                                                                  $a_r=mysqli_query($connection,$a_q);
                                                                  $a_row=mysqli_fetch_assoc($a_r);
                                                            if($a_row['role_type']=='ADMIN')
                                                            {
                                                            ?>
                                                            <label class="switch" >
                                                              <input  type="checkbox" onclick="role_assign_not_admin(<?php echo $row['user_id'] ?>)" checked="">
                                                              <span  class="slider round"></span>
                                                            </label> 
                                                            <?php
                                                            }
                                                            else
                                                            {
                                                              ?>
                                                            <label class="switch" >
                                                              <input id="input" type="checkbox" onclick="role_assign_admin(<?php echo $row['user_id'] ?>)">
                                                              <span  class="slider round"></span>
                                                              <p id="msg"></p>
                                                            </label> 
                                                            <?php
                                                            } ?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            $c_q="SELECT DISTINCT user.user_id,user.first_name,role.role_id,role.role_type
                                                                  FROM user,role,user_role_assign,status
                                                                  WHERE user.user_id = user_role_assign.user_id
                                                                  AND role.role_id = user_role_assign.role_id
                                                                  AND status.status_id = user_role_assign.is_active_status
                                                                  AND user_role_assign.role_id = 2
                                                                  AND user_role_assign.is_active_status=3
                                                                  AND user.user_id=".$row['user_id'];
                                                                  $c_r=mysqli_query($connection,$c_q);
                                                                  $c_row=mysqli_fetch_assoc($c_r);
                                                            if($c_row['role_type']=='CONTRIBUTAR')
                                                            {
                                                            ?>
                                                            <label class="switch" >
                                                              <input id="input" type="checkbox" onclick="role_assign_not_contributar(<?php echo $row['user_id'] ?>)" checked="">
                                                              <span  class="slider round"></span>
                                                              <p id="msg"></p>
                                                            </label> 
                                                            <?php
                                                            }
                                                            else
                                                            {
                                                              ?>
                                                            <label class="switch" >
                                                              <input id="input" type="checkbox" onclick="role_assign_contributar(<?php echo $row['user_id'] ?>)">
                                                              <span  class="slider round"></span>
                                                              <p id="msg"></p>
                                                            </label> 
                                                            <?php
                                                            } ?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            $u_q="SELECT DISTINCT user.user_id,user.first_name,role.role_id,role.role_type
                                                                  FROM user,role,user_role_assign,status
                                                                  WHERE user.user_id = user_role_assign.user_id
                                                                  AND role.role_id = user_role_assign.role_id
                                                                  AND status.status_id = user_role_assign.is_active_status
                                                                  AND user_role_assign.role_id = 3
                                                                  AND user_role_assign.is_active_status=3
                                                                  AND user.user_id=".$row['user_id'];
                                                                  $u_r=mysqli_query($connection,$u_q);
                                                                  $u_row=mysqli_fetch_assoc($u_r);
                                                            if($u_row['role_type']=='USER')
                                                            {
                                                            ?>
                                                            <label class="switch" >
                                                              <input id="input" type="checkbox" onclick="role_assign_not_user(<?php echo $row['user_id'] ?>)" checked="">
                                                              <span  class="slider round"></span>
                                                              <p id="msg"></p>
                                                            </label> 
                                                            <?php
                                                            }
                                                            else
                                                            {
                                                              ?>
                                                            <label class="switch" >
                                                              <input id="input" type="checkbox" onclick="role_assign_user(<?php echo $row['user_id'] ?>)">
                                                              <span  class="slider round"></span>
                                                              <p id="msg"></p>
                                                            </label> 
                                                            <?php
                                                            } ?>
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
	}
	else if($_REQUEST['flag']=='not_user')
	{
		date_default_timezone_set("asia/Karachi");
        $added_on=date('l jS F Y h:i:s A');
		$user_id=$_REQUEST['user_id'];
       	$query="UPDATE user_role_assign SET user_role_assign.is_active_status=4,user_role_assign.role_deactive_time='$added_on' WHERE user_role_assign.user_id='$user_id' AND user_role_assign.role_id=3 AND user_role_assign.is_active_status=3"; 
      	 $result = mysqli_query($connection,$query);
        if($result)
        {
             ?>
  <div class="body_scroll" >
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <div id="msg"></div>
                    <h2>View Users Role</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php"><i class="zmdi zmdi-home"></i> Admin Dasboard</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Tables</a></li>
                        <li class="breadcrumb-item active">View Users Role</li>
                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">                
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>                                
                </div>
            </div>
        </div>

        <div class="container-fluid" >
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>USERS</strong> ROLE ASSIGN </h2>
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
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable" >
                                    <thead class="thead-dark" align="center">
                                        <tr>
                                            <th>S:No</th>
                                            <th>Picture</th>
                                            <th>F: name</th>
                                            <th>L: Name</th>
                                            <th>Email</th>
                                            <th>Password</th>
                                             <th>Gender</th>
                                            <th>Role Type</th>
                                            <th>Admin</th>
                                           <th>Contributar</th>
                                           <th>User</th>
                                        </tr>
                                    </thead>
                                    <tfoot class="thead-dark" align="center">
                                        <tr>
                                           <th>S:No</th>
                                            <th>Picture</th>
                                            <th>F: name</th>
                                            <th>L: Name</th>
                                            <th>Email</th>
                                            <th>Password</th>
                                             <th>Gender</th>
                                            <th>Role Type</th>
                                            <th>Admin</th>
                                           <th>Contributar</th>
                                           <th>User</th>
                                        </tr>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        
                                        <?php
                                        $s_user_id=$_SESSION['user']['user_id'];
                                            require_once("../require/connection.php");
                                         $query="SELECT DISTINCT user.user_id,user.first_name,user.middle_name,user.last_name,user.email,user.password,user.p_number,user.dob,user.cnic,user.home_town,user.gender,user.image
                                          FROM user,user_role_assign,role,user_status,status
                                          WHERE user.user_id = user_role_assign.user_id
                                          AND role.role_id = user_role_assign.role_id
                                          AND user.user_id=user_status.user_id
                                          AND status.status_id=user_status.status_id
                                          AND user_status.status_id!=2
                                          AND user_status.status_id!=4
                                          AND user_status.status_id!=5
                                          AND user_status.status_id!=6
                                          AND user.user_id!= '$s_user_id' ORDER BY user.user_id DESC "
                                          ; 
                                            $result=mysqli_query($connection,$query);
                                            if($result->num_rows)
                                            {   $c=1;
                                                while($row=mysqli_fetch_assoc($result))
                                                {
                                                    ?>
                                                    <tr align="center">
                                                        <td><b style="color:#FF5722"><?php echo $c++ ?></b></td>
                                                        <td style="width:50px"><img class="rounded-circle" src="../Upload_Images/<?php echo $row['image']?>" alt="User"></td>
                                                        <td><b><?php echo $row['first_name'] ?></b></td>
                                                        <td style="width:70px"><b><?php echo $row['last_name'] ?></b></td>
                                                        <td><b><?php echo $row['email'] ?></b></td>
                                                        <td><b><?php echo $row['password'] ?></b></td>
                                                        <td align="center"><b><?php echo $row['gender'] ?></b></td>
                                                       <td><b>
                                                         <?php
                                                        $r_query="SELECT role.role_type
                                                            FROM USER,role,user_role_assign
                                                            WHERE user.`user_id` = user_role_assign.`user_id`
                                                            AND role.`role_id` = user_role_assign.`role_id`
                                                            AND user_role_assign.`is_active_status`=3
                                                            AND user.user_id='".$row['user_id']."' "; 
                                                            $r_result=mysqli_query($connection,$r_query);
                                                            if($r_result->num_rows)
                                                            {
                                                                while($r_row=mysqli_fetch_assoc($r_result)) 
                                                                {
                                                                    ?>
                                                                    
                                                                <b style="color:green"><?php echo $r_row['role_type']."<br/>"; ?></b>
                                                                    <?php
                                                                }
                                                            }
                                                             ?>
                                                          </b>
                                                      </td>
                                                        <td>
                                                            <?php
                                                                $a_q="SELECT DISTINCT user.user_id,user.first_name,role.role_id,role.role_type
                                                                  FROM user,role,user_role_assign,status
                                                                  WHERE user.user_id = user_role_assign.user_id
                                                                  AND role.role_id = user_role_assign.role_id
                                                                  AND status.status_id = user_role_assign.is_active_status
                                                                  AND user_role_assign.role_id = 1
                                                                  AND user_role_assign.is_active_status=3
                                                                  AND user.user_id=".$row['user_id'];
                                                                  $a_r=mysqli_query($connection,$a_q);
                                                                  $a_row=mysqli_fetch_assoc($a_r);
                                                            if($a_row['role_type']=='ADMIN')
                                                            {
                                                            ?>
                                                            <label class="switch" >
                                                              <input  type="checkbox" onclick="role_assign_not_admin(<?php echo $row['user_id'] ?>)" checked="">
                                                              <span  class="slider round"></span>
                                                            </label> 
                                                            <?php
                                                            }
                                                            else
                                                            {
                                                              ?>
                                                            <label class="switch" >
                                                              <input id="input" type="checkbox" onclick="role_assign_admin(<?php echo $row['user_id'] ?>)">
                                                              <span  class="slider round"></span>
                                                              <p id="msg"></p>
                                                            </label> 
                                                            <?php
                                                            } ?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            $c_q="SELECT DISTINCT user.user_id,user.first_name,role.role_id,role.role_type
                                                                  FROM user,role,user_role_assign,status
                                                                  WHERE user.user_id = user_role_assign.user_id
                                                                  AND role.role_id = user_role_assign.role_id
                                                                  AND status.status_id = user_role_assign.is_active_status
                                                                  AND user_role_assign.role_id = 2
                                                                  AND user_role_assign.is_active_status=3
                                                                  AND user.user_id=".$row['user_id'];
                                                                  $c_r=mysqli_query($connection,$c_q);
                                                                  $c_row=mysqli_fetch_assoc($c_r);
                                                            if($c_row['role_type']=='CONTRIBUTAR')
                                                            {
                                                            ?>
                                                            <label class="switch" >
                                                              <input id="input" type="checkbox" onclick="role_assign_not_contributar(<?php echo $row['user_id'] ?>)" checked="">
                                                              <span  class="slider round"></span>
                                                              <p id="msg"></p>
                                                            </label> 
                                                            <?php
                                                            }
                                                            else
                                                            {
                                                              ?>
                                                            <label class="switch" >
                                                              <input id="input" type="checkbox" onclick="role_assign_contributar(<?php echo $row['user_id'] ?>)">
                                                              <span  class="slider round"></span>
                                                              <p id="msg"></p>
                                                            </label> 
                                                            <?php
                                                            } ?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            $u_q="SELECT DISTINCT user.user_id,user.first_name,role.role_id,role.role_type
                                                                  FROM user,role,user_role_assign,status
                                                                  WHERE user.user_id = user_role_assign.user_id
                                                                  AND role.role_id = user_role_assign.role_id
                                                                  AND status.status_id = user_role_assign.is_active_status
                                                                  AND user_role_assign.role_id = 3
                                                                  AND user_role_assign.is_active_status=3
                                                                  AND user.user_id=".$row['user_id'];
                                                                  $u_r=mysqli_query($connection,$u_q);
                                                                  $u_row=mysqli_fetch_assoc($u_r);
                                                            if($u_row['role_type']=='USER')
                                                            {
                                                            ?>
                                                            <label class="switch" >
                                                              <input id="input" type="checkbox" onclick="role_assign_not_user(<?php echo $row['user_id'] ?>)" checked="">
                                                              <span  class="slider round"></span>
                                                              <p id="msg"></p>
                                                            </label> 
                                                            <?php
                                                            }
                                                            else
                                                            {
                                                              ?>
                                                            <label class="switch" >
                                                              <input id="input" type="checkbox" onclick="role_assign_user(<?php echo $row['user_id'] ?>)">
                                                              <span  class="slider round"></span>
                                                              <p id="msg"></p>
                                                            </label> 
                                                            <?php
                                                            } ?>
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
	}
	else if($_REQUEST['flag']=='status_deactive')
	{
		date_default_timezone_set("asia/Karachi");
        $added_on=date('l jS F Y h:i:s A');
		$user_id=$_REQUEST['user_id'];
     $query="UPDATE user_status SET user_status.status_id=4,user_status.user_deactive_time='$added_on' WHERE user_status.user_id='$user_id'  AND user_status.status_id !=2
		AND user_status.status_id !=4
		AND user_status.status_id !=5
		AND user_status.status_id !=6"; 
      	$result=mysqli_query($connection,$query);
      	if($result)
      	{
      		?>
 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<div class="row clearfix">
<div class="col-lg-12">
    <div class="card">
        <div class="table-responsive">
            <table class="table table-hover mb-0 c_list c_table">
                <thead class="thead-dark">
                    <tr align="center">
                        <th>
                            <div class="checkbox">
                                <input type="checkbox" class="checkall" id="delete_2">
                                <label for="delete_2">&nbsp;</label>
                            </div>
                        </th>
                        <th>FULL NAME</th>                                    
                        <th data-breakpoints="xs">PHONE NUMBER</th>
                        <th data-breakpoints="xs sm md">EMAIL</th>
                        <th data-breakpoints="xs sm md">ADDRESS</th>
                        <th data-breakpoints="xs sm md">ROLE TYPE</th>
                        <th data-breakpoints="xs sm md">STATUS</th>
                        <th data-breakpoints="xs sm md">IS_ACTIVE</th>
                        <th data-breakpoints="xs">ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                          require_once("../require/connection.php");
                           $query="SELECT DISTINCT user.user_id,user.first_name,user.middle_name,user.last_name,user.email,user.password,user.p_number,user.dob,user.cnic,user.home_town,user.gender,user.image,status.*
                          FROM user,user_role_assign,role,user_status,status
                          WHERE user.user_id = user_role_assign.user_id
                          AND role.role_id = user_role_assign.role_id
                          AND user.user_id=user_status.user_id
                          AND status.status_id=user_status.status_id
                          AND user_status.status_id!=2
                          AND user_status.status_id!=5
                          AND user_status.status_id!=6
                          AND user.user_id!='".$_SESSION['user']['user_id']."' ORDER BY user.user_id DESC"; 
                          $result=mysqli_query($connection,$query);
                            if($result->num_rows)
                            {   
                                while($row=mysqli_fetch_assoc($result))
                                {  
                                    ?>
                                    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
                                    <tr align="center">
                                       <td>
                                          <div class="checkbox">
                                        <input type="checkbox" id="delete_2" class="case" >
                                        <label for="delete_2">&nbsp;</label>
                                    </div>
                                </td>
                                <td>
                                    <img src="../Upload_Images/<?php echo $row['image']?>" class="avatar w30" alt="">
                                    <p class="c_name"><?php echo $row['first_name']." ".$row['last_name']; ?></p>
                                </td>
                                <td>
                                    <span class="phone"><i class="zmdi zmdi-whatsapp mr-2"></i><?php echo $row['p_number']?></span>
                                </td>
                                <td>
                                    <span class="email"><a href="javascript:void(0);" title=""><?php echo $row['email']?></a></span>
                                </td>
                                 <td>
                                    <address><i class="zmdi zmdi-pin"></i><?php echo $row['home_town']?></address>
                                </td>
                                 <td><b>
                                         <?php
                                        $r_query="SELECT role.role_type
                                            FROM USER,role,user_role_assign
                                            WHERE user.`user_id` = user_role_assign.`user_id`
                                            AND role.`role_id` = user_role_assign.`role_id`
                                            AND user_role_assign.`is_active_status`=3
                                            AND user.user_id='".$row['user_id']."' "; 
                                            $r_result=mysqli_query($connection,$r_query);
                                            if($r_result->num_rows)
                                            {
                                                while($r_row=mysqli_fetch_assoc($r_result)) 
                                                {
                                                    ?>
                                                    
                                                <b style="color:green"><?php echo $r_row['role_type']."<br/>"; ?></b>
                                                    <?php
                                                }
                                            }
                                             ?>
                                          </b>
                                      </td>
                                       <td>
                                       <?php
                                       if($row['status_type']=='active')
                                       {
                                        ?><b style="color:#673AB7;font-size:15px">Active</b><?php
                                       }
                                       else
                                       {
                                         ?><b style="color:#FF5722;font-size:13px">Deactive</b><?php
                                       }
                                       ?>
                                      </td>
                                      <td>
                                            <?php
                                           $c_q="SELECT user.`first_name`,user_status.status_id
                                                FROM USER,STATUS,user_status 
                                                WHERE user.user_id = user_status.user_id
                                                AND status.status_id = user_status.status_id 
                                                AND user_status.status_id !=2
                                                AND user_status.status_id !=4
                                                AND user_status.status_id !=5
                                                AND user_status.status_id !=6
                                                AND user.user_id=".$row['user_id'];
                                                $c_r=mysqli_query($connection,$c_q);
                                                  $c_row=mysqli_fetch_assoc($c_r);
                                            if($c_row['status_id'])
                                            {
                                            ?>
                                            <label class="switch" >
                                              <input id="input" type="checkbox" onclick="user_status_deactive(<?php echo $row['user_id'] ?>)" checked="">
                                              <span  class="slider round"></span>
                                              <p id="msg"></p>
                                            </label> 
                                            <?php
                                            }
                                            else
                                            {
                                              ?>
                                            <label class="switch" >
                                              <input id="input" type="checkbox" onclick="user_status_active(<?php echo $row['user_id'] ?>)">
                                              <span  class="slider round"></span>
                                              <p id="msg"></p>
                                            </label> 
                                            <?php
                                            } ?>
                                        </td>
                                        <td>
                                           <a href="update_user.php?flag=edit&user_id=<?php echo $row['user_id'];?>">
                                              <button class="btn btn-primary btn-sm"><i class="zmdi zmdi-edit"></i></button>
                                             </a>
                                           <a href="include/profile_process.php?flag=delete_user&user_id=<?php echo $row['user_id'];?>">
                                              <button class="btn btn-danger btn-sm"><i class="zmdi zmdi-delete"></i></button>
                                            </a>
                                        </td>
                                        
                                    </tr>
                                    <?php
                                }
                            }
                        ?>
                </tbody>
                <SCRIPT language="javascript">
                $(function(){
                 
                    // add multiple select / deselect functionality
                    $("#delete_2").click(function () {
                          $('.case').attr('checked', this.checked);
                    });
                 
                    // if all checkbox are selected, check the selectall checkbox
                    // and viceversa
                    $(".case").click(function(){
                 
                        if($(".case").length == $(".case:checked").length) {
                            $("#delete_2").attr("checked", "checked");
                        } else {
                            $("#delete_2").removeAttr("checked");
                        }
                 
                    });
                });
                </SCRIPT>
            </table>
        </div>
    </div>
</div>
</div>
      		<?php
      	}
	}
	else if($_REQUEST['flag']=='status_active')
	{
		date_default_timezone_set("asia/Karachi");
        $added_on=date('l jS F Y h:i:s A');
		$user_id=$_REQUEST['user_id'];
     	$query="UPDATE user_status SET user_status.status_id=3,user_status.user_active_time='$added_on' WHERE user_status.user_id='$user_id'  
       	AND user_status.status_id =4 ";
      	$result=mysqli_query($connection,$query);
      	if($result)
      	{
      		?>
	 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<div class="row clearfix">
<div class="col-lg-12">
    <div class="card">
        <div class="table-responsive">
            <table class="table table-hover mb-0 c_list c_table">
                <thead class="thead-dark">
                    <tr align="center">
                        <th>
                            <div class="checkbox">
                                <input type="checkbox" class="checkall" id="delete_2">
                                <label for="delete_2">&nbsp;</label>
                            </div>
                        </th>
                        <th>FULL NAME</th>                                    
                        <th data-breakpoints="xs">PHONE NUMBER</th>
                        <th data-breakpoints="xs sm md">EMAIL</th>
                        <th data-breakpoints="xs sm md">ADDRESS</th>
                        <th data-breakpoints="xs sm md">ROLE TYPE</th>
                        <th data-breakpoints="xs sm md">STATUS</th>
                        <th data-breakpoints="xs sm md">IS_ACTIVE</th>
                        <th data-breakpoints="xs">ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                          require_once("../require/connection.php");
                           $query="SELECT DISTINCT user.user_id,user.first_name,user.middle_name,user.last_name,user.email,user.password,user.p_number,user.dob,user.cnic,user.home_town,user.gender,user.image,status.*
                          FROM user,user_role_assign,role,user_status,status
                          WHERE user.user_id = user_role_assign.user_id
                          AND role.role_id = user_role_assign.role_id
                          AND user.user_id=user_status.user_id
                          AND status.status_id=user_status.status_id
                          AND user_status.status_id!=2
                          AND user_status.status_id!=5
                          AND user_status.status_id!=6
                          AND user.user_id!='".$_SESSION['user']['user_id']."' ORDER BY user.user_id DESC"; 
                          $result=mysqli_query($connection,$query);
                            if($result->num_rows)
                            {   
                                while($row=mysqli_fetch_assoc($result))
                                {  
                                    ?>
                                    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
                                    <tr align="center">
                                       <td>
                                          <div class="checkbox">
                                        <input type="checkbox" id="delete_2" class="case" >
                                        <label for="delete_2">&nbsp;</label>
                                    </div>
                                </td>
                                <td>
                                    <img src="../Upload_Images/<?php echo $row['image']?>" class="avatar w30" alt="">
                                    <p class="c_name"><?php echo $row['first_name']." ".$row['last_name']; ?></p>
                                </td>
                                <td>
                                    <span class="phone"><i class="zmdi zmdi-whatsapp mr-2"></i><?php echo $row['p_number']?></span>
                                </td>
                                <td>
                                    <span class="email"><a href="javascript:void(0);" title=""><?php echo $row['email']?></a></span>
                                </td>
                                 <td>
                                    <address><i class="zmdi zmdi-pin"></i><?php echo $row['home_town']?></address>
                                </td>
                                 <td><b>
                                         <?php
                                        $r_query="SELECT role.role_type
                                            FROM USER,role,user_role_assign
                                            WHERE user.`user_id` = user_role_assign.`user_id`
                                            AND role.`role_id` = user_role_assign.`role_id`
                                            AND user_role_assign.`is_active_status`=3
                                            AND user.user_id='".$row['user_id']."' "; 
                                            $r_result=mysqli_query($connection,$r_query);
                                            if($r_result->num_rows)
                                            {
                                                while($r_row=mysqli_fetch_assoc($r_result)) 
                                                {
                                                    ?>
                                                    
                                                <b style="color:green"><?php echo $r_row['role_type']."<br/>"; ?></b>
                                                    <?php
                                                }
                                            }
                                             ?>
                                          </b>
                                      </td>
                                       <td>
                                       <?php
                                       if($row['status_type']=='active')
                                       {
                                        ?><b style="color:#673AB7;font-size:15px">Active</b><?php
                                       }
                                       else
                                       {
                                         ?><b style="color:#FF5722;font-size:13px">Deactive</b><?php
                                       }
                                       ?>
                                      </td>
                                      <td>
                                            <?php
                                           $c_q="SELECT user.`first_name`,user_status.status_id
                                                FROM USER,STATUS,user_status 
                                                WHERE user.user_id = user_status.user_id
                                                AND status.status_id = user_status.status_id 
                                                AND user_status.status_id !=2
                                                AND user_status.status_id !=4
                                                AND user_status.status_id !=5
                                                AND user_status.status_id !=6
                                                AND user.user_id=".$row['user_id'];
                                                $c_r=mysqli_query($connection,$c_q);
                                                  $c_row=mysqli_fetch_assoc($c_r);
                                            if($c_row['status_id'])
                                            {
                                            ?>
                                            <label class="switch" >
                                              <input id="input" type="checkbox" onclick="user_status_deactive(<?php echo $row['user_id'] ?>)" checked="">
                                              <span  class="slider round"></span>
                                              <p id="msg"></p>
                                            </label> 
                                            <?php
                                            }
                                            else
                                            {
                                              ?>
                                            <label class="switch" >
                                              <input id="input" type="checkbox" onclick="user_status_active(<?php echo $row['user_id'] ?>)">
                                              <span  class="slider round"></span>
                                              <p id="msg"></p>
                                            </label> 
                                            <?php
                                            } ?>
                                        </td>
                                        <td>
                                           <a href="update_user.php?flag=edit&user_id=<?php echo $row['user_id'];?>">
                                              <button class="btn btn-primary btn-sm"><i class="zmdi zmdi-edit"></i></button>
                                             </a>
                                           <a href="include/profile_process.php?flag=delete_user&user_id=<?php echo $row['user_id'];?>">
                                              <button class="btn btn-danger btn-sm"><i class="zmdi zmdi-delete"></i></button>
                                            </a>
                                        </td>
                                        
                                    </tr>
                                    <?php
                                }
                            }
                        ?>
                </tbody>
                <SCRIPT language="javascript">
                $(function(){
                 
                    // add multiple select / deselect functionality
                    $("#delete_2").click(function () {
                          $('.case').attr('checked', this.checked);
                    });
                 
                    // if all checkbox are selected, check the selectall checkbox
                    // and viceversa
                    $(".case").click(function(){
                 
                        if($(".case").length == $(".case:checked").length) {
                            $("#delete_2").attr("checked", "checked");
                        } else {
                            $("#delete_2").removeAttr("checked");
                        }
                 
                    });
                });
                </SCRIPT>
            </table>
        </div>
    </div>
</div>
</div>
      		<?php
      	}
	}
?>