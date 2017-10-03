<?php

	$productId = $_POST['id'];
	$sProductList = file_get_contents('data-products.txt');
	$ajProductList = json_decode($sProductList);
	//echo $ajProductList;
	

	for ($i = 0; $i < count($ajProductList); $i++){
		if ($ajProductList[$i]->id == $productId){
		
			var_dump($ajProductList);
			unlink($ajProductList[$i]->image);
			unset($ajProductList[$i]);
			//var_dump($ajProductList);
		}
	}

	$ajProductList = array_values($ajProductList);

	/*for ($i = 0; $i < count($ajProductList); $i++){
	if ($_SESSION['loggedIn'] == $ajProductList[$i]->name ) {
		echo "user still excist";
	} else {
		echo "This user dont live anymore";
		session_destroy();
	}
	}
	*/
	$sProductList = json_encode($ajProductList);

	echo $sProductList;
	file_put_contents('data-products.txt', $sProductList);

	echo "Product has been deleted";

?>