<?php
    require_once("require/connection.php");     
    if(isset($_POST['register']))
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
       

	/*echo $first_name="1234";
    echo $middle_name="123";
	echo $last_name="123";
    echo $p_number="03312477922";
	echo $dob="555555";
	echo $cnic="5455";
	echo $email="asdad";
	echo $password="554488";
	echo $home_town="";
	$gender =$gender[0]; 
	$gender=false;
	echo $name="salam.pdf";
*/
  /* echo $first_name="";
    echo $middle_name="";
    echo $last_name="";
    echo $p_number="";
    echo $dob="";
    echo $cnic="";
    echo $email="";
    echo $password="";
    echo $home_town="";
    $gender =$gender[0];
    $gender=false;
    echo $name="";*/


	$first_name_pat = "/^[A-z]{1,}$/";
    $middle_name_pat = "/^[A-z]{1,}$/";
    $last_name_pat = "/^[A-z]{1,}$/";
    $p_number_pat = "/^[0-9]{4}[-]{1}[0-9]{7}$/";
    $dob_pat 	= "/^[0-9]{1,2}[-]{1}[A-z]{3,15}[-]{1}[0-9]{4}$/";
    //$dob_pat = "/^[0-9]{2}[/]{1}[0-9]{2}[/]{1}[0-9]{4}$/";
    $cnic_pat 	= "/^[0-9]{5}-{1}[0-9]{7}-{1}[0-9]{1}$/";
    $email_pat 	= "/^[A-z0-9@.#$%_]{5,30}[@]{1}[a-z]{5,}[.]{1}(com|edu|pk)$/";
    $password_pat= "/^[A-z0-9@.#$%_]{5,20}$/";
    $image_pat 	= "/[.]{1}(jpg|jpeg|png|gif|bmp|tif)$/i";


    $first_name_res  = preg_match($first_name_pat,$first_name);
    $middle_name_res  = preg_match($middle_name_pat,$middle_name);
    $last_name_res  = preg_match($last_name_pat,$last_name);
    $p_number_res  = preg_match($p_number_pat,$p_number);
    $dob_res     = preg_match($dob_pat,$dob);
    $cnic_res    = preg_match($cnic_pat,$cnic);
    $email_res   = preg_match($email_pat,$email);
    $password_res= preg_match($password_pat,$password);
    $image_res 	 = preg_match($image_pat,$name);

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
    	$error = false;
    	$message .="<li>Please Upload Image</li>";
    }
    else if(!$image_res)
    {
    	$error = false;
    	$message .="<li>Image Formats:jpg,jpeg,png,gif..etc</li>";
    }
    if($error==false)
    {
    	header("location:register.php?message=".$message);
    }
    else 
    {
        date_default_timezone_set("asia/Karachi");
        $added_on=date('l jS F Y h:i:s A');
        move_uploaded_file($tmp_name,"Upload_Images/".$name);
    	$query_template="INSERT INTO user (first_name,middle_name,last_name,email,password,p_number,dob,cnic,home_town,gender,image,added_on)
        VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";
        $query_statement = mysqli_prepare($connection,$query_template);
        mysqli_stmt_bind_param($query_statement,"ssssssssssss",$first_name,$middle_name,$last_name,$email,$password,$p_number,$dob,$cnic,$home_town,$gender,$name,$added_on);
        $result=mysqli_stmt_execute($query_statement);
        if($result)
        {
            date_default_timezone_set("asia/Karachi");
            $added_on=date('l jS F Y h:i:s A');
            $user_id = mysqli_insert_id($connection);
            $query_r = "INSERT INTO user_role_assign (user_id,role_assign_time)
            VALUES ('$user_id','$added_on')"; 
            $r_result=mysqli_query($connection,$query_r);
            $query_r = "INSERT INTO user_status (user_id,user_active_time)
            VALUES ('$user_id','$added_on')";
            $s_result=mysqli_query($connection,$query_r); 
            if($r_result && $s_result)
            {
                require_once ("require/PHPMailer-master/PHPMailerAutoload.php");
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
                $mail->Subject="ONLINE BLOGGER SYSTEM:- New Account Registration.";
                $mail->msgHTML("<div align='center' style='border-radius: 50px;border:2px soloid gray;background-color:white;width:35%;margin-left:30%'></br><h3>Registration has been done Successfully Please Wait For Another Account Activation Email..!</h3>");
        
                $mail->send();
                header("location:register.php?message=<br/><b style='color:green'>Registration has been done Successfully Please check your Email for account Activation..!</b>");
            }
            else
            {
                header("location:register.php?message=<br/>Registration Fail Please Try Again..!");
            }

        }
    }
}
else if($_REQUEST['flag']=='email_varification')
{
    $email=$_REQUEST['email'];
    $query="SELECT *FROM user WHERE email='$email'";
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

   
	
?>