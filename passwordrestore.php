<?php
$column_email = $_GET['email'];
$Active_code = substr(str_shuffle("abcdefghijklmnopqrstuvwxyz123456789"),0,5);
$user_name = "root";
$password = "2255125";
$host = "localhost";
$db_name = "register_db";

$con = mysqli_connect($host,$user_name,$password,$db_name);
$sql1 = "SELECT email from user_info WHERE email = '$column_email';";
$result =  mysqli_query($con,$sql1);
$row = mysqli_num_rows($result);
if($result&&$row>0)
{
	$sql2 = "UPDATE user_info SET verification_code = '$Active_code' WHERE email = '$column_email';";
	mysqli_query($con,$sql2);
	require 'emailsending.php';
	echo "$Active_code";
}
else{
	echo "Invailed Email";
}
mysqli_close($con);
?>