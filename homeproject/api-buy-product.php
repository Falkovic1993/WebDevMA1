<?php

	$productId = $_GET['productId'];

	$sProductList = file_get_contents('data-products.txt');
	$aProductList = json_decode($sProductList);

	for ($i = 0; $i < count($aProductList); $i++) {

		if ( $productId === $aProductList[$i]->id) {
			$amount =  $aProductList[$i]->quantity; 
			$newAmount = $amount -1; 
			$aProductList[$i]->quantity = $newAmount; 
		};

	};

	$sProductList = json_encode($aProductList);
	file_put_contents('data-products.txt', $sProductList);



	$response = "$productId has been bought";

	echo $response;
	echo $newAmount;


?>