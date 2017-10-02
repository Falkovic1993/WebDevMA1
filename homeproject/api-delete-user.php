<?php 
	

	$userId = $_POST['id'];
	$sUserList = file_get_contents('data-users.txt');
	$jUserList = json_decode($sUserList);
	//echo $jUserList;
	

	for ($i = 0; $i < count($jUserList); $i++){
		if ($jUserList[$i]->id == $userId){
		
			//var_dump($jUserList);
			unlink($jUserList[$i]->image);
			unset($jUserList[$i]);
			//var_dump($jUserList);
		}
	}

	$jUserList = array_values($jUserList);

	/*for ($i = 0; $i < count($jUserList); $i++){
	if ($_SESSION['loggedIn'] == $jUserList[$i]->name ) {
		echo "user still excist";
	} else {
		echo "This user dont live anymore";
		session_destroy();
	}
	}
	*/
	$sUserList = json_encode($jUserList);

	//echo $sUserList;
	file_put_contents('data-users.txt', $sUserList);

	echo "User has been deleted";






 ?>