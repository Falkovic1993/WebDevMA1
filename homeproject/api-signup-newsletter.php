<?php

	$jSignUpUser = json_decode('{}');
	$jSignUpUser->email = $_POST['newsLetterSignUp'];

	$sOldEmailList = file_get_contents('data-newsletter.txt');
	$jOldEmailList = json_decode($sOldEmailList);

	array_push($jOldEmailList, $jSignUpUser);

	$sNewEmailList = json_encode($jOldEmailList);

	file_put_contents('data-newsletter.txt', $sNewEmailList);

	$response = "Newsletter is Signed up";
	echo $response;

 ?>