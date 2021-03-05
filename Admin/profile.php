<?php
    include_once("include/session_maintenance.php");
    require_once("../require/connection.php");
    include_once("include/header.php");
    include_once("include/right_icon_menu_bar.php");
    include_once("include/left_side_bar.php");
    include_once("include/right_side_bar.php");
     $querys="SELECT *FROM user WHERE user_id=".$_SESSION['user']['user_id'];
    $results=mysqli_query($connection,$querys);
    if($results->num_rows)
    {
        while($record=mysqli_fetch_assoc($results))
        {  
           /* echo "<pre>"; print_r($row);*/
?>

<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Profile</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php"><i class="zmdi zmdi-home"></i> Home</a></li>
                        <li class="breadcrumb-item">Admin Dashboard</li>
                        <li class="breadcrumb-item active">Profile</li>
                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">                
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
                    <a href="profile-edit.php?user_id=<?php echo $record['user_id']; ?>" class="btn btn-info btn-icon float-right"><i class="zmdi zmdi-edit"></i></a>
                </div>
            </div>
        </div> 
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-4 col-md-12">
                    <div class="card mcard_3">
                        <div class="body">
                            <a href="profile.php"><img src="../Upload_Images/<?php echo $record['image']?>" class="rounded-circle shadow " alt="profile-image"></a>
                            <h4 class="m-t-10"><b style="color:green"><?php echo $record['first_name']." ".$record['middle_name']." ".$record['last_name']; ?></b></h4>                            
                            <div class="row">
                                <div class="col-12">
                                    <ul class="social-links list-unstyled">
                                        <li><a title="facebook" href="javascript:void(0);"><i class="zmdi zmdi-facebook"></i></a></li>
                                        <li><a title="twitter" href="javascript:void(0);"><i class="zmdi zmdi-twitter"></i></a></li>
                                        <li><a title="instagram" href="javascript:void(0);"><i class="zmdi zmdi-instagram"></i></a></li>
                                    </ul>
                                    <p class="text-muted"><?php echo $record['home_town']; ?></p>
                                </div>
                                <div class="col-4">                                    
                                    <small>Following</small>
                                    <h5>852</h5>
                                </div>
                                <div class="col-4">                                    
                                    <small>Followers</small>
                                    <h5>13k</h5>
                                </div>
                                <div class="col-4">                                    
                                    <small>Post</small>
                                    <h5>234</h5>
                                </div>                            
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="body">
                            <small class="text-muted">Email address: </small>
                            <p><?php echo $record['email']; ?></p>
                            <hr>
                            <small class="text-muted">Phone Number: </small>
                            <p><?php echo $record['p_number']; ?></p>
                            <hr>
                            <ul class="list-unstyled">
                                <li>
                                    <div>Photoshop</div>
                                    <div class="progress m-b-20">
                                        <div class="progress-bar l-blue " role="progressbar" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100" style="width: 89%"> <span class="sr-only">62% Complete</span> </div>
                                    </div>
                                </li>
                                <li>
                                    <div>Wordpress</div>
                                    <div class="progress m-b-20">
                                        <div class="progress-bar l-green " role="progressbar" aria-valuenow="56" aria-valuemin="0" aria-valuemax="100" style="width: 56%"> <span class="sr-only">87% Complete</span> </div>
                                    </div>
                                </li>
                                <li>
                                    <div>HTML 5</div>
                                    <div class="progress m-b-20">
                                        <div class="progress-bar l-amber" role="progressbar" aria-valuenow="78" aria-valuemin="0" aria-valuemax="100" style="width: 78%"> <span class="sr-only">32% Complete</span> </div>
                                    </div>
                                </li>
                                <li>
                                    <div>Angular</div>
                                    <div class="progress m-b-20">
                                        <div class="progress-bar l-blush" role="progressbar" aria-valuenow="43" aria-valuemin="0" aria-valuemax="100" style="width: 43%"> <span class="sr-only">56% Complete</span> </div>
                                    </div>
                                </li>
                            </ul>
                            <span>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</span>
                        </div>
                    </div>                    
                </div>
                <div class="col-lg-8 col-md-12">
                    <div class="card">
                        <div class="body">
                            <div id="calendar"></div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="header">
                            <h2><strong>Media</strong> Gallery</h2>
                        </div>
                        <div class="body">
                            <p>All pictures taken from <a href="https://pexels.com/" target="_blank">pexels.com</a></p>
                            <div id="aniimated-thumbnials" class="list-unstyled row clearfix">
                                <?php
                                $query="SELECT *FROM user"; 
                                $result=mysqli_query($connection,$query);
                                if($result->num_rows)
                                {   
                                    while($row=mysqli_fetch_assoc($result))
                                    {
                                        ?>
                                             <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 m-b-30"><img class="img-fluid img-thumbnail" src="../Upload_Images/<?php echo $row['image']?>" alt=""> </a> </div>
                                        <?php
                                    }
                                }
                                ?>
                                                           
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
    }
}

?>
<?php
 include_once("include/end_file.php");
?>