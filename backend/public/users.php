<?php
    // Get unassigned users
    $app->get('/unassigned', function ($request, $response, $args) {

        $query = DB::table('users')->where('active', '0')->get();
        // return the query
        print_r(json_encode($query));

    });

    // Assign
    $app->post('/assign', function($request, $response, $args){
        $data = array(
            'password'    => sha1($_POST['password']),
            'active' => '1'
        );
        $query = DB::table('users')->where('id', htmlspecialchars($_POST['id']))->update($data);
        print_r(json_encode($query));
    });

    // login route
    $app->post('/login', function ($request, $response, $args) {

        $query = DB::table('users')
            ->where('id', $_POST['id'])
            ->where('password', sha1($_POST['password']));
        if($query->count() > 0) {
            echo 1;
        } else {
            echo 0;
        }

    });

    // register the password
    $app->post('/addpassword', function(){
        $data = array(
            'password' => sha1($_POST['password'])
        );
        $query = QB::table('my_table')->where('id', htmlspecialchars($_POST['id']))->update($data);
        print_r(json_encode($query));
    });

    //Login
    $app->post('/app_login', function ($request, $response, $args) {
        $query = DB::table('users')
            ->where('id', $_POST['id']);
        if($query->count() > 0) {
            print_r(json_encode($query->get()));
        } else {
            echo json_encode(array('success'=>'false'));
        }
    });

    //Create password
    $app->post('/app_create_password', function($request, $response, $args){
        $data = array(
            'password' => sha1($_POST['password'])
        );
        $query = DB::table('users')->where('id', htmlspecialchars($_POST['id']))->update($data);
        print_r(json_encode($query));
    });

    //Get transaction with username
    $app->get('/transactions_w_name', function ($request, $response, $args) {
        $query = DB::table('v_transaction_w_name')->get();
        // return the query
        print_r(json_encode($query));
    });
?>