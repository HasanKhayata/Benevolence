<?php
$column_email = $_GET['email'];
$column_password = md5($_GET['password']);
$user_name = "root";
$password = "2255125";
$host = "localhost";
$db_name = "register_db";

$con = mysqli_connect($host,$user_name,$password,$db_name);
$sql = "UPDATE user_info SET password = '$column_password' WHERE email = '$column_email';";
$result =  mysqli_query($con,$sql);

if( mysqli_query($con,$sql))
{
	echo "your password has been updated";
}
else
{
	echo "there is problem try again";
}
mysqli_close($con);
?>