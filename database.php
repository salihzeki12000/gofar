<?php
//fonction pou connect to db
function db_connect(){
$servername =  'localhost';
$username = 'root';
$password = '';
$dbname = 'trip planner';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
else
{
return $conn;
}
}



?> 