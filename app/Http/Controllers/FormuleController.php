<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Formule;

class FormuleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*if(request()->formule){
            $formules = Formule::with('categories')->WhereHas('formule', function($query){
                $query->where('NomCategorie', request()->categorie);
            })->paginate(6);
        }else{
            $products = Product::with('categories')->paginate(6);
        }*/
        //dd(Cart::content());
        $formules = Formule::inRandomOrder()->get();

        //dd($products);
        return view('formules.home')->with('formules', $formules);
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Formule  $formule
     * @return \Illuminate\Http\Response
     */
    public function show($nomFormule)
    {
        //
        $formule = Formule::where('nomFormule', $nomFormule)->firstOrFail();
        return view('formules.show')->with('formule', $formule);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Formule  $formule
     * @return \Illuminate\Http\Response
     */
    public function edit(Formule $formule)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Formule  $formule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Formule $formule)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Formule  $formule
     * @return \Illuminate\Http\Response
     */
    public function destroy(Formule $formule)
    {
        //
    }
}
