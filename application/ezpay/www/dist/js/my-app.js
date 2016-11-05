var myApp = new Framework7({
	material: true,
});

var $$ = Dom7;

var mainView = myApp.addView('.view-main');

myApp.onPageInit('index', function (page) {

    mainView.router.loadPage('views/goods.html');
	// mainView.router.loadPage('views/account.html');
    // console.log('triggered: index');

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
