<?php
session_start();
if(!isset($_SESSION['memname']))
{
header('Location:index.html');
exit;
}

if($_SESSION['admintype'] != "inspector")
{
	echo '<script language="javascript">alert("You are no allowed to access this page.");window.location="index.php";</script>';
	exit;
}

//require("hft_image.php");
require "connection.php";

connect_mysql();


$act = $_GET['act'];
if($act == "")
$act = $_POST['act'];
if($act == "accept")
{
	$id=$_GET['id'];
	
	$q="update claims set claim_status='a' where id=".$id;
	$rs=mysqli_query($dbz_link,$q);
	if($rs)
	{
		$err.="updateok^";
		$err=base64_encode($err);		
							
		header("location:view_claim.php?id=".$id."&err=".$err);
		exit;	
	}
	else
	{
		$err.="updateerror^";
		$err=base64_encode($err);		
							
		header("location:view_claim.php?id=".$id."&err=".$err);
		exit;
	}
}
else if($act == "reject")
{
	$id=$_GET['id'];
	
	$q="update claims set claim_status='r' where id=".$id;
	$rs=mysqli_query($dbz_link,$q);
	if($rs)
	{
		$err.="updateok^";
		$err=base64_encode($err);		
							
		header("location:view_claim.php?id=".$id."&err=".$err);
		exit;	
	}
	else
	{
		$err.="updateerror^";
		$err=base64_encode($err);		
							
		header("location:view_claim.php?id=".$id."&err=".$err);
		exit;
	}
}
else
{
echo "Invalid Request";exit;	
}



?>	