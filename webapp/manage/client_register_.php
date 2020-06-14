<?php
session_start();

//require("hft_image.php");
require "connection.php";

connect_mysql();
function validate_phone_number($phone)
{
     // Allow +, - and . in phone number
     $filtered_phone_number = filter_var($phone, FILTER_SANITIZE_NUMBER_INT);
     // Remove "-" from number
     $phone_to_check = str_replace("-", "", $filtered_phone_number);
     $phone_to_check = str_replace("a", "", $filtered_phone_number);
     $phone_to_check = str_replace("b", "", $filtered_phone_number);
     $phone_to_check = str_replace("c", "", $filtered_phone_number);
     $phone_to_check = str_replace("d", "", $filtered_phone_number);
     $phone_to_check = str_replace("e", "", $filtered_phone_number);
     $phone_to_check = str_replace("f", "", $filtered_phone_number);
     $phone_to_check = str_replace("g", "", $filtered_phone_number);
     $phone_to_check = str_replace("h", "", $filtered_phone_number);
     $phone_to_check = str_replace("i", "", $filtered_phone_number);
     $phone_to_check = str_replace("A", "", $filtered_phone_number);
     $phone_to_check = str_replace("B", "", $filtered_phone_number);
     $phone_to_check = str_replace("C", "", $filtered_phone_number);
     $phone_to_check = str_replace("D", "", $filtered_phone_number);
     $phone_to_check = str_replace("E", "", $filtered_phone_number);
     $phone_to_check = str_replace("F", "", $filtered_phone_number);
     $phone_to_check = str_replace("G", "", $filtered_phone_number);

     // Check the lenght of number
     // This can be customized if you want phone number from a specific country
     if (strlen($phone_to_check) < 11 || strlen($phone_to_check) > 11) {
        return false;
     } else {
       return true;
     }
    }


$act = $_GET['act'];
if($act == "")
$act = $_POST['act'];
if($act == "add")
{	
	
	if (get_magic_quotes_gpc()) 
	{		
		$client_name = $_POST['client_name'];	
		$client_phone = $_POST['client_phone'];	
		$client_email = $_POST['client_email'];	
		
	}
	else
	{		
		$client_name = addslashes($_POST['client_name']);	
		$client_phone = addslashes($_POST['client_phone']);	
		$client_email = addslashes($_POST['client_email']);	
			
	}
	
	$err="";
	$email1 = $client_email;
	$phone = $client_phone;
		
	if($client_name == "")
	{
		$err.='name^';	
	}
	if($client_phone == "")
	{
		$err.='phone^';	
	}
	if($client_email == "")
	{
		$err.='email^';	
	}
	if((!filter_var($email1, FILTER_VALIDATE_EMAIL)))
	{
		$err.='email^';	


	}
	if (validate_phone_number($phone) == false) 
	{
		$err.='phone^';
	}

	
	
	if($err != "")
	{	
		$err=base64_encode($err);
		//addval();
		header("location:client_register.php?err=".$err);
		exit;
	}	
	
	
	$q="select * from clients where client_email='".$client_email."'";
	$rs=mysqli_query($dbz_link,$q);
	if(mysqli_num_rows($rs) > 0)
	{
		$err.='rec_exist^';	
		$err=base64_encode($err);
		//addval();
		header("location:client_register.php?err=".$err);
		exit;
	}
	
	
	$qry="INSERT INTO clients (client_name, client_phone, client_email, client_type, date_added) VALUES ('".$client_name."', '".$client_phone."', '".$client_email."', '".$_POST['client_type']."', curdate())";
			$res=mysqli_query($dbz_link,$qry);
			if($res)
			{				
				$aid=mysqli_insert_id($dbz_link);
								
				echo '<script language="javascript">alert("You have successfully registered. Please Login to register car(s).");window.location="index.html";</script>';
				exit;
								
			}
			else
			{
				$err.="adderror^";
				$err=base64_encode($err);		
				//addval();					
				header("location:client_register.php?err=".$err);
				exit;				
			}			
	
	
	
}
else
{
	echo 'Invalid Request.';
				exit;
}


function addval()
{
	///////addition of fields in session//////
	$_SESSION['frm']['client_name']=$_POST['client_name'];
	$_SESSION['frm']['client_phone']=$_POST['client_phone'];
	$_SESSION['frm']['client_email']=$_POST['client_email'];
	$_SESSION['frm']['client_type']=$_POST['client_type'];
	
	
	///////////////////////////////////////////////
}
?>	