<?php
session_start();
require "connection.php";
connect_mysql();

if(isset($_SESSION["memname"]))
{
	echo '<script language="javascript">alert("You are already Logged In.");window.location="index.php";</script>';
				exit;
}

$userid=mysqli_real_escape_string($dbz_link,$_POST["userid"]);
$client_type=$_POST["client_type"];
$ip=$_SERVER['REMOTE_ADDR'];

$err="";
if($userid =="" || $userid =="Username")
{
	$err.='email^';	
}

if($err != "")
{

$err=base64_encode($err);
header("location:errorlogin.php?err=".$err);
exit;
}

$query="select * from clients where client_email='".$userid."' and client_type='".$client_type."'";// and password='$pwd'";
$result=mysqli_query($dbz_link,$query);

if(mysqli_num_rows($result)>=1)
{
	
	$r=mysqli_fetch_array($result);
	
	$memname=$r["client_name"];
	$memphone=$r["client_phone"];
	$mememail=$r["client_email"];
	$adminid=$r["client_id"];
	$admintype=$r["client_type"];	
	
	
	
	$_SESSION['memname'] = $memname;
	$_SESSION['memphone'] = $memphone;
	$_SESSION['mememail'] = $mememail;
	$_SESSION['adminid'] = $adminid;
	$_SESSION['admintype'] = $admintype;
	
	header('Location: index.php');
	exit();
	
}
else
{
	$err.='invalidid^';
	$err=base64_encode($err);
	header("location:errorlogin.php?err=".$err);
	exit();	
}

?>