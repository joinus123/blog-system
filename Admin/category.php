<?php
	include_once("include/session_maintenance.php");
	include_once("include/header.php");
	include_once("include/right_icon_menu_bar.php");
	include_once("include/left_side_bar.php");
	include_once("include/right_side_bar.php");
?>
<style type="text/css">
	label{
		color:purple;
		font-size:16px;
	}
</style>
<script type="text/javascript">
	function add_category()
    {
        var category_name =document.getElementById('category_name').value;
        if(category_name=="")
        {
            document.getElementById("category_name_msg").innerHTML="<span style='color:red'>Please Enter Category</span>";
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
                    document.getElementById("category_name_msg").innerHTML=ajax_request.responseText;
                    location.href="category.php";
                }
            }
            ajax_request.open("POST","require/category_process.php");
            ajax_request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
            ajax_request.send("flag=add_category&category_name="+category_name);
        
        }
    }
    function edit_category(category_id)
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
                document.getElementById("update_category").innerHTML=ajax_request.responseText;
            }
        }
        ajax_request.open("POST","require/category_process.php");
        ajax_request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        ajax_request.send("flag=edit_category&category_id="+category_id);
        
       
    }
     function update_category(category_id)
    {
         var updated_category_name =document.getElementById('updated_category_name').value;
        if(updated_category_name =="")
        {
            document.getElementById("updated_category_name_msg").innerHTML="<span style='color:red'>Please Enter Category</span>";
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
                    document.getElementById("updated_category_name_msg").innerHTML=ajax_request.responseText;
                    location.href="category.php";
                }
            }
            ajax_request.open("POST","require/category_process.php");
            ajax_request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
            ajax_request.send("flag=update_category&updated_category_name="+updated_category_name+"&category_id="+category_id);
        
        }
    }
    function delete_category(category_id)
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
                document.getElementById("category_name_msg").innerHTML=ajax_request.responseText;
                location.href="category.php";
            }
        }
        ajax_request.open("POST","require/category_process.php");
        ajax_request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        ajax_request.send("flag=delete_category&category_id="+category_id);
        
    }
</script>
<section class="content blog-page">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Category Management</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i> Admin Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="blog-dashboard.html">Blog</a></li>
                        <li class="breadcrumb-item active">Category</li>
                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">                
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
                </div>
            </div>
        </div>
        <div class="container-fluid" id="update_category">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                    	<label>Category Title</label>
                        <div class="body">
                            <div class="form-group">
                                <input id="category_name" type="text" class="form-control" placeholder="Enter Category title" />
                                <span id="category_name_msg"></span>
                            </div>
                        </div>
                    </div>
                   <div class="form-group" align="center">
                        <button type="button" class="btn btn-info waves-effect m-t-20" onclick="add_category()">ADD CATEGORY</button>
                   </div>	   
                </div>            
            </div>
        </div>

        <div class="container-fluid">
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header" align="center">
                            <h2><strong><b>VIEW </strong> ALL CATEGORIES </b></h2>
                            <ul class="header-dropdown">
                                <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="zmdi zmdi-more"></i> </a>
                                    <ul class="dropdown-menu dropdown-menu-right slideUp">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else</a></li>
                                    </ul>
                                </li>
                                <li class="remove">
                                    <a role="button" class="boxs-close"><i class="zmdi zmdi-close"></i></a>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable" >
                                    <thead class="thead-dark" align="center">
                                        <tr>
                                            <th style="width:25px">S:No</th>
                                            <th>Category</th>
                                            <th style="width:165px">Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot class="thead-dark" align="center">
                                        <tr>
                                            <th style="width:25px">S:No</th>
                                            <th>Category</th>
                                            <th style="width:50px">Action</th>
                                        </tr>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        
                                        <?php
                                            require_once("../require/connection.php");
                                            $query="SELECT *FROM category WHERE category.status_id !=6 
                                                ORDER BY category_id DESC"; 
                                            $result=mysqli_query($connection,$query);
                                            if($result->num_rows)
                                            {   $c=1;
                                                while($row=mysqli_fetch_assoc($result))
                                                {
                                                    ?>
                                                    <tr align="center">
                                                        <td><b style="color:#FF5722"><?php echo $c++ ?></b></td>
                                                        <td><b style="color:#000000"><?php echo $row['category_name'] ?></b></td>
                                                        <td tyle="width:50px">
                                                            <button onclick="edit_category(<?php echo $row['category_id'];?>)" class="btn btn-primary btn-sm"><i class="zmdi zmdi-edit"></i></button>
                                                            <button onclick="delete_category(<?php echo $row['category_id'];?>)" class="btn btn-danger btn-sm"><i class="zmdi zmdi-delete"></i></button>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                }
                                            }
                                        ?>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</section>
<?php
	include_once("include/end_file.php");
?>