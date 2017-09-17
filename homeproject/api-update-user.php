<?php 
	session_start();
	//CHECK IF WE HAVE A SESSION GOING.
	if (isset($_SESSION['jUser'])) {
		//LOAD OUR USERS DATA
		$jUsers = file_get_contents('data-users.txt');
		$aUsers = json_decode($jUsers);
		$sUserId = $_SESSION['jUserId'];
		//LOOP THROUGH OUR DATA AND CHECK IF WE CAN FIND A MATCH IN OUR ID. 
		for ($i = 0; $i < count($aUsers); $i++) {
			if ( $sUserId == $aUsers[$i]->id) {
				echo "We got a match";
				$aUsers[$i]->name = $_POST['UpdateUserName'] ?? '';
			}
		}
		$jUsers = json_encode($aUsers);
		file_put_contents('data-users.txt', $jUsers);
	}






echo $sUserId;
echo $jUsers;
echo $aUsers;




 ?>