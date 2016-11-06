//Login routing
myApp.onPageInit('login', function(page) {

    myApp.hideIndicator();    
    
    $$('#login').submit(function(e) {
        e.preventDefault();
        $$.post('http://gocodeops.com/hackathon_guyana_app/public/index.php/app_login',
        {
            id: $$('#id').val()
        }, function(data) {
            data = JSON.parse(data);
            console.log(data);
            if(data.success == 'false') {
                myApp.alert("Couldn't log in");
            } else {
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

//Create password on first use
myApp.onPageInit('set_password', function (page) {

    $$('#create_password').submit(function(e) {
        e.preventDefault();

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
                    console.log(data);
		            if(data != '[]') {
                        localStorage.setItem('first_use', '0');
                        mainView.router.loadPage('views/transactions.html');
		            } else {
		                myApp.alert("Couldn't log in");
		            }
	        });
		}
    });
});

//Insert password if not first use
myApp.onPageInit('login_normal', function (page) {

    $$('#login_normaal').submit(function(e) {
        e.preventDefault();
        $$.post('http://gocodeops.com/hackathon_guyana_app/public/index.php/login',
            {
                id: localStorage.getItem('receiver_id'),
                password: $$('#password').val()
            }, function(data) {
                if(data == 1) {
                    mainView.router.loadPage('views/transactions.html');
                } else {
                    myApp.alert('Password not correct');
                }
        });
    });
});

//Logout -> Forget ID & everything
$$('#logout').on('click', function () {
    myApp.confirm('Are you sure you want to log out?',
      function () {

        //Empty localStorage
        localStorage.removeItem('first_use');
        localStorage.removeItem('receiver_id');

        //Go to index
        mainView.router.loadPage('views/login.html');

      },
      function () {
        //Continue logging out...
      }
    );
});  