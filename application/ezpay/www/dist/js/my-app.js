var myApp = new Framework7({
	material: true,
	modalTitle: 'Ez-Pay'
});

var $$ = Dom7;

var mainView = myApp.addView('.view-main');

myApp.onPageInit('index', function (page) {


}).trigger();


// deviceready function for cordova
document.addEventListener("deviceready", onDeviceReady, false);

function onDeviceReady() {
	// window.plugins.PushbotsPlugin.initialize("581e282a4a9efa1b398b456e", {"android":{"sender_id":"31109533359"}});

}
