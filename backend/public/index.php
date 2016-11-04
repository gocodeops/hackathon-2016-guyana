<?php

header('Access-Control-Allow-Origin: *');

// require all pakages provided by Composer
require '../vendor/autoload.php';

// require the configs needed to connect to the DB
require 'config.php';

// function to hash passwords
function HashString($string){
    $options = [
        'cost' => 11,
        'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM),
    ];
    return password_hash($string, PASSWORD_BCRYPT, $options);
}

// new Slim App
$app = new \Slim\App;

// the READ route
$app->get('/read/{table}[/{id}]', function ($request, $response, $args) {
    // READ ByID
    if (isset($args['id'])) {
        $query = DB::table($args['table'])->find($args['id']);
    } else {
        $query = DB::table($args['table'])->get();
    }
    // return the query
    print_r(json_encode($query));
});

// the CREATE route
$app->post('/create/{table}', function($request, $response, $args){
    $data   = $request->getParsedBody();
    // echo $data;
    $query  = DB::table($args['table'])->insert($data);
    print_r(json_encode($query));
});

// the UPDATE route
$app->put('/create/{table}/{id}', function($request, $response, $args){
    $data   = $request->getParsedBody();
    $query  = DB::table($args['table'])->where('id', $args['id'])->update($data);
    print_r(json_encode($query));
});

// the DELETE route
$app->delete('/create/{table}/{id}', function($request, $response, $args){
    $data   = $request->getParsedBody();
    $query  = DB::table($args['table'])->where('id', $args['id'])->delete();
    print_r(json_encode($query));
});

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

// run the application
$app->run();

?>