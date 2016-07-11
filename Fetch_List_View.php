<?php
include_once('database.php');
error_reporting(0);
$start=$_POST['start'];
$formatted_date=date('d/m',  strtotime($start));
$array=explode('/',$_POST['content']);
$dt='';
$name='';
$address='';
$price='';
$opening_time='';
$closing_time='';


foreach($array as $key =>$val){
    if(strtolower(substr($val,0,3))==='day'){

    }
    else if(!empty($val)){
        $arr=get_list_details($val);
    echo'<div class="col-lg-2">';
               echo'<h2 style="font-size: 30px;margin-top: 20px;margin-bottom: 10px; color: #2b98b5;font-weight: 500;line-height: 1.1;"  id="17-12" class="panel-date">'.$formatted_date.'</h2>';
               echo'<p  style="margin: 0 0 10px;font-family: Helvetica,Arial,sans-serif;font-size: 14px;line-height: 1.42857143;" class="panel-day"></p>';
             echo'</div>';
             echo'<div class="col-lg-10 panel">';
               echo'<div class="agenda">';
                 echo'<div class="row agenda__head">';
                   echo'<div class="col-lg-9">';
                     echo'<h4 style="font-size: 18px;margin-top: 10px;margin-bottom: 10px;font-weight: 600;line-height: 1.1;color: #333;font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;text-align: left;"><i class="fa fa-plane" aria-hidden="true"></i>'.' '.$val.'</h4>';
                   echo'</div>';
                   echo'<div class="col-lg-3 panel__title--sub">';
                   echo'</div>';
                 echo'</div>';
                 echo'<div class="agenda__content">';
                   echo'<div class="col-lg-2 agenda__col">';
                     echo'<h4 style="margin-top: 10px;margin-bottom: 10px;line-height: 1.1;" class="trip__title">Address</h4>';
                     echo'<p>'.$arr['address'].'</p>';
                  echo'</div>';
                   echo'<div class="col-lg-2 agenda__col">';
                     echo'<h4 style="margin-top: 10px;margin-bottom: 10px;line-height: 1.1;" class="trip__title">Price</h4>';
                     echo'<p>Rs'.$arr['price'].'</p>';
                   echo'</div>';
                   echo'<div class="col-lg-2 agenda__col">';
                     echo'<h4 style="margin-top: 10px;margin-bottom: 10px;line-height: 1.1;" class="trip__title">Opening Hour </h4>';
                     echo'<p>'.$arr['openTime'].'</p>';
                   echo'</div>';
                   echo'<div class="col-lg-6 agenda__col">';
                     echo'<h4 style="margin-top: 10px;margin-bottom: 10px;line-height: 1.1;text-align: left;" class="trip__title">Closing Hour</h4>';
                     echo'<p>'.$arr['closeTime'].'</p>';
                   echo'</div> ';
                echo' </div>';
               echo'</div>';
             echo'</div>';
    }
    if(strtolower(substr($array[$key+1],0,3))==='day'){
    $start=date('y-m-d h:i:s',strtotime($start) + 86400);
    $formatted_date=date('d/m',  strtotime($start));
}
}


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
