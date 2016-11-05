<?php

    $app->post('/notification', function($request, $response, $args){

        $query = DB::table($_POST['table'])->where('created_at', '>=',$_POST['date']);

        if($query->count() > 0) {
            echo 1;
        } else {
            echo 0;
        }
    });

?>