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
                //location.href = "view_users.php";
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
                //location.href = "view_users.php";
            }
        }
        ajax_request.open("POST","role_process.php");
        ajax_request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        ajax_request.send("flag=status_active&user_id="+user_id);
            
    }
</script>
<section class="content contact">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>VIEW USERS</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i> Admin Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Table</a></li>
                        <li class="breadcrumb-item active">View Users</li>
                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">                    
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
                   <a href="add_user_form.php"> <button class="btn btn-success btn-icon float-right" type="button"><i class="zmdi zmdi-plus"></i></button></a>
                </div>
            </div>
        </div>
        <?php
         if(isset($_GET['message']))
         {
          ?>
            <div class="alert alert-success" role="alert">
              <div class="container">
                  <div class="alert-icon">
                      <i class="zmdi zmdi-thumb-up"></i>
                  </div>
                   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">
                          <i class="zmdi zmdi-close"></i>
                      </span>
                  </button>
                  <div align="center"><strong></strong> <?php echo $_GET['message'];?></div>
                 
              </div>
            </div> 
      <?php
         }
        ?>
        <div class="container-fluid" id="msg">
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
                                                  /*echo "<pre>";
                                                  print_r($row);*/
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
                                                       if($row['status_id']=='1' || $row['status_id']=='3')
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
        </div>
    </div>
</section>
<?php
 	include_once("include/end_file.php");
?>