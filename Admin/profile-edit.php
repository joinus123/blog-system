<?php
    include_once("include/session_maintenance.php");
    require_once("../require/connection.php");
    include_once("include/header.php");
    include_once("include/right_icon_menu_bar.php");
    include_once("include/left_side_bar.php");
    include_once("include/right_side_bar.php");
?>
<script type="text/javascript" language="language">

    function email_varification(user_id)
    {
        var email=document.getElementById('email').value;
        if(email=="")
        {
            document.getElementById("email_msg").innerHTML="<span style='color:red'>Please Enter Your Email Address</span>";
        }
        else
        {
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
                    document.getElementById("email_msg").innerHTML=ajax_request.responseText;
                }
            }
            ajax_request.open("POST","include/profile_process.php");
            ajax_request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
            ajax_request.send("flag=email_varification&email="+email+"&user_id="+user_id);
        
        }
    }
    function form_validation()
    { 
        var error=true;
        var f_name = document.getElementById('f_name').value;
        var m_name = document.getElementById('m_name').value;
        var l_name = document.getElementById('l_name').value;
        var p_number = document.getElementById('p_number').value;
        var email = document.getElementById('email').value;
        var password = document.getElementById('password').value;
        var dob = document.getElementById('dob').value;
        var cnic = document.getElementById('cnic').value;
        var home_town = document.getElementById('home_town').value;
        var male = document.getElementById('male').checked;
        var female = document.getElementById('female').checked;
        var image  = document.getElementById("image").value;
        
        var f_name_pat = /^[A-z]{1,}$/
        var m_name_pat = /^[A-z]{1,}$/
        var l_name_pat = /^[A-z]{1,}$/
        var p_number_pat = /^[0-9]{4}[-]{1}[0-9]{7}$/
        var dob_pat = /^[0-9]{1,2}[-]{1}[A-z]{3,15}[-]{1}[0-9]{4}$/
        //var dob_pat = /[0-9]{2}[/]{1}[0-9]{2}[/]{1}[0-9]{4}/
        //var dob_pat= /^(0[1-9]|1[012])[-/.](0[1-9]|[12][0-9]|3[01])[-/.](19|20)\\d\\d$/
        var cnic_pat = /^[0-9]{5}-{1}[0-9]{7}-{1}[0-9]{1}$/
        var email_pat = /^[A-z0-9@.#$%_]{5,30}[@]{1}[a-z]{5,}[.]{1}(com|edu|pk)$/
        //var password_pat = /^[A-z]{5,15}[@$#]{1}[0-9]{2,10}$/
        var password_pat = /^[A-z0-9@.#$%_]{5,20}$/
        var image_pat = /[.]{1}(jpg|jpeg|png|gif|bmp|tif)$/i;

        var f_name_res = f_name_pat.test(f_name);
        var m_name_res = m_name_pat.test(m_name);
        var l_name_res = l_name_pat.test(l_name);
        var p_number_res = p_number_pat.test(p_number);
        var dob_res = dob_pat.test(dob);
        var cnic_res = cnic_pat.test(cnic);
        var email_res = email_pat.test(email);
        var password_res = password_pat.test(password);
        var image_res = image_pat.test(image);

        if(f_name=="")
        {
          error = false;
          document.getElementById('f_name_msg').innerHTML="<span>Please Fill This Field</span>";
        }
        else if(!f_name_res)
        {
          error = false;
          document.getElementById('f_name_msg').innerHTML="<span>Minimum One Alphabet Required</span>";
        }
        else
        {
          document.getElementById('f_name_msg').innerHTML="";
        }
        if(m_name=="")
        {
          //error = false;
          document.getElementById('m_name_msg').innerHTML="";
        }
        else if(!m_name_res)
        {
          error = false;
          document.getElementById('m_name_msg').innerHTML="<span>Minimum One Alphabet Required</span>";
        }
        else
        {
          document.getElementById('m_name_msg').innerHTML="";
        }
        if(l_name=="")
        {
          error = false;
          document.getElementById('l_name_msg').innerHTML="<span>Please Fill This Field</span>";
        }
        else if(!l_name_res)
        {
          error = false;
          document.getElementById('l_name_msg').innerHTML="<span>Minimum One Alphabet Required</span>";
        }
        else
        {
          document.getElementById('l_name_msg').innerHTML="";
        }
        if(p_number=="")
        {
          error = false;
          document.getElementById('p_number_msg').innerHTML="<span>Please Fill This Field</span>";
        }
        else if(!p_number_res)
        {
          error = false;
          document.getElementById('p_number_msg').innerHTML="<span>Phone No Format: 0331-2477922</span>";
        }
        else
        {
          document.getElementById('p_number_msg').innerHTML="";
        }
        if(dob=="")
        {
          error = false;
          document.getElementById('dob_msg').innerHTML="<span>Please Fill This Field</span>";
        }
        else if(!dob_res)
        {
          error = false;
         document.getElementById('dob_msg').innerHTML="<span>DOB Format: 10-MARCH-1995</span>";
        }
        else
        {
          document.getElementById('dob_msg').innerHTML="";
        }
        if(cnic=="")
        {
          error = false;
          document.getElementById('cnic_msg').innerHTML="<span>Please Fill This Field</span>";
        }
        else if(!cnic_res)
        {
          error = false;
         document.getElementById('cnic_msg').innerHTML="<span>CNIC Format: 44102-1234567-8</span>";
        }
        else
        {
          document.getElementById('cnic_msg').innerHTML="";
        }
        if(email=="")
        {
          error = false;
          document.getElementById('email_msg').innerHTML="<span>Please Fill This Field</span>";
        }
        else if(!email_res)
        {
          error = false;
         document.getElementById('email_msg').innerHTML="<span>Minimum five digit/character/special-character</span>";
        }
        else
        {
          document.getElementById('email_msg').innerHTML="";
        }
        if(password=="")
        {
          error = false;
          document.getElementById('password_msg').innerHTML="<span>Please Fill This Field</span>";
        }
        else if(!password_res)
        {
          error = false;
         document.getElementById('password_msg').innerHTML="<span>Minimum five digit/character/special-character</span>";
        }
        else
        {
          document.getElementById('password_msg').innerHTML="";
        }
        if(home_town=="")
        {
          error = false;
         document.getElementById('home_town_msg').innerHTML="<span>Please Fill This Field</span>";
        }
        else
        {
          document.getElementById('home_town_msg').innerHTML="";
        }
        if(!male && !female)
        {
          error = false;
         document.getElementById('gender_msg').innerHTML="<span>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspPlease select Gender</span>";
        }
        else
        {
          document.getElementById('gender_msg').innerHTML="";
        }
        if(image=="")
        {
          //error = false;
         //document.getElementById('image_msg').innerHTML="<span>Please Upload Image</span>";
        }
        else if(!image_res)
        {
          error = false;
         document.getElementById('image_msg').innerHTML="<span><br/>Image Formats: jpg , jpeg, png, gif, bmp, tif</span>";
        }
        else
        {
          document.getElementById('image_msg').innerHTML="";
        }

        if(error==true)
        {
        
          return true;
        }
        else
        {
          return false;
        }

    }

    
</script>
    <?php
    $query="SELECT *FROM user WHERE user_id=".$_SESSION['user']['user_id'];
    $result=mysqli_query($connection,$query);
    if($result->num_rows)
    {
        while($row=mysqli_fetch_assoc($result))
        {  
           /* echo "<pre>"; print_r($row);*/
         ?>

     
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                     <h2>Edit Profile</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php"><i class="zmdi zmdi-home"></i> Home</a></li>
                        <li class="breadcrumb-item">Admin Dashboard</li>
                        <li class="breadcrumb-item active">Edit Profile</li>
                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">                
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
                    <a href="profile.php" class="btn btn-info btn-icon float-right"><i class="zmdi zmdi-check"></i></a>
                </div>
            </div>
        </div> 
    
            <div class="container-fluid">
            <!-- Inline Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="header" align="center">
                            <?php
                             if(isset($_GET['message']))
                             {
                              ?><div style="color:red;" align="center"><?php echo $_GET['message'];?></div><br/><?php
                             }
                            ?>
                            <h2><b style="font-size:25px"><strong><?php echo $row['first_name']." ".$row['middle_name']." ".$row['last_name']?></strong> PROFILE</b></h2>
                            <ul class="header-dropdown">
                                <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="zmdi zmdi-more"></i> </a>
                                    <ul class="dropdown-menu dropdown-menu-right">
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
                            <style type="text/css">
                                label{
                                    color:purple;
                                    font-size:15px;
                                }
                            </style>
                            <form  action="include/profile_process.php"  method="POST" enctype="multipart/form-data" onsubmit="return form_validation()">

                                <div class="row clearfix">
                                    <div class="col-lg-12 col-md-3 col-sm-12">
                                        <div class="form-group" align="center">
                                    <img width="20%" height="30%" src="../Upload_Images/<?php echo $row['image']?>" class="rounded-circle shadow " alt="profile-image" >
                                        </div>
                                    </div>
                                     <div class="col-lg-6 col-md-3 col-sm-6">
                                        <div class="form-group">
                                            <label>Change Picture</label>
                                            <input type="file" class="form-control" name="image" id="image" value="salam.jpg">
                                            <span id="image_msg" style="color:red"></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-3 col-sm-6">
                                        <div class="form-group">
                                            <label>First Name</label>
                                            <input style="color:black;" type="text" class="form-control" placeholder="Minimum one alphabet required" id="f_name" name="first_name" 
                                            value="<?php echo $row['first_name'] ?>">
                                            <span id="f_name_msg" style="color:red"></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-3 col-sm-6">
                                        <div class="form-group">
                                            <label>Middle Name</label>
                                            <input style="color:black;" type="text" class="form-control" placeholder="Minimum one alphabet required or empty" id="m_name" name="middle_name"
                                              value="<?php echo $row['middle_name'] ?>" >
                                            <span id="m_name_msg" style="color:red"></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-3 col-sm-6">
                                        <div class="form-group">
                                            <label>Last Name</label>
                                            <input style="color:black;" type="text" class="form-control" placeholder="Minimum one alphabet required" id="l_name" name="last_name"   value="<?php echo $row['last_name'] ?>">
                                            <span id="l_name_msg" style="color:red"></span>
                                        </div>
                                    </div>
                                     <div class="col-lg-6 col-md-3 col-sm-6">
                                        <div class="form-group">
                                            <label>Phone Number</label>
                                            <input style="color:black;" type="text" class="form-control" placeholder="0331-2477922" id="p_number" name="p_number"  value="<?php echo $row['p_number'] ?>" >
                                            <span id="p_number_msg" style="color:red"></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-3 col-sm-6">
                                        <div class="form-group">
                                            <label>CNIC</label>
                                            <input style="color:black;" type="text" class="form-control" placeholder="CNIC format: 44102-1234567-8" name="cnic" id="cnic" value="<?php echo $row['cnic'] ?>" >
                                            <span id="cnic_msg" style="color:red"></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-3 col-sm-6">
                                        <div class="form-group">
                                            <label>Date of Birth</label>
                                            <input style="color:black;" type="text" class="form-control" placeholder="DOB format: 10-MARCH-1995" name="dob" id="dob" value="<?php echo $row['dob'] ?>">
                                            <span id="dob_msg" style="color:red"></span>
                                        </div>
                                    </div>
                                      <div class="col-lg-6 col-md-3 col-sm-6">
                                    <?php
                                        if($row['gender']=='Male')
                                        {
                                            ?>
                                            <div class="form-group" style="margin-top:7%">
                                            <div class="form-group"  style="border:1px solid lightgray;height:40px;padding:10px;border-radius:4px">
                                                <lable><b>Gender</b></lable>
                                                <b style="margin-left:10%">
                                                    <input  type="radio" name="gender[]" value="Male" id="male" checked="">&nbsp&nbsp&nbsp&nbsp&nbsp&nbspMale 
                                                    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                                    <input type="radio"  name="gender[]" value="Femaale" id="female">     &nbsp&nbsp&nbsp&nbsp&nbsp&nbspFemale </b>
                                                <span id="gender_msg" style="color:red;"></span>
                                            </div>
                                            </div>
                                            <?php
                                        }
                                        else
                                        {

                                            ?>
                                            <div class="form-group" style="margin-top:7%">
                                            <div class="form-group"  style="border:1px solid lightgray;height:40px;padding:10px;border-radius:4px">
                                                <lable><b>Gender</b></lable>
                                                <b style="margin-left:10%">
                                                    <input  type="radio" name="gender[]" value="Male" id="male">&nbsp&nbsp&nbsp&nbsp&nbsp&nbspMale 
                                                    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                                    <input type="radio"  name="gender[]" value="Female" id="female" checked="">&nbsp&nbsp&nbsp&nbsp&nbsp&nbspFemale </b>
                                                <span id="gender_msg" style="color:red;"></span>
                                            </div>
                                            </div>
                                            <?php
                                        }
                                    ?>
                                    </div>
                                    <div class="col-lg-6 col-md-3 col-sm-6">
                                        <div class="form-group">
                                            <label>Email Address</label>
                                            <input style="color:black;" type="text" class="form-control" placeholder="Minimum five digit/character/special-character" name="email" id="email" onblur="email_varification(<?php echo $row['user_id'] ?>)" value="<?php echo $row['email'] ?>" >
                                            <span id="email_msg" style="color:red"></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-3 col-sm-6">
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input style="color:black;" type="password" class="form-control" placeholder="Minimum five digit/character/special-character"  name="password" id="password" value="<?php echo $row['password'] ?>">
                                            <span id="password_msg" style="color:red"></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-3 col-sm-12">
                                        <div class="form-group">
                                            <label>Home Town Address</label>
                                           <textarea style="color:black;" rows="4" class="form-control no-resize"  placeholder="Please enter your Home Town address..!" name="home_town" id="home_town"><?php echo $row['home_town'] ?></textarea>
                                            <span id="home_town_msg" style="color:red"></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-6 col-sm-12">
                                       <center><button type="submit" class="btn btn-raised btn-primary btn-round waves-effect m-l-20" name="update_profile" value="Update Profile">Update profile</button></center>         
                                    </div>
                                </div>
                            </form>
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
</section>

<script src="assets/bundles/vendorscripts.bundle.js"></script> <!-- slimscroll, waves Scripts Plugin Js -->
<!-- Jquery DataTable Plugin Js --> 
<script src="assets/bundles/datatablescripts.bundle.js"></script>
<script src="assets/plugins/jquery-datatable/buttons/dataTables.buttons.min.js"></script>
<script src="assets/plugins/jquery-datatable/buttons/buttons.bootstrap4.min.js"></script>
<script src="assets/plugins/jquery-datatable/buttons/buttons.colVis.min.js"></script>
<script src="assets/plugins/jquery-datatable/buttons/buttons.flash.min.js"></script>
<script src="assets/plugins/jquery-datatable/buttons/buttons.html5.min.js"></script>
<script src="assets/plugins/jquery-datatable/buttons/buttons.print.min.js"></script>
<script src="assets/js/pages/tables/jquery-datatable.js"></script>

<script src="assets/bundles/jvectormap.bundle.js"></script> <!-- JVectorMap Plugin Js -->
<script src="assets/bundles/sparkline.bundle.js"></script> <!-- Sparkline Plugin Js -->
<script src="assets/bundles/c3.bundle.js"></script>

<script src="assets/bundles/mainscripts.bundle.js"></script>
<script src="assets/js/pages/index.js"></script>
</body>

