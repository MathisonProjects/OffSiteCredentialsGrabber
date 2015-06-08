<?php
	require_once(__DIR__ . '/../vendor/autoload.php');

	$data = new \Divinityfound\OffSiteCredentials\CredentialsGrabber();

	$creds = array('user' => 'divinityfound', 'pass' => 'password');
	$keys  = array('paypalemail','paypalpassword');
	$data->setSite('http://testsite.com')->setCreds($creds)->setKeys($keys);

	echo '<pre>';
	print_r($data);
	echo '</pre>';
	exit;
?>