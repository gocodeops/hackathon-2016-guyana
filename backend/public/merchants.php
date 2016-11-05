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


?>