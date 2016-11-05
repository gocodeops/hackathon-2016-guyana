var myApp = new Framework7({
	material: true,
	modalTitle: 'Ez-Pay'
});

var $$ = Dom7;

var mainView = myApp.addView('.view-main');

myApp.onPageInit('index', function (page) {


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

function updateNotificationDate(){
	var d = new Date();
	var ye = d.getFullYear();
	var mo = zero(d.getMonth()+1);
	var dy = zero(d.getDate());
	var hr = zero(d.getHours());
	var mi = zero(d.getMinutes());
	var se = zero(d.getSeconds());

	notification_date = ye+'-'+mo+'-'+dy+' '+hr+':'+mi+':'+se;
	localStorage.setItem("notification_date", notification_date);
	console.log('notification_date updated: '+notification_date);
}

if (localStorage.getItem("notification_date") == null) {
	updateNotificationDate();
}else{
	notification_date = localStorage.getItem("notification_date");
	console.log('got date out of localStorage');
}

// deviceready function for cordova
document.addEventListener("deviceready", onDeviceReady, false);

// do something after cordova ready
function onDeviceReady() {
	// console.log('deviceready');

	setInterval(function (){
		// console.log("interval running ...");

		function checkTransactions(){
			console.log('notification_date: '+notification_date);

			if (localStorage.getItem('receiver_id') != null) {
					$$.post("http://gocodeops.com/hackathon_guyana_app/public/notifications", {table: 'transactions', date: notification_date},
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
