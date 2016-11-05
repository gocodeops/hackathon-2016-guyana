var myApp = new Framework7({
	material: true,
});

var $$ = Dom7;

var mainView = myApp.addView('.view-main');

myApp.onPageInit('index', function (page) {

    mainView.router.loadPage('views/login.html');

}).trigger();

function zero(val){
	var value;
	if (val <10) {
		value = '0'+ val;
	} else {
	return val;
	}
	return value;
};

var notification_date;


					// check op ad
					$$.post("http://gocodeops.com/hackathon_guyana_app/public/transactions"+notification_date,
					 function(data){
					 	var data = JSON.parse(data);
						// console.log('ads check ran with result: '+data);
						if (data != 0) {
							cordova.plugins.notification.local.schedule({
						        id: 1,
						        title: "Payment!",
						        text: "Payment Received, why don/'t you go check it out!",
						        icon: "file://logo.png",
						    });
						    // cordova.plugins.notification.badge.increase();
						}else{
							console.log('no new transactions');
						}	
					});

			}
				
		}

		setTimeout(function(){ checkTransactions(); }, 1000);

		setTimeout(function(){ updateNotificationDate(); }, 30000);

    }, 10000);

	// notification click listener
    cordova.plugins.notification.local.on("click", function (notification, state) {
    	    // check which notification was clicked
    	    // notification.id
		    mainView.router.loadPage('views/msp_nieuws.html');
	    
	}, this)

}
