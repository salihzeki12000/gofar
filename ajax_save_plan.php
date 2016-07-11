<?php
include_once('database.php');
include_once('common/functions.php');
$id=$_POST['id'];
$end=date('y-m-d',strtotime($_POST['end']));
$tname=$_POST['tname'];
$uname=$_POST['uname'];
$starttime=date('y-m-d',strtotime($_POST['starttime']));

						$sql1="select * from login where username='$uname'";
						  $con1=db_connect();

						 $result1 = mysqli_query($con1, $sql1);
			      		 if (mysqli_num_rows($result1) > 0) {
			         	 $row1 = mysqli_fetch_assoc($result1);
						$uid=$row1['user_id'];
                                         }


$arr=explode('/',$id);
$flag=false;

   $sql="INSERT INTO `reservation`(`user_id`, `map_id`, `hotel_id`, `trip_plan_name`, `start_date`, `end_date`, `rating`, `registration_date`) "
           . "VALUES ('$uid','$id',2,'$tname','$starttime','$end',3,now())";
  if (mysqli_query($con1, $sql)) {
    $flag=true;
} else {
    $flag=false;
}   


if($flag){
    echo 'success';
}
else{
    echo 'failed';
}

