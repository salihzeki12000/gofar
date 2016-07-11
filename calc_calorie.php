<?php
include_once('database.php');


 $con=db_connect();
		

	$sql="select * from markers";				

		$results = array();
	 $result = mysqli_query($con, $sql);
		 if (mysqli_num_rows($result) > 0) {
 	 while($row = mysqli_fetch_assoc($result)) {

	$name = $row["name"];
	$name = $row["name"];
	$name = $row["name"];
	$name = $row["name"];

	function compute_results(){
	// Average weight in kg
	$weight_male =81.65;
	$weight_female =75.39;

	//Average height in cm
	$height_male =177;
	$height_female =164;


	//Average height in cm
	$age_male =35;
	$age_female =35;

	//duration for each activity level
	$very_light=1000;
	$light=400;
	$moderate=20;
	$heavy=10;
	$very_heavy=8;


	//Estimate basal energy expenditure using the Harris-Benedict equations. 
	$BasalEnergyExpenditureMale = round(66.5 + (13.75 * $weight_male) + (5.003 * $height_male) - (6.775 * $age_male));	    
	$BasalEnergyExpenditureFemale = round(655 + ($weight_female * 9.563) + (1.85 * $height_female) - (4.676 * $age_female));

	//number of minutes you expect to spend, in a day on each of the six activity levels from “very light” to “Very Heavy”
	$very_light_male = round(($BasalEnergyExpenditureMale * 1.4 / 1440) * $very_light);	
	$light_male = round(($BasalEnergyExpenditureMale * 2.5 / 1440) * $light);	
	$moderate_male = round(($BasalEnergyExpenditureMale * 4.2 / 1440) * $moderate);
	$heavy_male = round(($BasalEnergyExpenditureMale * 8.2 / 1440) * $heavy);	
	$very_heavy_male = round(($BasalEnergyExpenditureMale * 12 / 1440) * $very_heavy);	
	
	$very_light_female = round(($BasalEnergyExpenditureMale * 1.4 / 1440) * $very_light);	
	$light_female = round(($BasalEnergyExpenditureMale * 2.5 / 1440) * $light);	
	$moderate_female = round(($BasalEnergyExpenditureMale * 4.2 / 1440) * $moderate);
	$heavy_female = round(($BasalEnergyExpenditureMale * 8.2 / 1440) * $heavy);	
	$very_heavy_female = round(($BasalEnergyExpenditureMale * 12 / 1440) * $very_heavy);

	//adding the number of minutes you expect to spend for each activity levels
	$wake_male = round((($BasalEnergyExpenditureMale * 1.4) / 1440 * $very_light) + (($BasalEnergyExpenditureMale * 2.5) / 1440 * $light) + (($BasalEnergyExpenditureMale * 4.2) / 1440 * $moderate) + (($BasalEnergyExpenditureMale * 8.2) / 1440 * $heavy) + (($BasalEnergyExpenditureMale * 12) / 1440 * $very_heavy));
	$wake_female = round((($BasalEnergyExpenditureFemale * 1.4) / 1440 * $very_light) + (($BasalEnergyExpenditureFemale * 2.5) / 1440 * $light) + (($BasalEnergyExpenditureFemale * 2.5) / 1440 * $moderate) + (($BasalEnergyExpenditureFemale * 2.5) / 1440 * $heavy) + (($BasalEnergyExpenditureFemale * 2.5) / 1440 * $very_heavy));

	$sleep_male = round(1440 - $very_light - $light - $moderate - $heavy - $very_heavy);
    $sleep_male = round(($BasalEnergyExpenditureMale / 1440) * $sleep_male);
  
    
    $sleep_female = round(1440 - $very_light - $light - $moderate- $heavy - $very_heavy);
    $sleep_female = round(($BasalEnergyExpenditureFemale / 1440) * $sleep_female);

    $rez_male= round(($sleep_male * 1) + ($wake_male * 1));	
	$rez_female= round(($sleep_female * 1) + ($wake_female * 1));	
	
echo $rez_male.'</br>';
echo $rez_female;	

}


compute_results();


function recalc_minutes_left($activity,$total_time) {

		
		$sleep = 2;	
		$very_light=1000;
		$light=400;
		$moderate=20;
		$heavy=10;
		$very_heavy=8;
		
		$left = $total_time - $sleep - $activity;
		

		if ($left == 0) {
			minutes_left.className = '';
		} else {
			minutes_left.className = 'calorie_calculator_minutes_left_error';		
		}
		
		var ret = true;
	} else {
		var ret = false;	
	}

	return ret;
}

?>
