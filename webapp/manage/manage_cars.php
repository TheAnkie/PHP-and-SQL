<?php
session_start();
if(!isset($_SESSION['memname']))
{
header('Location:index.html');
exit;
}

//require("hft_image.php");
require "connection.php";

connect_mysql();


$act = $_GET['act'];
if($act == "")
$act = $_POST['act'];
if($act == "add")
{	
	
	if (get_magic_quotes_gpc()) 
	{		
		$car_register_no = $_POST['car_register_no'];	
		$car_make = $_POST['car_make'];	
		$car_year_register = $_POST['car_year_register'];	
		$car_year_manufacture = $_POST['car_year_manufacture'];						
	}
	else
	{		
		$car_register_no = addslashes($_POST['car_register_no']);	
		$car_make = addslashes($_POST['car_make']);	
		$car_year_register = addslashes($_POST['car_year_register']);	
		$car_year_manufacture = addslashes($_POST['car_year_manufacture']);						
	}
	
	$err="";
	
		
	if($car_register_no == "")
	{
		$err.='car_register_no^';	
	}
	if($car_make == "")
	{
		$err.='car_make^';	
	}
	if($car_year_register == "")
	{
		$err.='car_year_register^';	
	}
	if($car_year_manufacture == "")
	{
		$err.='car_year_manufacture^';	
	}
	
	
	if($err != "")
	{	
		$err=base64_encode($err);
		addval();
		header("location:add_car.php?err=".$err);
		exit;
	}	
	
	
	$q="select * from cars where car_register_no='".$car_register_no."'";
	$rs=mysqli_query($dbz_link,$q);
	if(mysqli_num_rows($rs) > 0)
	{
		$err.='rec_exist_car^';	
		$err=base64_encode($err);
		addval();
		header("location:add_car.php?err=".$err);
		exit;
	}
	
	$_SESSION['car_register_no'] = $car_register_no;
	$_SESSION['car_make'] = $car_make;
	$_SESSION['car_year_register'] = $car_year_register;
	$_SESSION['car_year_manufacture'] = $car_year_manufacture;
	
	header("location:add_car2.php?err=".$err);
	exit;
	
	
}
else if($act == "add2")
{	
	
	if($_SESSION['policy_id'] == "")
	{
		$err.='car_policy^';	
	}
	if($err != "")
	{	
		$err=base64_encode($err);
		//addval();
		header("location:add_car2.php?err=".$err);
		exit;
	}	
	
	$qry="INSERT INTO cars (client_id, car_register_no, car_make, car_year_register, car_year_manufacture, policy_id, date_added, is_claim) VALUES ('".$_SESSION['adminid']."', '".$_SESSION['car_register_no']."', '".$_SESSION['car_make']."', '".$_SESSION['car_year_register']."', '".$_SESSION['car_year_manufacture']."', '".$_SESSION['policy_id']."', curdate(), 'n')";
	
	$res=mysqli_query($dbz_link,$qry);
	if($res)
	{				
		$aid=mysqli_insert_id($dbz_link);
		unset($_SESSION['car_register_no']);
		unset($_SESSION['car_make']);
		unset($_SESSION['car_year_register']);
		unset($_SESSION['car_year_manufacture']);
		unset($_SESSION['policy_id']);
						
		echo '<script language="javascript">alert("Car successfully registered.");window.location="index.php";</script>';
		exit;
						
	}
	else
	{
		$err.="adderror^";
		$err=base64_encode($err);		
		addval();					
		header("location:add_car.php?err=".$err);
		exit;				
	}	
	
	
}
else if($act == "add_claim")
{		
	if (get_magic_quotes_gpc()) 
	{		
		$accident_date = $_POST['accident_date'];	
		$damage = $_POST['damage'];	
			
	}
	else
	{		
		$accident_date = addslashes($_POST['accident_date']);	
		$damage = addslashes($_POST['damage']);	
		
	}
	
	
	$err="";
		
	if($accident_date == "")
	{
		$err.='accident_date^';	
	}
	if($damage == "")
	{
		$err.='damage^';	
	}
	if($err != "")
	{	
		$err=base64_encode($err);
		//addval();
		header("location:car_claim.php?id=".$_POST['id']."&err=".$err);
		exit;
	}	
	
	$q="select is_claim from cars where client_id='".$_SESSION['adminid']."' and id=".$_POST['id'];
	$rs=mysqli_query($dbz_link,$q);
	if(mysqli_num_rows($rs) > 0)
	{
		$r=mysqli_fetch_array($rs);
	
		if($r["is_claim"]=="y")
		{
			echo '<script language="javascript">alert("Invalid claim.");window.location="show_policies.php";</script>';
			exit;
		}
	}
	
	$q="select client_id from clients where client_type='inspector' order by RAND() limit 1";
	$rs=mysqli_query($dbz_link,$q);
	if(mysqli_num_rows($rs) > 0)
	{
		$rr=mysqli_fetch_array($rs);
		$inspector_id=	$rr["client_id"];
	}
	else
	{
		$inspector_id=	1;
	}
		
	$qry="INSERT INTO claims (car_id, accident_date, damage, date_added, claim_status, claim_assign_to) VALUES ('".$_POST['id']."', '".$accident_date."', '".$damage."',  curdate(), 'n', '".$inspector_id."')";
	
	$res=mysqli_query($dbz_link,$qry);
	if($res)
	{
	
	$qry="update cars set 
		is_claim='y', 
		last_updated=curdate()  
		where client_id='".$_SESSION['adminid']."' and id=".$_POST['id'];			
		$res=mysqli_query($dbz_link,$qry);
		if($res)
		{
			$err.="updateok^";
			$err=base64_encode($err);					
			
			header("location:show_policies.php?err=".$err);
			exit;
			
		}
		else
		{
			$err.="updateerror^";
			$err=base64_encode($err);		
			//addval();					
			header("location:show_policies.php?err=".$err);
			exit;				
		}
	}
	
	
}
else
{
echo "Invalid Request";exit;	
}


function addval()
{
	///////addition of fields in session//////
	$_SESSION['frm']['car_register_no']=$_POST['car_register_no'];
	$_SESSION['frm']['car_make']=$_POST['car_make'];
	$_SESSION['frm']['car_year_register']=$_POST['car_year_register'];
	$_SESSION['frm']['car_year_manufacture']=$_POST['car_year_manufacture'];
	
	
	///////////////////////////////////////////////
}
?>	