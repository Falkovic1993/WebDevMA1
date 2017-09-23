<?php

	$sFileExtension = pathinfo($_FILES['fileUserImage']['name'], PATHINFO_EXTENSION);
	$sFolder = 'images/users/';
	$sFileName = 'userimage-'.uniqid().'.'.$sFileExtension;
	$sSaveFileTo = $sFolder.$sFileName;
	move_uploaded_file($_FILES['fileUserImage']['tmp_name'], $sSaveFileTo);
	
	// Get all information on the user and save it as an 
	$jNewUser = json_decode('{}');
	$jNewUser->id = uniqid();
	$jNewUser->name = $_POST['txtUserNameSignUp'];
	$jNewUser->lastname = $_POST['txtUserLastnameSU'];
	$jNewUser->email = $_POST['txtUserEmailSU'];
	$jNewUser->password = $_POST['txtUserPasswordSU'];
	$jNewUser->image = $sFolder.$sFileName;

	// Get the old users from our data file and decode them into an json object
	$sOldUsers = file_get_contents('data-users.txt');
	$jOldUsers = json_decode($sOldUsers);


	// Making sure the email is not already used. 
	for ($i = 0; $i < count($jOldUsers); $i++ ) {
		if ($jNewUser->email == $jOldUsers[$i]->name ) {
			echo "email is already taken";
			exit;
		}
	}




	// Push the new users to the array
	array_push($jOldUsers, $jNewUser);

	// ENCODE OUR json SO WE CAN SAVE IT AS txt
	$sNewUsers = json_encode($jOldUsers);
	file_put_contents('data-users.txt', $sNewUsers);

	$response = "User is added";
	echo $response;










?>