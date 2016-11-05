// localStorage.setItem('receiver_id', 'FO003090M');
var receiver_id = localStorage.getItem('receiver_id');

myApp.onPageBeforeInit('transactions', function (page) {
    myApp.showPreloader();
    setInterval(function(){
        $$.get('http://gocodeops.com/hackathon_guyana_app/public/transactions/' + receiver_id, function(data){
            $$("#transactions").html('');
            data = JSON.parse(data);
            console.log(data);
            $$.each(data, function(i,value){
                $$("#transactions").append('<div class="card facebook-card">\
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
            });
        });
        myApp.hidePreloader();
    }, 2000);
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