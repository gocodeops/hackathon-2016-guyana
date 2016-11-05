var myApp = new Framework7({
	material: true,
});

var $$ = Dom7;

var mainView = myApp.addView('.view-main');

myApp.onPageInit('index', function (page) {

<<<<<<< Updated upstream
    mainView.router.loadPage('views/transactions.html');

=======
    mainView.router.loadPage('views/login.html');
>>>>>>> Stashed changes
	// mainView.router.loadPage('views/account.html');
    // console.log('triggered: index');

}).trigger();
