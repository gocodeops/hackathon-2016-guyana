var myApp = new Framework7({
	material: true,
	modalTitle: 'Ez-Pay'
});

var $$ = Dom7;

var mainView = myApp.addView('.view-main');

myApp.onPageInit('index', function (page) {

	myApp.showIndicator();
    mainView.router.loadPage('views/login.html');

}).trigger();