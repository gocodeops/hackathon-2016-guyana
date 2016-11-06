var myApp = new Framework7({
	material: true,
	modalTitle: 'Ez-Pay'
});

var $$ = Dom7;

var mainView = myApp.addView('.view-main');

var merchant_id, merchant_code;

myApp.onPageInit('index', function (page) {
    merchant_id = localStorage.getItem('merchant_id');
    merchant_code = localStorage.getItem('merchant_code');

	// myApp.showIndicator();
    if (localStorage.getItem('merchant_code')) {
        mainView.router.loadPage('views/my-transactions.html');
    } else {
        mainView.router.loadPage('views/login.html');
    }


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

                merchant_id = localStorage.getItem('merchant_id');
                merchant_code = localStorage.getItem('merchant_code');

                mainView.router.loadPage('views/my-transactions.html');
            } else {
                myApp.alert("Password or Code is incorrect!");
            }
        });
    });
});

function getBalance(pageName){
    $$.get('http://gocodeops.com/hackathon_guyana_app/public/merchants/get/' + merchant_code, function(data){
        data = JSON.parse(data);
        // console.log(data);
        var balance = parseInt(data[0].balance);

        balance = balance.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, '$1,');

        $$("#balance_" + pageName).html(" $ "+ balance);
    });
}

$$(document).on('pageInit', function (e) {
    var page = e.detail.page;
    var name = page.name;
    getBalance(name);
    console.log("Balance processing");
    // console.log('init page: ' + name);

});

myApp.onPageBeforeInit('payments', function (page) {

    // $.ajax({
    //     method: 'POST',
    //     url: 'http://gocodeops.com/hackathon_guyana_app/public/settoken',
    //     data: {id: receiver_id, token: localStorage.getItem('device_token')},
    //     success: function(){
    //         console.log('token set!' + localStorage.getItem('device_token'));
    //     }
    // });

    var data;

    $$.get('http://gocodeops.com/hackathon_guyana_app/public/merchant/payments/' + merchant_code, function(data){
        $$("#transactions").html('');
        data = JSON.parse(data);
        console.log(data);
        var append_limit = 3;
        var which = 0;
        var start = 0;

        loopTransactions(start);

        // return last i
        function loopTransactions(start_i){

            for (var i = start_i; i < append_limit; i++) {
                start = i+1;

                var amount = parseInt(data[i].amount);
        		amount = amount.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, '$1,');

                $$("#payments").append('<div style="display:none;" class="card facebook-card animated fadeInLeft">\
                  <div class="card-header">\
                    <div class="facebook-name"></div>\
                    <span class="label">'+data[i].date+'</span>\
                  </div>\
                  <div class="card-content">\
                    <div class="card-content-inner">\
                      <p>On this day '+data[i].name+' received an amount of <span class="amount">$'+amount+'</span> from '+data[i].sender_id+'</p>\
                    </div>\
                  </div>\
                </div>');

                if ( start == (append_limit - 1) ) {
                    showTransactions();
                }
            }

            append_limit += 3;
        }


        function showTransactions(){
            $$("#payments").find('.card').eq(which).show().addClass('animated fadeIn');
            which++;
            if ( which < start ) {
                setTimeout(showTransactions, 500);
            }
        }

        $$('#show_more_payments').on('click', function(){
            loopTransactions(start);
        });
    });
});