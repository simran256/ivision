<?php
error_reporting(0);
session_start();
$ses_id = session_id();

$host = 'localhost';
$username = 'web2te_iVision-Systech-Pvt-Ltd';
$password = '7xSCMVVhlW&s';
$dbName = 'web2te_iVision-Systech-Pvt-Ltd';

$conn = new mysqli($host,$username,$password,$dbName);
if($conn->connect_errno)
{
	echo $conn->connect_error;
}
else{
    echo "connected";
}
//$site_root = 'https://'.$_SERVER['HTTP_HOST'].'/';
$site_root = 'https://web2tech.org/iVision-Systech-Pvt-Ltd/admin';
$site = 'https://web2tech.org/iVision-Systech-Pvt-Ltd/';

?>