<?php 
	session_start();
	//CHECK IF WE HAVE A SESSION GOING.
	if (isset($_SESSION['loggedIn'])) {
		//LOAD OUR USERS DATA
		$sUsers = file_get_contents('data-users.txt');
		$aUsers = json_decode($sUsers);
		$sUserId = $_SESSION['jUserId'];
		//LOOP THROUGH OUR DATA AND CHECK IF WE CAN FIND A MATCH IN OUR ID. 
		for ($i = 0; $i < count($aUsers); $i++) {
			if ( $sUserId == $aUsers[$i]->id) {
				//IF OUR USERID IS SAME AS THE ONE IN DATA BASE WE*RE UPDATING THE INFO!												
				//UPDATING OUR SESSION DATA RIGHT AWAY.
				if (empty($_POST['UpdateUserName'])) {
				} else {
					$aUsers[$i]->name = $_POST['UpdateUserName'] ?? '';
					$_SESSION['jUserName'] = $aUsers[$i]->name;
				}
				if (empty($_POST['UpdateUserLastName'])) {
				} else {
					$aUsers[$i]->lastname = $_POST['UpdateUserLastName'] ?? '';
					$_SESSION['jUserLastName'] = $aUsers[$i]->lastname;
				}
				if (empty($_POST['UpdateUserEmail'])) {
				} else {
					$aUsers[$i]->email = $_POST['UpdateUserEmail'] ?? '';
					$_SESSION['jUserEmail'] = $aUsers[$i]->email;
				}
				if (empty($_POST['UpdateUserPassword'])) {
				} else {
					$aUsers[$i]->password = $_POST['UpdateUserPassword'] ?? '';
					$_SESSION['jUserPassword'] = $aUsers[$i]->password;
				}
				// INSET UPDATE FUNCTION FOR IMAGE BELOW HERE!!
				if ($_FILES['UpdateUserImage']['size'] == 0 or $_FILES['UpdateUserImage']['error'] == 4) {
					echo "No files uploaded";
				} else {
					//Removes file from our folder
					unlink($aUsers[$i]->image);
					//unset($aUsers[$i]->image);

					$sFileExtension = pathinfo($_FILES['UpdateUserImage']['name'], PATHINFO_EXTENSION);
					$sFolder = 'images/users/';
					$sFileName = 'userimage-'.uniqid().'.'.$sFileExtension;
					$sSaveFileTo = $sFolder.$sFileName;
					move_uploaded_file($_FILES['UpdateUserImage']['tmp_name'], $sSaveFileTo);

					$aUsers[$i]->image = $sFolder.$sFileName;
					// store our new data in the session
					$_SESSION['jUserImage'] = $aUsers[$i]->image;

				}
			}
		}
		//EN"LISH" OUR CODE SO WE CAN SAVE IT IN OUR TXT FILE AGAIN. 
		$jUsers = json_encode($aUsers);
		file_put_contents('data-users.txt', $jUsers);

		
		
	}


//echo $sUserId;
//echo $jUsers;
//echo $aUsers;




 ?>