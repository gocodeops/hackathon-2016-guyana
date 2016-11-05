// localStorage.setItem('receiver_id', 'FO003090M');
var receiver_id = localStorage.getItem('receiver_id');

function getBalance(pageName){
    $$.get('http://gocodeops.com/hackathon_guyana_app/public/read/users/' + receiver_id, function(data){
        data = JSON.parse(data);
        $$("#balance_" + pageName).html(data.balance);
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

        console.log(data);
        var append_limit = 3;
        var which = 0;
        var start_i = 0;

        loopTransactions(start_i);

        // return last i
        function loopTransactions(start_i){
            for (var i = start_i; i < append_limit; i++) {
                start_i = i;
                $$("#transactions").append('<div style="display:none;" class="card facebook-card animated fadeIn">\
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

                if ( i == (append_limit - 1) ) {
                    showTransactions();
                }
            }

            console.log("append limit:" + append_limit);
            console.log("start_i:" + start_i);
            append_limit += 3;
            console.log("append limit:" + append_limit);
            console.log("start_i:" + start_i);
        }


        function showTransactions(){
            $$("#transactions").find('.card').eq(which).show().addClass('animated fadeIn');
            which++;
            if ( which < append_limit ) {
                setTimeout(showTransactions, 500);
            }
        }

        $$('#show_more').on('click', function(){
            loopTransactions(start_i);
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
    });
});