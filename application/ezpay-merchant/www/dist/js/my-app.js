var myApp = new Framework7({
	material: true,
	modalTitle: 'Ez-Pay'
});

var $$ = Dom7;

var mainView = myApp.addView('.view-main');

myApp.onPageInit('index', function (page) {

	// myApp.showIndicator();
    mainView.router.loadPage('views/login.html');

}).trigger();

myApp.onPageInit('login', function (page) {

    $$("#login").submit(function(e){
        e.preventDefault();
        formName = $$("#login");
        $$.post('http://gocodeops.com/hackathon_guyana_app/public/merchant/login', {code: $$("#code").val(), password: $$("#password").val()}, function(data){
            if (data != '[]') {
                data = JSON.parse(data);
                console.log(data);
                localStorage.setItem('merchant_id', data[0].id);
                localStorage.setItem('merchant_code', data[0].code);
                mainView.router.loadPage('views/my-transactions.html');
            } else {
                myApp.alert("Password or Code is incorrect!");
            }
        });
    });
});