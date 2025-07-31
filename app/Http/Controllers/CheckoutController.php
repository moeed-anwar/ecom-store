<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CheckoutController extends Controller
{
    //
    public function index(Product $product){
        return view('checkout.index',compact('product'));
    }
    public function store(Request $request, Product $product){
        $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|regex:/^\+?[0-9\s\-\(\)]{7,20}$/',
            'notes' => 'nullable|string'
        ]);
        try {
            //code...
            $stripe = new \Stripe\StripeClient(env("STRIPE_SECRET"));
            $charge = $stripe->charges->create([
            'amount' => $request->price * 100,
            'currency' => 'usd',
            'source' => $request->stripeToken,
                ]);

            $orderNumber = 'ORD-' .  STR::random(10);
            $orderData = [
            'order_number' => $orderNumber,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'notes' => $request->notes,
            'amount' => $request->price,
            'currency' => 'usd',
            'payment_status' => $charge->status, // usually "succeeded"
            'stripe_charge_id' => $charge->id,
            ];
          $order =Order::create($orderData);
            return view('checkout.success',compact('product','order'));
        }
         
        catch (\Stripe\Exception\CardException $e) {
            //throw $th;
            return view('checkout.failed',[
               'message' => $e->getError()->message ?? "Your payment was declined.", 
            ]);
        }
        catch (\Exception $e){
            // return view('checkout.failed',[
            //     'message' => 'payment failed :'. $e->getMessage()
            // ]); 
            dd('Payment error:', $e->getMessage());
        }
    }
}
