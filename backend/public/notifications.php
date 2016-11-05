<?php

    $app->post('/notifications', function($request, $response, $args){

        $query = DB::table($_POST['table'])->where('created_at', '>=',$_POST['date']);

        if($query->count() > 0) {
            echo 1;
        } else {
            echo 0;
        }
    });

    $app->post('/gettoken', function($request, $response, $args){
        $query = DB::table('users')->select('token')->where('id', $_POST['id'])->get();
        print_r(json_encode($query));
    });

    $app->post('/settoken', function($request, $response, $args){

        $data = array(
            'token' => $_POST['token']
        );

        $query = DB::table('users')->where('id', $_POST['id'])->update($data);
    });
?>