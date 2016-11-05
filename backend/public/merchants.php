<?php
    // login route
    $app->post('/merchant/login', function ($request, $response, $args) {

        $query = DB::table('merchants')
            ->where('code', $_POST['code'])
            ->where('password', sha1($_POST['password']));
        if($query->count() > 0) {
            echo 1;
        } else {
            echo json_encode(array('success'=>'false'));
        }

    });


?>