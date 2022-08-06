<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Status;
use App\Models\Electronic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaymentCallbackController extends Controller
{
    public function __invoke(Request $request)
    {
        if ($request->isMethod('POST')) {

            $response = ['status' => 'Unknown error'];

            DB::beginTransaction();

            try {

                $data = json_encode($request->all());
                $operation = json_decode($data, true);

                $order = Order::where('identifier', $operation['identifier'])
                    ->with(['transaction'])
                    ->firstOrFail();

                $transaction = $order->transaction;

                // create electronics:
                Electronic::create([
                    'transaction_id' => $transaction->id,
                    'tx_reference' => $operation['tx_reference'],
                    'identifier' => $operation['identifier'],
                    'payment_reference' => $operation['payment_reference'],
                    'amount' => $operation['amount'],
                    'datetime' => $operation['datetime'],
                    'payment_method' => $operation['payment_method'],
                    'phone_number' => $operation['phone_number'],
                ]);

                // check the transaction status:
                $status = Status::firstOrCreate([
                    'name' => 'Paiement réussi avec succès',
                    'is_for_order' => 0,
                ]);

                $transaction->update(['status_id' =>  $status->id]);

                DB::commit();

                $response = ['status' => 'Success'];
            } catch (\Throwable $e) {

                $response = ['status' => 'Required params'];

                DB::rollBack();
            }

            return response()->json($response);
        }
    }
}
