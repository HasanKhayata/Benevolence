<?php

$column_first_name = $_GET['first_name'];
$column_last_name = $_GET['last_name'];
$column_birthdate = $_GET['birthdate'];
$column_email = $_GET['email'];
$column_password = md5($_GET['password']);
$column_country_code = $_GET['country_code'];
$column_phone_number = $_GET['phone_number'];
$Active_code = substr(str_shuffle("abcdefghijklmnopqrstuvwxyz123456789"),0,5);
$user_name = "root";
$password = "2255125";
$host = "localhost";
$db_name = "register_db";

$con = mysqli_connect($host,$user_name,$password,$db_name);

$sql = "insert into user_info (first_name,last_name,birthdate,email,password,country_code,phone_number,verification_code) values('$column_first_name','$column_last_name','$column_birthdate','$column_email','$column_password','$column_country_code','$column_phone_number','$Active_code');";

if( mysqli_query($con,$sql))
{
	$message = "Succesfully Registerd";
	echo json_encode(array("Message"=>$message,"Active_code"=>$Active_code));
	require 'emailsending.php';
}

else
{
	$message = "Registeration Failed";
	echo json_encode(array("Message"=>$message));
	
}
mysqli_close($con);



?>