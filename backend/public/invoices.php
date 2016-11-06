<?php
    /**
     * TODO:
     *
     * DONE:
     * - update invoice
     */

    $app->post('/update/invoice', function($request, $response, $args){
        $data   = $request->getParsedBody();
        $invoice_id = $data['id'];
        if ($data['status'] == 1) {
            $paymentData = array(
                'amount' => $data['amount'],
                'sender_id' => $data['sender_id'],
                'receiver_id' => $data['receiver_id'],
                );
            DB::table('payments')->insert($paymentData);
            $delete = DB::table('invoices')->where('id', $invoice_id)->delete();
            // print_r(json_encode($query));
            print_r(1);
        } else {
            DB::table('payments')->where('id', $invoice_id)->update(array('status' => 0));
            print_r(0);
        }
    });
?>