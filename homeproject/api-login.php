<?php

	// START SESSION
	session_start();

	// FETCH DATA FROM OUR LOGIN FORM 
	$sUserName = $_POST['txtUserName'];
	$sUserPassword = $_POST['txtUserPassword'];

	// GET USER DATA FROM OUR DATA FILE. 
	$sUsers = file_get_contents('data-users.txt');
	$aUsers = json_decode($sUsers);
	//var_dump($aUsers);

	for ($i = 0; $i < count($aUsers) ; $i ++) { 
		//echo $i;
		$sCorrectUserId = $aUsers[$i]->id;
		$sCorrectUserName = $aUsers[$i]->name;
		//echo $sCorrectUserName;
		$sCorrectUserLastname = $aUsers[$i]->lastname;
		$sCorrectUserEmail = $aUsers[$i]->email;
		$sCorrectUserPassword = $aUsers[$i]->password;

		// IF OUR DATA FROM THE DATA FILE IS SAME WITH THE USER INPUT LET THE USER LOGIN. 
		if ( $sCorrectUserName == $sUserName && $sCorrectUserPassword == $sUserPassword) {

			$_SESSION['jUser'] = $sCorrectUserName;
			$_SESSION['jUserId'] = $sCorrectUserId;
			$_SESSION['jUserName'] = $sCorrectUserName;
			$_SESSION['jUserLastName'] = $sCorrectUserLastname;
			$_SESSION['jUserEmail'] = $sCorrectUserEmail;
			$_SESSION['jUserPassword'] = $sCorrectUserPassword;

			$sResponse = '{"login":"yes"}';
			echo $sResponse;
			// WE USE EXIT SO WE DONT NEED TO USE ELSE; SINCE IF WE RUN THIS IT WILL STOP RIGHT AFTER EXIT. 
			exit;
	};
	}

	$sResponse = '{"login":"Dont excist"}';
	echo $sResponse;
	exit;




	




?>