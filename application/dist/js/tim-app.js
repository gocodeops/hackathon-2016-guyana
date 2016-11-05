myApp.onPageInit('login', function (page) {

    $$('#login').click(function() {

    	$$.post('http://gocodeops.com/hackathon_guyana_app/public/index.php/app_login', 
        {
            id: $$('#id').val()
        }, function(data) {
            data = JSON.parse(data);
            if(data) {

                //Set localStorage
                localStorage.setItem('receiver_id', $$('#id').val());
                localStorage.setItem('first_use', data[0].first_use);

                $$('#login').attr('href', 'views/set_password.html');
                $$('#login').click();

            } else if(data.success == 'false'){
                myApp.alert("Couldn't log in");
            }
        });

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
		            	$$('#login').attr('href', 'views/account.html');
		            	$$('#login').click();
		            } else if(data == '[]'){
		                myApp.alert("Couldn't log in");
		            }
	        });
		}

    });

});