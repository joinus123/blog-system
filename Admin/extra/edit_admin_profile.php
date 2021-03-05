<?php
    include_once("include/session_maintenance.php");
    require_once("../require/connection.php");
    include_once("include/header.php");
    include_once("include/right_icon_menu_bar.php");
    include_once("include/left_side_bar.php");
    include_once("include/right_side_bar.php");
?>
<script type="text/javascript" language="language">

    function email_varification()
    {
        var email =document.getElementById('email').value;
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
            ajax_request.send("flag=email_varification&email="+email);
            
        }
    }
    function current_password_varification()
    {
        var current_password =document.getElementById('current_password').value;
        if(current_password=="")
        {
            document.getElementById("current_password_msg").innerHTML="<span style='color:red'>Please Enter Your Current Password</span>";
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
                    document.getElementById("current_password_msg").innerHTML=ajax_request.responseText;
                }
            }
            ajax_request.open("POST","include/profile_process.php");
            ajax_request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
            ajax_request.send("flag=current_password_varification&current_password="+current_password);
            
        }
    }
    function new_password_varification()
    {
        var new_password =document.getElementById('new_password').value;
        if(new_password=="")
        {
            document.getElementById("new_password_msg").innerHTML="<span style='color:red'>Please Enter Your New Password</span>";
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
                    document.getElementById("new_password_msg").innerHTML=ajax_request.responseText;
                }
            }
            ajax_request.open("POST","include/profile_process.php");
            ajax_request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
            ajax_request.send("flag=new_password_varification&new_password="+new_password);
            
        }
    }
    function change_password()
    {
        var email =document.getElementById('email').value;
        var new_password =document.getElementById('new_password').value;
        var current_password =document.getElementById('current_password').value;
        
         if(email=="" || current_password=="" || new_password=="")
        {
            document.getElementById("change_password_msg").innerHTML="<span style='color:red'>Please Fill Fields and don't Leave any field empty</span>";
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
                    document.getElementById("change_password_msg").innerHTML=ajax_request.responseText;
                    var email =document.getElementById('email').value="";
                    var new_password =document.getElementById('new_password').value="";
                    var current_password =document.getElementById('current_password').value="";

                }
            }
            ajax_request.open("POST","include/profile_process.php");
            ajax_request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
            ajax_request.send("flag=change_password&email="+email+"&current_password="+current_password+"&new_password="+new_password);
        }
            
    }
    function update_profile()
    {
        var first_name =document.getElementById('first_name').value;
        var last_name =document.getElementById('last_name').value;
        var email =document.getElementById('user_email').value;
        var dob =document.getElementById('dob').value;
        var cnic =document.getElementById('cnic').value;
        var home_town = document.getElementById('home_town').value;
        var male = document.getElementById('male').checked;
        var female = document.getElementById('female').checked;
        
        if(first_name=="" || last_name=="" || email=="" || dob=="" || cnic=="" || home_town=="")
        {
            document.getElementById("update_profile_msg").innerHTML="<span style='color:red'>Please Fill Fields and don't Leave any field empty</span>";
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
                    document.getElementById("update_profile_msg").innerHTML=ajax_request.responseText;
                    var first_name =document.getElementById('first_name').value="";
                    var last_name =document.getElementById('last_name').value="";
                    var email =document.getElementById('user_email').value="";
                    var dob =document.getElementById('dob').value="";
                    var cnic =document.getElementById('cnic').value="";
                    var home_town = document.getElementById('home_town').value="";
                   /* var male = document.getElementById('male').unchecked;
                    var female = document.getElementById('female').unchecked;*/

                }
            }
            ajax_request.open("POST","include/profile_process.php");
            ajax_request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
            ajax_request.send("flag=update_profile&first_name="+first_name+"&last_name="+last_name+"&email="+email+"&dob="+dob+"&cnic="+cnic+"&home_town="+home_town);
        }
    }
            
    
