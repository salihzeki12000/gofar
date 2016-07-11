<?php
include_once 'database.php';


$con=db_connect(); 
        $sql="select * from markers";
        $result = mysqli_query($con, $sql);
        if (mysqli_num_rows($result) > 0) {
          while($row = mysqli_fetch_assoc($result)) {
        
        
	$name=$row["name"];
        $address=$row["address"];
        $lat=$row["lat"];
        $ing=$row["long"];
        $name=$row["name"];
        $type=$row["type"];
        $address=$row["address"];
        echo "<li data-geo-lat='$lat' data-geo-long='$ing'>";
        echo "<figure>";
        echo "<img src='-text.png' >";
        echo "<figcaption>".$name."<br>".$address."</figcaption>";
        echo "<p>".$type."</p>";
      	echo "</figure>";
      	echo "</li>";
      	echo "<br>";
        }
        }








?>