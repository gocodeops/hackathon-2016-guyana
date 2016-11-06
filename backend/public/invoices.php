<?php
    /**
     * TODO:
     * - get invoice by receiver_id
     * DONE:
     * - update invoice
     */

    $app->post('/update/invoice', function($request, $response, $args){
        $data   = $request->getParsedBody();
        $invoice_id = $data['id'];
        if ($data['status'] == 1) {
            $paymentData = array(
                'amount' => $data['amount'],
                'sender_id' => $data['receiver_id'],
                'receiver_id' => $data['sender_id'],
                );
            // DB::table('payments')->insert($paymentData);
            $delete = DB::table('invoices')->where('id', $invoice_id)->delete();
            // print_r(json_encode($query));
            print_r(1);
        } else {
            DB::table('invoices')->where('id', $invoice_id)->update(array('status' => 0));
            print_r(0);
        }
    });

    $app->get('/invoice/get/{receiver_id}', function($request, $response, $args){
        $query = DB::table('view_invoices')->where('receiver_id', $args['receiver_id'])->get();
        print_r(json_encode($query));
    });

?>