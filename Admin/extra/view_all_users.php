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

    function user_status_deactive(user_id)
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
                document.getElementById("msg").innerHTML=ajax_request.responseText;
            }
        }
        ajax_request.open("POST","role_process.php");
        ajax_request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        ajax_request.send("flag=status_deactive&user_id="+user_id);
            
    }
    function user_status_active(user_id)
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
                document.getElementById("msg").innerHTML=ajax_request.responseText;
            }
        }
        ajax_request.open("POST","role_process.php");
        ajax_request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        ajax_request.send("flag=status_active&user_id="+user_id);
            
    }
</script>
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <div id="msg"></div>
                    <h2>View All Users</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php"><i class="zmdi zmdi-home"></i> Admin Dasboard</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Tables</a></li>
                        <li class="breadcrumb-item active">View All Users</li>
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
                            <h2><strong>USERS</strong> REQUEST </h2>
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
                                             <th>Gender</th>
                                            <th>Role Type</th>
                                           <th>is_Active</th>
                                           <th style="width:165px">Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot class="thead-dark" align="center">
                                        <tr>
                                           <th>S:No</th>
                                            <th>Picture</th>
                                            <th>F: name</th>
                                            <th>L: Name</th>
                                            <th>Email</th>
                                             <th>Gender</th>
                                            <th>Role Type</th>
                                           <th>is_Active</th>
                                           <th style="width:165px">Action</th>
                                        </tr>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        
                                        <?php
                                            require_once("../require/connection.php");
                                           $query="SELECT DISTINCT user.user_id,user.first_name,user.last_name,user.email,user.password,user.gender,user.image
                                          FROM USER,user_role_assign,role,user_status,status
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
                                            {   $c=1;
                                                while($row=mysqli_fetch_assoc($result))
                                                {
                                                    ?>
                                                    <tr align="center">
                                                        <td><b style="color:#FF5722"><?php echo $c++ ?></b></td>
                                                        <td><img class="rounded-circle" src="../Upload_Images/<?php echo $row['image']?>" alt="User"></td>
                                                        <td><b><?php echo $row['first_name'] ?></b></td>
                                                        <td style="width:70px"><b><?php echo $row['last_name'] ?></b></td>
                                                        <td><b><?php echo $row['email'] ?></b></td>
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
                                                                    
                                                                <b style="color:green"><?php echo $r_row['role_type']; ?></b>
                                                                    <?php
                                                                }
                                                            }
                                                             ?>
                                                        </b></td>
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
                                                         <td style="width:175px">
                                                            <button>
                                                                <a href="process.php?flag=approve&user_id=<?php echo $row['user_id'] ?>&email=<?php echo $row['email'] ?>&password=<?php echo $row['password'] ?>&role_id=<?php echo $row['role_id']    ?>">
                                                                    <span style="color:#673AB7"><i class="zmdi zmdi-hc-fw"></i>Edit</span>
                                                                   
                                                                </a>
                                                            </button>
                                                            <button>
                                                                <a href="process.php?flag=unapprove&user_id=<?php echo $row['user_id'] ?>&email=<?php echo $row['email'] ?>&password=<?php echo $row['password'] ?>&role_id=<?php echo $row['role_id'] ?>">
                                                                    <span style="color:#ee2558"><i class="zmdi zmdi-hc-fw"></i> Delete</span>
                                                                </a>
                                                            </button>
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

            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>Export</strong> Users Data From Table </h2>
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
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead style="color:white;background-color:#673AB7">
                                        <tr>
                                           <th>S:No</th>
                                            <th>F: name</th>
                                            <th>L: Name</th>
                                            <th>Email</th>
                                            <th>Password</th>
                                            <th>DOB</th>
                                            <th>Cnic</th>
                                            <th>Gender</th>
                                        </tr>
                                    </thead>
                                    <tfoot style="color:white;background-color:#673AB7">
                                        <tr>
                                            <th>S:No</th>
                                            <th>F: name</th>
                                            <th>L: Name</th>
                                            <th>Email</th>
                                            <th>Password</th>
                                            <th>DOB</th>
                                            <th>Cnic</th>
                                            <th>Gender</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                            require_once("../require/connection.php");
                                            $query="SELECT DISTINCT user.*
                                          FROM USER,user_role_assign,role,user_status,status
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
                                            {   $c=1;
                                                while($row=mysqli_fetch_assoc($result))
                                                {
                                                    ?>
                                                    <tr>
                                                        <td><b style="color:#FF5722"><?php echo $c++ ?></b></td>
                                                        <td><b><?php echo $row['first_name'] ?></b></td>
                                                        <td><b><?php echo $row['last_name'] ?></b></td>
                                                        <td><b><?php echo $row['email'] ?></b></td>
                                                        <td><b><?php echo $row['password'] ?></b></td>
                                                        <td><b><?php echo $row['dob'] ?></b></td>
                                                        <td><b><?php echo $row['cnic'] ?></b></td>
                                                        <td><b><?php echo $row['gender'] ?></b></td>
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