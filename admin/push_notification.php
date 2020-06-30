<?php

// API access key from Google API's Console
define( 'API_ACCESS_KEY', 'AAAAAL5w6fg:APA91bFwAgq7f7XZ1fEjsER7GoZNXmMEL_eEwsdn_D5NYoWi9snh-wv_dUGlWcEk_J5ttH8TJHwzanv9J1GIKg72AkT9yVcibYScXhHJ08RAra1uWvENjnjMtz8zwWzE4PQZERVT9cEd');
$tit=$_POST["title"];
$des=$_POST["description"];
$registrationIds =$_POST["token"];

// prep the bundle
$msg = array
(
	'message' 	=> $des,
	'title'		=> $tit,
	'subtitle'	=> 'This is a subtitle. subtitle',
	'tickerText'	=> 'Ticker text here...Ticker text here...Ticker text here',
	'vibrate'	=> 1,
	'sound'		=> 1,
	'largeIcon'	=> 'large_icon',
	'smallIcon'	=> 'small_icon'
);

$fields = array
(
	'registration_ids' 	=> array($registrationIds),
	'data'=> $msg
);
 
$headers = array
(
	'Authorization: key=' . API_ACCESS_KEY,
	'Content-Type: application/json'
);
 
$ch = curl_init();

curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
curl_setopt( $ch,CURLOPT_POST, true );
curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
$result = curl_exec($ch );
curl_close( $ch );

echo $result;
header('location: users.php');

