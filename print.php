
 <?php
include_once('database.php');
session_start();
include_once('common/functions.php');
error_reporting(0);
$tname=urldecode($_GET['trip_name']);
$start_date=date('d M y',  strtotime(urldecode($_GET['starttime'])));
$end_date=date('d M y',  strtotime(urldecode($_GET['endtime'])));
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
	
	<title>vacation Planner</title>
	
	<link rel='stylesheet' type='text/css' href='css/printstyle.css' />
	<link rel='stylesheet' type='text/css' href='css/print.css' media="print" />
	<script type='text/javascript' src='js/jquery-1.3.2.min.js'></script>
	<script type='text/javascript' src='js/example.js'></script>

</head>

<body>

	<div id="page-wrap">

		<textarea id="header">Trip Planner</textarea>
		
		<div id="identity">
		
            <textarea id="address"><?php echo $tname; ?>

Dates <?php echo $start_date.' - '.$end_date; ?>

</textarea>

            <div id="logo">

              <div id="logoctr">
                <a href="javascript:;" id="change-logo" title="Change logo">Change Logo</a>
                <a href="javascript:;" id="save-logo" title="Save changes">Save</a>
                |
                <a href="javascript:;" id="delete-logo" title="Delete logo">Delete Logo</a>
                <a href="javascript:;" id="cancel-logo" title="Cancel changes">Cancel</a>
              </div>

              <div id="logohelp">
                <input id="imageloc" type="text" size="50" value="" /><br />
                (max width: 540px, max height: 100px)
              </div>
              <img id="image" src="images/logo.png" alt="logo" />
            </div>
		
		</div>
		
		<div style="clear:both"></div>
		
		<div id="customer">

		
		</div>
		
		<table id="items">
			<div class="panel">
			<?php
		
                                
			$arr=urldecode($_GET['id']);
			$count=1;
			$array =  explode('/', $arr);

				
				


					 
			

			  echo'<tr>';
			  	  echo'<th>Days</th>';	
			      echo'<th>Trip Name</th>';
			      echo'<th>Description</th>';
			      echo'<th>Price</th>';
			      echo'<th>Duration</th>';
			      echo'<th>Region</th>';
			  echo'</tr>';
			  foreach ($array as $key => $val) {
    				if(strtolower(substr($val,0,3))==='day'){
                                 echo'<tr class="item-row">';
			  	  echo'<td class="item-name"><div class="delete-wpr"><textarea>'.$val.'</textarea><a class="delete" href="javascript:;" title="Remove row">X</a></div></td>';
                                $counter=0;
                                }
                                  else{
                                    if($counter>1) {
                                       echo'<td class="item-name"><div class="delete-wpr"><textarea></textarea><a class="delete" href="javascript:;" title="Remove row">X</a></div></td>'; 
                                    } 
                                      
                                  $ary=get_list_details($val);
                                  if(empty($ary)){
                                      $ary['package']='lunch + explore west coast + Swimming breaks';
                                      $ary['price']='2000';
                                      $ary['openTime']='09:00:00';
                                      $ary['region']='17:00:00';
                                  }
                                  
                                  echo'<td class="item-name"><textarea>'.$val.'</textarea></td>';
			      echo'<td class="description"><textarea>'.$ary['package'].'</textarea></td>';
			      echo'<td><textarea class="cost">'.$ary['price'].'</textarea></td>';
			      echo'<td><textarea class="qty">'.$ary['openTime'].'-'.$ary['closeTime'].'</textarea></td>';
			      echo'<td><span class="price"></span>'.$ary['region'].'</td>';
                                echo'</tr>';  
			  
			  }
			 
		$counter++;	
		
	}

			?>		 
 			</div> 
		 
		  <tr><td><button style="float:right;" onClick="window.print()" class="cta-button small">Print Plan</button></td></tr>


	</div>
			<div></div>
</body>

</html>
<?php
function get_list_details($name){
    $con=db_connect();
    $sql="select * from markers where name='$name'";
    $result=$con->query($sql);
    
    if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
        return $row;

}else{

}
    
}

?>