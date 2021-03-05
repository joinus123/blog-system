<?php
	require_once("../require/connection.php");
	include_once("include/session_maintenance.php");
	include_once("../include/header.php");
?>
<!-- <script type="text/javascript">
	function update_user()
	{
		var first_name = document.getElementByName('first_name').value;
		var middle_name = document.getElementByName('middle_name').value;
		var last_name = document.getElementByName('last_name').value;
		var p_number = document.getElementByName('p_number').value;
		var cnic = document.getElementByName('cnic').value;
		var email = document.getElementByName('email').value;
		var password = document.getElementByName('password').value;
		var gender = document.getElementByName('gender').value;
		var home_town = document.getElementByName('home_town').value;

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
                document.getElementById("single_post").innerHTML=ajax_request.responseText;
                //location.href = "single.php";
            }
        }
        ajax_request.open("POST","like_comment_ratting_process.php");
        ajax_request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        ajax_request.send("flag=update_user_profile&first_name="+first_name+"&middle_name="+"&last_name="+"&p_number="+p_number+"&cnic+"+cnic+"&dob="+dob+"&email="+email+"&password="+password+"&gender="+gender+"&home_town="+home_town);

	}
</script> -->
	
<?php
	$query="SELECT *FROM user WHERE user_id=".$_SESSION['user']['user_id'];
	$result = mysqli_query($connection,$query);
	if($result->num_rows)
	{
		while($row=mysqli_fetch_assoc($result))
		{
			?>
	<section class="main-content-w3layouts-agileits" >
		<style type="text/css">
			th{
				margin-left:25px;
			}
		</style>
		<div class="container" id="one" align="center" style="margin-top:-270px">
			<table style="border:2px solid gray;border-radius:100px" cellpadding="30px" cellspacing="10px" width="40%">
				<tr align="center">
					<div class="form-row">
						<td colspan="2"><b style="color:brown"><?php echo $row['first_name']." ".$row['middle_name']." ".$row['last_name'] ?></b></td>
					</div>
				</tr>
				<tr align="center">
					<div class="form-row">
						<td colspan="2"><img style="height:160px" src="../Upload_Images/<?php echo $row['image'] ?>"></td>
					</div>
				</tr>
				<tr>
					<div class="form-row">
						<div class="form-group col-md-6">
								<th>Phone Number</th>
						</div>
						<div class="form-group col-md-6">
								<td><?php echo $row['p_number'] ?></td>
						</div>
					</div>
				</tr>
				<tr>
					<div class="form-row">
						<div class="form-group col-md-6">
								<th>Cnic No</th>
						</div>
						<div class="form-group col-md-6">
								<td><?php echo $row['cnic'] ?></td>
						</div>
					</div>
				</tr>
				<tr>
					<div class="form-row">
						<div class="form-group col-md-6">
								<th>Data of Birth</th>
						</div>
						<div class="form-group col-md-6">
								<td><?php echo $row['dob'] ?></td>
						</div>
					</div>
				</tr>
				<tr>
					<div class="form-row">
						<div class="form-group col-md-6">
								<th>Email</th>
						</div>
						<div class="form-group col-md-6">
								<td><?php echo $row['email'] ?></td>
						</div>
					</div>
				</tr>
				<tr>
					<div class="form-row">
						<div class="form-group col-md-6">
								<th>Password</th>
						</div>
						<div class="form-group col-md-6">
								<td><?php echo $row['password'] ?></td>
						</div>
					</div>
				</tr>
				<tr>
					<div class="form-row">
						<div class="form-group col-md-6">
								<th>Gender</th>
						</div>
						<div class="form-group col-md-6">
								<td><?php echo $row['gender'] ?></td>
						</div>
					</div>
				</tr>
				<tr>
					<div class="form-row">
						<div class="form-group col-md-6">
								<th>Home Town</th>
						</div>
						<div class="form-group col-md-6">
								<td><?php echo $row['home_town'] ?></td>
						</div>
					</div>
				</tr>
				<tr align="center">
					<div class="form-row">
						<td colspan="2">
							<button type="submit" class="btn btn-primary submit mb-4" name="register">UPDATE</button>
						</td>
					</div>
				</tr>
			</table>		
	</div>
</section>
			<?php
		}
	}
?>
					
				
	
<?php
	include_once("../include/footer.php");
?>