<?php

$dbz_link="";

$hostName="localhost" ; //database host

$userName="root" ;   //database user

$password="" ;       //password

$databaseName ="insurance" ;      //database name

/*

$hostName="localhost" ; //database host

$userName="telenor_insur" ;   //database user

$password="?Rk-_oAeRUv}" ;       //password

$databaseName ="telenor_insurance" ;      //database name

*/

$dbz_link = mysqli_connect($hostName, $userName, $password,$databaseName);



if (mysqli_connect_errno())

  {

  echo "Failed to connect to MySQL: " . mysqli_connect_error();

  }



function connect_mysql()

{

}



function close_mysql() {

	global $dbz_link;

	   mysqli_close($dbz_link);

	return 1;

}

define('Rec_PerPage', 20);

function count_days( $a, $b )

{

//$gd_a = getdate( $a );

//$gd_b = getdate( $b );

//$a_new = mktime( 12, 0, 0, $gd_a['mon'], $gd_a['mday'], $gd_a['year'] );

//$b_new = mktime( 12, 0, 0, $gd_b['mon'], $gd_b['mday'], $gd_b['year'] );

return ceil( ( $a - $b ) / 86400 );

//echo date('l dS of F Y h:i:s A',strtotime(EXP_DATE)+86399)."<br>";

//echo time();



}

define('weburl', 'http://localhost/webapp/');

define('weburlssl', 'http://localhost/webapp/');

define('PWD_CHANGE_LIMIT', 999); //Number of days after user has to change pwd


?>
