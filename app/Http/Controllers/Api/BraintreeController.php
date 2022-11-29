<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Orders\OrderRequest;
use Illuminate\Http\Request;
use Braintree\Gateway;

class BraintreeController extends Controller
{
    public function generate(OrderRequest $request, Gateway $gateway)
    {
       
        $token = $gateway->clientToken()->generate();
        $data = [
            'success' => true,
            'token' =>$token
        ];
        return response()->json($data,200);
    }

    public function makePayment(OrderRequest $request, Gateway $gateway)
    {
        $result = $gateway->transaction()->sale([
            'amount' => '10.00',
            'paymentMethodNonce' => $request->token,
            'options' => [
                'submitForSettlement' => true
            ]
        ]);
        if($result->success){
            $data = [
                'success' => true,
                'message' => 'transazione eseguita bravo'
            ];  
            return response()->json($data,200);
        }else{
            $data = [
                'success' => false,
                'message' => 'Transazione fallita malamente'
            ];
            return response()->json($data,401);

        }
    }
}
