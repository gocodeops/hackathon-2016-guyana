var myApp = new Framework7();

var $$ = Dom7;

var mainView = myApp.addView('.view-main');

myApp.onPageInit('index', function (page) {

	mainView.router.loadPage('views/login.html');
    console.log('triggered: index');

}).trigger();
