<?php
    session_start();
    require_once("require/connection.php");
    if($_REQUEST['flag']=='admin_role_type_USER')
    {
        $query="SELECT user.first_name,user.last_name,user.user_id,user.email,user.password,user.home_town,user.cnic,user.image,user_role_assign.role_id,user_status.status_id,user_role_assign.is_active_status,role.role_type
        FROM user,role,status,user_role_assign,user_status
        WHERE user.user_id = user_role_assign.user_id
        AND role.role_id = user_role_assign.role_id
        AND status.status_id = user_status.status_id
        AND  user.user_id = user_status.user_id
        AND user_role_assign.is_active_status=3
        AND role.role_id=3
        AND user.user_id='".$_REQUEST['user_id']."' "; 
        $result=mysqli_query($connection,$query);
        if($result->num_rows)
        { 
            $row=mysqli_fetch_assoc($result);
            $_SESSION['user']=$row;
            /*echo "<pre>";
            print_r($row); die;*/
            date_default_timezone_set("asia/Karachi");
            $login_time=date('l jS F Y h:i:s A');
            $user_id=$_SESSION['user']['user_id']; 
            $role_id=$_SESSION['user']['role_id'];
            $_SESSION['login_time']=$login_time;
            $query="INSERT INTO log_manage (user_id,role_id,login_time)
            VALUES ('$user_id','$role_id','$login_time')"; 
            if($role_id==3 && $_SESSION['user']['status_id']!=2 && $_SESSION['user']['status_id']!=4 && $_SESSION['user']['status_id']!=5 && $_SESSION['user']['status_id']!=6)
            { 
                mysqli_query($connection,$query);
                header("location:User/index.php");
            }
        }
    }
    else if($_REQUEST['flag']=='admin_role_type_CONTRIBUTAR')
    {
        $query="SELECT user.first_name,user.last_name,user.user_id,user.email,user.password,user.home_town,user.cnic,user.image,user_role_assign.role_id,user_status.status_id,user_role_assign.is_active_status,role.role_type
        FROM user,role,status,user_role_assign,user_status
        WHERE user.user_id = user_role_assign.user_id
        AND role.role_id = user_role_assign.role_id
        AND status.status_id = user_status.status_id
        AND  user.user_id = user_status.user_id
        AND user_role_assign.is_active_status=3
        AND role.role_id=2
        AND user.user_id='".$_REQUEST['user_id']."' "; 
        $result=mysqli_query($connection,$query);
        if($result->num_rows)
        { 
            $row=mysqli_fetch_assoc($result);
            $_SESSION['user']=$row;
            /*echo "<pre>";
            print_r($row); die;*/
            date_default_timezone_set("asia/Karachi");
            $login_time=date('l jS F Y h:i:s A');
            $user_id=$_SESSION['user']['user_id']; 
            $role_id=$_SESSION['user']['role_id'];
            $_SESSION['login_time']=$login_time;
            $query="INSERT INTO log_manage (user_id,role_id,login_time)
            VALUES ('$user_id','$role_id','$login_time')"; 
            if($role_id==2 && $_SESSION['user']['status_id']!=2 && $_SESSION['user']['status_id']!=4 && $_SESSION['user']['status_id']!=5 && $_SESSION['user']['status_id']!=6)
            { 
                mysqli_query($connection,$query);
                header("location:Contributar/index.php");
            }
        }
    }
    else if($_REQUEST['flag']=='contributar_role_type_USER')
    {
        $query="SELECT user.first_name,user.last_name,user.user_id,user.email,user.password,user.home_town,user.cnic,user.image,user_role_assign.role_id,user_status.status_id,user_role_assign.is_active_status,role.role_type
        FROM user,role,status,user_role_assign,user_status
        WHERE user.user_id = user_role_assign.user_id
        AND role.role_id = user_role_assign.role_id
        AND status.status_id = user_status.status_id
        AND  user.user_id = user_status.user_id
        AND user_role_assign.is_active_status=3
        AND role.role_id=3
        AND user.user_id='".$_REQUEST['user_id']."' "; 
        $result=mysqli_query($connection,$query);
        if($result->num_rows)
        { 
            $row=mysqli_fetch_assoc($result);
            $_SESSION['user']=$row;
            /*echo "<pre>";
            print_r($row); die;*/
            date_default_timezone_set("asia/Karachi");
            $login_time=date('l jS F Y h:i:s A');
            $user_id=$_SESSION['user']['user_id']; 
            $role_id=$_SESSION['user']['role_id'];
            $_SESSION['login_time']=$login_time;
            $query="INSERT INTO log_manage (user_id,role_id,login_time)
            VALUES ('$user_id','$role_id','$login_time')"; 
            if($role_id==3 && $_SESSION['user']['status_id']!=2 && $_SESSION['user']['status_id']!=4 && $_SESSION['user']['status_id']!=5 && $_SESSION['user']['status_id']!=6)
            { 
                mysqli_query($connection,$query);
                header("location:User/index.php");
            }
        }
    }
    else if($_REQUEST['flag']=='contributar_role_type_ADMIN')
    {
        $query="SELECT user.first_name,user.last_name,user.user_id,user.email,user.password,user.home_town,user.cnic,user.image,user_role_assign.role_id,user_status.status_id,user_role_assign.is_active_status,role.role_type
        FROM user,role,status,user_role_assign,user_status
        WHERE user.user_id = user_role_assign.user_id
        AND role.role_id = user_role_assign.role_id
        AND status.status_id = user_status.status_id
        AND  user.user_id = user_status.user_id
        AND user_role_assign.is_active_status=3
        AND role.role_id=1
        AND user.user_id='".$_REQUEST['user_id']."' "; 
        $result=mysqli_query($connection,$query);
        if($result->num_rows)
        { 
            $row=mysqli_fetch_assoc($result);
            $_SESSION['user']=$row;
            /*echo "<pre>";
            print_r($row); die;*/
            date_default_timezone_set("asia/Karachi");
            $login_time=date('l jS F Y h:i:s A');
            $user_id=$_SESSION['user']['user_id']; 
            $role_id=$_SESSION['user']['role_id'];
            $_SESSION['login_time']=$login_time;
            $query="INSERT INTO log_manage (user_id,role_id,login_time)
            VALUES ('$user_id','$role_id','$login_time')"; 
            if($role_id==1 && $_SESSION['user']['status_id']!=2 && $_SESSION['user']['status_id']!=4 && $_SESSION['user']['status_id']!=5 && $_SESSION['user']['status_id']!=6)
            { 
                mysqli_query($connection,$query);
                header("location:Admin/index.php");
            }
        }
    }
    else if($_REQUEST['flag']=='user_role_type_ADMIN')
    {
        $query="SELECT user.first_name,user.last_name,user.user_id,user.email,user.password,user.home_town,user.cnic,user.image,user_role_assign.role_id,user_status.status_id,user_role_assign.is_active_status,role.role_type
        FROM user,role,status,user_role_assign,user_status
        WHERE user.user_id = user_role_assign.user_id
        AND role.role_id = user_role_assign.role_id
        AND status.status_id = user_status.status_id
        AND  user.user_id = user_status.user_id
        AND user_role_assign.is_active_status=3
        AND role.role_id=1
        AND user.user_id='".$_REQUEST['user_id']."' "; 
        $result=mysqli_query($connection,$query);
        if($result->num_rows)
        { 
            $row=mysqli_fetch_assoc($result);
            $_SESSION['user']=$row;
            /*echo "<pre>";
            print_r($row); die;*/
            date_default_timezone_set("asia/Karachi");
            $login_time=date('l jS F Y h:i:s A');
            $user_id=$_SESSION['user']['user_id']; 
            $role_id=$_SESSION['user']['role_id'];
            $_SESSION['login_time']=$login_time;
            $query="INSERT INTO log_manage (user_id,role_id,login_time)
            VALUES ('$user_id','$role_id','$login_time')"; 
            if($role_id==1 && $_SESSION['user']['status_id']!=2 && $_SESSION['user']['status_id']!=4 && $_SESSION['user']['status_id']!=5 && $_SESSION['user']['status_id']!=6)
            { 
                mysqli_query($connection,$query);
                header("location:Admin/index.php");
            }
        }
    }
    else if($_REQUEST['flag']=='user_role_type_CONTRIBUTAR')
    {
        $query="SELECT user.first_name,user.last_name,user.user_id,user.email,user.password,user.home_town,user.cnic,user.image,user_role_assign.role_id,user_status.status_id,user_role_assign.is_active_status,role.role_type
        FROM user,role,status,user_role_assign,user_status
        WHERE user.user_id = user_role_assign.user_id
        AND role.role_id = user_role_assign.role_id
        AND status.status_id = user_status.status_id
        AND  user.user_id = user_status.user_id
        AND user_role_assign.is_active_status=3
        AND role.role_id=2
        AND user.user_id='".$_REQUEST['user_id']."' "; 
        $result=mysqli_query($connection,$query);
        if($result->num_rows)
        { 
            $row=mysqli_fetch_assoc($result);
            $_SESSION['user']=$row;
            /*echo "<pre>";
            print_r($row); die;*/
            date_default_timezone_set("asia/Karachi");
            $login_time=date('l jS F Y h:i:s A');
            $user_id=$_SESSION['user']['user_id']; 
            $role_id=$_SESSION['user']['role_id'];
            $_SESSION['login_time']=$login_time;
            $query="INSERT INTO log_manage (user_id,role_id,login_time)
            VALUES ('$user_id','$role_id','$login_time')"; 
            if($role_id==2 && $_SESSION['user']['status_id']!=2 && $_SESSION['user']['status_id']!=4 && $_SESSION['user']['status_id']!=5 && $_SESSION['user']['status_id']!=6)
            { 
                mysqli_query($connection,$query);
                header("location:Contributar/index.php");
            }
        }
    }
?>