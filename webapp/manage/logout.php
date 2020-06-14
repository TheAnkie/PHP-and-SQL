<?php
session_start();
if(!isset($_SESSION["memname"]))
{

header('Location:index.html');

}
require "connection.php";
connect_mysql();
$memname=$_SESSION["memname"];


//$_SESSION['logtimeid'] = $logtimeid;
//$_SESSION['logtime'] = time();
$tmm=time();
$tottime=$tmm - $_SESSION['logtime'];
$q="update user_logins set logtime_out='".$tmm."', totaltime='".$tottime."' where id='".$_SESSION['logtimeid']."'";
$rs=mysqli_query($dbz_link,$q);

/*$nuname=$_SESSION['memfname']." ".$_SESSION['memlname'];
$q="update updateduser set logout_sec='".$nuname."'";
mysqli_query($dbz_link,$q) or die (mysqli_error($dbz_link));

$q="update updatetime set logout_sec='".time()."'";
mysqli_query($dbz_link,$q) or die (mysqli_error($dbz_link));*/

//session_unregister($memname);
unset($_SESSION["memname"]);
session_unset();
session_destroy();
echo '<script language="javascript">window.location="index.html";</script>';
//header('Location:index.html');
exit;
?>

