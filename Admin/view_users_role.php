<?php
    include_once("include/session_maintenance.php");
    require_once("../require/connection.php");
    include_once("include/new_users_header.php");
    include_once("include/right_icon_menu_bar.php");
    include_once("include/left_side_bar.php");
    include_once("include/right_side_bar.php");
?>
<style type="text/css">
     /* The switch - the box around the slider */
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 22px;
}

/* Hide default HTML checkbox */
.switch input {
  opacity: 0;
  width: 0;
  height: 0;
}

/* The slider */
.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 23px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
  color:red;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
} 
</style>
<script type="text/javascript" language="language">

    function role_assign_admin(user_id)
    {
        var user_id=user_id;
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
                document.getElementById("role_response").innerHTML=ajax_request.responseText;
                //location.href = "view_users_role.php";
            }
        }
        ajax_request.open("POST","role_process.php");
        ajax_request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        ajax_request.send("flag=admin&user_id="+user_id);
            
    }
     function role_assign_not_admin(user_id)
    {
        var user_id=user_id;
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
                document.getElementById("role_response").innerHTML=ajax_request.responseText;
                //location.href = "view_users_role.php";
            }
        }
        ajax_request.open("POST","role_process.php");
        ajax_request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        ajax_request.send("flag=not_admin&user_id="+user_id);
            
    }
    function role_assign_contributar(user_id)
    {
        var user_id=user_id;
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
                document.getElementById("role_response").innerHTML=ajax_request.responseText;
                //location.href = "view_users_role.php";
            }
        }
        ajax_request.open("POST","role_process.php");
        ajax_request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        ajax_request.send("flag=contributar&user_id="+user_id);
            
    }
    function role_assign_not_contributar(user_id)
    {
        var user_id=user_id;
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
                document.getElementById("role_response").innerHTML=ajax_request.responseText;
                //location.href = "view_users_role.php";
            }
        }
        ajax_request.open("POST","role_process.php");
        ajax_request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        ajax_request.send("flag=not_contributar&user_id="+user_id);
            
    }
    function role_assign_user(user_id)
    {
        var user_id=user_id;
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
                document.getElementById("role_response").innerHTML=ajax_request.responseText;
                //location.href = "view_users_role.php";
            }
        }
        ajax_request.open("POST","role_process.php");
        ajax_request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        ajax_request.send("flag=user&user_id="+user_id);
            
    }
    function role_assign_not_user(user_id)
    {
        var user_id=user_id;
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
                document.getElementById("role_response").innerHTML=ajax_request.responseText;
                //location.href = "view_users_role.php";
            }
        }
        ajax_request.open("POST","role_process.php");
        ajax_request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        ajax_request.send("flag=not_user&user_id="+user_id);
            
    }
    </script>
<section class="content" id="role_response">
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
                   </section>
                            


<?php
 include_once("include/end_file.php");
?>