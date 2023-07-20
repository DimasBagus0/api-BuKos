<?php

namespace App\Http\Controllers;

use Midtrans\Snap;
use Midtrans\Config;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function checkout(Request $request)
    {
        $request->request->add(['total_price' => $request->qty * 1000000, 'status' => 'Unpaid']);
        $order = Order::create($request->all());

        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = false;
        Config::$isSanitized = true;
        Config::$is3ds = true;

        $randomNumber = rand(1000, 9999);

        $params = array(
            'transaction_details' => array(
                'order_id' => $order->id . '-' . $randomNumber,
                'gross_amount' => $order->total_price,
            ),
            'customer_details' => array(
                'first_name' => $request->name,
                'phone' => $request->phone,
            ),
        );

        $snapToken = Snap::getSnapToken($params);
        return view('checkout', compact('snapToken', 'order'));
    }

    public function callback(Request $request)
    {
        $serverKey = config('midtrans.server_key');
        $hashed = hash("sha512", $request->order_id . $request->status_code . $request->gross_amount . $serverKey);
        if ($hashed == $request->signature_key) {
            if ($request->transaction_status == 'capture' or $request->transaction_status == 'settlement' ) {
                $order = Order::find($request->order_id);
                $order->update(['status' => 'paid']);
            }
        }
    }
    public function invoice($id){
        $order = Order::find($id);
        return view('invoice', compact('order'));
    }
}
