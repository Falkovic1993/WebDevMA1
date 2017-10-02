<?php

	//GET PRODUCTS FOR OUR BACKEND.
	session_start();

	if (isset($_SESSION['updateProduct'])) {
	
	$sProducts = file_get_contents('data-products.txt');
	$aProducts = json_decode($sProducts);
	$productId = $_POST['id'];

	echo $productId;

	for ($i=0; $i < count($aProducts) ; $i++) { 

		if ($productId === $aProducts[$i]->id) {

		$_SESSION['productId'] = $aProducts[$i]->id;
		$_SESSION['productName'] = $aProducts[$i]->name;
		$_SESSION['productQuantity'] = $aProducts[$i]->quantity;
		$correctProductPrice = $aProducts[$i]->price;
		$correctProductDescription = $aProducts[$i]->description;
		$correctProductImage = $aProducts[$i]->image;

		

			$_SESSION['updateProduct'] = "yes";
			$_SESSION['productId'] = $correctProductId;
			$_SESSION['productName'] = $correctProductName;
			$_SESSION['productQuantity'] = $correctProductQuantity;
			$_SESSION['productPrice'] = $correctProductPrice;
			$_SESSION['productDescription'] = $correctProductDescription;
			$_SESSION['productImage'] = $correctProductImage;
echo  $_SESSION['productName'] ;
		
		}
		}
		
		}
      


  ?>