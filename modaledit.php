<?php
	
	
    require 'class/functions.php';
    require 'src/facebook.php';
    include_once('class/subscriber.php');
    
    

    $facebook = new Facebook(array(
        'appId' => '327576267430255 ',
        'secret' => 'ed411d5af4e6f3a8a37ad3142044617d',
    ));


    $redirect_uri = 'https://fbmauritius.com/facebook/apollo-gagnant/';

    $user = $facebook->getUser();

    if ($user) {
        try {

            $user_profile = $facebook->api('/me');
        } catch (FacebookApiException $e) {
            error_log($e);
            $user = null;
        }
    }


    try {

        $user_profile = $facebook->api('/me');
        $id = $user_profile['id'];
        $first_name = utf8_decode($user_profile['first_name']);
        $last_name = utf8_decode($user_profile['last_name']);
        $birthday = convertdate($user_profile['birthday']);

        //$birthday = $user_profile['birthday'];
        $gender = convertgender($user_profile['gender']);
        $email = $user_profile['email'];

    } catch (FacebookApiException $e) {
        error_log($e);

        $user = null;
        echo("<script> top.location.href='" . $facebook->getLoginUrl(array(
                'canvas' => 1,
                'fbconnect' => 0,
                'scope' => 'email,user_birthday',
                'redirect_uri' => $redirect_uri)) . "'</script>");
    }

    subscriber::DBconnect();

    $fbid = $id;
    $member = new subscriber($fbid, $name, $surname,$gender,$mobile_no, $emailadd, $dob, $status, $home_address,$marketing,$sender);

?>
