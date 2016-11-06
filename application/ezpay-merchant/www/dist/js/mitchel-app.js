myApp.onPageInit('make-payment', function (page) {
    $$("#make_payment").submit(function(e){
        e.preventDefault();
        $$.post('http://gocodeops.com/hackathon_guyana_app/public/login', {
            id: $$("#id").val(),
            password: $$("#password").val(),
        }, function(data){
            data = JSON.parse(data);
            if (data == 1) {
                myApp.confirm('Are you sure?', 'Confirmation', function () {
                    $$.post('http://gocodeops.com/hackathon_guyana_app/public/new/payments', {
                        amount: $$("#amount").val(),
                        sender_id: $$("#id").val(),
                        receiver_id: merchant_code,
                    }, function(data){
                        myApp.alert("Transaction made, amount: $" + $$("#amount").val());
                        mainView.router.loadPage('views/my-transactions.html');
                    });
                });
            } else {
                myApp.alert('ID or Password incorrect!');
            }
        });
    });
});