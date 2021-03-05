<?php
session_start();
require_once("../../require/connection.php");
if($_REQUEST['flag']=='email_varification')
{
    $email=$_REQUEST['email'];
    $user_id=$_SESSION['user']['user_id']; 
    $query="SELECT *FROM user WHERE email='$email' AND user_id='$user_id' "; 
    $result = mysqli_query($connection,$query);
    if($result->num_rows)
    {
        while($row=mysqli_fetch_assoc($result))
        {
            if($row['email']==$email)
            {
                ?>
                <span style="color:green">Proceed</span>
                <?php
            }
        }
    }
    else
    {
        ?>
        <span style="color:red">Invalid Email Please Try Again.</span>
        <?php
    }
}
else if($_REQUEST['flag']=='current_password_varification')
{
    $current_password=$_REQUEST['current_password'];
    $user_id=$_SESSION['user']['user_id']; 
    $query="SELECT *FROM user WHERE password ='$current_password' AND user_id='$user_id' "; 
    $result = mysqli_query($connection,$query);
    if($result->num_rows)
    {
        while($row=mysqli_fetch_assoc($result))
        {
            if($row['password']==$current_password)
            {
                ?>
                <span style="color:green">Proceed</span>
                <?php
            }
        }
    }
    else
    {
        ?>
        <span style="color:red">Invalid Current Password Please Try Again.</span>
        <?php
    }
}
else if($_REQUEST['flag']=='new_password_varification')
{
    $new_password=$_REQUEST['new_password'];
    $password_pat= "/^[A-z]{5,15}[@$#]{1}[0-9]{2,10}$/";
    $password_res= preg_match($password_pat,$new_password);
    if(!$password_res)
    {
        ?>
            <span style="color:red">Password Format: Salam@17</span>
        <?php
    }
    else
    {
        ?>
        <span style="color:green">Procesed</span>
        <?php
    }
}
else if($_REQUEST['flag']=='change_password')
{
    $email=$_REQUEST['email'];
    $current_password=$_REQUEST['current_password'];
    $new_password=$_REQUEST['new_password'];
    $user_id=$_SESSION['user']['user_id']; 

    $password_pat= "/^[A-z]{5,15}[@$#]{1}[0-9]{2,10}$/";
    $password_res= preg_match($password_pat,$new_password);
    if(!$password_res)
    {
        ?>
            <span style="color:red">Password Format: Salam@17</span>
        <?php
    }
    else
    {
        
        $query="SELECT *FROM user WHERE email='$email' AND password ='$current_password' AND user_id='$user_id' ";$result = mysqli_query($connection,$query);
        if($result->num_rows)
        {
            while($row=mysqli_fetch_assoc($result))
            {
                if($row['email']==$email && $row['password']==$current_password)
                {
                   $u_query="UPDATE user SET password='$new_password' WHERE email='$email' AND password ='$current_password' AND user_id='$user_id' ";
                   $u_result = mysqli_query($connection,$u_query);
                    if($u_result)
                    {
                        ?>
                            <span style="color:purple">Your Password has been  Updated Successfully</span>
                        <?php
                    }
                    else
                    {
                        ?>
                        <span style="color:red">Your Password has Not been  Updated Please Try Again</span>
                        <?php
                    }
                }
            }
        }
        else
        {
            ?>
            <span style="color:red">Invalid Email/Current Password Please Try Again.</span>
            <?php
        }
    }
   
}
else if($_REQUEST['flag']=='update_profile')
{
    $first_name=$_REQUEST['first_name'];
    $last_name=$_REQUEST['last_name'];
    $email=$_REQUEST['email'];
    $dob=$_REQUEST['dob'];
    $cnic=$_REQUEST['cnic'];
    $home_town=$_REQUEST['home_town'];

    $first_name_pat = "/^[A-z]{1,}$/";
    $last_name_pat = "/^[A-z]{1,}$/";
    $dob_pat    = "/^[0-9]{1,2}[-]{1}[A-Z]{3,15}[-]{1}[0-9]{4}$/";
    $cnic_pat   = "/^[0-9]{5}-{1}[0-9]{7}-{1}[0-9]{1}$/";
    $email_pat  = "/^[A-z]{3,}[0-9]{1,}[@]{1}[a-z]{5,}[.]{1}(com|edu|pk)$/";

    $first_name_res  = preg_match($first_name_pat,$first_name);
    $last_name_res  = preg_match($last_name_pat,$last_name);
    $dob_res     = preg_match($dob_pat,$dob);
    $cnic_res    = preg_match($cnic_pat,$cnic);
    $email_res   = preg_match($email_pat,$email);
    if(!$first_name_res || !$last_name_res || !$email_res || !$dob_res || !$cnic_res)
    {
        ?>
            <span style="color:red">Please Input Valid Formats of Fields Data</span>
        <?php
    }
    else
    {
        
        $query="UPDATE user SET first_name='$first_name',last_name='$last_name',email='$email',dob='$dob'
        ,cnic='$cnic',home_town='$home_town' WHERE user_id=".$_SESSION['user']['user_id']; 
        $result = mysqli_query($connection,$query);
        if($result)
        {
            ?>
                <span style="color:purple">Your Profile has been  Updated Successfully</span>
            <?php
        }
        else
        {
            ?>
            <span style="color:red">Your Profile has Not been  Updated Please Try Again</span>
            <?php
        }
               
    }
}

