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
	});
	SignUpBox.addEventListener("click",function(e){
		if (e.target.id === "SignUpBox") {
			SignUpBox.style.display = "none";
		} else {	
	}
	});

	//SIGN UP USER 
	btnUserSU.addEventListener("click", function(){
			//console.log("X")
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

	//ADD USER TO THE WEBSITE. // WE USE SAME API TO SIGNUP A USER AND ADD THEM. 
	btnAddUser.addEventListener("click", function(){
			console.log("X");
		var ajax = new XMLHttpRequest();
			ajax.onreadystatechange = function() {
				if(this.readyState == 4 && this.status == 200) {
				  	var sDataFromServer = this.responseText;
         			console.log("Response: ",sDataFromServer);
				}
			}
			ajax.open( "POST", "api-signup.php", true );
		    var jFrmAddUser = new FormData(frmAddUser);
		    ajax.send(jFrmAddUser);
		});

	// UPDATE USER INFORMATION
	btnUpdateUser.addEventListener("click", function() {
		console.log("update");
		var ajax = new XMLHttpRequest();
		ajax.onreadystatechange = function() {
			if(this.readyState == 4 && this.status == 200) {
				console.log(this.responseText);
				window.location.reload();
			}
		};
		ajax.open( "POST", "api-update-user.php", true );
	    var jFrmUpdate = new FormData(frmUpdateUser);
	    ajax.send(jFrmUpdate);
	});

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

	// SIGN UP USERS TO NEWSLETTER
	btnSignUpNewsLetter.addEventListener("click", function(){
		var ajax = new XMLHttpRequest();
		ajax.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				console.log(this.responseText);
			};
		};
		ajax.open( "POST", "api-signup-newsletter.php", true);
		var jFrmNewsLetterSignUp = new FormData( frmSignUpNewsLetter );
		ajax.send(jFrmNewsLetterSignUp);
	});

	//SHOW USERS 
	document.addEventListener("click", function(e) {
		if ( e.target.id === "btnAddUserPage" ) {
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
					sDivUserInfo = "<div class='user' id=" + userId + ">\
					<h3>" + userId +"</h3>\
					<p class='puser'>" + userName + "<br></p>\
					<p class='puser'>" + userLastName +"<br></p>\
					<p class='puser'>" + userEmail + "<br></p>\
					<p class='puser'>" + userPassword + "<br></p>\
					<button class='btnDeleteUsers' data-userId="+userId+">Delete</button></div>";

					userList.insertAdjacentHTML('beforeend', sDivUserInfo);
				};
			};
		};
		ajax.open( "GET", "api-show-user.php", true);
		ajax.send();
		}
	});

	//DELETE A USER 
	var jFrmDeleteUser = new FormData( frmDeleteUser );
    document.addEventListener("click", function(e){
    	var userDataId = e.target.getAttribute("data-userId");
    	jFrmDeleteUser.append( "id", userDataId );
    	var ajax = new XMLHttpRequest();
		ajax.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
	    	if (e.target.className === "btnDeleteUsers") {
	    		var parent = e.target.parentElement;
	    		parent.remove();
			}
		}
	};
		ajax.open( "POST", "api-delete-user.php", true);
		ajax.send(jFrmDeleteUser);
	});

    // ADD A PRODUCT
    btnAddProduct.addEventListener("click", function(event){
			console.log("X");
		var ajax = new XMLHttpRequest();
			ajax.onreadystatechange = function() {
				if(this.readyState == 4 && this.status == 200) {
				  	var sDataFromServer = this.responseText;
         			console.log("Response: ",sDataFromServer);
				}
			}
			ajax.open( "POST", "api-add-product.php", true );
		    var jFrmAddProduct = new FormData(frmAddProduct);
		    ajax.send(jFrmAddProduct);
		});

    // SHOW PRODUCTS FOR THE USER. 
    btnProductPage.addEventListener("click", function(){
		var ajax = new XMLHttpRequest();
		ajax.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				var aProducts = JSON.parse(this.responseText);
				productList.innerHTML = "";
				for ( i = 0 ; i < aProducts.length; i++) {
					// GET THE PRODUCT DATA
					var productId = aProducts[i].id;
					var productName = aProducts[i].name;
					var productPrice = aProducts[i].price;
					var productQuantity = aProducts[i].quantity;
					var productDescription = aProducts[i].description;
					var productImage = aProducts[i].image;
					sDivProductInfo = "<div class='item'>\
										<h3>" + productName +"</h3>" + "\
										<img src='"+productImage+"'>" + "\
										<p class='itemInfo'>" + productPrice + ".-</p>"+"\
										<p class='itemInfo'>" + productDescription + "</p>"+"\
										<br> <button class='btnBuyProduct' data-buyId="+productId+">BUY</Button>";
					productList.insertAdjacentHTML('beforeend', sDivProductInfo);
				};
			};
		};
		ajax.open( "GET", "api-show-products.php", true);
		ajax.send();
	});

    //SHOW PRODUCTS FOR OUR EDITOR (WHEN YOUR LOGGED INTO THE SITE)
    document.addEventListener("click", function(e) {
    	if ( e.target.id === "btnAddProductPage") {
			var ajax = new XMLHttpRequest();
			ajax.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					var aProducts = JSON.parse(this.responseText);
					productOverview.innerHTML = "";
					for ( i = 0 ; i < aProducts.length; i++) {
							// GET THE PRODUCT DATA
							var productId = aProducts[i].id;
							var productName = aProducts[i].name;
							var productPrice = aProducts[i].price;
							var productQuantity = aProducts[i].quantity;
							var productDescription = aProducts[i].description;
							var productImage = aProducts[i].image;
							sDivProductInfo = "<div class='productview product-" + productId + "'>\
												<p class='product-name'>" + productName +"</p>" + "\
												<p class='product-qty'>" + productQuantity +"</p>\
												<p class='product-price'>" + productPrice +"</p>\
												<p class='product-desc'>"+ productDescription + "</p>\
												<img src='"+productImage+"'>\
												<button class='btnEditProduct' data-productId="+productId+">Update</button>"+"\
												<button class='btnDeleteProduct' data-productId="+productId+">Delete</button>";
							productOverview.insertAdjacentHTML('beforeend', sDivProductInfo);
						};
					};
				};
				ajax.open( "GET", "api-show-products.php", true);
				ajax.send();
			
		};
	});
	// OPEN THE UPDATE PRODUCT BOX INSIDE THE BACKEND. 
	document.addEventListener("click", function(e){
        if (e.target.className === "btnEditProduct") {
            editProductBox.style.display = "flex";
            var productId = e.target.getAttribute("data-productId");
            var product = document.getElementsByClassName("product-" + productId)[0];
            var productName = product.getElementsByClassName("product-name")[0].innerHTML;
            var productQty = product.getElementsByClassName("product-qty")[0].innerHTML;
            var productPrice = product.getElementsByClassName("product-price")[0].innerHTML;
            var productDesc = product.getElementsByClassName("product-desc")[0].innerHTML;

            // SHOWING THE PRODUCT IMAGE! 
            var productImage = "images/products/productimage-"+productId;
           	// console.log(productImage);
            var sImageDiv = "<img id='productImage' src='"+productImage+".jpg'>"
            //console.log(sImageDiv);
            var editImage = document.getElementsByClassName("editProductImageh4")[0];
            editImage.innerHTML = "";
            //console.log(editImage);
            editImage.insertAdjacentHTML("afterbegin", sImageDiv );

            document.getElementsByClassName("edit-product-id")[0].innerHTML = productId;
            document.getElementsByClassName("edit-product-name")[0].innerHTML = productName;
            document.getElementsByClassName("edit-product-qty")[0].innerHTML = productQty;
            document.getElementsByClassName("edit-product-price")[0].innerHTML = productPrice;
            document.getElementsByClassName("edit-product-desc")[0].innerHTML = productDesc;
        }
	});
	// ClOSE THE EDIT BOX IF CLIKED OUTSIDE IT. 
	editProductBox.addEventListener("click",function(e){
		if (e.target.id === "editProductBox") {
			editProductBox.style.display = "none";
		} else {
		
	}
	});

	
	//DELETE A PRODUCT! 
	var jFrmDeleteProduct = new FormData( frmDeleteProduct );
    document.addEventListener("click", function(e){
    	if (e.target.className === "btnDeleteProduct"){
	    	var productDataId = e.target.getAttribute("data-productId");
		    jFrmDeleteProduct.append( "id", productDataId );
	    	var ajax = new XMLHttpRequest();
			ajax.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
	    		console.log(productDataId);
	    		var parent = e.target.parentElement;
	    		parent.remove();
			}
		}
		ajax.open( "POST", "api-delete-product.php", true);
		ajax.send(jFrmDeleteProduct);
	};
	});

    // UPDATE/EDIT THE PRODUCT IN BACKEND. 

    btnEditProduct.addEventListener("click", function(e){
    	var jFrmUpdateProduct = new FormData( frmEditProduct );
		var productId = e.target.parentElement;
		productId = document.getElementsByClassName("edit-product-id")[0].innerHTML;
		console.log(productId);
		jFrmUpdateProduct.append("productId", productId );

    	var ajax = new XMLHttpRequest();
			ajax.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
		    	console.log("UPATE ME");
			}
		}
    	ajax.open( "POST", "api-update-product.php", true);
		ajax.send(jFrmUpdateProduct);
    });





	 // DESKTOP NOTIFICATION
		function notifyMe() {
	  if (!("Notification" in window)) {
	    alert("This browser does not support system notifications");
	  }
	  else if (Notification.permission === "granted") {
	    notify();
	  }

	  else if (Notification.permission !== 'denied') {
	    Notification.requestPermission(function (permission) {
	      if (permission === "granted") {
	        notify();
	      }
	    });
	  }
	  
	  function notify() {
	    var notification = new Notification('Thanks for buying a product!', {
	      icon: 'http://www.readersdigest.ca/wp-content/uploads/2011/01/4-ways-cheer-up-depressed-cat.jpg',
	      body: "View more awesome products here!",
	    });

	    notification.onclick = function () {
	      window.open("google.dk");      
	    };
	    setTimeout(notification.close.bind(notification), 5000); 
	  }
	}
		// ADD SOUND EFFECT TO BUY BUTTON AND FIRE THE DESKTOP NOTIFICATION! 
		document.addEventListener("click", function(e){
			if (e.target.className === "btnBuyProduct") {
				console.log("buy");
				notifyMe();
				var oSound = new Audio('sound/cash.mp3')
				oSound.play();
				var productId = e.target.getAttribute("data-buyId"); 

				var ajax = new XMLHttpRequest();
					ajax.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
						
						//console.log(productId);
						console.log(this.responseText);
			}
			}
			ajax.open( "GET", "api-buy-product.php?productId="+productId, true);
			ajax.send();
		}
		});

		// 

		// GOOGLE MAPS 
		function initMap() {
        var Lygten = {lat: 55.703935, lng: 12.537669};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 15,
          center: Lygten
        });
        var marker = new google.maps.Marker({
          position: Lygten,
          map: map
        });
         
      }

      // SHOW GOOGLE MAPS WHEN CLICK ON CONTACT PAGE - ELSE IT WONT LOAD BECAUSE HIDDEN PARRENT ELEMENT.
      btnContactPage.addEventListener("click", function(){
      	initMap();
      });


