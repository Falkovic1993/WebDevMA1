<?php

	// START SESSION
	session_start();

	// USE FAKE DATA FOR NOW - REPLACE LATER WHEN WE GET A DATA FILE.

	$sCorrectUserName = "Emil";
	$sCorrectUserLastName = "Falk";
	$sCorrectUserEmail = "a@a.com";
	$sCorrectUserPassword = "1234";

	// FETCH DATA FROM OUR LOGIN FORM 

	$sUserName = $_POST['txtUserName'];
	$sUserPassword = $_POST['txtUserPassword'];


	// IF OUR DATA FROM THE DATA FILE IS SAME WITH THE USER INPUT LET THE USER LOGIN. 
	if ( $sCorrectUserName == $sUserName && $sCorrectUserPassword == $sUserPassword) {

		$_SESSION['jUser'] = $sCorrectUserName;
		$sResponse = '{"login":"yes"}';
		echo $sResponse;
		
		// WE USE EXIT SO WE DONT NEED TO USE ELSE; SINCE IF WE RUN THIS IT WILL STOP RIGHT AFTER EXIT. 
		exit;
	};

	$sResponse = '{"login":"no"}';
	echo $sResponse;
	exit;
	




	




?>