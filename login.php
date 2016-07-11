<?php

$username="root";
$password="";
$hostname="localhost";

$dbhandle=mysql_connect($hostname,$username,$password) or die("cannot connect to database") ;
$selected=mysql_select_db("trip planner",$dbhandle);

$myusername=$_POST['login'];
$mypassword=$_POST['password'];

$myusername=stripslashes($myusername); //to protect it from sql injection
$mypassword=stripslashes($mypassword);

$query="SELECT * FROM login WHERE username='$myusername' and  password='$mypassword'";
$result= mysql_query($query);
$count=mysql_num_rows($result);

mysql_close();

if($count==1){
  
    
    echo "Message has been sent.";
     header("Refresh: 10; url=index.php"); 
    exit;

}else{
        echo 'Incorrect username or password';
    }

?>

