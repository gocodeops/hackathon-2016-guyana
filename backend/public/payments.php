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

        $query_users = DB::table('view_payments_users')->where('sender_id', $args['sender_id'])->orderBy('id', DESC)->get();

        $final_array = array_merge($query_merchants, $query_services, $query_users);
        // $final_final_array = array_merge($final_array, $query_users);
        // function compare_first_key_date($a, $b) {
        //     @$a_keys = array_keys($a);
        //     @$a_date = strtotime($a_keys[0]);
        //     @$b_keys = array_keys($b);
        //     @$b_date = strtotime($b_keys[0]);
        //     return $a_date - $b_date;
        // }
        // uasort($final_array, 'compare_first_key_date');
        function compare_keys($a, $b) {
            if($a->id == $b->id) {
                return 0;
            }
            return ($a->id > $b->id) ? -1 : 1;
        }

        usort($final_array, 'compare_keys');
        // print_r($final_array);
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
        // print_r($next_balance);

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


    //Make User-To-User payment
    $app->post('/new/user_to_user_payment', function($request, $response, $args){
        $data   = $request->getParsedBody();

        // print_r($data);
        // split the data
        $amount = $data['amount'];
        $sender_id = $data['sender_id'];
        $receiver_id = $data['receiver_id'];

        // make a log of this transaction
        DB::table('payments')->insert($data);

        // get current balance
        $get_balance = DB::table('users')->where('id', $sender_id)->get();

        //Validate if sender ID exists
        if(DB::table('users')->where('id', $sender_id)->count() == 0) {
            echo 405;
            exit();
        }

        $user_balance = 0;
        foreach ($get_balance as $value) {
            $user_balance = $value->balance;
        }

        //Validate if receiver ID exists
        if(DB::table('users')->where('id', $receiver_id)->count() == 0) {
            echo 405;
            exit();
        }

        // print_r($user_balance);
        $next_balance = $user_balance - $amount;
        // print_r($next_balance);

        if($next_balance < 0) {
            echo 403;
            exit();
        }

        // update values
        $dataUpdate = array(
            'balance'    => $next_balance,
        );
        // update the balance of the user
        DB::table('users')->where('id', $sender_id)->update($dataUpdate);

        // get user balance
        $user_balance_query = DB::table('users')->where('id', $receiver_id)->get();

        // print_r($user_balance_query);
        $user_balance = 0;
        foreach ($user_balance_query as $value) {
            $user_balance = $value->balance;
        }
        $user_next_balance = $user_balance + $amount;

        // update values
        $user_data_update = array(
            'balance'    => $user_next_balance,
        );
        // update the balance of the user
        DB::table('users')->where('id', $receiver_id)->update($user_data_update);
    });
?>