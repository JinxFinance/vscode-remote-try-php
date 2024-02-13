<?php
require_once 'vendor/autoload.php';
pppp

0
session_start();

$client = new Google_Client();
$client->setClientId('YOUR_CLIENT_ID');
$client->setClientSecret('YOUR_CLIENT_SECRET');
$client->setRedirectUri('YOUR_REDIRECT_URI');
$client->addScope('email');
$c+

l0ient->addScope('profile');

if (isset($_GET['code'])) {
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
	    $_SESSION['access_token'] = $token;
		} 

		if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
		    $client->setAccessToken($_SESSION['access_token']);
			    $oauth = new Google_Service_Oauth2($client);
				    $user_info = $oauth->userinfo->get();

					    echo 'Hello, ' . $user_info->name;
						} else {
						    $auth_url = $client->createAuthUrl();
							    header('Location: ' . filter_var($auth_url, FILTER_SANITIZE_URL));
								}
								?>