</script>
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                     <h2>Profile Edit</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php"><i class="zmdi zmdi-home"></i> Home</a></li>
                        <li class="breadcrumb-item">Admin Dashboard</li>
                        <li class="breadcrumb-item active">Edit</li>
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
            <div class="row clearfix">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <div align="center" id="change_password_msg" style="color:red"></div><br/>
                            <h2><strong>Security</strong> Settings</h2>
                        </div>
                        <div class="body">
                            <div class="row">
                                <div class="col-lg-4 col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Enter Email" name="email" id="email" onblur="email_varification()" required="">
                                        <span id="email_msg" style="color:red"></span>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-12">
                                    <div class="form-group">
                                        <input type="password" class="form-control" placeholder="Current Password" name="current_password" id="current_password" onblur="current_password_varification()" required="">
                                         <span id="current_password_msg" style="color:red"></span>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-12">
                                    <div class="form-group">
                                        <input type="password" class="form-control" placeholder="New Password" name="new_password" id="new_password" onblur="new_password_varification()" required="">
                                         <span id="new_password_msg" style="color:red"></span>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-info" onclick="change_password()">Save Changes</button>
                                </div>                              
                            </div>                              
                        </div>
                    </div>
        <?php
            $query="SELECT *FROM user WHERE user.user_id=".$_REQUEST['user_id']; 
            $result=mysqli_query($connection,$query);
            if($result->num_rows)
            {   $count=0;
                while($row=mysqli_fetch_assoc($result))
                {
                    ?>
                    <div class="card">
                        <div class="header">
                             <div align="center" id="update_profile_msg" style="color:red"></div><br/>
                            <h2><strong>Account</strong> Settings</h2>
                        </div>
                        <div class="body">
                            
                            <div class="row clearfix">
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="first_name" placeholder="First Name: minimum one alphabet required"
                                        value="<?php echo $row['first_name']; ?>">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="last_name" placeholder="Last Name: minimum one alphabet required"
                                        value="<?php echo $row['last_name']; ?>">
                                    </div>
                                </div>                                    
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <input type="email" class="form-control" id="user_email" placeholder="Email format: salam_123@gmail.com"
                                        value="<?php echo $row['email']; ?>">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="dob" placeholder="Date of Birth format: 10-MARCH-1995"
                                        value="<?php echo $row['dob']; ?>">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="cnic" placeholder="CNIC: 44102-1234567-8"
                                        value="<?php echo $row['cnic']; ?>">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <?php
                                        if($row['gender']=='Male')
                                        {
                                            ?>
                                            <span class="form-control">Gender &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                            <input style="margin-left:45px;" type="radio"  name="gender[]" placeholder=""  value="Male" id="male" >
                                            &nbsp&nbsp&nbspMale&nbsp&nbsp&nbsp&nbsp&nbsp
                                            <input  type="radio" name="gender[]" placeholder=""  value="Female" id="female">&nbsp&nbsp&nbspFemale</span>
                                            <?php
                                        }
                                        else
                                        {
                                            ?>
                                            <span class="form-control">Gender &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                            <input style="margin-left:45px;" type="radio"  name="gender[]" placeholder=""  value="Male" id="male" >
                                            &nbsp&nbsp&nbspMale&nbsp&nbsp&nbsp&nbsp&nbsp
                                            <input  type="radio" name="gender[]" placeholder=""  value="Female" id="female" checked="">&nbsp&nbsp&nbspFemale</span>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <textarea rows="4" class="form-control no-resize" id="home_town" placeholder="Entern Your Home Town Address"><?php echo $row['home_town']; ?></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                   <button class="btn btn-info" onclick="update_profile()">Save Changes</button>
                                  <a href="profile.php"> <button class="btn btn-info">Cancel</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
                    <?php
                }
            }
        ?>
                   
            </div>
        </div>
    </div>
</section>
<?php
 include_once("include/end_file.php");
?>