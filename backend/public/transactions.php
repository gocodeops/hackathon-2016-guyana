<?php
    // get transaction byID
    $app->get('/transactions/{receiver_id}', function ($request, $response, $args) {
        $query = DB::table('transactions')->where('receiver_id', $args['receiver_id'])->orderBy('id', DESC)->get();
        // return the query
        print_r(json_encode($query));
    });

    // make a new transaction
    $app->post('/transactions', function($request, $response, $args){
        $data   = $request->getParsedBody();

        // split the data
        $amount = $data['amount'];
        $receiver_id = $data['receiver_id'];

        // make a log of this transaction
        DB::table('transactions')->insert($data);

        // get current balance
        $get_balance = DB::table('users')->where('id', $receiver_id)->get();
        $user_balance = 0;
        foreach ($get_balance as $value) {
            $user_balance = $value->balance;
        }

        $next_balance = $user_balance + $amount;
        print_r($next_balance);

        // update values
        $dataUpdate = array(
            'balance'    => $next_balance,
        );
        // update the balance of the user
        $query  = DB::table('users')->where('id', $receiver_id)->update($dataUpdate);
    });
?>