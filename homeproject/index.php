<?php

	session_start();
	if ( isset($_SESSION['loggedIn']) ) {

		echo "heeehe";
	};
	if ( isset($_SESSION['updateProduct']) ) {

		echo "product";
	};

				
	

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Mandatory Assignment</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	
	<script src="https://use.fontawesome.com/7db9382a77.js"></script>

</head>

<body>

		<nav class="navigation">
				<span id="LogoName">Awesome CMS</span>
				<button id="btnFrontpage" class="btnMenu btn-default" data-showThisPage="frontPage">Frontpage</button>
				<?php 
					if ( isset($_SESSION['loggedIn']) ) {
						$profilePage = "<button id='btnProfilepage' class='btnMenu' data-showThisPage='profilePage'>Profil</button>";
						echo $profilePage;
					}; ?>
				<button id="btnUserPage" class="btnMenu" data-showThisPage="userPage">User</button>
				<button id="btnProductPage" class="btnMenu" data-showThisPage="productPage">Product</button>
				<?php 
					if ( isset($_SESSION['loggedIn']) ) {
						$menuLogOut = "<button type='button' class='btnLogOut'>Log Out</button>";
						echo $menuLogOut;
					}; ?>
		</nav>

		<nav class="loginNav" <?php if (isset($_SESSION['loggedIn'])) {?> style="display:flex"<?php }  ?> >
			<?php
				if (isset($_SESSION['loggedIn'])) {
					$menuName = "<span>User Dashboard </span>";
					$addUserPage = "<button id='btnAddUserPage' class='btnMenu' data-showThisPage='addUserPage'>Add User</button>";
					$addProductPage = "<button id='btnAddProductPage' class='btnMenu' data-showThisPage='addProductPage'>Add Product</button>";
					$editPages = "<button id='btnEditPages' class='btnMenu' data-showThisPage='editPage'>Edit Pages</button>";

					echo $menuName;
					echo $addUserPage;
					echo $addProductPage;
					echo $editPages;
				}
			?>
		</nav>
		

	<div class="wrapper">

		

	<!-- FRONTPAGE START HERE -->
	<div id="frontPage" class="page">

		<div class="welcomeBox">
		<?php

			if ( isset($_SESSION['loggedIn']) ) {
			$sWelcome = "Welcome" . ' ' . $_SESSION['jUserName'];
			echo $sWelcome;
	};
		?>
		</div>

		<form id="frmLogin">
			<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-envelope-o fa-fw" aria-hidden="true"></i></span>
				<input  class="form-control" type="text" name="txtUserEmail" placeholder="Email Address"> </input>
			</div>
			<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-key fa-fw" aria-hidden="true"></i></span>
				<input class="form-control" type="password" name="txtUserPassword" placeholder="Password"></input>
			</div>
				<button type="button" id="btnLogin">Login</button>
			<?php 
					if ( isset($_SESSION['loggedIn']) ) {
						$btnLogOut = "<button type='button' class='btnLogOut'>Log Out</button>";
						echo $btnLogOut;
					}; ?>

			<button type="button" id="btnSignUpForm">Sign Up</button>
		</form>


	<div id="SignUpBox">
		<form id="frmSignUpUser" method="POST">
				<button type="button" id="closeSignUp">×</button>
				<input type="text" id="txtUserNameSignUp" name="txtUserNameSignUp" placeholder="Name"></input>
				<input type="text"  id="txtUserLastnameSU" name="txtUserLastnameSU" placeholder="Lastname"></input>
				<input type="email"  id="txtUserEmailSU" name="txtUserEmailSU" placeholder="Email"></input>
				<input type="password"  id="txtUserPasswordSU" name="txtUserPasswordSU" placeholder="Password"></input>
				<input type="file" name="fileUserImage"></input>
				<button type="button" id="btnUserSU">Sign Up!</button>
		</form>
	</div>

	</div>
	<!-- PROFIL PAGE! -->
	<div id="profilePage" class="page">

		<div class="boxProfilPage">
			<h3>Profile Page</h3>
			<?php
				if ( isset($_SESSION['loggedIn']) ) {
					$sUserId = $_SESSION['jUserId'];
					$sUserName = $_SESSION['jUserName'];
					$sUserLastName = $_SESSION['jUserLastName'];
					$sUserEmail = $_SESSION['jUserEmail'];
					$sUserPassword = $_SESSION['jUserPassword'];
					$sUserImage = $_SESSION['jUserImage'];
				
		};	?>
			<form id="frmUpdateUser">
				<h4 class="txtProfileInfo">User ID: <?php  echo $sUserId; ?></h4>
				<h4 class="txtProfileInfo">Name: <?php  echo $sUserName; ?><input type="text" name="UpdateUserName"></h4>
				<h4 class="txtProfileInfo">Lastname: <?php  echo $sUserLastName; ?><input type="text" name="UpdateUserLastName"></h4>
				<h4 class="txtProfileInfo">Email: <?php  echo $sUserEmail; ?><input type="text" name="UpdateUserEmail"></h4>
				<h4 class="txtProfileInfo">Password: <?php  echo $sUserPassword; ?><input type="text" name="UpdateUserPassword"></h4>
				<h4 class="txtProfileInfo">Profile Image: <img id="profileImage" src="<?php echo $sUserImage; ?>"><input type="file" name="UpdateUserImage"></input></h4>
				<button type="button" id="btnUpdateUser">Save information</button>
			</form>
		
		</div>

	</div>


	<!-- USERPAGE START HERE -->
	<div id="userPage" class="page">
		<div class="container">
			<div id="userList">
				
				<!-- THIS FORM IS USED TO SENT DATA ABOUT THE USER WHEN WE DELETE IT -->
				<form id="frmDeleteUser">
				</form>
			</div>
		</div>
	</div>

	<!-- ADD USER PAGE WHEN LOGGED IN -->

	<div id="addUserPage" class="page">
		<div class="contanier">

		<div id="addUserBox">
			<h2>Add new user</h2>
			<form id="frmAddUser" method="POST">
					<input type="text" id="txtAddUserName" name="txtUserNameSU" placeholder="Name"></input>
					<input type="text"  id="txtAddUserLastname" name="txtUserLastnameSU" placeholder="Lastname"></input>
					<input type="email"  id="txtAddUserEmail" name="txtUserEmailSU" placeholder="Email"></input>
					<input type="password"  id="txtAddUserPassword" name="txtUserPasswordSU" placeholder="Password"></input>
					<input type="file" name="fileUserImage"></input>
					<button type="button" id="btnAddUser">Add new user</button>
			</form>
		</div>
		</div>
	</div>

	<!-- PRODUCTPAGE START HERE -->

	<div id="productPage" class="page">

		<div class="container" id="productList">
			
			
			<div class="item">
				<h3>Hello</h3>
				<img src="images/shoe1.png">
				<p>This is a quick description</p>
			</div>
		
		</div>
	</div>

	<div id="addProductPage" class="page">
	
	<?php 
				if ( isset($_SESSION['updateProduct']) ) {
					$sProductId = $_SESSION['productId'];
					$sProductName = $_SESSION['productName'];
					$sProductQuantity = $_SESSION['productQuantity'];
					$sProductPrice = $_SESSION['productPrice'];
					$sProductDescription = $_SESSION['productDescription'];
					$sProductImage = $_SESSION['productImage'];
				
		};	?>

		<div class="contanier">
		<div id="addProductBox">
			<h2>Add new product</h2>
			<form id="frmAddProduct" method="POST">
					<input type="text" id="txtAddProductName" name="txtAddProductName" placeholder="Name"></input>
					<input type="text"  id="txtAddProductPrice" name="txtAddProductPrice" placeholder="Price"></input>
					<input type="text"  id="txtAddProductQuantity " name="txtAddProductQuantity" placeholder="Quantity"></input>
					<input type="text"  id="txtAddProductDescription" name="txtAddProductDescription" placeholder="Description"></input>
					<input type="file" name="fileProductImage"></input>
					<button type="button" id="btnAddProduct">Add Product</button>
			</form>
		</div>
		
		<div class="productview">
				<h4>Name</h4>
				<h4>Quantity</h4>
				<h4>Price</h4>
				<h4>Description</h4>
				<h4>Product Image:</h4>
				
			</div>
		<div id="productOverview">
		</div>
		
	
		<div id="editProductBox">
			
			<!--THIS FOR IS TO SEND THE PRODUCT ID TO THE SERVER -->
			<form id="frmSaveProductId">
			</form>

			<form id="frmDeleteProduct">
			</form>


			<form id="frmEditProduct">
					<h4 class="editProducth4">Product ID: <?php  echo $sProductId; ?></h4>
					<h4 class="editProducth4">Product Name: <?php  echo $sProductName; ?><input type="text" name="editProductName"></h4>
					<h4 class="editProducth4">Quantity: <?php  echo $sProductQuantity; ?><input type="text" name="editProductQuantity"></h4>
					<h4 class="editProducth4">Price: <?php  echo $sProductPrice; ?><input type="text" name="editProductPrice"></h4>
					<h4 class="editProducth4">Description: <?php  echo $sProductDescription; ?><input type="text" name="editProductDescription"></h4>
					<h4 class="editProducth4">Product Image: <img id="productImage" src="<?php echo $sProductImage; ?>"><input type="file" name="edutProductImage"></input></h4>
					<button type="button" id="btnEditProduct">Edit</button>
				</form>
		</div>
	</div>

</div>




	<script type="text/javascript"  src="script.js"></script>
</body>
</html>