var myApp = new Framework7({
	material: true,
	modalTitle: 'Ez-Pay'
});

var $$ = Dom7;

var mainView = myApp.addView('.view-main');

var usertype, receiver_id, merchant_id, merchant_code;

checkUser();

myApp.onPageInit('*', function (page){
    checkUser();
});

//Global variables for pullToRefresh
var startMyIncome,
    startMyInvoices,
    startTransaction;

function checkUser() {
    if (localStorage.getItem('receiver_id')) {
        usertype = 'user';
        receiver_id = localStorage.getItem('receiver_id');
        $$('.item-link.merchant').hide();
        console.log(usertype);
    }else if(localStorage.getItem('merchant_id')){
        usertype = 'merchant';
        merchant_id = localStorage.getItem('merchant_id');
        merchant_code = localStorage.getItem('merchant_code');
        $$('.item-link.user').hide();
        console.log(usertype);
    }
}


function currencyInt(intString) {
    var val = parseInt(intString);
    val = val.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, '$1,');

    return val;
}

function getBalance(pageName, usertype){
    if (usertype == 'user') {
        $$.get('http://gocodeops.com/hackathon_guyana_app/public/read/users/' + receiver_id, function(data){
            data = JSON.parse(data);

            var balance = currencyInt(data.balance);
            $$("#balance_" + pageName).html(" $ "+ balance);
        });
    }else if(usertype = 'merchant'){
        $$.get('http://gocodeops.com/hackathon_guyana_app/public/merchants/get/' + merchant_code, function(data){
            data = JSON.parse(data);
            console.log(data);
            var balance = currencyInt(data[0].balance);
            $$("#balance_" + pageName).html(" $ "+ balance);
        });
    }
}

$$(document).on('pageInit', function (e) {
    var page = e.detail.page;
    var name = page.name;
    getBalance(name, usertype);
    // console.log("Balance processing");
    console.log('init page: ' + name);

});

myApp.onPageInit('index', function (page) {
	myApp.showIndicator();

    mainView.router.loadPage('views/user-login.html');

    var first_use;

    if(localStorage.getItem('first_use')) {
        first_use = localStorage.getItem('first_use');
    }

    if(localStorage.getItem('receiver_id') && first_use == '0') {
        myApp.hideIndicator();
        mainView.router.loadPage('views/second-login.html');
        var receiver_id = localStorage.getItem('receiver_id');
    }else if(localStorage.getItem('receiver_id')) {
        myApp.hideIndicator();
        mainView.router.loadPage('views/first-login.html');
        var receiver_id = localStorage.getItem('receiver_id');
    }else if(localStorage.getItem('merchant_code')) {
        myApp.hideIndicator();
        mainView.router.loadPage('views/my-transactions.html');
    }else {
        myApp.hideIndicator();
        mainView.router.loadPage('views/user-login.html');
    }
}).trigger();



//Login routing
myApp.onPageInit('user-login', function(page) {

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
                var login_url;

                //Set localStorage
                localStorage.setItem('receiver_id', $$('#id').val());
                localStorage.setItem('first_use', first_use);

                if(first_use == 0) {
                    login_url = 'views/second-login.html';
                } else if(first_use == 1) {
                    login_url = 'views/first-login.html';
                }
                mainView.router.loadPage(login_url);
            }
        });
    });

});

//Create password on first use
myApp.onPageInit('first-login', function (page) {

    $$('#first-login').submit(function(e) {
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
                        mainView.router.loadPage('views/my-transactions.html');
                    } else {
                        myApp.alert("Couldn't log in");
                    }
            });
        }
    });
});

//Insert password if not first use
myApp.onPageInit('second-login', function (page) {

    $$('#second-login').submit(function(e) {
        e.preventDefault();
        $$.post('http://gocodeops.com/hackathon_guyana_app/public/index.php/login',
            {
                id: localStorage.getItem('receiver_id'),
                password: $$('#password').val()
            }, function(data) {
                if(data == 1) {
                    mainView.router.loadPage('views/my-transactions.html');
                } else {
                    myApp.alert('Password not correct');
                }
        });
    });
});

