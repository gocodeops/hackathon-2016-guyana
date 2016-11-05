<?php

	$app->get('/payments', function($request, $response, $args) {

		$query = DB::table('payments')->get();
		// return the query
	    print_r(json_encode($query));

	});

?>