<?php

namespace App\Http\Controllers\Api;


use Braintree\Gateway;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BraintreeController extends Controller
{
    public function generate(Request $request, Gateway $gateway)
    {
        $token = $gateway->clientToken()->generate();
        $data = [
            'success' => true,
            'token' => $token
        ];

        return response()->json($data, 200);
    }

    public function makePayment(Request $request, Gateway $gateway)
    {

        $result = $gateway->transaction()->sale([
            'amount'=>'15.00',
            'paymentMethodNonce'=> $request->token,
            'options'=>[
                'submitForSettlement'=> true
            ]
        ]);

        if($result->succes){
            $data = [
                'success' => true,
                'message' => 'Transazione eseguita con successo!'
            ];
            return response()->json($data, 200);
        }else{
            $data = [
                'success' => false,
                'message' => 'Transazione fallita, con successo  LoL'
            ];
            return response()->json($data, 401);
        }
        return 'make payment';
    }
}
