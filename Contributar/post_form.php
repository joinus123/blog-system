<?php
    include_once("include/session_maintenance.php");
     require_once("../require/connection.php");
?>
<!doctype html>
<html class="no-js " lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">
<title>:: Aero Bootstrap4 Admin ::</title>
<link rel="icon" href="favicon.ico" type="image/x-icon">
<!-- Favicon-->
<link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/plugins/dropify/css/dropify.min.css">
<link rel="stylesheet" href="assets/plugins/summernote/dist/summernote.css"/>
<link rel="stylesheet" href="assets/plugins/bootstrap-select/css/bootstrap-select.css" />
<!-- Custom Css -->
<link rel="stylesheet" href="assets/css/style.min.css">
<script type="text/javascript">
    function total_attachment()
    {
        var no_of_attachment =document.getElementById('no_of_attachment').value;
        //alert(no_of_attachment);
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
                document.getElementById("total_attachment_response").innerHTML=ajax_request.responseText;
            }
        }
        ajax_request.open("POST","require/post_process.php");
        ajax_request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        ajax_request.send("flag=total_attachment&no_of_attachment="+no_of_attachment);
        
       
    }
    function select_type(number)
    {
        if(number==1)
        {
            var set_attribute =document.getElementById('type1').value;
            
        }
        else if(number==2) {
            var set_attribute =document.getElementById('type2').value;
            
        }
        else if(number==3) {
            var set_attribute =document.getElementById('type3').value;
           
        }
        else if(number==4) {
            var set_attribute =document.getElementById('type4').value;
           
        }
        else if(number==5) {
            var set_attribute =document.getElementById('type5').value;
            
        }
        else if(number==6) {
            var set_attribute =document.getElementById('type6').value;
           
        }
        else if(number==7) {
            var set_attribute =document.getElementById('type7').value;
            
        }
        else if(number==8) {
            var set_attribute =document.getElementById('type8').value;
           
        }
        else if(number==9) {
            var set_attribute =document.getElementById('type9').value;
            
        }
        else if(number==10) {
            var set_attribute =document.getElementById('type6').value;
            
        }
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
                document.getElementById("upload_file"+number).innerHTML=ajax_request.responseText;
            }
        }
        ajax_request.open("POST","require/post_process.php");
        ajax_request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        ajax_request.send("flag=type_of_attachment&set_attribute="+set_attribute);
        
    }
</script>
</head>
<body class="theme-blush">

<!-- Overlay For Sidebars -->
<div class="overlay"></div>

<?php
    include_once("include/right_icon_menu_bar.php");
    include_once("include/left_side_bar.php");
    include_once("include/right_side_bar.php");
?>
<style type="text/css">
    label{
        color:purple;
        font-size:20px;
    }
</style>

<section class="content blog-page">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Add Post</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i> Contributar Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="blog-dashboard.html">Blog</a></li>
                        <li class="breadcrumb-item active">New Post</li>
                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">                
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
                </div>
            </div>
        </div>
        <div class="container-fluid">
     <?php
         if(isset($_GET['message']))
         {
          ?>
            <div class="alert alert-success" role="alert">
              <div class="container">
                  <div class="alert-icon">
                      <i class="zmdi zmdi-thumb-up"></i>
                  </div>
                   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">
                          <i class="zmdi zmdi-close"></i>
                      </span>
                  </button>
                  <div align="center"><strong>Well done..!</strong> <b><?php echo $_GET['message'];?></b></div>
                 
              </div>
            </div> 
      <?php
         }
        ?>
        <?php
         if(isset($_GET['draft']))
         {
          ?>
            <div class="alert alert-info" role="alert">
              <div class="container">
                  <div class="alert-icon">
                      <i class="zmdi zmdi-thumb-up"></i>
                  </div>
                   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">
                          <i class="zmdi zmdi-close"></i>
                      </span>
                  </button>
                  <div align="center"><b><?php echo $_GET['draft'];?></b></div>
                 
              </div>
            </div> 
      <?php
         }
        ?>
            <form action="require/post_process.php" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <label>Title</label>
                        <div class="body">
                            <div class="form-group">
                                <input type="text" class="form-control" name="p_title" placeholder="Enter Blog title" />
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <label>Category</label>
                        <div class="body">
                            <select class="form-control show-tick" name="p_category">
                                <option>Select Category --></option>
                                  <?php
                                 $query="SELECT * FROM category"; 
                                  $result=mysqli_query($connection,$query);
                                  if($result->num_rows)
                                  {
                                      while ($row=mysqli_fetch_assoc($result)) 
                                      {
                                         ?>
                                              <option value="<?php echo $row['category_id'] ?>" >
                                                <?php echo $row['category_name'] ?></option>
                                         <?php
                                      }
                                  }
                                  ?>
                            </select>
                        </div>
                    </div>
                    <!-- <div class="card">
                        <label>Category</label>
                        <div class="body">
                            <select class="form-control show-tick" name="p_category">
                                <option>Select Category --</option>
                                <option >Web Design</option>
                                <option>Photography</option>
                                <option>Technology</option>
                                <option>Lifestyle</option>
                                <option>Sports</option>
                            </select>
                        </div>
                    </div> -->
                    <div class="card">
                        <label>Summary</label>
                        <div class="body">
                            <textarea style="color:black;" rows="4" class="form-control no-resize"  placeholder="Please enter Summary about post..!" name="p_summary"></textarea>
                        </div>
                    </div>
                    <div class="card">
                        <label>Description</label>
                        <div class="body">
                            <textarea style="color:black;" rows="8" class="form-control no-resize"  placeholder="Please enter Description about post..!" name="p_description" ></textarea>
                        </div>
                    </div>
             
                   <!--  <div class="card">
                        <label>Description</label>
                        <div class="body">
                            <div class="summernote">
                               
                            </div>
                        </div>
                    </div> -->
                     <div class="card">
                        <label>Total Attachment</label>
                        <div class="body">
                            <select class="form-control show-tick" id="no_of_attachment" onchange="total_attachment()">
                                <option>Select Attachment</option>
                               <?php
                               for($i=1;$i<=10;$i++)
                               {
                                    ?>
                                    <option value="<?php echo $i ?>"><?php echo $i ?></option>
                                    <?php
                               }
                               ?>
                            </select>
                        </div>
                    </div>
                     <span class="body">
                         <div style="width:20%;display:inline-block" id="total_attachment_response">

                         </div>
                         
                    </span>
                   <div class="form-group" align="center">
                        <button type="submit" class="btn btn-info waves-effect m-t-20" name="add_post">ADD POST</button>
                        &nbsp&nbsp&nbsp&nbsp&nbsp
                        <button type="submit" class="btn btn-info waves-effect m-t-20" name="draft_post">DRAFT POST</button>
                   </div>      
                </div>            
            </div>
    </form>
        </div>
    </div>
</section>
<!-- Jquery Core Js --> 
<!-- <script src="assets/bundles/libscripts.bundle.js"></script> --><!-- Lib Scripts Plugin Js  -->
<script src="assets/bundles/vendorscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js --> 
<script src="assets/plugins/dropzone/dropzone.js"></script> <!-- Dropzone Plugin Js --> 
<script src="assets/plugins/dropify/js/dropify.min.js"></script>
<script src="assets/bundles/mainscripts.bundle.js"></script><!-- Custom Js -->
<script src="assets/js/pages/forms/dropify.js"></script>
<script src="assets/plugins/summernote/dist/summernote.js"></script>
</body>
</html>

    