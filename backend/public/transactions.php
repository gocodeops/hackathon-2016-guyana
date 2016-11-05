<?php
    // get transaction byID
    $app->get('/transactions/{receiver_id}', function ($request, $response, $args) {
        $query = DB::table('transactions')->where('receiver_id', $args['receiver_id'])->get();
        // return the query
        print_r(json_encode($query));
    });

?>