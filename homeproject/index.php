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
				<span id="LogoName">Emil Falk</span>
				<button id="btnFrontpage" class="btnMenu btn-default" data-showThisPage="frontPage">Frontpage</button>
				<?php 
					if ( isset($_SESSION['loggedIn']) ) {
						$profilePage = "<button id='btnProfilepage' class='btnMenu' data-showThisPage='profilePage'>Profil</button>";
						echo $profilePage;
					}; ?>
				<button id="btnContactPage" class="btnMenu" data-showThisPage="contactPage">Contact</button>
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
			<div class="logintxt">Login</div>
			<div class="input-group">
				<input  class="loginInput" type="text" name="txtUserEmail" placeholder="&#9993; Email"> </input>
			</div>
			<div class="input-group">
				<input class="loginInput" type="password" name="txtUserPassword" placeholder="&#9679; Password"></input>
			</div>
			<div class="input-group">
				<button type="button" id="btnLogin" class="btnLoginFrm">Login</button>
				<button type="button" id="btnSignUpForm" class="btnLoginFrm">Sign Up</button><br>
				
			</div>
		</form>


		<div id="SignUpBox">
			<form id="frmSignUpUser" method="POST">
					<h3>Sign up now! </h3>
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
		<div class="containerSideBar">
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
	</div>


	<!-- USERPAGE START HERE -->
	<div id="contactPage" class="page">
		<div class="container" <?php if (isset($_SESSION['loggedIn'])) {?> style="margin-left:15vw; width: 85vw;"<?php }  ?>>

		
			<div id="map"> </div>

			<div id="contactInfo"<?php if (isset($_SESSION['loggedIn'])) {?> style="width: 35vw;"<?php }  ?>>
				<div class="information">
					<h3>Contact Us!</h3>
					<p>If you have any questions, regarding the company or our products feel free to contact us at any time. Our information can be form under here.</p>
					<p class="pcontactInfo"><span class="info">TLF:</span>28917048</p>
					<p class="pcontactInfo"><span class="info">Email:</span>Emil93falk@hotmail.com</p>
					<p class="pcontactInfo"><span class="info">Adreess:</span>Vagtelvej 73. ST. TV. </p>
				</div>
				<div class="contactform">
					<form id="frmContactUs">
						<label>First Name</label>
						<input type="text" name="contactName" placeholder="Name">

						<label>Last Name</label>
						<input type="text" name="contactLastName" placeholder="Lastname">

						<label>Your Email</label>
						<input type="text" name="contactMail" placeholder="Email">

						<label>Subject</label><br>
						<textarea name="contactSubject" placeholder="Write Something..." style="width: 250px; height: 100px;"></textarea><br>
						<button type="button">Submit!</button>
					</form>
				</div>
			</div>
	
		</div>
	</div>

	<!-- ADD USER PAGE WHEN LOGGED IN -->

	<div id="addUserPage" class="page">
		<div class="containerSideBar">
			<div id="addUserBox">
				<h2>Add new user</h2>
				<form id="frmAddUser" method="POST">
						<input type="text" id="txtAddUserName" name="txtUserNameSU" placeholder="Name"></input>
						<input type="text"  id="txtAddUserLastname" name="txtUserLastnameSU" placeholder="Lastname"></input>
						<input type="email"  id="txtAddUserEmail" name="txtUserEmailSU" placeholder="Email"></input>
						<input type="password"  id="txtAddUserPassword" name="txtUserPasswordSU" placeholder="Password"></input>
						Editor<input type="checkbox" name="userRole" id="userRole" value="editor"></input>
						<input type="file" name="fileUserImage"></input>
						<button type="button" id="btnAddUser">Add new user</button>
				</form>
			</div>
			
				<div class="userView">
					<h4>Id</h4>
					<h4>Name</h4>
					<h4>Lastname</h4>
					<h4>Email</h4>
					<h4>Password</h4>
					<h4> </h4>
				</div>
				<div id="userList">
				<!--THIS FORM IS USED TO SENT DATA ABOUT THE USER WHEN WE DELETE IT-->
				<form id="frmDeleteUser">
				</form>
			</div>
		</div>
	</div>

	<!-- PRODUCTPAGE START HERE -->
	<div id="productPage" class="page">
		<div class="container" id="productList" <?php if (isset($_SESSION['loggedIn'])) {?> style="margin-left:15vw; width: 85vw;"<?php }  ?>>
			
		</div>

		<div  id="newsletter">
			<h2>Sign up for our awesome weekly newsletter!</h2>
			<form id="frmSignUpNewsLetter">
				<input type="text" name="newsLetterSignUp" id="newsLetterSignUp" placeholder="Email">
				<button id="btnSignUpNewsLetter">Sign me up!</button>
			</form>
		</div>

	</div>

	<div id="addProductPage" class="page">

		<div class="containerSideBar">
			<div id="addProductBox">
				<h1>Product Overview</h1>
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
				<h4> </h4>
		</div>

		<div id="productOverview">
		</div>
	
		<div id="editProductBox">
			<form id="frmDeleteProduct">
			</form>
				<form id="frmEditProduct">
						<h4 class="editProducth4">Product ID: <span class="edit-product-id"></span></h4>
						<h4 class="editProducth4">Product Name: <span class="edit-product-name"></span><input type="text" name="editProductName" id="editProductName"></h4>
						<h4 class="editProducth4">Quantity: <span class="edit-product-qty"></span><input type="text" name="editProductQuantity" id="editProductQuantity"></h4>
						<h4 class="editProducth4">Price: <span class="edit-product-price"></span><input type="text" name="editProductPrice"></h4>
						<h4 class="editProducth4">Description: <span class="edit-product-desc"></span><input type="text" name="editProductDescription"></h4>
						<h4 class="editProducth4">Product Image: <h4 class="editProductImageh4"><h4><input type="file" name="editProductImage"></input></h4>
						<button type="button" id="btnEditProduct">Edit</button>
				</form>
		</div>
	</div>

</div>


	


	
	<script type="text/javascript"  src="script.js"></script>
	<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAE8cywvNMbm14LF_16pGVFAL8TXGw-FkE"> </script>


		

	</script>


</body>
</html>