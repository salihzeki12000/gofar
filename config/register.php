<?php
date_default_timezone_set('Asia/Muscat');
include_once('../db.php');   //connect to database 
$fullname = $_POST['fullname'];
$fname = $_POST['fname'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$password = sha1($_POST['password']);
$day = $_POST['day'];
$month = $_POST['month'];
$year = $_POST['year'];
$gender = $_POST['gender'];
$hiking = $_POST['hiking'];
$safari = $_POST['safari'];
$water = $_POST['water'];
$current_date=date("Y-m-d H:i:s");
$dob=$day.$month.$year;

$success=false;
					
$conn=db_connect();   // call function 

$result=mysql_query("INSERT INTO registration(fullname,username,mobile,email,password,dob,gender,favorite_activity_1,favorite_activity_2,favorite_activity_3,registered_date) VALUES ('$fullname','$fname','$mobile','$email','$password','$dob','$gender','$hiking','$safari','$water','$current_date')");
		
if($result)
{
$json_array = array();
$json_array['success_code'] =  '2';   //success
echo json_encode($json_array);

$result=mysql_query("INSERT INTO login(username,password) VALUES ('$fname','$password')"); 
}
else
{
$json_array = array();
$json_array['success_code'] =  '1';    //failed to insert
echo json_encode($json_array);
echo mysql_error();
}




/*
$fullname = 'wawa';
$fname = 'wawa';
$email = 'warenlv@live.cm';
$mobile =  '65464654';
$password = sha1('4324324');
$day = '08';
$month = '11';
$year = '1990';
$gender = 'male';
$current_date=date("Y-m-d H:i:s");
$dob=$day.$month.$year;
*/

	
	
?>

