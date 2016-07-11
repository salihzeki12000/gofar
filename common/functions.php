<?php

/*********** Function to calculate distance between two google map coordinates ************/
function distance($lat1, $lon1, $lat2, $lon2, $unit) {

  $theta = $lon1 - $lon2;
  $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
  $dist = acos($dist);
  $dist = rad2deg($dist);
  $miles = $dist * 60 * 1.1515;
  $unit = strtoupper($unit);

  if ($unit == "K") {
    return ($miles * 1.609344);
  } else if ($unit == "N") {
      return ($miles * 0.8684);
    } else {
        return $miles;
      }


echo distance(32.9697, -96.80322, 29.46786, -98.53506, "M") . " Miles<br>";
echo distance(32.9697, -96.80322, 29.46786, -98.53506, "K") . " Kilometers<br>";
echo distance(32.9697, -96.80322, 29.46786, -98.53506, "N") . " Nautical Miles<br>";
}


//compute_results('very_light','male',1000);

function compute_results($activity,$gender,$duration,$age){
  // Average weight in kg
  $weight_male =81.65;
  $weight_female =75.39;

  //Average height in cm
  $height_male =177;
  $height_female =164;

  //Average height in cm
  $age_male =$age;
  $age_female =$age;

  //duration for each activity level
  $very_light=0;
  $light=0;
  $moderate=0;
  $heavy=0;
  $very_heavy=0;

/***************** BMR Calculation   *******************/
  //Estimate basal energy expenditure using the Harris-Benedict equations. 
  $BasalEnergyExpenditureMale = round(66.5 + (13.75 * $weight_male) + (5.003 * $height_male) - (6.775 * $age_male));      
  $BasalEnergyExpenditureFemale = round(655 + ($weight_female * 9.563) + (1.85 * $height_female) - (4.676 * $age_female));
 
  /************** AMR Calculation  *************/
  //number of minutes you expect to spend for male, in a day on each of the six activity levels from “very light” to “Very Heavy”
  if($activity=='very_light'  && $gender=='male'){
  $male_activity = round(($BasalEnergyExpenditureMale * 1.2 / 1440) * $duration); 
    
    $very_light=$duration;
  }
  else if($activity=='light' && $gender=='male'){
  $male_activity = round(($BasalEnergyExpenditureMale * 1.375 / 1440) * $duration); 
  $light=$duration;

  }
  else if($activity=='moderate' && $gender=='male'){
  $male_activity = round(($BasalEnergyExpenditureMale * 1.55 / 1440) * $duration);
  $moderate=$duration;
  }
  else if($activity=='heavy' && $gender=='male'){
  $male_activity = round(($BasalEnergyExpenditureMale * 1.725 / 1440) * $duration); 
  $heavy=$duration;
  }
  else if($activity=='very_heavy' && $gender=='male'){
  $male_activity = round(($BasalEnergyExpenditureMale * 1.9 / 1440) * $duration);  
   
$very_heavy=$duration;
  }
  
  //number of minutes you expect to spend for female, in a day on each of the six activity levels from “very light” to “Very Heavy”
  if($activity=='very_light' && $gender=='female'){
  $female_activity = round(($BasalEnergyExpenditureMale * 1.2 / 1440) * $duration); 
  $very_light=$duration;
  }

  else if($activity=='light' && $gender=='female'){
  $female_activity = round(($BasalEnergyExpenditureMale * 1.375 / 1440) * $duration); 
   $light=$duration;
  }

  else if($activity=='moderate' && $gender=='female'){
  $female_activity = round(($BasalEnergyExpenditureMale * 1.55 / 1440) * $duration);
  $moderate=$duration;
  }

  else if($activity=='heavy' && $gender=='female'){
  $female_activity = round(($BasalEnergyExpenditureMale * 1.725 / 1440) * $duration); 
  $heavy=$duration;

  }

  else if($activity=='very_heavy' && $gender=='female'){
  $female_activity = round(($BasalEnergyExpenditureMale * 1.9 / 1440) * $duration);
  $very_heavy=$duration;
  }

  //adding the number of minutes you expect to spend for each activity levels
  if($gender=='male'){//adding the number of minutes you expect to spend for each activity levels
  $wake_male = round((($BasalEnergyExpenditureMale * 1.2) / 1440 * $very_light) + (($BasalEnergyExpenditureMale * 1.375) / 1440 * $light) + (($BasalEnergyExpenditureMale * 1.55) / 1440 * $moderate) + (($BasalEnergyExpenditureMale * 1.725) / 1440 * $heavy) + (($BasalEnergyExpenditureMale * 1.9) / 1440 * $very_heavy));
  $sleep_male = round(($BasalEnergyExpenditureMale / 1440) * 480); //assuming average sleep is 8hours so 480mins and we convert it to calories
  
   $rez_male= round(($sleep_male * 1) + ($wake_male * 1)); 
  } 
  else
  {
  $wake_female = round((($BasalEnergyExpenditureMale * 1.2) / 1440 * $very_light) + (($BasalEnergyExpenditureMale * 1.375) / 1440 * $light) + (($BasalEnergyExpenditureMale * 1.55) / 1440 * $moderate) + (($BasalEnergyExpenditureMale * 1.725) / 1440 * $heavy) + (($BasalEnergyExpenditureMale * 1.9) / 1440 * $very_heavy));
 // echo 'wake male '.$wake_male.'</br>';
  $sleep_female = round(($BasalEnergyExpenditureMale / 1440) * 480); //assuming average sleep is 8hours so 480mins
  //echo 'sleep male '.$sleep_male.'</br>';
  $rez_female= round(($sleep_female * 1) + ($wake_female * 1)); 
  }


 if($gender=='male' && isset($rez_male)) 
 {
      return $wake_male;
  }

  else if($gender=='female' && isset($rez_female))
  {
      return $wake_female;
  }

}




function calculate_sleep_per_day($gender,$age)
{
  // Average weight in kg
  $weight_male =81.65;
  $weight_female =75.39;

  //Average height in cm
  $height_male =177;
  $height_female =164;

  //Average height in cm
  $age_male =$age;
  $age_female =$age;


$BasalEnergyExpenditureMale = round(66.5 + (13.75 * $weight_male) + (5.003 * $height_male) - (6.775 * $age_male));      
$BasalEnergyExpenditureFemale = round(655 + ($weight_female * 9.563) + (1.85 * $height_female) - (4.676 * $age_female));

  if($gender=='male'){//adding the number of minutes you expect to spend for each activity levels
    $sleep_male = round(($BasalEnergyExpenditureMale / 1440) * 480); //assuming average sleep is 8hours so 480mins and we convert it to calories
    return $sleep_male;
  } 
  else
  {
    $sleep_female = round(($BasalEnergyExpenditureMale / 1440) * 480); //assuming average sleep is 8hours so 480mins
    return $sleep_female;
  }
 
}  



function total_calories_per_gender($gender)
{
if($gender=='male')
  {
    $calories=3000;
  }
else
  {
    $calories=2600;
  }
  return $calories;
}



function recalc_minutes_left($activity,$total_time) {

    
    $sleep = 2; 
    $very_light=1000;
    $light=400;
    $moderate=20;
    $heavy=10;
    $very_heavy=8;
    
    $left = $total_time - $sleep - $activity;
  
  }  









?>

