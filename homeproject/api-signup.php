<?php

	// Get all information on the user and save it as an 

	$jNewUser = json_decode('{}');
	$jNewUser->id = uniqid();
	$jNewUser->name = $_POST['txtUserNameSignUp'] ?? '';
	$jNewUser->lastname = $_POST['txtUserLastnameSU'] ?? '';
	$jNewUser->email = $_POST['txtUserEmailSU'] ?? '';
	$jNewUser->password = $_POST['txtUserPasswordSU'] ?? '';


	// Get the old users from our data file and decode them into an array
	$sOldUsers = file_get_contents('data-users.txt');
	$jOldUsers = json_decode($sOldUsers);

	// Push the new users to the array
	array_push($jOldUsers, $jNewUser);

	$sNewUsers = json_encode($jOldUsers);
	file_put_contents('data-users.txt', $sNewUsers);

	echo $sNewUsers;











?>