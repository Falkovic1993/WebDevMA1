<?php

	session_start();
	if ( isset($_SESSION['loggedIn']) ) {

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
		

	<div class="wrapper">

		<nav class="loginNav">
			<span>User Dashboard</span>
			<button class="btn-default">Add User</button>
			<button class="btn-default">Add Product</button>
			<button class="btn-default">Edit pages</button>
			<button class="btn-default">Edit pages</button>
			<button class="btn-default">Edit pages</button>
			
		</nav>

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


			<form id="userForm">
				<input type="text" id="userName" name="userName" placeholder="Name"></input>
				<input type="text" id="userLastName" name="userLastName" placeholder="Lastname"></input>
				<input type="text" id="userEmail" name="userEmail" placeholder="Email"></input>
				<input type="file" id="userImage" name="userImage"></input>
				<button type="button" id="btnSaveUser">Save Product</button>
			</form>



			<div id="userList">
				<form id="frmDeleteUser">
					
					
				</form>

				
				

		
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