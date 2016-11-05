myApp.onPageInit('login', function (page) {

    $$('#first_login').click(function() {

    	$$.post('http://gocodeops.com/hackathon_guyana_app/public/index.php/app_login', 
        {
            id: $$('#id').val()
        }, function(data) {
            data = JSON.parse(data);
            console.log(data);
            if(data.success == 'false'){
                myApp.alert("Couldn't log in");
            } else if(data) {

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

                $$('#first_login').attr('href', login_url);
                $$('#first_login').click();

            }
        });

     // alert("Yo");

    });

});

myApp.onPageInit('set_password', function (page) {

    $$('#create_password').click(function() {

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
		            if(data) {
		            	$$('#create_password').attr('href', 'views/account.html');
		            	$$('#create_password').click();
		            } else if(data == '[]'){
		                myApp.alert("Couldn't log in");
		            }
	        });
		}

    });

});

myApp.onPageInit('login_normal', function (page) {

    $$('#login').click(function() {

        // var receiver_id = localStorage.getItem('receiver_id');

        $$.post('http://gocodeops.com/hackathon_guyana_app/public/index.php/login', 
            {
                id: localStorage.getItem('receiver_id'),
                password: $$('#password').val()
            }, function(data) {
                alert(data);
                if(data == 1) {
                    $$('#login').attr('href', 'views/account.html');
                    $$('#login').click();
                }
        });

    });

});