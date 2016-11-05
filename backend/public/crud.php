<?php
    // the READ route
    $app->get('/read/{table}[/{id}]', function ($request, $response, $args) {
        // READ ByID
        if (isset($args['id'])) {
            $query = DB::table($args['table'])->find($args['id']);
        } else {
            $query = DB::table($args['table'])->orderBy('id', DESC)->get();
        }
        // return the query
        print_r(json_encode($query));
    });

    // the CREATE route
    $app->post('/create/{table}', function($request, $response, $args){
        $data   = $request->getParsedBody();
        // echo $data;
        $query = DB::table($args['table'])->insert($data);
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
?>