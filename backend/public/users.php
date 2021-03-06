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
            'active' => '1'
        );
        $query = DB::table('users')->where('id', htmlspecialchars($_POST['id']))->update($data);
        print_r(json_encode($query));
    });

    // Unassign
    $app->post('/unassign', function($request, $response, $args){
        $data = array(
            'active' => '0'
        );
        $query = DB::table('users')->where('id', htmlspecialchars($_POST['id']))->update($data);
        print_r(json_encode($query));
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
            ->where('id', $_POST['id'])
            ->where('active', '1');
        if($query->count() > 0) {
            print_r(json_encode($query->get()));
        } else {
            echo json_encode(array('success'=>'false'));
        }
    });

    //Create password
    $app->post('/app_create_password', function($request, $response, $args){
        $data = array(
            'password' => sha1($_POST['password']),
            'first_use' => '0'
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

/**
 --- Admin routes --- 
*/

//Login route
$app->post('/login', function ($request, $response, $args) {

    $query = DB::table('users')
        ->where('id', $_POST['id'])
        ->where('password', sha1($_POST['password']));
    if($query->count() > 0) {
        echo 1;
    } else {
        echo json_encode(array('success'=>'false'));
    }

});

/**
* @return user/admin 
*/
//Set as admin
$app->post('/setAdmin', function($request, $response, $args){
    $data = array(
        'user_type' => 'admin'
    );
    $query = DB::table('users')->where('id', htmlspecialchars($_POST['id']))->update($data);
    print_r(json_encode($query));
});

//Set as user
$app->post('/setUser', function($request, $response, $args){
    $data = array(
        'user_type' => 'user'
    );
    $query = DB::table('users')->where('id', htmlspecialchars($_POST['id']))->update($data);
    print_r(json_encode($query));
});


?>