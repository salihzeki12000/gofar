<?php

$myusername="root";
$password="";
$hostname="localhost";

$dbhandle=mysql_connect($hostname,$myusername,$password) or die("cannot connect to database") ;
$selected=mysql_select_db("trip planner",$dbhandle);




function db_connect()
{
$myusername="root";
$password="";
$hostname="localhost";

$dbhandle=mysql_connect($hostname,$myusername,$password);
$selected=mysql_select_db("trip planner",$dbhandle);

if(!$dbhandle)
{

	die("could not connect".mysql_error());
}
else
{
return $dbhandle;
}


}

?>