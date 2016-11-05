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
    myApp.showIndicator();

    function getTransactions(limit){
        $$.get('http://gocodeops.com/hackathon_guyana_app/public/transactions/' + receiver_id, function(data){
            $$("#transactions").html('');
            data = JSON.parse(data);

            $$.each(data, function(i,value){
                // console.log(i);

                if (i < limit) {
                    // console.log("kleiner dan limit");
                    $$("#transactions").append('<div class="card facebook-card animated fadeInUp">\
                      <div class="card-header">\
                        <div class="facebook-name">Pension Payment</div>\
                        <div class="facebook-date">'+value.date+'</div>\
                      </div>\
                      <div class="card-content">\
                        <div class="card-content-inner">\
                          <p>On this day you received an amount of '+value.amount+' for pension payment</p>\
                        </div>\
                      </div>\
                    </div>');
                }
            });
        });
    }

    getTransactions(1);
    myApp.hideIndicator();
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