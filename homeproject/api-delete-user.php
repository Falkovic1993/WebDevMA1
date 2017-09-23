<?php 

	$userId = $_POST['id'];
	$sUserList = file_get_contents('data-users.txt');
	$jUserList = json_decode($sUserList);
	//echo $jUserList;
	
	

	for ($i = 0; $i < count($jUserList); $i++){
		if ($jUserList[$i]->id == $userId){
		
			//var_dump($jUserList);
			unset($jUserList[$i]);
			//var_dump($jUserList);
		}
	}

	$jUserList = array_values($jUserList);
	$sUserList = json_encode($jUserList);

	//echo $sUserList;
	file_put_contents('data-users.txt', $sUserList);

	echo "User has been deleted";





 ?>