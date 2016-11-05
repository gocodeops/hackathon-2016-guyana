// tested and worked!
myApp.onPageInit('login', function (page) {

    // if (localStorage.getItem('receiver_id') != null) {
    //     console.log("user exists");
    //     if (localStorage.getItem('first_use') != null) {
    //         console.log("first use exists");
    //         mainView.router.loadPage('views/login_normaal.html')
    //     }else{
    //         mainView.router.loadPage('views/set_password.html');
    //     }
    // }
    
    
    $$('#login').submit(function(e) {
        e.preventDefault();
    	$$.post('http://gocodeops.com/hackathon_guyana_app/public/index.php/app_login',
        {
            id: $$('#id').val()
        }, function(data) {
            data = JSON.parse(data);
            console.log(data);
            if(data.success == 'false'){
                myApp.alert("Couldn't log in");
            } else {
                // myApp.alert("hij mag inloggen!");
                var first_use = data[0].first_use;
                var login_url = '';

                //Set localStorage
                localStorage.setItem('receiver_id', $$('#id').val());
                localStorage.setItem('first_use', first_use);

                if(first_use == 0) {
                    login_url = 'views/login_normaal.html';
                } else if(first_use == 1) {
                    login_url = 'views/set_password.html';
                }
                mainView.router.loadPage(login_url);
            }
        });
    });
});

// not tested
myApp.onPageInit('set_password', function (page) {

    $$('#create_password').submit(function(e) {
        e.preventDefault();
    	// var id =
    	var password1 = $$('#password1').val();
		var password2 = $$('#password2').val();

		if(password1 != password2) {
			myApp.alert("Password does not match!");
		} else if(password1 == password2) {
			$$.post('http://gocodeops.com/hackathon_guyana_app/public/index.php/app_create_password',
		        {
		            id: $$('#id').val(),
			    	password: $$('#password1').val()
		        }, function(data) {
		            if(data != '[]') {
                        mainView.router.loadPage('views/account.html');
		            } else {
		                myApp.alert("Couldn't log in");
		            }
	        });
		}
    });
});

// tested and works
myApp.onPageInit('login_normal', function (page) {

    $$('#login_normaal').submit(function(e) {
        e.preventDefault();
        // myApp.alert("submitted login normaal");
        $$.post('http://gocodeops.com/hackathon_guyana_app/public/index.php/login',
            {
                id: localStorage.getItem('receiver_id'),
                password: $$('#password').val()
            }, function(data) {
                // alert(data);
                if(data == 1) {
                    mainView.router.loadPage('views/transactions.html');
                } else {
                    myApp.alert('Password not correct');
                }
        });
    });
});