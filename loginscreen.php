<?php
$column_email = $_GET['email'];
$column_password = md5($_GET['password']);
$Active_code = substr(str_shuffle("abcdefghijklmnopqrstuvwxyz123456789"),0,5);
$user_name = "root";
$password = "2255125";
$host = "localhost";
$db_name = "register_db";

$con = mysqli_connect($host,$user_name,$password,$db_name);
$sql = "SELECT * from user_info WHERE email = '$column_email' AND  password ='$column_password';";
$result =  mysqli_query($con,$sql);
$row = mysqli_num_rows($result);
//$res = array();
if($result&&$row>0)
{
	
while($myrow = mysqli_fetch_array($result))
{
	
echo json_encode(array("is_account_active"=>$myrow["is_account_active"],"Active_code"=>$Active_code));
if($myrow["is_account_active"]==0)
	{
	$sql2 = "UPDATE user_info SET verification_code = '$Active_code' WHERE email = '$column_email';";
	mysqli_query($con,$sql2);
	require 'emailsending.php';
	}
}
	

//echo json_encode($res);
}
else{
	$message = "Incorrect Email or Password";
	echo json_encode(array("Message"=>$message,"is_account_active"=>null));
}
mysqli_close($con);


?>
