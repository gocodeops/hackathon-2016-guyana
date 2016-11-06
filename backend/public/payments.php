<?php

	$app->get('/payments', function($request, $response, $args) {

		$query = DB::table('payments')->get();
		// return the query
	    print_r(json_encode($query));

	});

    // get transaction byID
    $app->get('/payments/{sender_id}', function ($request, $response, $args) {
        $query_merchants = DB::table('view_payments_merchants')->where('sender_id', $args['sender_id'])->orderBy('id', DESC)->get();

        $query_services = DB::table('view_payments_services')->where('sender_id', $args['sender_id'])->orderBy('id', DESC)->get();

        $final_array = array_merge($query_merchants, $query_services);
        function compare_first_key_date($a, $b) {
            $a_keys = array_keys($a);
            $a_date = strtotime($a_keys[0]);
            $b_keys = array_keys($b);
            $b_date = strtotime($b_keys[0]);
            return $a_date - $b_date;
        }
        uasort($final_array, 'compare_first_key_date');
        print_r(json_encode($final_array));
    });

    // make a new payment
    $app->post('/new/payments', function($request, $response, $args){
        $data   = $request->getParsedBody();

        print_r($data);
        // split the data
        $amount = $data['amount'];
        $sender_id = $data['sender_id'];
        $receiver_id = $data['receiver_id'];

        // make a log of this transaction
        DB::table('payments')->insert($data);

        // get current balance
        $get_balance = DB::table('users')->where('id', $sender_id)->get();
        $user_balance = 0;
        foreach ($get_balance as $value) {
            $user_balance = $value->balance;
        }

        // print_r($user_balance);
        $next_balance = $user_balance - $amount;
        print_r($next_balance);

        // update values
        $dataUpdate = array(
            'balance'    => $next_balance,
        );
        // update the balance of the user
        DB::table('users')->where('id', $sender_id)->update($dataUpdate);

        // get merchant balance
        $merchant_balance_query = DB::table('merchants')->where('code', $receiver_id)->get();
        // print_r($merchant_balance_query);
        $merchant_balance = 0;
        foreach ($merchant_balance_query as $value) {
            $merchant_balance = $value->balance;
        }
        $merchant_next_balance = $merchant_balance + $amount;

        // update values
        $merchant_data_update = array(
            'balance'    => $merchant_next_balance,
        );
        // update the balance of the user
        DB::table('merchants')->where('code', $receiver_id)->update($merchant_data_update);
    });
?>