<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('cart.cart');

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
        //dd($request->id, $request->title, $request->price);

        //Cart::add($request->id, $request->title, 1, $request->price)->associate('App\Product');

        $duplicata = Cart::search(function($cartItem, $rowId) use($request){
            return $cartItem -> id == $request->product_id;
        });

        if ($duplicata -> isNotEmpty() ){
            return redirect()->route('products.index')->with('success', 'Le produit est deja ajouter!');
        }
        $product = Product::find($request->product_id);
        Cart::add($product->id, $product->Nom, 1, $product->Prix)->associate('App\Product');
        return redirect()->route('products.index')->with('success', 'Le produit est bien ajouter!');




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
    public function destroy($rowId)
    {
        //
        Cart::remove($rowId);
        return back()->with('success', 'Le produit a ete supprimer!');
    }
}
