<?php
    require_once("../require/connection.php");
    include_once("include/session_maintenance.php");
    include_once("include/header.php");
    include_once("include/right_icon_menu_bar.php");
    include_once("include/left_side_bar.php");
    include_once("include/right_side_bar.php");
?>
<script type="text/javascript" language="javascript">
    function send_messages_data()
    {
        var message =document.getElementById('message').value;
        //alert(message);
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
                //alert(ajax_request.responseText)
                document.getElementById("message_response").innerHTML=ajax_request.responseText;
                document.getElementById('message').value="";
            }
        }
        ajax_request.open("POST","discussion_process.php");
        ajax_request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        ajax_request.send("flag=send_messages&message="+message);
        
    }
    function show_messages_data()
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
                document.getElementById("show_message_response").innerHTML=ajax_request.responseText;
            }
        }
        ajax_request.open("POST","discussion_process.php");
        ajax_request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        ajax_request.send("flag=show_messages");
        
    }
    function show_online_users()
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
                document.getElementById("show_users_response").innerHTML=ajax_request.responseText;
            }
        }
        ajax_request.open("POST","discussion_process.php");
        ajax_request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        ajax_request.send("flag=show_users");
        
    }
    setInterval(show_messages_data,500);
    setInterval(show_online_users,500);
</script>
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Chat</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i> Admin Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">App</a></li>
                        <li class="breadcrumb-item active">Chat</li>
                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">                
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>                                
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="chat_list">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="zmdi zmdi-search"></i></span>
                                </div>
                                <input type="text" class="form-control" placeholder="Search..." required>
                            </div>
                            <ul class="user_list list-unstyled mb-0 mt-3" id="show_users_response">
                           
                            </ul>
                        </div>
                        <div class="chat_window body">
                         <?php
                        $user_id=$_SESSION['user']['user_id'];
                        $query1="SELECT user.*,log_manage.* FROM user,log_manage 
                        WHERE user.`user_id` = log_manage.`user_id` AND log_manage.`is_active`=1 AND log_manage.user_id=' $user_id' ";
                        $result1 = mysqli_query($connection,$query1);
                        $rows=mysqli_fetch_assoc($result1); ?>
                            <div class="chat-header">
                                <div class="user">
                                    <img src="../Upload_Images/<?php echo $rows['image'] ?>" alt="avatar" />
                                    <div class="chat-about">
                                        <div class="chat-with"><?php echo $rows['first_name']." ".$rows['last_name'] ;?></div>
                                        <div class="chat-num-messages">already 8 messages</div>
                                    </div>
                                </div>
                                <div class="setting">
                                    <a href="javascript:void(0);" class="btn btn-sm btn-warning"><i class="zmdi zmdi-camera"></i></a>
                                    <a href="javascript:void(0);" class="btn btn-sm btn-info"><i class="zmdi zmdi-file-text"></i></a>
                                </div>
                                <a href="javascript:void(0);" class="list_btn btn btn-info btn-round float-md-right"><i class="zmdi zmdi-comments"></i></a>
                            </div>
                            <hr>
                            <ul class="chat-history" id="show_message_response" style="overflow:scroll;">
                               
                            </ul>
                            <div class="chat-box">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="zmdi zmdi-mail-send"></i></span>
                                    </div>
                                    <p id="message_response"></p>
                                    <input type="text" class="form-control" placeholder="Enter text here..." id="message"  required>
                                    <button onclick="send_messages_data()" class="btn btn-info">Send</button>
                                </div>                                                            
                            </div>
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