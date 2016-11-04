<script type="text/javascript">
    if (sessionStorage.getItem('user_login') != null) {
        window.location = "home";
    }
</script>
<!-- include all the css, metadata -->
<?php include "head.php"; ?>

<body class="landing-page">

<div class="color-line"></div>
<div class="login-container">
    <div class="row">
        <div class="col-md-12">
            <div class="text-center m-b-md">
                <!-- <img src="images/NAIS-logo-3.JPG" height="120px"> -->
                <h3>Pension Payment</h3>
            </div>
            <div class="hpanel">
                <div class="panel-body">
                        <form action="#" id="login_form">
                            <div class="form-group">
                                <label class="control-label" for="username">ID</label>
                                <input type="text" placeholder="example@gmail.com" title="Please enter you username" required="" value="" name="username" id="id" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="password">Password</label>
                                <input type="password" title="Please enter your password" placeholder="******" required="" value="" name="password" id="password" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-success btn-block">Login</button>
                            <!-- <a class="btn btn-default btn-block" href="home">Login</a> -->
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
    <!-- Vendor scripts -->
    <script src="vendor/jquery/dist/jquery.min.js"></script>
    <script src="vendor/jquery-ui/jquery-ui.min.js"></script>
    <script src="vendor/slimScroll/jquery.slimscroll.min.js"></script>
    <script src="vendor/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="vendor/sweetalert/lib/sweet-alert.min.js"></script>

<script type="text/javascript">

    $('#login_form').submit(function(e) {

        e.preventDefault();

        $.post('http://gocodeops.com/hackathon_guyana_app/public/index.php/login', 
        {
            id: $('#id').val(),
            password: $('#password').val()
        }, function(data) {
            if(data == 1) {
                window.location = 'users.php';
            } else {
                alert("Couldn't log in");
            }
    });

    });
</script>