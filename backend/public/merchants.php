<?php
    // login route
    $app->post('/merchant/login', function ($request, $response, $args) {

        $query = DB::table('merchants')
            ->where('code', $_POST['code'])
            ->where('password', sha1($_POST['password']))->get();
        if ($query != "[]") {
            echo json_encode($query);
        } else {
            echo 0;
        }

    });

    // get payments byID
    $app->get('/merchant/payments/{code}', function ($request, $response, $args) {
        $query = DB::table('view_payments_merchants')->where('receiver_id', $args['code'])->orderBy('id', DESC)->get();
        // return the query
        print_r(json_encode($query));
    });

    // get payments byID
    $app->get('/merchants/get/{code}', function ($request, $response, $args) {
        $query = DB::table('merchants')->where('code', $args['code'])->orderBy('id', DESC)->get();
        // return the query
        print_r(json_encode($query));
    });


?>