<?php

namespace App\Http\Controllers;
use Gloudemans\Shoppingcart\Facades\Cart;
use Stripe\Stripe;
use Stripe\PaymentIntent;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;


class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if(Cart::count()<= 0){
            return redirect()->route('products.index');
        }
        //
        \Stripe\Stripe::setApiKey('sk_test_AHkjB3F7v4tQRiUPxmvXLBZ100vH3qpEhI');
        //dd(round(Cart::total()));
        //dd(round(total));
        $intent = \Stripe\PaymentIntent::create([
            //'amount' => round(Cart::total()),
            //round permet de convertir integer au chane de char
            //amount is in cents, $1 is 100 not 1. amount = 1 then it'l be just $.01
            'amount' => round(Cart::total() * 100),
            'currency' => 'usd',
        ]);

        //dd($intent);
            //Arr is a helper from laravel table
        $clientSecret = Arr::get($intent, 'client_secret');
        return view('checkout.checkout',[
            'clientSecret' => $clientSecret
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        Cart::destroy();
        $data = $request->json()->all();

        return $data['paymentIntent'];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
