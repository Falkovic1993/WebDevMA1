<?php

	
	//CHECK IF WE HAVE A SESSION GOING.
	
		//LOAD OUR USERS DATA
	echo "heloo";
		$sProducts = file_get_contents('data-Products.txt');
		$aProducts = json_decode($sProducts);
		$productId = $_POST['productId'];
		//LOOP THROUGH OUR DATA AND CHECK IF WE CAN FIND A MATCH IN OUR ID. 
		for ($i = 0; $i < count($aProducts); $i++) {
			echo count($aProducts);
			if ( $productId == $aProducts[$i]->id) {
				//IF OUR USERID IS SAME AS THE ONE IN DATA BASE WE*RE UPDATING THE INFO!												
				//UPDATING OUR SESSION DATA RIGHT AWAY.
				if (empty($_POST['editProductName'])) {
				} else {
					$aProducts[$i]->name = $_POST['editProductName'] ?? '';
				}
				if (empty($_POST['editProductQuantity'])) {
				} else {
					$aProducts[$i]->quantity = $_POST['editProductQuantity'] ?? '';
				}
				if (empty($_POST['editProductPrice'])) {
				} else {
					$aProducts[$i]->price = $_POST['editProductPrice'] ?? '';
				}
				if (empty($_POST['editProductDescription'])) {
				} else {
					$aProducts[$i]->description = $_POST['editProductDescription'] ?? '';
				}
				// INSET UPDATE FUNCTION FOR IMAGE BELOW HERE!!
				if ($_FILES['editProductImage']['size'] == 0 or $_FILES['editProductImage']['error'] == 4) {
					echo "No files uploaded";
				} else {
					//Removes file from our folder
					unlink($aProducts[$i]->image);
					//unset($aProducts[$i]->image);

					$sFileExtension = pathinfo($_FILES['editProductImage']['name'], PATHINFO_EXTENSION);
					$sFolder = 'images/products/';
					$sFileName = 'productimage-'.$productId.'.'.$sFileExtension;
					$sSaveFileTo = $sFolder.$sFileName;
					move_uploaded_file($_FILES['editProductImage']['tmp_name'], $sSaveFileTo);
					$aProducts[$i]->image = $sFolder.$sFileName;
					// store our new data in the session
	

				}
			}
		}
		//EN"LISH" OUR CODE SO WE CAN SAVE IT IN OUR TXT FILE AGAIN. 
		$jProducts = json_encode($aProducts);
		file_put_contents('data-products.txt', $jProducts);

		
		
	


//echo $sUserId;
//echo $jUsers;
//echo $aUsers;




 ?>