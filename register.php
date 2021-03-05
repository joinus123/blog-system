<?php
	require_once("require/connection.php");
	include_once("include/header.php");
?>
<script type="text/javascript" language="language">

	function email_varification()
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
			ajax_request.open("POST","register_process.php");
			ajax_request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
			ajax_request.send("flag=email_varification&email="+email);
			
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
	      error = false;
	     document.getElementById('image_msg').innerHTML="<span>Please Upload Image</span>";
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
	<!--/main-->
	<section class="main-content-w3layouts-agileits">
		<div class="container" id="one">
			<h3 class="tittle">Register Now</h3>
			<?php
	         if(isset($_GET['message']))
	         {
	          ?><div style="color:red;" align="center"><?php echo $_GET['message'];?></div><br/><?php
	         }
	        ?>
				<div class="inner-sec">
			<div class="login p-5 bg-light mx-auto mw-100">
			<form action="register_process.php"  method="POST" enctype="multipart/form-data" 
			onsubmit="return form_validation()">
							<div class="form-row">
								<div class="col-md-6 mb-3">
										<label for="validationCustom01">First name</label>

									<input  style="color:black" type="text" class="form-control" id="f_name" name="first_name" placeholder="Minimum one alphabet required" >
									<span id="f_name_msg" style="color:red"></span>
								</div>
								<div class="col-md-6 mb-3">
										<label for="validationCustom02">Middle Name</label>
									<input  style="color:black" type="text" class="form-control" id="m_name" name="middle_name"  placeholder="Minimum one alphabet required or empty" >
									<span id="m_name_msg" style="color:red"></span>
								</div>
							</div>
							<div class="form-row">
								<div class="col-md-6 mb-3">
										<label for="validationCustom02">Last name</label>
									<input  style="color:black" type="text" class="form-control" id="l_name" name="last_name"  placeholder="Minimum one alphabet required" >
									<span id="l_name_msg" style="color:red"></span>
								</div>
								<div class="col-md-6 mb-3">
										<label for="validationCustom02">Phone Number</label>
									<input  style="color:black" type="text" class="form-control" id="p_number" name="p_number"  placeholder="0331-2477922" >
									<span id="p_number_msg" style="color:red"></span>
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-md-6">
										<label for="exampleInputPassword2 mb-2">Email</label>
										<input  style="color:black" type="email" class="form-control" placeholder="Minimum five digit/character/special-character"  name="email" id="email" onblur="email_varification()">
										<span id="email_msg" style="color:red"></span>
								</div>
								<div class="form-group col-md-6">
										<label for="exampleInputPassword1 mb-2">Password</label>
									<input  style="color:black" type="password" class="form-control"  placeholder="Minimum five digit/character/special-character"  name="password" id="password">
									<span id="password_msg" style="color:red"></span>
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-md-6">
										<label for="exampleInputPassword2 mb-2">Date of Birth</label>
										<input style="color:black" type="text" class="form-control" name="dob" placeholder="DOB format: 10-MARCH-1995"  id="dob">
										<span id="dob_msg" style="color:red"></span>
								</div>
								<div class="form-group col-md-6">
										<label for="exampleInputPassword1 mb-2">CNIC</label>
									<input  style="color:black" type="text" class="form-control" name="cnic" placeholder="CNIC format: 44102-1234567-8"  id="cnic" >
									<span id="cnic_msg" style="color:red"></span>
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-md-6">
										<label for="exampleInputPassword2 mb-2">Gender</label>
										<span class="form-control"><input style="margin-left:45px;" type="radio"  name="gender[]" placeholder=""  value="Male" id="male" >
											&nbsp&nbsp&nbspMale&nbsp&nbsp&nbsp&nbsp&nbsp
										<input  type="radio" name="gender[]" placeholder=""  value="Female" id="female">&nbsp&nbsp&nbspFemale</span>
										<span id="gender_msg" style="color:red;"></span>
								</div>
								<div class="form-group col-md-6">
										<label for="exampleInputPassword1 mb-2">Upload Image</label>
									<input  style="color:black" type="file" class="form-control"  placeholder=""  name="image" id="image">
									<span id="image_msg" style="color:red"></span>
								</div>
								<div class="form-group col-md-12">
										<label for="exampleInputPassword1 mb-2" style="margin-bottom:5px">Home Town</label>
									<textarea  style="color:black" placeholder="Please enter your Home Town address..!" name="home_town" cols="69" id="home_town"></textarea>
									<span id="home_town_msg" style="color:red"></span>
								</div>
							</div>
							<button type="submit" class="btn btn-primary submit mb-4" name="register">Register</button>
								<p>
									For Sign-In<a href="login.php"> Click Here</a>
								</p>
						</form>
		
					</div>
			</div>
		</div>
	</section>
	<!--//main-->
<?php
	//include_once("include/left_side.php");
	//include_once("include/right_side.php");
	include_once("include/footer.php");
?>