<?php



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
notifyMe();





?>