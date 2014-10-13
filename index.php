<?php

session_start();

include_once "facebook-php-sdk/src/facebook.php";


require_once( 'facebook-php-sdk/src/Facebook/FacebookSession.php' );
require_once( 'facebook-php-sdk/src/Facebook/FacebookRedirectLoginHelper.php' );
require_once( 'facebook-php-sdk/src/Facebook/FacebookRequest.php' );
require_once( 'facebook-php-sdk/src/Facebook/FacebookResponse.php' );
require_once( 'facebook-php-sdk/src/Facebook/FacebookSDKException.php' );
require_once( 'facebook-php-sdk/src/Facebook/FacebookRequestException.php' );
require_once( 'facebook-php-sdk/src/Facebook/FacebookAuthorizationException.php' );
require_once( 'facebook-php-sdk/src/Facebook/GraphObject.php' );
require_once 'autoload.php';
 
use Facebook\FacebookSession;
use Facebook\FacebookRedirectLoginHelper;
use Facebook\FacebookRequest;
use Facebook\FacebookResponse;
use Facebook\FacebookSDKException;
use Facebook\FacebookRequestException;
use Facebook\FacebookAuthorizationException;
use Facebook\GraphObject;
 
// init app with app id (APPID) and secret (SECRET)
FacebookSession::setDefaultApplication('1486180144974468','528b621709faf5bf2277b5272a1572e6');

$helper = new FacebookRedirectLoginHelper( 'http://infinite-sands-2324.herokuapp.com/' );
//to get permission to access
$helper->getLoginUrl(array('scope' => 'user_events','email'));
 

//  Get the access token for this app
$session = FacebookSession::newAppSession();

// make the API call, $datas contains the events for the facebook fan page BDE Polytech Marseille
try {
$request = new FacebookRequest(
    $session,
    'GET',
    '/{347776302055884}/attending'
);
$response = $request->execute();

$datas = $response->getGraphObject()->asArray();

}catch (FacebookRequestException $e) {
    echo $e->getMessage();
}catch (\Exception $e) {
    echo $e->getMessage();
}

?>