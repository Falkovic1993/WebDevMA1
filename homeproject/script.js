	// JAVASCIPT! 
console.log("It's working!");


	//  NAVIGATION - 1 PAGE ONLY SETUP. 
	var aBtnShowPage = document.getElementsByClassName('btnMenu');
	var hidePage = document.getElementsByClassName('page')

	for (var i = 0; i < aBtnShowPage.length; i++) {
		aBtnShowPage[i].addEventListener("click", function() {
		//console.log(hidePage)
		for (var j = 0; j < hidePage.length; j++) {
			hidePage[j].style.display = "none";
			}
		var sDataAttribute = this.getAttribute("data-showThisPage");
		//console.log(sDataAttribute);
		document.getElementById(sDataAttribute).style.display = "flex";
			});
		};

	// SHOW THE SIGN UP FORM
	btnSignUpForm.addEventListener("click", function(){
		console.log("X")
		SignUpBox.style.display = "flex";
	});

	// CLOSE THE SIGN UP FORM
	closeSignUp.addEventListener("click", function(){
		SignUpBox.style.display = "none";
	})

	// SAVE THE USER INTO OUR DATA WHEN THEY SIGN UP 
	btnUserSU.addEventListener("click", function(){
			console.log("X")

			var ajax = new XMLHttpRequest();
			ajax.onreadystatechange = function() {
				if(this.readyState == 4 && this.status == 200) {
				  	var sDataFromServer = this.responseText;
         			console.log("Response: ",sDataFromServer);
				}
			}
			ajax.open( "POST", "api-signup.php", true );
		    var jFrmSignUpUser = new FormData(frmSignUpUser);
		    ajax.send(jFrmSignUpUser);
		});

	// UPDATE USER INFORMATION
	btnUpdateUser.addEventListener("click", function() {
		console.log("update");
		var ajax = new XMLHttpRequest();
		ajax.onreadystatechange = function() {
			if(this.readyState == 4 && this.status == 200) {
				console.log(this.responseText);
				window.location.reload();
				
				;
			};
		}
		ajax.open( "POST", "api-update-user.php", true );
	    var jFrmUpdate = new FormData(frmUpdateUser);
	    ajax.send(jFrmUpdate);

	})

	// LOGIN TO THE SITE! 
	btnLogin.addEventListener("click", function(){
		//console.log("Z")
		var ajax = new XMLHttpRequest();
		ajax.onreadystatechange = function() {

			if(this.readyState == 4 && this.status == 200) {
			var jDataFromServer = this.responseText;
			console.log(jDataFromServer);
			window.location.reload();
			};
		}
		ajax.open( "POST", "api-login.php", true );
	    var jFrmLogin = new FormData(frmLogin);
	    ajax.send(jFrmLogin);
	});

	// LOGOUT OF THE SITE 
	var btnLogOut = document.getElementsByClassName('btnLogOut');
	for (i = 0; i < btnLogOut.length; i++) {
	//console.log(LogOut);
	btnLogOut[i].addEventListener("click", function(){
		console.log("LogOut");

		var ajax = new XMLHttpRequest();
		ajax.onreadystatechange = function() {

			if (this.readyState == 4 && this.status == 200) {
				window.location.reload();
			};
		};
		ajax.open( "GET", "api-logout.php", true);
		ajax.send();
	});
}

	//SHOW USERS 
	btnUserPage.addEventListener("click", function(){
		var ajax = new XMLHttpRequest();
		ajax.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				var aUsers = JSON.parse(this.responseText);
				//console.log(aUsers);
				userList.innerHTML = "";
				for ( i = 0 ; i < aUsers.length; i++) {
					//console.log("hi"); 
					// GET THE USER DATA
					var userId = aUsers[i].id;
					var userName = aUsers[i].name;
					var userLastName = aUsers[i].lastname;
					var userEmail = aUsers[i].email;
					var userPassword = aUsers[i].password;
					var userImage = aUsers[i].image;
					//console.log(userId, userName, userLastName, userEmail, userPassword);
					//PUT THE USER DATA TOGETHER AND PUT IT INTO A DIV SO WE CAN SHOW IT.
					sDivUserInfo = "<div class='user' id=" + userId + "><h3>" + userId +"</h3>" + userName + "<br>" + userLastName +
					 "<br>" + userEmail + "<br>" + userPassword + "<br> <button class='btnDeleteUsers' data-userId="+userId+">Delete</button></div>";
					userList.insertAdjacentHTML('beforeend', sDivUserInfo);
				};
			};
		};
		ajax.open( "GET", "api-show-user.php", true);
		ajax.send();
	});

	//DELETE A USER 

	var jFrmDeleteUser = new FormData( frmDeleteUser );
    document.addEventListener("click", function(e){
    	var userDataId = e.target.getAttribute("data-userId")
    	jFrmDeleteUser.append( "id", userDataId );

    	var ajax = new XMLHttpRequest();
		ajax.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
	    	if (e.target.className === "btnDeleteUsers") {
	    		var parent = e.target.parentElement;
	    		parent.remove();
	    		//console.log(userDataId);
	    		//console.log(this.responseText);
			}
		}
		};
		ajax.open( "POST", "api-delete-user.php", true);
		ajax.send(jFrmDeleteUser);
	});
