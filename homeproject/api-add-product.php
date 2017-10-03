<?php
	
	$productId = uniqid();

	$sFileExtension = pathinfo($_FILES['fileProductImage']['name'], PATHINFO_EXTENSION);
	$sFolder = 'images/products/';
	$sFileName = 'productimage-'.$productId.'.'.$sFileExtension;
	$sSaveFileTo = $sFolder.$sFileName;
	move_uploaded_file($_FILES['fileProductImage']['tmp_name'], $sSaveFileTo);
	
	// Get all information on the user and save it as an 
	$jNewProduct = json_decode('{}');
	$jNewProduct->id = $productId;
	$jNewProduct->name = $_POST['txtAddProductName'];
	$jNewProduct->price = $_POST['txtAddProductPrice'];
	$jNewProduct->quantity = $_POST['txtAddProductQuantity'];
	$jNewProduct->description = $_POST['txtAddProductDescription'];
	$jNewProduct->image = $sFolder.$sFileName;

	// Get the old users from our data file and decode them into an json object
	$sOldProducts = file_get_contents('data-products.txt');
	$jOldProducts = json_decode($sOldProducts);


	/*// Making sure the email is not already used. 
	for ($i = 0; $i < count($jOldProducts); $i++ ) {
		if ($jNewProduct->email == $jOldProducts[$i]->name ) {
			echo "email is already taken";
			// We're saying here if email is already used, dont add the user. 
			exit;
		}
	}*/
	
	// Push the new users to the array
	array_push($jOldProducts, $jNewProduct);

	// ENCODE OUR json SO WE CAN SAVE IT AS txt
	$sNewProduct = json_encode($jOldProducts);
	file_put_contents('data-products.txt', $sNewProduct);

	$response = "Product is added";
	echo $response;










?>