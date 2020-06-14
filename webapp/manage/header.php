<?php
session_start();
include("messages.php");
$thispage=$_SERVER['PHP_SELF'];
require "connection.php";
connect_mysql();
//echo $_COOKIE['siuad'];

if(!isset($_SESSION["memname"]))
{
	header('Location:index.html');
	exit;
}



function formatdt($dt)
{
	$edate1=explode("-",$dt);
	$ey1=$edate1[0];
	$em1=$edate1[1];
	$ed1=$edate1[2];
	
	if(substr($em1,0,1) == "0")
		$em2=substr($em1,1);
	else
		$em2=$em1;
		
	if(substr($ed1,0,1) == "0")
		$ed2=substr($ed1,1);
	else
		$ed2=$ed1;
	//$nd=date("d.m.",mktime(0,0,0,$em2,$ed2,date("Y")));	
	//$nd.=$ey1;
	$nd=$ed1."-".$em1."-".$ey1;
	return $nd;
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
<script type="text/JavaScript">
<!--
function GP_popupConfirmMsg(msg) { //v1.0
  document.MM_returnValue = confirm(msg);
}
//-->
</script>   
<style>
.checked-bgr{
    background-color:#f2f2f2; 
}

</style>     
    </head>
    <body class="skin-blue">
        <!-- header logo: style can be found in header.less -->
        <header class="header">
            <a href="index.php" class="logo">
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
            <?php /*?><img src="img/amiwa.png" alt="Health Ways Lab" height="28"><?php */?>Car Insurance</a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-right">
                    <ul class="nav navbar-nav">
                    
                        <!-- Notifications: style can be found in dropdown.less -->
                        
                        <!-- Tasks: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="../adm_usrs/nopic.jpg" alt="User Image" width="24" class="img-circle" />
                                <span><?= $_SESSION['memname']; ?> <i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header bg-light-blue">
                                    <img src="../adm_usrs/nopic.jpg" width="74" class="img-circle" alt="User Image" />
                                    <p>
                                        <?= $_SESSION['memname']; ?>
                                    </p>
                                </li>
                                
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    
                                    <div class="pull-right">
                                    <a href="logout.php" onclick="GP_popupConfirmMsg('Do you want to logout?');return document.MM_returnValue" class="btn btn-default btn-flat">Sign out</a>
                                        
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>