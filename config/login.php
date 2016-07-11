<?php
date_default_timezone_set('Asia/Muscat');
include_once('../db.php');   //connect to database 
$fname3 = $_POST['fname3'];
$password3 = sha1($_POST['password3']);
session_start();



$success=false;

					
$conn=db_connect();   

$result=mysql_query("SELECT * FROM login WHERE username='$fname3' and  password='$password3'");
		

if (mysql_num_rows($result) > 0)
{
$json_array = array();
$json_array['success_code'] =  '2';   
echo json_encode($json_array);
$_SESSION["uname"] = $fname3;
}
else
{
$json_array = array();
$json_array['success_code'] =  '1';    
echo json_encode($json_array);
}



	
	
?>

