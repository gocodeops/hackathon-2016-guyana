<?php
    // get transaction byID
    $app->get('/transactions/{receiver_id}', function ($request, $response, $args) {
        $query = DB::table('view_transactions')->where('receiver_id', $args['receiver_id'])->orderBy('id', DESC)->get();
        // return the query
        print_r(json_encode($query));
    });

    // make a new transaction
    $app->post('/transactions', function($request, $response, $args){
        $data   = $request->getParsedBody();
        // split the data
        $amount = $data['amount'];

        // get all users
        $users = DB::table('users')->where('active', '1')->get();

        // loop through the users
        foreach ($users as $key => $value) {
            $receiver_id = $value->id;

            $logdata = array(
                'receiver_id' => $receiver_id,
                'amount' => $amount
                );
            // make a log of this transaction
            DB::table('transactions')->insert($logdata);

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
            DB::table('users')->where('id', $receiver_id)->where('active', '1')->update($dataUpdate);
        }
    });
?>