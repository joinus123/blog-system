<?php
    include_once("include/session_maintenance.php");
    require_once("../require/connection.php");
    include_once("include/new_users_header.php");
    include_once("include/right_icon_menu_bar.php");
    include_once("include/left_side_bar.php");
    include_once("include/right_side_bar.php");
?>
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>New Users Request</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php"><i class="zmdi zmdi-home"></i> Admin Dasboard</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Tables</a></li>
                        <li class="breadcrumb-item active">New Users Table</li>
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
                                            <th>Password</th>
                                            <th>Cnic</th>
                                            <th>Gender</th>
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
                                            <th>Password</th>
                                            <th>Cnic</th>
                                            <th>Gender</th>
                                            <th style="width:165px">Action</th>
                                        </tr>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        
                                        <?php
                                            require_once("../require/connection.php");
                                            $query="SELECT user.*,user_role_assign.role_id
                                                FROM USER,STATUS,role,user_role_assign,user_status
                                                WHERE user.`user_id`=user_role_assign.`user_id`
                                                AND role.`role_id`=user_role_assign.`role_id`
                                                AND user.`user_id`=user_status.`user_id`
                                                AND status.`status_id`=user_status.`status_id`
                                                AND user_status.`status_id`=6
                                                AND user_role_assign.`is_active_status`=3
                                                AND user_status.`status_id`!=1
                                                AND user_status.`status_id`!=2
                                                AND user_status.`status_id`!=3
                                                AND user_status.`status_id`!=4
                                                AND user_status.`status_id`!=5
                                                ORDER BY user.user_id DESC"; 
                                            $result=mysqli_query($connection,$query);
                                            if($result->num_rows)
                                            {   $c=1;
                                                while($row=mysqli_fetch_assoc($result))
                                                {
                                                    ?>
                                                    <tr align="center">
                                                        <td><b style="color:#FF5722"><?php echo $c++ ?></b></td>
                                                        <td style="width:40px"><img class="rounded-circle" src="../Upload_Images/<?php echo $row['image']?>" alt="User"></td>
                                                        <td><b><?php echo $row['first_name'] ?></b></td>
                                                        <td style="width:70px"><b><?php echo $row['last_name'] ?></b></td>
                                                        <td><b><?php echo $row['email'] ?></b></td>
                                                        <td><b><?php echo $row['password'] ?></b></td>
                                                        <td><b><?php echo $row['cnic'] ?></b></td>
                                                        <td align="center"><b><?php echo $row['gender'] ?></b></td>
                                                        <td style="width:175px"><a href="process.php?flag=approve&user_id=<?php echo $row['user_id'] ?>&email=<?php echo $row['email'] ?>&password=<?php echo $row['password'] ?>&role_id=<?php echo $row['role_id'] ?>"><b><button class="btn btn-success" aria-controls="DataTables_Table_0">Approve</button></b></a>
                                                            <a href="process.php?flag=unapprove&user_id=<?php echo $row['user_id'] ?>&email=<?php echo $row['email'] ?>&password=<?php echo $row['password'] ?>&role_id=<?php echo $row['role_id'] ?>"><b><button class="btn btn-danger">Unapprove</button></b></a></td>
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
                                            $query="SELECT user.*,user_role_assign.role_id
                                            FROM USER,STATUS,role,user_role_assign,user_status
                                            WHERE user.`user_id`=user_role_assign.`user_id`
                                            AND role.`role_id`=user_role_assign.`role_id`
                                            AND user.`user_id`=user_status.`user_id`
                                            AND status.`status_id`=user_status.`status_id`
                                            AND user_status.`status_id`=6
                                            AND user_role_assign.`is_active_status`=3
                                            AND user_status.`status_id`!=1
                                            AND user_status.`status_id`!=2
                                            AND user_status.`status_id`!=3
                                            AND user_status.`status_id`!=4
                                            AND user_status.`status_id`!=5
                                            ORDER BY user.user_id DESC"; 
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