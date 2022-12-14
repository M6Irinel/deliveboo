<?php

namespace App\Http\Controllers\Api;

use Braintree\Gateway;
use App\Http\Controllers\Controller;
use App\Http\Requests\Order\OrderRequest;
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
            'amount' => $request->amount,
            'paymentMethodNonce' => $request->token,
            'options' => [
                'submitForSettlement' => true
            ]
        ]);

        if($result->success){
            $data = [
                'success' => true,
                'message' => "Transazione eseguita con Successo"
            ];
            return response()->json($data, 200);
        }else {
            $data = [
                'success' => false,
                'message' => 'Transazione Fallita!'
            ];
            return response()->json($data, 401);
        }
    }
}
