<?php
	require_once(__DIR__ . '/../vendor/autoload.php');

	$data = new \Divinityfound\OffSiteCredentials\CredentialsGrabber();

	$creds = array('user' => 'divinityfound', 'pass' => 'password');
	$keys  = array('paypalemail','paypalpassword');
	$data->setSite('dev.credentialswebapi.com:8079/tests/example.php')->setCreds($creds)->setKeys($keys)->getKeys();

	echo '<pre>';
	print_r($data);
	echo '</pre>';
	exit;
	
?>