﻿<?php
include ("messages.php");
$errmsg="";
if(isset($_GET['err']))
{
	$err=$_GET['err'];
	$err=base64_decode($err);
	$error=explode("^",$err);
///	echo count($error);
	$errmsg="";
	
	for($x=0;$x<count($error)-1;$x++)
	{
		//echo $error[$x];
		if($errmsg =="")
		{
			$errmsg=$msg_arr[$error[$x]];
		}
		else
		$errmsg .="<br>".$msg_arr[$error[$x]];
	}
	//echo $errmsg;
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Dashboard</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Morris chart -->
        <link href="css/morris/morris.css" rel="stylesheet" type="text/css" />
        <!-- jvectormap -->
        <link href="css/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
        <!-- Date Picker -->
        <link href="css/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
        <!-- Daterange picker -->
        <link href="css/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
        <!-- bootstrap wysihtml5 - text editor -->
        <link href="css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="css/custom.css" rel="stylesheet" type="text/css" />

<link href='//fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
        
  <script language="JavaScript">

function chk(a,val)
{
	if(a.value==val)
	a.value="";
}
function chk2(a,val)
{
	if(a.value=="")
	a.value=val;
}

function check1()
{	
	if(document.frm.client_name.value=="")
	{
		alert("Please enter your Name");
		document.frm.client_name.focus();
	}
	else if(document.frm.client_phone.value=="")
	{
		alert("Please enter your Phone Number");
		document.frm.client_phone.focus();
	}
	else if(document.frm.client_email.value=="")
	{
		alert("Please enter an Email Address");
        // alert("Enter valid email address");
		document.frm.client_email.focus();
	}
	else
	{
		document.frm.action='client_register_.php';
		document.frm.submit();	
	}
	
}


</script>      
    </head>
    <body class="skin-blue login-bg" onLoad="document.frm.userid.focus();">
        <!-- header logo: style can be found in header.less -->
        
        <div class="wrapper row-offcanvas row-offcanvas-left">
           
           <div class="form-box" id="login-box">
            <div class="header">New Client Sign Up</div>
            <form id="frm" name="frm" method="post" action="javascript:check1()">
                <div class="body bg-gray">
                 <?php	if($errmsg !=""){ ?>
                  
                    <?php include("errors.php"); ?>
                    					
                <?php } ?>
                
                	<div class="form-group">
                    <label for="client_name">Name</label>
                        <input type="text" name="client_name" id="client_name" class="form-control" placeholder="Your Name" />
                    </div>
                    
                    <div class="form-group">
                    <label for="client_phone">Phone (A valid phone number without "-")</label>
                        <input type="text" name="client_phone" id="client_phone" class="form-control" placeholder="Phone Number" />
                    </div>
                    
                    <div class="form-group">
                    <label for="client_email">Email Address</label>
                        <input type="text" name="client_email" id="client_email" class="form-control" placeholder="Email Address" />
                    </div>
                    
              </div>
                <div class="footer">                    
                    
                    <input name="client_type" type="hidden" id="client_type" value="client" />
                    <input name="act" type="hidden" id="act" value="add" />
                    <button type="submit" class="btn bg-olive btn-block">Register</button> <br>
                    <button type="button" class="btn bg-olive btn-block" onClick="javascript:window.location='index.html';">Back to Login</button> 
                   
                </div>
            </form>

            
        </div>
           
        </div><!-- ./wrapper -->

        <!-- add new calendar event modal -->


        <!-- jQuery 2.0.2 -->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <!-- jQuery UI 1.10.3 -->
        <script src="js/jquery-ui-1.10.3.min.js" type="text/javascript"></script>
        <!-- Bootstrap -->
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <!-- Morris.js charts -->
        <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
        <script src="js/plugins/morris/morris.min.js" type="text/javascript"></script>
        <!-- Sparkline -->
        <script src="js/plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
        <!-- jvectormap -->
        <script src="js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
        <script src="js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
        <!-- jQuery Knob Chart -->
        <script src="js/plugins/jqueryKnob/jquery.knob.js" type="text/javascript"></script>
        <!-- daterangepicker -->
        <script src="js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
        <!-- datepicker -->
        <script src="js/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
        <!-- Bootstrap WYSIHTML5 -->
        <script src="js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
        <!-- iCheck -->
        <script src="js/plugins/iCheck/icheck.min.js" type="text/javascript"></script>

        <!-- AdminLTE App -->
        <script src="js/AdminLTE/app.js" type="text/javascript"></script>

        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="js/AdminLTE/dashboard.js" type="text/javascript"></script>

        <!-- AdminLTE for demo purposes -->
        <script src="js/AdminLTE/demo.js" type="text/javascript"></script>

    </body>
</html>