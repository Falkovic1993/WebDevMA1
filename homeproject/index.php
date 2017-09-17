<?php

	session_start();

	if ( isset($_SESSION['jUser']) ) {
		echo "hehe";
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
				<button id="btnUserPage" class="btnMenu" data-showThisPage="userPage">User</button>
				<button id="btnProductPage" class="btnMenu" data-showThisPage="productPage">Product</button>
		</nav>

	<div class="wrapper">

	<!-- FRONTPAGE START HERE -->
	<div id="frontPage" class="page">
		<?php

			if ( isset($_SESSION['jUser']) ) {
			echo jUser.userName;
	};

		?>

		<form id="frmLogin">
			<input type="text" name="txtUserName" placeholder="Name"></input>
			<input type="text" name="txtUserPassword" placeholder="Password"></input>
			<button type="button" id="btnLogin">Login</button>
			<button type="button" id="btnLogOut">Logout</button>
			<button type="button" id="btnSignUpForm">Sign Up</button>
		</form>


	<div id="SignUpBox">
		<form id="frmSignUpUser" method="POST">
	
				<button type="button" id="closeSignUp">×</button>
				<input type="text" id="txtUserNameSignUp" name="txtUserNameSignUp" placeholder="Name"></input>
				<input type="text"  id="txtUserLastnameSU" name="txtUserLastnameSU" placeholder="Lastname"></input>
				<input type="email"  id="txtUserEmailSU" name="txtUserEmailSU" placeholder="Email"></input>
				<input type="password"  id="txtUserPasswordSU" name="txtUserPasswordSU" placeholder="Password"></input>
				<button type="button" id="btnUserSU">Sign Up!</button>
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



			<div class="userList">

				<div class="user1">
					<h3>12334dHASBD</h3>
					<p>Emil</p>
					<p>Falk</p>
					<p>Emil93falk@hotmail.com</p>
					<button id="btnDeleteUser">Delete</button>
				</div>

				<div class="user1">
					<h3>12334dHASBD</h3>
					<p>Emil</p>
					<p>Falk</p>
					<p>Emil93falk@hotmail.com</p>
					<button id="btnDeleteUser">Delete</button>
				</div>

				<div class="user1">
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