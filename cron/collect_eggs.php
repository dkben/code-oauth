<?php

include __DIR__.'/vendor/autoload.php';
use Guzzle\Http\Client;

// create our http client (Guzzle)
$http = new Client('http://coop.apps.knpuniversity.com', array(
    'request.options' => array(
        'exceptions' => false,
    )
));

$request = $http->post('/token', null, array(
    'client_id' => 'Brent\'s Lazy CRON Job for Hsu WenI',
    'client_secret' => '085813eb6601fd853ba8932ab0d8fc3d',
    'grant_type' => 'client_credentials',
));
$response = $request->send();
$responseBody = $response->getBody(true);
$responseArr = json_decode($responseBody, true);
$accessToken = $responseArr['access_token'];

$request = $http->post('/api/520/eggs-collect');
$request->addHeader('Authorization', 'Bearer ' . $accessToken);
$response = $request->send();

echo $response->getBody();

echo "\n\n";

