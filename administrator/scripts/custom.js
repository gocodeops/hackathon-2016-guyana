$(document).ready(function() {

    // login form
    $("#login_form").submit(function(e){
        e.preventDefault();

        $.post('backend/index.php/user/login/', {
            email: $("#email").val(),
            password: $("#password").val()
        }, function(data){
            if (data != 0) {
                alert("Bedankt voor het inloggen");
                // send the user to the homepage
                window.location = "home.php";
            } else {
                alert("Email of Wachtwoord onjuist!");
            }
        });
    });
});