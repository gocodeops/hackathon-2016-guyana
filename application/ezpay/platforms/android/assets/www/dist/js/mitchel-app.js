// localStorage.setItem('receiver_id', 'FO003090M');
var receiver_id = localStorage.getItem('receiver_id');

function getBalance(pageName){
    $$.get('http://gocodeops.com/hackathon_guyana_app/public/read/users/' + receiver_id, function(data){
        data = JSON.parse(data);

        var balance = parseInt(data.balance);
        balance = balance.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, '$1,');

        $$("#balance_" + pageName).html(" $ "+ balance);
    });
}

$$(document).on('pageInit', function (e) {
    var page = e.detail.page;
    var name = page.name;
    getBalance(name);
});

myApp.onPageBeforeInit('transactions', function (page) {
    var data;

    $$.get('http://gocodeops.com/hackathon_guyana_app/public/transactions/' + receiver_id, function(data){
        $$("#transactions").html('');
        data = JSON.parse(data);

        var append_limit = 3;
        var which = 0;
        var start = 0;

        loopTransactions(start);

        // return last i
        function loopTransactions(start_i){

            for (var i = start_i; i < append_limit; i++) {
                start = i+1;
                $$("#transactions").append('<div style="display:none;" class="card facebook-card animated fadeInLeft">\
                  <div class="card-header">\
                    <div class="facebook-name">Pension Payment</div>\
                    <div class="facebook-date">'+data[i].date+'</div>\
                  </div>\
                  <div class="card-content">\
                    <div class="card-content-inner">\
                      <p>On this day you received an amount of '+data[i].amount+' for pension payment</p>\
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
            $$("#transactions").find('.card').eq(which).show().addClass('animated fadeIn');
            which++;
            if ( which < start ) {
                setTimeout(showTransactions, 500);
            }
        }

        $$('#show_more').on('click', function(){
            loopTransactions(start);
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