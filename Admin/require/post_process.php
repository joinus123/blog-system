<?php
include_once("../include/session_maintenance.php");
date_default_timezone_set("asia/Karachi");
require_once("../../require/connection.php");
if(isset($_REQUEST['flag']))
{
	if($_REQUEST['flag']=='total_attachment')
	{
		$no_of_attachment=$_REQUEST['no_of_attachment'];
		for($i=1;$i<=$no_of_attachment;$i++)
		{
			?>
	        <div class="body">
	        	<label style="color:green;font-size:12">Select Attachment Type</label>
	            <select name="file_type[]" class="form-control show-tick" id="type<?php echo $i ?>" onchange="select_type(<?php echo $i ?>)">
	                <option>Select Attachment Type</option>
	                <option value="image/*">Image</option>
	                <option value="audio/*">Audio</option>
	                <option value="video/*">Video</option>
	                <option value=".doc">Document</option>
	            </select>
	        </div>
	        <div id="<?php echo "upload_file".$i;?>">
	        </div>
			<?php
		}
	}
	else if($_REQUEST['flag']=='type_of_attachment')
	{ 
		if($_REQUEST['set_attribute']=='Select Attachment Type')
		{

		}
		else
		{
			?>
			<span class="body">
		        <label style="color:blue;font-size:10">Upload Attachment</label>
		        <input  type="file" id="dropify-event" data-default-file="" name="files[]" accept="<?php echo $_REQUEST['set_attribute'] ?>">
		    </span> 
		    <?php
		}
	}
}
else if(isset($_REQUEST['add_post']))
{ 
	extract($_POST);
	
	$p_title;
	$p_category;
	$p_summary;
	$p_description;
	$user_id = $_SESSION['user']['user_id'];
    $files_upload=$_FILES['files']??false;

    $added_on=date('j M Y,h A');
  	$p_query="INSERT INTO blog_post (user_id,category_id,title,summary,description)
	VALUES ('$user_id','$p_category','".htmlspecialchars($p_title,ENT_QUOTES)."','".htmlspecialchars($p_summary,ENT_QUOTES)."','".htmlspecialchars($p_description,ENT_QUOTES)."')";
	mysqli_query($connection,$p_query);
	$post_id = mysqli_insert_id($connection);
	$p_s_query="INSERT INTO post_status (post_id,status_id,added_on)
	VALUES ('$post_id',3,'$added_on')";
	mysqli_query($connection,$p_s_query);
	if(!$files_upload){
		header("location:../post_form.php?message=<b style='color:purple'>Post Added Successfully</b>");
	}


    foreach ($files_upload['name'] as $key => $value)
    {
      $name=$files_upload['name'][$key];
      $tmp_name=$files_upload['tmp_name'][$key];
      if(move_uploaded_file($tmp_name,"../../Files Attachment/".$name))
      {
        if($file_type[$key]=='image/*')
        {
        	$a_s=1;
        }
        else if($file_type[$key]=='audio/*')
        {
        	$a_s=2;
        }
        else if($file_type[$key]=='video/*')
        {
        	$a_s=3;
        }
         else if($file_type[$key]=='.doc')
        {
        	$a_s=4;
        }
        $p_a_query="INSERT INTO post_attachment (post_id,attachment_type_id,attachment_name) VALUES ('$post_id','$a_s','".htmlspecialchars($name,ENT_QUOTES)."')";
        mysqli_query($connection,$p_a_query);
       
		header("location:../post_form.php?message=<b style='color:purple'>Post Added Successfully</b>");
      }
      else
      {
      	header("location:../post_form.php?message=<b style='color:red'>Attachments Not Uploaded Please Try Again</b>");
      }
    }
}
else if(isset($_REQUEST['draft_post']))
{ 
	extract($_POST);
	$p_title;
	$p_category;
	$p_summary;
	$p_description;
	$user_id = $_SESSION['user']['user_id'];
    $files_upload=$_FILES['files']??false;

    $added_on=date('j M Y,h A');
  	$p_query="INSERT INTO blog_post (user_id,category_id,title,summary,description)
	VALUES ('$user_id','$p_category','".htmlspecialchars($p_title,ENT_QUOTES)."','".htmlspecialchars($p_summary,ENT_QUOTES)."','".htmlspecialchars($p_description,ENT_QUOTES)."')";
	mysqli_query($connection,$p_query);
	$post_id = mysqli_insert_id($connection);
	$p_s_query="INSERT INTO post_status (post_id,status_id,added_on)
	VALUES ('$post_id',6,'$added_on')";
	mysqli_query($connection,$p_s_query);
	if(!$files_upload){
		header("location:../post_form.php?draft=<b style='color:purple'>Post is Saved in Draft</b>");
	}


    foreach ($files_upload['name'] as $key => $value)
    {
      $name=$files_upload['name'][$key];
      $tmp_name=$files_upload['tmp_name'][$key];
      if(move_uploaded_file($tmp_name,"../../Files Attachment/".$name))
      {
        if($file_type[$key]=='image/*')
        {
        	$a_s=1;
        }
        else if($file_type[$key]=='audio/*')
        {
        	$a_s=2;
        }
        else if($file_type[$key]=='video/*')
        {
        	$a_s=3;
        }
         else if($file_type[$key]=='.doc')
        {
        	$a_s=4;
        }
        $p_a_query="INSERT INTO post_attachment (post_id,attachment_type_id,attachment_name) VALUES ('$post_id','$a_s','".htmlspecialchars($name,ENT_QUOTES)."')";
        mysqli_query($connection,$p_a_query);
       
		header("location:../post_form.php?draft=<b style='color:purple'>Post is Saved in Draft</b>");
      }
      else
      {
      	header("location:../post_form.php?message=<b style='color:red'>Attachments Not Draft Please Try Again</b>");
      }
    }
}
else if(isset($_REQUEST['update_post_record']))
{
    extract($_POST);
   	$post_id;
   	$p_title;
    $p_summary;
    $p_description;
    $user_id = $_SESSION['user']['user_id'];
    $files_upload=$_FILES['files']??false;
    $updated_on=date('j M Y,h A');
  	$u_post_q="UPDATE blog_post 
    SET title='".htmlspecialchars($p_title,ENT_QUOTES)."',
    summary='".htmlspecialchars($p_summary,ENT_QUOTES)."',
    description='".htmlspecialchars($p_description,ENT_QUOTES)."',updated_on='".$updated_on."'
    WHERE blog_post.post_id='$post_id'";
	mysqli_query($connection,$u_post_q);
	if(!isset($_FILES['files']))
	{ 
		header("location:../show_active_post.php");
	}
	else
	{	
		foreach($files_upload['name'] as $key => $value)
	    {
	    	$a_id=$_SESSION['post_attachment'][$key]['p_attachment_id']; //to get the image upload id
	     	$name=$files_upload['name'][$key];
	      	$tmp_name=$files_upload['tmp_name'][$key];
		      if(move_uploaded_file($tmp_name,"../../Files Attachment/".$name))
		      {
		        $u_p_attachment="UPDATE post_attachment SET attachment_name = '$name' WHERE p_attachment_id=$a_id AND post_id='$post_id' ";
		        mysqli_query($connection,$u_p_attachment);
		       
				header("location:../show_active_post.php");
		      }
	    }
		header("location:../show_active_post.php");	
	}
}
else if(isset($_REQUEST['update_draft_record']))
{
    extract($_POST);
   	$post_id;
   	$p_title;
    $p_summary;
    $p_description;
    $user_id = $_SESSION['user']['user_id'];
    $files_upload=$_FILES['files']??false;
    $updated_on=date('j M Y,h A');
  	$u_post_q="UPDATE blog_post 
    SET title='".htmlspecialchars($p_title,ENT_QUOTES)."',
    summary='".htmlspecialchars($p_summary,ENT_QUOTES)."',
    description='".htmlspecialchars($p_description,ENT_QUOTES)."',updated_on='".$updated_on."'
    WHERE blog_post.post_id='$post_id'";
	mysqli_query($connection,$u_post_q);
	
	if(!isset($_FILES['files']))
	{ 
		header("location:../draft_posts.php");
	}
	else
	{
		foreach($files_upload['name'] as $key => $value)
	    {
	    	$att_id=$_SESSION['post_attachment'][$key]['p_attachment_id']; //to get the image upload id
	     	$name=$files_upload['name'][$key];
	      	$tmp_name=$files_upload['tmp_name'][$key];
		      if(move_uploaded_file($tmp_name,"../../Files Attachment/".$name))
		      {
		        $u_p_attachment="UPDATE post_attachment SET attachment_name = '$name' WHERE p_attachment_id=$att_id AND post_id='$post_id' ";
		        mysqli_query($connection,$u_p_attachment);
		       
				header("location:../draft_posts.php");
		      }
	    }
		header("location:../draft_posts.php");	
	}
}
