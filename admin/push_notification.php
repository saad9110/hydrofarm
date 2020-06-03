<?php

// API access key from Google API's Console
define( 'API_ACCESS_KEY', 'AAAAIcw50ms:APA91bH3hVa4UNgqYXWpL2dKL6sg2e7jLqYoyD4jDF2EuzVFEN029DELPSDpIgJ77tkIDLGMvZhNygrDix6VcbspVhrggeceYEiPBxeYNWDt79_feCtjRRsIzwOYXGwbFJrmkoc1xGTT');
$tit=$_POST["title"];

$registrationIds = 'clzu6Y9gj4A:APA91bGZPcQ6ktonoyb89uUSw_mkBGLj37ZWXE_e-9Gx4xTs2-P6L82kZjX6ppVimyN-GIrKkOKgn19EdSsIhY2NqsIA-pq3mxHgJHt6qtzmUb4Eqh4LWTpESk3sY94aUxCuvQ-v19jZ';

// prep the bundle
$msg = array
(
	'message' 	=> $tit,
	'title'		=> 'Push from console',
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