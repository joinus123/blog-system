<?php
    require_once("../../require/connection.php");
	if($_REQUEST['flag']=='add_category')
	{
		date_default_timezone_set("asia/Karachi");
        $added_on=date('l jS F Y h:i:s A');
		$category_name=$_REQUEST['category_name'];
		$query="INSERT INTO category (category_name,added_on) VALUES ('$category_name','$added_on')";
		$result=mysqli_query($connection,$query);
		if($result)
		{
			//echo "Category Added Successfully";
		}
	}
	else if($_REQUEST['flag']=='edit_category')
	{
		$category_id=$_REQUEST['category_id']; 
		$query="SELECT *FROM category WHERE category_id='$category_id'"; 
		$result=mysqli_query($connection,$query);
		if($result->num_rows)
		{
			while($row=mysqli_fetch_assoc($result))
			{
				?>
				<div class="row">
                <div class="col-lg-12">
                    <div class="card">
                    	<label style="color:#FF5722">Update Category Title</label>
                        <div class="body">
                            <div class="form-group">
                                <input id="updated_category_name" type="text" class="form-control" placeholder="Enter Category title" value="<?php echo $row['category_name']?>" />
                                <span id="updated_category_name_msg"></span>
                            </div>
                        </div>
                    </div>
                   <div class="form-group" align="center">
                        <button type="button" class="btn btn-success" onclick="update_category(<?php echo $row['category_id'];?>)" >UPDATE CATEGORY</button>
                   </div>	   
                </div>            
            </div>
				<?php
			}
		}
	}
	else if($_REQUEST['flag']=='update_category')
	{
		date_default_timezone_set("asia/Karachi");
        $updated_on=date('l jS F Y h:i:s A');
		$category_id=$_REQUEST['category_id']; 
		$updated_category_name=$_REQUEST['updated_category_name'];
		$query="UPDATE category SET category_name='$updated_category_name',updated_on='$updated_on' WHERE category_id='$category_id'";
		$result=mysqli_query($connection,$query);
		if($result)
		{
			//echo "Category Updated Successfully";
		}
	}
	else if($_REQUEST['flag']=='delete_category')
	{
		date_default_timezone_set("asia/Karachi");
        $deleted_on=date('l jS F Y h:i:s A');
		$category_id=$_REQUEST['category_id']; 
		$query="UPDATE category SET category.status_id=6,deleted_on='$deleted_on' WHERE category_id='$category_id'"; 
		$result=mysqli_query($connection,$query);
		if($result)
		{
			//echo "Category Deleted Successfully";
		}
	}
	