myApp.onPageInit('merchant-login', function (page) {

    $$("#merchant-login").submit(function(e){
        e.preventDefault();
        formName = $$("#merchant-login");
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

myApp.onPageBeforeInit('account', function (page) {
    console.log(receiver_id);
    $$.get('http://gocodeops.com/hackathon_guyana_app/public/read/users/' + receiver_id, function(data){
        data = JSON.parse(data);
        console.log(data);
        $$("#firstname").html(data.firstname);
        $$("#lastname").html(data.lastname);
        $$("#gender").html(data.gender);
        $$("#district").html(data.district);
        $$("#spouse").html(data.spouse);
        $$("#birth_date").html(data.birth_date);
        $$("#address").html(data.address);
        $$("#housenumber").html(data.housenumber);
        $$("#telephone").html(data.telephone);
        $$("#email").html(data.email);

        $$(".account-info").show().addClass("animated fadeInLeft");
    });
});

myApp.onPageBeforeInit('my-transactions', function (page) {

    var data;

    startTransaction = (function() {
        if (usertype == 'user') {
        var data;

            $$.get('http://gocodeops.com/hackathon_guyana_app/public/payments/' + receiver_id, function(data){
            $$("#payments").html('');
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

                    if (data[i].name == undefined) {
                        name = data[i].receiver_id;
                    } else {
                        name = data[i].name;
                    }
                    $$("#payments").append('<div style="display:none;" class="card facebook-card animated fadeInLeft">\
                      <div class="card-header">\
                        <div class="facebook-name">Payment</div>\
                        <div class="facebook-date">'+data[i].date+'</div>\
                      </div>\
                      <div class="card-content">\
                        <div class="card-content-inner">\
                          <p>On this day you payed '+name+' an amount of <span class="amount">$'+amount+'</span></p>\
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

    } else if (usertype == 'merchant') {
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
    }
    });

    startTransaction(); //Reload
});

//Logout -> Forget ID & everything
$$('#logout').on('click', function () {
    myApp.confirm('Are you sure you want to log out?',
      function () {

        //Empty localStorage
        localStorage.clear();

        //Go to index
        mainView.router.loadPage('views/user-login.html');

      },
      function () {
        //Continue logging out...
      }
    );
});

//User-To-User payment
myApp.onPageInit('person2person', function (page) {

    $$('#user2user').submit(function(e) {
        e.preventDefault();

        $$.post('http://gocodeops.com/hackathon_guyana_app/public/new/user_to_user_payment', {
                amount: $$('#u2u_amount').val(),
                sender_id: localStorage.getItem('receiver_id'),
                receiver_id: $$('#u2u_receiver_id').val()
            }, function(data) {
                if(data == 405) {
                    myApp.alert("Please verify the Sender ID or Receiver ID.");
                } else if(data == 403) {
                    myApp.alert("Insufficient balance.");
                } else {
                    myApp.confirm('Are you sure you want to make payment to '+$$('#u2u_receiver_id').val()+'?',
                      function () {

                        myApp.alert("User to user payment has been made.");
                        mainView.router.loadPage('views/my-transactions.html');


                      },
                      function () {
                        //Cancel dialog
                      }
                    );
                }
        });
    });

});

myApp.onPageInit('income', function (page) {
    var ptrContent = $$('.pull-to-refresh-content');
    ptrContent.on('refresh', function (e){
        setTimeout(function(){

        },2000);
        myApp.pullToRefreshDone(ptrContent),
        startMyIncome(); //Reload
        getBalance(page.name, usertype);
    })
});

myApp.onPageInit('invoices', function (page) {
    var ptrContent = $$('.pull-to-refresh-content');
    ptrContent.on('refresh', function (e){

        myApp.pullToRefreshDone(ptrContent);
        startMyInvoices();
        getBalance(page.name, usertype);
    })
});

myApp.onPageInit('my-transactions', function (page) {
    var ptrContent = $$('.pull-to-refresh-content');
    ptrContent.on('refresh', function (e){

        // myApp.alert('het gaat'),
        myApp.pullToRefreshDone(ptrContent);
        startTransaction(); //Reload
        getBalance(page.name, usertype);
    })
});


// deviceready function for cordova
document.addEventListener("deviceready", onDeviceReady, false);

function onDeviceReady() {
	window.plugins.PushbotsPlugin.initialize("581e282a4a9efa1b398b456e", {"android":{"sender_id":"31109533359"}});

    window.plugins.PushbotsPlugin.getRegistrationId(function(token){
        console.log("Registration Id:" + token);
    });
}

myApp.onPageInit('income', function (page) {
    var data;

    startMyIncome = (function() {
        $$.get('http://gocodeops.com/hackathon_guyana_app/public/transactions/' + receiver_id, function(data){
            $$("#income").html('');
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
                    $$("#income").append('<div style="display:none;" class="card facebook-card animated fadeInLeft">\
                      <div class="card-header">\
                        <div class="facebook-name">Payment</div>\
                        <div class="facebook-date">'+data[i].date+'</div>\
                      </div>\
                      <div class="card-content">\
                        <div class="card-content-inner">\
                          <p>On this day you received an amount of '+data[i].amount+' from '+data[i].name+' </p>\
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
                $$("#income").find('.card').eq(which).show().addClass('animated fadeIn');
                which++;
                if ( which < start ) {
                    setTimeout(showTransactions, 500);
                }
            }

            $$('#show_more_income').on('click', function(){
                loopTransactions(start);
            });
        });

    });

    startMyIncome(); //Reload

});

myApp.onPageInit('make-invoice', function (page) {
    $$("#make-invoice").submit(function(e){
        e.preventDefault();
        $$.post('http://gocodeops.com/hackathon_guyana_app/public/create/invoices', {
            amount: $$("#amount").val(),
            sender_id: merchant_code,
            receiver_id: $$("#id").val()
        }, function(data){
            myApp.alert("Invoice succesfully made!");
            mainView.router.loadPage('views/my-transactions.html');
        });
    });
});

myApp.onPageInit('invoices', function (page) {
    startMyInvoices = (function() {

        if (usertype == "user") {
            $$.get('http://gocodeops.com/hackathon_guyana_app/public/invoice/get/' + receiver_id,
                function(data){
                data = JSON.parse(data);
                console.log(data);

                $$("#append_invoices").html('');

                $$.each(data, function(i,value){
                    $$("#append_invoices").append('<li class="accordion-item">\
                          <a href="" class="item-link item-content">\
                              <div class="item-inner">\
                                  <div class="item-title">Invoice '+value.name+'</div>\
                                  <div class="item-after">'+value.date+'</div>\
                              </div>\
                          </a>\
                          <div class="accordion-item-content content-block">\
                            <p>A payment of <span class="bold">'+value.amount+'</span> is to be made</p>\
                            <p class="buttons-row">\
                              <a id="status-change-accept" sender_id="'+value.sender_id+'" receiver_id="'+value.receiver_id+'" amount="'+value.amount+'" status="1" invoice_id="'+value.id+'" class="button color-green">Accept</a>\
                              <a id="status-change-decline" status="0" invoice_id="'+value.id+'" class="button color-red">Decline</a>\
                            </p>\
                          </div>\
                      </li>');
                });

                $$('[id^="status-change"]').click(function(){
                    amount = $$(this).attr('amount');
                    sender_id = $$(this).attr('sender_id');
                    receiver_id = $$(this).attr('receiver_id');
                    status = $$(this).attr('status');
                    id = $$(this).attr('invoice_id');
                    if (status == 1) {
                        $$.post('http://gocodeops.com/hackathon_guyana_app/public/update/invoice', {
                            amount: amount,
                            sender_id: sender_id,
                            receiver_id: receiver_id,
                            status: status,
                            id: id
                        }, function(data){
                            $$.post('http://gocodeops.com/hackathon_guyana_app/public/new/payments', {
                                amount: amount,
                                sender_id: receiver_id,
                                receiver_id: sender_id,
                            }, function(data){
                                // myApp.alert(data);
                                myApp.alert("Invoice succesfully paid!");
                                mainView.router.loadPage('views/my-transactions.html');
                            });
                        });
                    } else {
                        $$.post('http://gocodeops.com/hackathon_guyana_app/public/update/invoice', {
                            id: $$(this).attr('invoice_id'),
                            status: $$(this).attr('status')
                        }, function(data){
                            myApp.alert("Invoice declined!");
                            mainView.router.loadPage('views/my-transactions.html');
                        });
                    }
                 });
            });
        } else if (usertype == "merchant"){
            $$.get('http://gocodeops.com/hackathon_guyana_app/public/merchants/invoice/' + merchant_code,
                function(data){
                data = JSON.parse(data);
                console.log(data);

                $$("#append_invoices").html('');

                $$.each(data, function(i,value){
                    $$("#append_invoices").append('<li class="accordion-item">\
                          <a href="" class="item-link item-content">\
                              <div class="item-inner">\
                                  <div class="item-title">Invoice to '+value.receiver_id+'</div>\
                                  <div class="item-after">'+value.date+'</div>\
                              </div>\
                          </a>\
                          <div class="accordion-item-content content-block">\
                            <p>A payment of <span class="bold">'+value.amount+'</span> is to be made</p>\
                          </div>\
                      </li>');
                });
            });
        }
    });
    startMyInvoices(); //Reload
});