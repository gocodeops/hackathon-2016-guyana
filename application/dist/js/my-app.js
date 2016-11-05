var myApp = new Framework7();

var $$ = Dom7;

var mainView = myApp.addView('.view-main');

myApp.onPageInit('index', function (page) {

<<<<<<< HEAD
    mainView.router.loadPage('views/login.html');
=======
    mainView.router.loadPage('views/transactions.html');
>>>>>>> origin/master
	// mainView.router.loadPage('views/account.html');
    console.log('triggered: index');

}).trigger();
