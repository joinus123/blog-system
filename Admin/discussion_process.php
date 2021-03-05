<?php
	include_once("include/session_maintenance.php");
	require_once("../require/connection.php");
	date_default_timezone_set("asia/Karachi");
	if($_REQUEST['flag']=="send_messages")
	{
		$message=$_REQUEST['message'];
		$user_id=$_SESSION['user']['user_id'];
		$added_on=date('j M Y,h A');
		$query="INSERT INTO chat_message (user_id,message,message_time) VALUES ('$user_id','$message','$added_on')";
			$result = mysqli_query($connection,$query)or die(mysqli_error($connection));
			if($result)
			{
				
			}
			else
			{
				echo "<b style='color:red'>Message has Not been sent Please try Again..!</b>";
			}
	}
	else if($_REQUEST['flag']=="show_messages")
	{
		$select_query="SELECT user.*,chat_message.*
			FROM `user`,chat_message
			WHERE user.`user_id` = chat_message.`user_id`
			ORDER BY message_id ASC
			"; 
		$select_result = mysqli_query($connection,$select_query);
		if($select_result)
		{
			while ($s_row=mysqli_fetch_assoc($select_result)) 
			{
				if(!($_SESSION['user']['user_id']==$s_row['user_id']))
				{
				?>
				 <li class="clearfix">
                    <div class="status online message-data text-right">
                        <span class="time"><?php echo $s_row['message_time']?></span>
                        <span class="name"><b style="color:#FF5722"><?php echo $s_row['first_name']." ".$s_row['last_name'] ;?></b></span>
                        <i class="zmdi zmdi-circle me"></i>
                    </div>
                    <div class="message other-message float-right" style="background-color:lightblue;"><b> <?php echo $s_row['message']?> </b></div>
                </li>
                <?php 
            	}
                else
                {  ?>
                <li>
                    <div class="status online message-data" class="status online">
                    	 <span class="status online"><i class="zmdi zmdi-circle"></i> </span>
                        <span class="name"><b style="color:#673AB7"><?php echo $s_row['first_name']." ".$s_row['last_name'] ;?></b></span>
                         
                        <span class="time"><?php echo $s_row['message_time']?></span>
                    </div>
                    <div class="message my-message" style="background-color:gray;">
                        <p><b style="color:white"><?php echo $s_row['message']?></b></p>
                    </div>
                </li> 
          <?php } ?>                       
               

				<?php
			}
		}
	}
	else if($_REQUEST['flag']=="show_users")
	{
		$user_id=$_SESSION['user']['user_id'];
		$select_query="SELECT DISTINCT user.`first_name`,user.`last_name`,user.`image`
			FROM `user`,role,log_manage
			WHERE user.`user_id` = log_manage.`user_id`
			AND log_manage.`is_active` = 1
			AND log_manage.`user_id`!='$user_id'
			ORDER BY log_manage.log_id DESC"; 
		$select_result = mysqli_query($connection,$select_query);
		if($select_result)
		{
			while ($row=mysqli_fetch_assoc($select_result)) 
			{
				?>
			<li>
                <a href="javascript:void(0);">
                    <img src="../Upload_Images/<?php echo $row['image'] ?>" alt="avatar" />
                    <div class="about">
                        <div class="name"><?php echo $row['first_name']." ".$row['last_name'] ?></div>
                        <div class="status online"> <i class="zmdi zmdi-circle"></i> online </div>
                    </div>
                </a>
            </li>
				<?php
			}
		}
	}
?>