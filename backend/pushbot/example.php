<?php


// Push The notification with parameters
require_once('PushBots.class.php');
$pb = new PushBots();
// Application ID
$appID = '518d187xx';
// Application Secret
$appSecret = '25e8507956b62d81xxx';
$pb->App($appID, $appSecret);


// Notification Settings
// $pb->Alert("test Mesage");
// $pb->Platform(array("0","1"));
// $pb->Badge("+2");

// Update Alias
/**
 * set Alias Data
 * @param	integer	$platform 0=> iOS or 1=> Android.
 * @param	String	$token Device Registration ID.
 * @param	String	$alias New Alias.
 */

// $pb->AliasData(1, "APA91bFpQyCCczXC6hz4RTxxxxx", "test");
// set Alias on the server
// $pb->setAlias();

// Push it !
// $pb->Push();

// Push to Single Device
// Notification Settings
$pb->AlertOne($message);
$pb->PlatformOne("1");
$pb->TokenOne($token);

//Push to Single Device
$pb->PushOne();

//Remove device by Alias
// $pb->removeByAlias("myalias");

function push_notification($message, $token){
    require_once('PushBots.class.php');
    $pb = new PushBots();
    $appID = '518d187xx';
    $appSecret = '25e8507956b62d81xxx';
    $pb->App($appID, $appSecret);

    // make the notification
    $pb->AlertOne($message);
    $pb->PlatformOne("1");
    $pb->TokenOne($token);
    $pb->PushOne();
}
?>