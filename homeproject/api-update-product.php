<?php

	//GET PRODUCTS FOR OUR BACKEND.

	$sProducts = file_get_contents('data-products.txt');
	$aProducts = json_decode($sProducts);

	$productId = $_POST['productId'];

	echo $productId;

	for ($i=0; $i < count($aProducts) ; $i++) { 

		$sCorrectProductId = $aProducts[$i]->id;
		$sCorrectProductName = $aProducts[$i]->name;
		$sCorrectProductQuantity = $aProducts[$i]->quantity;
		$sCorrectProductPrice = $aProducts[$i]->price;
		$sCorrectProductDescription = $aProducts[$i]->description;
		$sCorrectProductImage = $aProducts[$i]->image;

		if ($productid === $sCorrectProductId) {

			$_SESSION['productId'] = $sCorrectProductId;
			$_SESSION['productName'] = $sCorrectProductName;
			$_SESSION['productQuantity'] = $sCorrectProductQuantity;
			$_SESSION['productPrice'] = $sCorrectProductPrice;
			$_SESSION['productDescription'] = $sCorrectProductDescription;
			$_SESSION['productImage'] = $sCorrectProductImage;
		}
	}







  ?>