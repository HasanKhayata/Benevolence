<?php
$column_email = $_GET['email'];

$user_name = "root";
$password = "2255125";
$host = "localhost";
$db_name = "register_db";

$con = mysqli_connect($host,$user_name,$password,$db_name);

$sql = "UPDATE user_info SET is_account_active = '1' WHERE email = '$column_email';";


if( mysqli_query($con,$sql))
{
	echo "Your Account is Active Now";
}

else
{
	echo "Your Account Still Not Active";
}

mysqli_close($con);
?>