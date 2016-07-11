<?php
include_once('../db.php');   //connect to database 
$id = $_GET['act_id'];
$name = $_GET['act_name'];
$from = $_GET['act_from'];
$from = date("Y-m-d", strtotime($from));
$to = $_GET['act_to'];
$to = date("Y-m-d", strtotime($to));
$uname = $_GET['act_uname'];

$id = str_replace('/', ',', $id);
$id=substr($id, 0, -1);
					
$conn=db_connect();   // call function 


$sql="select user_id from login where username='$uname' limit 1";
$resultset=mysql_query($sql);
$rows=mysql_num_rows($resultset);
while($rows=mysql_fetch_assoc($resultset))
{
	$user_id=$rows['user_id'];
	
}



$result=mysql_query("INSERT INTO reservation(user_id,map_id,hotel_id,trip_plan_name,start_date,end_date) 
VALUES ('$user_id','$id','5','$name','$from','$to')");
		
if($result)
{
echo '1';
}
else
{
echo '2';
}


/*** Start Write to log function ***/
function write_to_log($message)
{
$file_size=null;
$current_date=date("Y-m-d H:i:s");
$file = 'operation_log.txt';
$file_size=filesize($file);
	if($filesize<20000000){ //if the log is smaller than 20mb then proceed
	$current = file_get_contents($file);
	$current .= "$current_date $message\n";
	file_put_contents($file, $current);
	}
}
/*** end function write to log ***/

	
	
?>

