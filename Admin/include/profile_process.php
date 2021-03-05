<?php
session_start();
require_once("../../require/connection.php");     
if(isset($_REQUEST['update_profile']))
{
        extract($_POST);
        $first_name;
        $middle_name;
        $last_name;
        $p_number;
        $email;
        $password;
        $dob;
        $cnic;
        $home_town;
        $gender=$gender[0]??"";
        $name = $_FILES['image']['name']; 
        $tmp_name = $_FILES['image']['tmp_name']; 

    $first_name_pat = "/^[A-z]{1,}$/";
    $middle_name_pat = "/^[A-z]{1,}$/";
    $last_name_pat = "/^[A-z]{1,}$/";
    $p_number_pat = "/^[0-9]{4}[-]{1}[0-9]{7}$/";
    $dob_pat    = "/^[0-9]{1,2}[-]{1}[A-z]{3,15}[-]{1}[0-9]{4}$/";
    //$dob_pat = "/^[0-9]{2}[/]{1}[0-9]{2}[/]{1}[0-9]{4}$/";
    $cnic_pat   = "/^[0-9]{5}-{1}[0-9]{7}-{1}[0-9]{1}$/";
    $email_pat  = "/^[A-z0-9@.#$%_]{5,30}[@]{1}[a-z]{5,}[.]{1}(com|edu|pk)$/";
    $password_pat= "/^[A-z0-9@.#$%_]{5,20}$/";
    $image_pat  = "/[.]{1}(jpg|jpeg|png|gif|bmp|tif)$/i";


    $first_name_res  = preg_match($first_name_pat,$first_name);
    $middle_name_res  = preg_match($middle_name_pat,$middle_name);
    $last_name_res  = preg_match($last_name_pat,$last_name);
    $p_number_res  = preg_match($p_number_pat,$p_number);
    $dob_res     = preg_match($dob_pat,$dob);
    $cnic_res    = preg_match($cnic_pat,$cnic);
    $email_res   = preg_match($email_pat,$email);
    $password_res= preg_match($password_pat,$password);
    $image_res   = preg_match($image_pat,$name);

    $error=true;
    if($first_name=="")
    {
        $error = false;
        $message .="<li>Enter Your First Name</li>";
    }
    else if(!$first_name_res)
    {
        $error = false;
        $message .="<li>First Name Pattern Not Valid</li>";
    }
    if($middle_name=="")
    {
        //$error = false;
        $message .="";
    }
    else if(!$middle_name_res)
    {
        $error = false;
        $message .="<li>Middle Name Pattern Not Valid</li>";
    }
    if($last_name=="")
    {
        $error = false;
        $message .="<li>Enter Your Last Name</li>";
    }
    else if(!$last_name_res)
    {
        $error = false;
        $message .="<li>Last Name Pattern Not Valid</li>";
    }
    if($p_number=="")
    {
        $error = false;
        $message .="<li>Enter Your Phone Number</li>";
    }
    else if(!$p_number_res)
    {
        $error = false;
        $message .="<li>Phone Number Pattern Not Valid</li>";
    }
    if($dob=="")
    {
        $error = false;
        $message .="<li>Enter Your Date of Birth</li>";
    }
    else if(!$dob_res)
    {
        $error = false;
        $message .="<li>Date of Birth Pattern Not Valid</li>";
    }
    if($cnic=="")
    {
        $error = false;
        $message .="<li>Enter Your CNIC</li>";
    }
    else if(!$cnic_res)
    {
        $error = false;
        $message .="<li>CNIC Pattern Not Valid</li>";
    }
    if($email=="")
    {
        $error = false;
        $message .="<li>Enter Your Email Address</li>";
    }
    else if(!$email_res)
    {
        $error = false;
        $message .="<li>Email Pattern Not Valid</li>";
    }
    if($password=="")
    {
        $error = false;
        $message .="<li>Enter Your Password</li>";
    }
    else if(!$password_res)
    {
        $error = false;
        $message .="<li>Password Pattern Not Valid</li>";
    }
    if($home_town=="")
    {
        $error = false;
        $message .="<li>Enter Your Home Town Address</li>";
    }
    if(!$gender)
    {
        $error = false;
        $message .="<li>Please Select Gender</li>";
    }
    if($name=="")
    {
        //$error = false;
        //$message .="<li>Please Upload Image</li>";
    }
    else if(!$image_res)
    {
        $error = false;
        $message .="<li>Image Formats:jpg,jpeg,png,gif..etc</li>";
    }
    if($error==false)
    {
        header("location:../profile-edit.php?message=".$message);
    }
    else 
    {
        if(isset($name) && $name!="")
        {
            date_default_timezone_set("asia/Karachi");
            $updated_on=date('l jS F Y h:i:s A');
            move_uploaded_file($tmp_name,"../../Upload_Images/".$name);
            $query_template="UPDATE user SET first_name='$first_name',middle_name='$middle_name',last_name='$last_name',email='$email',password='$password',p_number='$p_number',dob='$dob',cnic='$cnic',home_town='$home_town',gender='$gender',image='$name',updated_on='$updated_on' 
            WHERE user_id=".$_SESSION['user']['user_id']; 
            $result=mysqli_query($connection,$query_template);
            if($result)
            {       require_once ("../../require/PHPMailer-master/PHPMailerAutoload.php");
                    date_default_timezone_set("Asia/Karachi");
                    $mail = new PHPMailer;
                    $mail->isSMTP();
                    $mail->SMTPDebug = 0;
                    $mail->Debugoutput="html";
                    $mail->Host = "smtp.gmail.com";
                    $mail->Port=587;
                    $mail->SMTPSecure = 'tls';
                    $mail->SMTPAuth = true;
                    $mail->Username="salam.14cs17@gmail.com";
                    $mail->Password="MuhammadSalam@17";
                    $mail->setFrom("salam.14cs17@gmail.com","Muhammad Salam");
                    $mail->addAddress($email,"HIST ADMIN");
                    $mail->Subject="ONLINE BLOGGER SYSTEM:- Profile Updated.";
                    $mail->msgHTML("<div align='center' style='border-radius: 50px;border:2px soloid gray;background-color:white;width:35%;margin-left:30%'></br><h3>Profile is Updated Successfully.Thanks</h3>
                        <h4>Email: <p style='color:white'>"." ".$email."</p>Password: "." <p style='color:blue'>".$password."</p><br/></h4>");
                    $mail->send();
                    header("location:../profile.php");
            }
        }
        else
        {
            date_default_timezone_set("asia/Karachi");
            $updated_on=date('l jS F Y h:i:s A');
            $query_template="UPDATE user SET first_name='$first_name',middle_name='$middle_name',last_name='$last_name',email='$email',password='$password',p_number='$p_number',dob='$dob',cnic='$cnic',home_town='$home_town',gender='$gender',updated_on='$updated_on'  WHERE user_id=".$_SESSION['user']['user_id']; 
            $result=mysqli_query($connection,$query_template);
            if($result)
            {       require_once ("../../require/PHPMailer-master/PHPMailerAutoload.php");
                    date_default_timezone_set("Asia/Karachi");
                    $mail = new PHPMailer;
                    $mail->isSMTP();
                    $mail->SMTPDebug = 0;
                    $mail->Debugoutput="html";
                    $mail->Host = "smtp.gmail.com";
                    $mail->Port=587;
                    $mail->SMTPSecure = 'tls';
                    $mail->SMTPAuth = true;
                    $mail->Username="salam.14cs17@gmail.com";
                    $mail->Password="MuhammadSalam@17";
                    $mail->setFrom("salam.14cs17@gmail.com","Muhammad Salam");
                    $mail->addAddress($email,"HIST ADMIN");
                    $mail->Subject="ONLINE BLOGGER SYSTEM:- Profile Updated.";
                    $mail->msgHTML("<div align='center' style='border-radius: 50px;border:2px soloid gray;background-color:white;width:35%;margin-left:30%'></br><h3>Profile is Updated Successfully.Thanks</h3>
                        <h4>Email: <p style='color:white'>"." ".$email."</p>Password: "." <p style='color:blue'>".$password."</p><br/></h4>");
                    $mail->send();
                    header("location:../profile.php");
            }
        }
    }
}
else if(isset($_REQUEST['update_user']))
{
        extract($_POST);
        $first_name;
        $middle_name;
        $last_name;
        $p_number;
        $email;
        $password;
        $dob;
        $cnic;
        $home_town;
        $gender=$gender[0]??"";
        $name = $_FILES['image']['name']; 
        $tmp_name = $_FILES['image']['tmp_name']; 

    $first_name_pat = "/^[A-z]{1,}$/";
    $middle_name_pat = "/^[A-z]{1,}$/";
    $last_name_pat = "/^[A-z]{1,}$/";
    $p_number_pat = "/^[0-9]{4}[-]{1}[0-9]{7}$/";
    $dob_pat    = "/^[0-9]{1,2}[-]{1}[A-z]{3,15}[-]{1}[0-9]{4}$/";
    //$dob_pat = "/^[0-9]{2}[/]{1}[0-9]{2}[/]{1}[0-9]{4}$/";
    $cnic_pat   = "/^[0-9]{5}-{1}[0-9]{7}-{1}[0-9]{1}$/";
    $email_pat  = "/^[A-z0-9@.#$%_]{5,30}[@]{1}[a-z]{5,}[.]{1}(com|edu|pk)$/";
    $password_pat= "/^[A-z0-9@.#$%_]{5,20}$/";
    $image_pat  = "/[.]{1}(jpg|jpeg|png|gif|bmp|tif)$/i";


    $first_name_res  = preg_match($first_name_pat,$first_name);
    $middle_name_res  = preg_match($middle_name_pat,$middle_name);
    $last_name_res  = preg_match($last_name_pat,$last_name);
    $p_number_res  = preg_match($p_number_pat,$p_number);
    $dob_res     = preg_match($dob_pat,$dob);
    $cnic_res    = preg_match($cnic_pat,$cnic);
    $email_res   = preg_match($email_pat,$email);
    $password_res= preg_match($password_pat,$password);
    $image_res   = preg_match($image_pat,$name);

    $error=true;
    if($first_name=="")
    {
        $error = false;
        $message .="<li>Enter Your First Name</li>";
    }
    else if(!$first_name_res)
    {
        $error = false;
        $message .="<li>First Name Pattern Not Valid</li>";
    }
    if($middle_name=="")
    {
        //$error = false;
        $message .="";
    }
    else if(!$middle_name_res)
    {
        $error = false;
        $message .="<li>Middle Name Pattern Not Valid</li>";
    }
    if($last_name=="")
    {
        $error = false;
        $message .="<li>Enter Your Last Name</li>";
    }
    else if(!$last_name_res)
    {
        $error = false;
        $message .="<li>Last Name Pattern Not Valid</li>";
    }
    if($p_number=="")
    {
        $error = false;
        $message .="<li>Enter Your Phone Number</li>";
    }
    else if(!$p_number_res)
    {
        $error = false;
        $message .="<li>Phone Number Pattern Not Valid</li>";
    }
    if($dob=="")
    {
        $error = false;
        $message .="<li>Enter Your Date of Birth</li>";
    }
    else if(!$dob_res)
    {
        $error = false;
        $message .="<li>Date of Birth Pattern Not Valid</li>";
    }
    if($cnic=="")
    {
        $error = false;
        $message .="<li>Enter Your CNIC</li>";
    }
    else if(!$cnic_res)
    {
        $error = false;
        $message .="<li>CNIC Pattern Not Valid</li>";
    }
    if($email=="")
    {
        $error = false;
        $message .="<li>Enter Your Email Address</li>";
    }
    else if(!$email_res)
    {
        $error = false;
        $message .="<li>Email Pattern Not Valid</li>";
    }
    if($password=="")
    {
        $error = false;
        $message .="<li>Enter Your Password</li>";
    }
    else if(!$password_res)
    {
        $error = false;
        $message .="<li>Password Pattern Not Valid</li>";
    }
    if($home_town=="")
    {
        $error = false;
        $message .="<li>Enter Your Home Town Address</li>";
    }
    if(!$gender)
    {
        $error = false;
        $message .="<li>Please Select Gender</li>";
    }
    if($name=="")
    {
        //$error = false;
        //$message .="<li>Please Upload Image</li>";
    }
    else if(!$image_res)
    {
        $error = false;
        $message .="<li>Image Formats:jpg,jpeg,png,gif..etc</li>";
    }
    if($error==false)
    {
        header("location:../update_user.php?message=".$message);
    }
    else 
    {
        if(isset($name) && $name!="")
        {
            date_default_timezone_set("asia/Karachi");
            $updated_on=date('l jS F Y h:i:s A');
            move_uploaded_file($tmp_name,"../../Upload_Images/".$name);
            $query_template="UPDATE user SET first_name='$first_name',middle_name='$middle_name',last_name='$last_name',email='$email',password='$password',p_number='$p_number',dob='$dob',cnic='$cnic',home_town='$home_town',gender='$gender',image='$name',updated_on='$updated_on' 
            WHERE user_id=".$_SESSION['u_user_id']; 
            $result=mysqli_query($connection,$query_template);
            if($result)
            {       require_once ("../../require/PHPMailer-master/PHPMailerAutoload.php");
                    date_default_timezone_set("Asia/Karachi");
                    $mail = new PHPMailer;
                    $mail->isSMTP();
                    $mail->SMTPDebug = 0;
                    $mail->Debugoutput="html";
                    $mail->Host = "smtp.gmail.com";
                    $mail->Port=587;
                    $mail->SMTPSecure = 'tls';
                    $mail->SMTPAuth = true;
                    $mail->Username="salam.14cs17@gmail.com";
                    $mail->Password="MuhammadSalam@17";
                    $mail->setFrom("salam.14cs17@gmail.com","Muhammad Salam");
                    $mail->addAddress($email,"HIST ADMIN");
                    $mail->Subject="ONLINE BLOGGER SYSTEM:- Profile Updated.";
                    $mail->msgHTML("<div align='center' style='border-radius: 50px;border:2px soloid gray;background-color:white;width:35%;margin-left:30%'></br><h3>Profile is Updated Successfully.Thanks</h3>
                        <h4>Email: <p style='color:white'>"." ".$email."</p>Password: "." <p style='color:blue'>".$password."</p><br/></h4>");
                    $mail->send();
                    header("location:../view_users.php?message=<b style='color:purple'>$first_name"." ".$middle_name." ".$last_name." Your Profile Updated Successfully</b>");
            }
        }
        else
        {
            date_default_timezone_set("asia/Karachi");
            $updated_on=date('l jS F Y h:i:s A');
            $query_template="UPDATE user SET first_name='$first_name',middle_name='$middle_name',last_name='$last_name',email='$email',password='$password',p_number='$p_number',dob='$dob',cnic='$cnic',home_town='$home_town',gender='$gender',updated_on='$updated_on'  WHERE user_id=".$_SESSION['u_user_id']; 
            $result=mysqli_query($connection,$query_template);
            if($result)
            {       require_once ("../../require/PHPMailer-master/PHPMailerAutoload.php");
                    date_default_timezone_set("Asia/Karachi");
                    $mail = new PHPMailer;
                    $mail->isSMTP();
                    $mail->SMTPDebug = 0;
                    $mail->Debugoutput="html";
                    $mail->Host = "smtp.gmail.com";
                    $mail->Port=587;
                    $mail->SMTPSecure = 'tls';
                    $mail->SMTPAuth = true;
                    $mail->Username="salam.14cs17@gmail.com";
                    $mail->Password="MuhammadSalam@17";
                    $mail->setFrom("salam.14cs17@gmail.com","Muhammad Salam");
                    $mail->addAddress($email,"HIST ADMIN");
                    $mail->Subject="ONLINE BLOGGER SYSTEM:- Profile Updated.";
                    $mail->msgHTML("<div align='center' style='border-radius: 50px;border:2px soloid gray;background-color:white;width:35%;margin-left:30%'></br><h3>Profile is Updated Successfully.Thanks</h3>
                        <h4>Email: <p style='color:white'>"." ".$email."</p>Password: "." <p style='color:blue'>".$password."</p><br/></h4>");
                    $mail->send();
                    header("location:../view_users.php?message=<b style='color:purple'>$first_name"." ".$middle_name." ".$last_name." Your Profile Updated Successfully</b>");
            }
        }
    }
}
else if($_REQUEST['flag']=='email_varification')
{
    $email=$_REQUEST['email'];
    $user_id=$_REQUEST['user_id'];
    $query="SELECT *FROM user WHERE user_id !='$user_id'";
    $result = mysqli_query($connection,$query);
    if($result->num_rows)
    {
        while($row=mysqli_fetch_assoc($result))
        {
            if($row['email']==$email)
            {
                ?>
                <span style="color:red">This Email Already Exists Please Use another Email</span>
                <?php
            }
        }
    }
    else
    {
        $email_pat  = "/^[A-z0-9@.#$%_]{5,30}[@]{1}[a-z]{5,}[.]{1}(com|edu|pk)$/";
        $email_res   = preg_match($email_pat,$email);
        if(!$email_res)
        {
            ?>
                <span style="color:red">Minimum five digit/character/special-character</span>
            <?php
        }
        else
        {
            ?>
            <span style="color:green">Procesed</span>
            <?php
        }
    }
}
else if($_REQUEST['flag']=='delete_user')
{
    date_default_timezone_set("asia/Karachi");
    $added_on=date('l jS F Y h:i:s A');
    $user_id=$_REQUEST['user_id'];
    $query="UPDATE user_status SET user_status.status_id=5,user_status.user_deleted_time='$added_on' WHERE user_status.user_id='$user_id'  
    AND user_status.status_id !=2 AND user_status.status_id !=5 AND user_status.status_id !=6";
    $result=mysqli_query($connection,$query);
    if($result)
    {
        $q="SELECT *FROM user WHERE user_id='$user_id'";
        $r=mysqli_query($connection,$q);
        if($r->num_rows)
        {
            $record=mysqli_fetch_assoc($r);
            $first_name= $record['first_name'];
            $middle_name= $record['middle_name'];
            $last_name= $record['last_name'];
            header("location:../view_users.php?message=<b style='color:red'>$first_name"." ".$middle_name." ".$last_name." Record Deleted Successfully</b>");
        }
    }
}
   
    
?>
