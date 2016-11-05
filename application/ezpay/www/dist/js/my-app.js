var myApp = new Framework7({
	material: true,
	modalTitle: 'Ez-Pay'
});

var $$ = Dom7;

var mainView = myApp.addView('.view-main');

myApp.onPageInit('index', function (page) {

	myApp.showIndicator();

    var first_use = '';
    if(localStorage.getItem('first_use')) {
        first_use = localStorage.getItem('first_use');
    }

    if(localStorage.getItem('receiver_id') && first_use == '0') {
        myApp.hideIndicator();
        mainView.router.loadPage('views/login_normaal.html');
        var receiver_id = localStorage.getItem('receiver_id');
    } else {
        myApp.hideIndicator();
        mainView.router.loadPage('views/login.html');
    }

}).trigger();


// deviceready function for cordova
document.addEventListener("deviceready", onDeviceReady, false);

function onDeviceReady() {
	// window.plugins.PushbotsPlugin.initialize("581e282a4a9efa1b398b456e", {"android":{"sender_id":"31109533359"}});

}
