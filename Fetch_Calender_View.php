<?php
include_once('database.php');
error_reporting(0);
$start=$_POST['start'];
$formatted_date=date('d-M-Y',  strtotime($start));
$array=explode('/',$_POST['content']);




foreach($array as $key =>$val){

    if(strtolower(substr($val,0,3))==='day'){
echo '<div style="padding-right: 20px;" class="slide" id="slide-0">';
   echo '<div class="step-2-day-head">';
      echo '<strong style="font-family: "Trebuchet MS", "Lucida Grande", "Lucida Sans Unicode", "Lucida Sans", Tahoma, sans-serif;
font-size: 20px;font-weight: 600;line-height: 22px;text-align: left;">'.$val.'</strong>';
      echo '<small class="step-2-day-date">'.$formatted_date.'</small>';
        echo '<ul class="step-2-added-attraction-master-wrapper sortable connectedSortable ui-sortable">';
}else if(!empty($val)){
   
         echo '<li id="56fa65eb0fe5d04206001a93" class="disable-sort-item first-attraction step-2-travel-from">';
            echo '<div class="step-2-attraction-container">';
               echo '<div class="step-2-travel-details" id="js_travel_details" style="display: none;">';
                  echo '<div id="js_distance_time" class="step-2-rtr-distance-time pull-left">';
                     echo '<p data-mode="driving">';
                        echo '<i class="fa fa-car"></i><span>Loading</span>';
                     echo '</p>';
                  echo '</div>';
               echo '</div>';
               echo '<div class="step-2-added-attraction-wrapper">';
                  echo '<a data-remove-id="56fa65eb0fe5d04206001a93" class="close-icon js_remove_place" style="display: none;">';
                  echo '<i class="fa fa-times-circle"></i>';
                  echo '</a>';
                  echo '<div class="step-2-attraction-name-spent-duration">';
                     echo '<img src="images/'.get_image_path($val).'" class="step-2-attraction-image" alt="">';
                     echo '<div class="step-2-attraction-details">';
                        echo '<h4 class="step-2-attraction-name" title="Quatre Bornes City Center">'.$val.'</h4>';
                        echo '<div class="step-2-attraction-time-spent js_attraction_time_spent" style="display: none;">';
                           echo 'Stay for';
                           echo '<div class="step-2-time-picker js_change_attraction_time_spent">00:00 min</div>';
                        echo '</div>';
                     echo '</div>';
                  echo '</div>';
               echo '</div>';
            echo '</div>';
         echo '</li>';
      
}
   
if(strtolower(substr($array[$key+1],0,3))==='day'){
    $start=date('y-m-d h:i:s',strtotime($start) + 86400);
    $formatted_date=date('d-M-Y',  strtotime($start));
       echo '</ul>';
             echo '<div id="js_end_of_day_container" style="" class="end-of-day-wrapper">';
         echo '<span class="dot-ender"><span class="step-2-timeline"></span></span>';
         echo '<span class="end-of-day-txt"><strong>Day ends at </strong>'.get_end_time($val).'</span>';
echo '</div>';
      echo '</div>';
echo '</div>';
}
}
  echo '</ul>';
             echo '<div id="js_end_of_day_container" style="" class="end-of-day-wrapper">';
         echo '<span class="dot-ender"><span class="step-2-timeline"></span></span>';
         echo '<span class="end-of-day-txt"><strong>Day ends at </strong>'.get_end_time($val).'</span>';
echo '</div>';
      echo '</div>';
echo '</div>';



function get_image_path($name){
    $con=db_connect();
    $sql="select image from markers where name='$name'";
    $result=$con->query($sql);
    
    if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
        return $row["image"];

}else{
    return 'segway.jpg';
}
    
}

function get_end_time($name){
    $con=db_connect();
    $sql="select closeTime from markers where name='$name'";
    $result=$con->query($sql);
    
    if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
        return substr($row["closeTime"],0,5);

}else{
    return '18:00';
}
    
}



?>

