<?php

	session_start();
	if ( isset($_SESSION['jUser']) ) {

		echo "heeehe";
	};

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Mandatory Assignment</title>
	<link rel="stylesheet" type="text/css" href="style.css">

</head>

<body>

		<nav class="navigation">
				<span id="LogoName">Mandatory Assignment</span>
				<button id="btnFrontpage" class="btnMenu" data-showThisPage="frontPage">Frontpage</button>
				<?php 
					if ( isset($_SESSION['jUser']) ) {
						$profilePage = "<button id='btnProfilepage' class='btnMenu' data-showThisPage='profilePage'>Profil</button>";
						echo $profilePage;
					}; ?>
				<button id="btnUserPage" class="btnMenu" data-showThisPage="userPage">User</button>
				<button id="btnProductPage" class="btnMenu" data-showThisPage="productPage">Product</button>
				<?php 
					if ( isset($_SESSION['jUser']) ) {
						$menuLogOut = "<button type='button' class='btnLogOut'>Log Out</button>";
						echo $menuLogOut;
					}; ?>
		</nav>

	<div class="wrapper">

	<!-- FRONTPAGE START HERE -->
	<div id="frontPage" class="page">
		<?php

			if ( isset($_SESSION['jUser']) ) {
			$sWelcome = "Welcome" . ' ' . $_SESSION['jUserName'];
			echo $sWelcome;
	};
		?>

		<form id="frmLogin">
			<input type="text" name="txtUserName" placeholder="Name"></input>
			<input type="text" name="txtUserPassword" placeholder="Password"></input>
			<button type="button" id="btnLogin">Login</button>
			<?php 
					if ( isset($_SESSION['jUser']) ) {
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
				if ( isset($_SESSION['jUser']) ) {
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
				<h4 class="txtProfileInfo">Profile Image: <img src="<?php echo $sUserImage; ?>"><input type="file" name="image"></h4>
				<button type="button" id="btnUpdateUser">Save information</button>
			</form>
		
		</div>

	</div>


	<!-- USERPAGE START HERE -->
	<div id="userPage" class="page">

		<div class="container">


			<form id="userForm">
				<input type="text" id="userName" name="userName" placeholder="Name"></input>
				<input type="text" id="userLastName" name="userLastName" placeholder="Lastname"></input>
				<input type="text" id="userEmail" name="userEmail" placeholder="Email"></input>
				<input type="file" id="userImage" name="userImage"></input>
				<button type="button" id="btnSaveUser">Save Product</button>
			</form>



			<div id="userList">

				<div class="user">
					<h3>12334dHASBD</h3>
					<p>Emil</p>
					<p>Falk</p>
					<p>Emil93falk@hotmail.com</p>
					<button id="btnDeleteUser">Delete</button>
				</div>

				<div class="user">
					<h3>12334dHASBD</h3>
					<p>Emil</p>
					<p>Falk</p>
					<p>Emil93falk@hotmail.com</p>
					<button id="btnDeleteUser">Delete</button>
				</div>

				<div class="user">
					<h3>12334dHASBD</h3>
					<p>Emil</p>
					<p>Falk</p>
					<p>Emil93falk@hotmail.com</p>
					<button id="btnDeleteUser">Delete</button>
				</div>
			</div>
		</div>
	</div>

		<!-- PRODUCTPAGE START HERE -->

	<div id="productPage" class="page">

		<div class="container">
			
			<div class="item">
				<h3>Hello</h3>
				<p>This is a quick description</p>
			</div>
			<div class="item">
				<h3>Hello</h3>
				<img src="images/shoe1.png">
				<p>This is a quick description</p>
			</div>
			<div class="item">
				<h3>Hello</h3>
				<p>This is a quick description</p>
			</div>
			<div class="item">
				<h3>Hello</h3>
				<p>This is a quick description</p>
			</div>
			<div class="item">
				<h3>Hello</h3>
				<p>This is a quick description</p>
			</div>
			<div class="item">
				<h3>Hello</h3>
				<p>This is a quick description</p>
			</div>
			<div class="item">
				<h3>Hello</h3>
				<p>This is a quick description</p>
			</div>
		</div>
	</div>



	</div>




	<script type="text/javascript"  src="script.js"></script>
</body>
</html>