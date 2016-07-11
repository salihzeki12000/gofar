<!DOCTYPE html>
<html lang="en" class="no-js">
 <?php
include_once('database.php');
session_start();
error_reporting(0);
?>
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>vacation planner</title>
		
		<link href="css/stylecontact.css" rel='stylesheet' type='text/css' />
		<link rel="stylesheet" href="css/signup.css">
		<link rel="stylesheet" href="css/login.css">
		<link href='https://fonts.googleapis.com/css?family=Caveat:400,700' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="font-awesome-4.4.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="css/demo_recentplan.css" />
		<link rel="stylesheet" type="text/css" href="css/recent_plan.css" />
		<link rel="stylesheet" type="text/css" href="css/component_recentplan.css" />
                <link href="css/jquery-ui.css" rel='stylesheet' type='text/css' >
		<script type="text/javascript"  src="js/jquery.min.js"></script>
		<script type="text/javascript" src="js/script.js"></script>
		<script type="text/javascript"  src="js/jquery-ui.min.js"></script>
                <style>
                    .capon-info .starts_star {
    margin-bottom: 15px;
    margin-top: 10px;
    border-top: 0px solid #d5d5d5 !important;
}

.starts_star li{
	display: inline-block;
	font-size: 13px;
}
.starts_star li a i{
	color: #ed8323;
	opacity: 0.8;
}
.starts_star li:hover a i{
	opacity: 1;
}

                </style>
                 <script>
          $(function() {
      $('input.datepicker').datepicker();
});
                </script>

                
                        
                <script>
                    $(document).ready(function(){
                            $('.cta-button').click(function(){
                          
                            var id=$(this).attr("id"); 
                            
                            var de=$('input[name=rango2_de]').val();
                            var a=$('input[name=rango2_a]').val();
                            window.location.href = 'trip_detail.php?id='+id+'&name=Holidays&from='+de+'&to='+a; 
                            //2/18/19/24/26/27/30/35/36/&name=Trip&from=06/09/2016&to=06/14/2016
                           }); 
                    });
                    
                </script>    
                
                
                
                
                
                
                
                
		<script>
					$.extend($.datepicker, {
					travelRanges: function (options) {
						
						var settings = {
							target: '.travel-dates',
							maxDateToBook: '30',
							dafaultDate: new Date(),
							populateFirst:true
						};

						$.extend(settings, options);

						$(settings.target).datepicker({
							minDate: '0',
							onSelect: function (selectedDate) {
								var self = this;
								if ($(self).is(settings.target+":first")) {
									var newMaxDate = $(settings.target).datepicker('getDate');
									newMaxDate.setDate($(this).datepicker('getDate').getDate() + settings.maxDateToBook);
									$(settings.target+":last").datepicker("change", {
									   "minDate": $(settings.target).datepicker('getDate'),
									   "maxDate": newMaxDate
								   });
								}
							}
						});

						if (settings.populateFirst) {
							$(settings.target + ":first").datepicker('setDate', settings.dafaultDate);
						}
					}
				});

			$(document).ready(function(){
			  <!-- $.datepicker.travelRanges({target:".rango1"}); -->
			  $.datepicker.travelRanges({target:".rango2",populateFirst:false});
			});
		</script>

		<?php include_once 'common/header.php' ?>  <!--  Include the header / Menu   -->
	
		<div class="view">
			
			
			<section class="page page--static">
				
					
            <?php
		$to=$_GET['to'];
		$from=$_GET['from'];




		$to=strtotime($to);
		$from=strtotime($from);
		$secs = $to - $from;
		$days = $secs / 86400;

		$to_formatter = date("d F Y", $to);
		$from_formatter = date("d F", $from);
		?>
					
					
			
				<div class="recentplans-content"><div class="red1">&nbsp;</div><h1>Recent Plans by travelers</h1><div class="red2">&nbsp;</div></div>
				<form class="recent_form" id="" action="" method="post">
						
						
							
						 

						
					</form>
				<ul class="grid">

				<?php
						// foreach ($array as $key) {
    					//echo "<p>$item</p>";

					   $con=db_connect();
		

						$sql="select * from reservation";				

							$results = array();
						 $result = mysqli_query($con, $sql);
			      		 if (mysqli_num_rows($result) > 0) {
			         	 while($row = mysqli_fetch_assoc($result)) {
                                                
						$id=substr($row['map_id'],0,1);
                                                
                                                $arr=get_list_image($id);
						$image = $arr["image"];
                                                $type = $row["type"];
                                                $date1= $row["start_date"];
                                                $date2= $row["end_date"];
                                                $uid= $row["user_id"];
                                                
                                                $datetime1 = strtotime($date1);
                                                $datetime2 = strtotime($date2);
                                                $secs = $datetime2 - $datetime1;// == return sec in difference
                                                $days = $secs / 86400;
                                                $name=get_name($uid);
                                                
                                                
                                                
                                         
                                                echo'<li class="grid__item">';
						echo'<a class="grid__link" href="#">';
							echo"<img class='grid__img' src='images/".$image."' alt='room-(3)'/>";
							echo'<div style="background:#fff;padding: 1em 0.5em;" class="title-area-plan">';
							echo'<h4 class="title-plan">'.$days.' days in Mauritius</h4>';
							echo'<span class="subtitle">'.$date1.' - '.$date2.'</span>';

							echo'</div>';

							 echo'<div style="background:#fff;height: 185px;" >';

								 
					           
					            echo'<div class="metadata row">';
					                echo'<div class="preferences">Rating: <span class="values"><ul class="starts_star"><li><a href="#"><i class="fa fa-star"></i></a></li><li><a href="#"><i class="fa fa-star"></i></a></li><li><a href="#"><i class="fa fa-star"></i></a></li><li><a href="#"><i class="fa fa-star"></i></a></li><li><a href="#"><i class="fa fa-star-half-empty"></i></a></li></ul></span></div>';
					            echo'</div>';
					            echo' <div class="metadata row country">';
					               echo' <div class="preferences">Created by '.$name.'</div>';
					            echo'</div>'; 
                                                     echo'<div class="dates">

									<div class="right-inner-addon">
										<input  class="rango2"  name="rango2_de" id="rango2_de" placeholder="yyyy-mm-dd" type="text" >
									</div>
									<div class="right-inner-addon">
										<input class="rango2" type="text" name="rango2_a" id="rango2_a" placeholder="yyyy-mm-dd" >
									</div>
									

								</div>';
					            echo'<div class="actions">';
					            	echo'<button class="cta-button small" id='.$row['map_id'].' name="button_plan">Use Plan</button>';
                                                         echo'</br>';
					            echo'</div>';
					        echo'</div>';    	
						echo'</a>';
					echo'</li>';
					 }
        			 }
     			

				?>
					
				</ul>
				
			</section>
			
			
			
		</div><!-- /view -->
	
	<?php include_once 'common/footer.php' ?>  <!--  Include the header / Menu   -->
	<
        
        <?php 
        
        function get_list_image($id){
    $con=db_connect();
    $sql="select * from markers where map_id='$id'";
    $result=$con->query($sql);
    
    if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
        return $row;

}else{

}
    
}



       function get_name($id){
    $con=db_connect();
    $sql="select username from login where user_id='$id'";
    $result=$con->query($sql);
    
    if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
        return $row['username'];

}else{

}
    
}

?>