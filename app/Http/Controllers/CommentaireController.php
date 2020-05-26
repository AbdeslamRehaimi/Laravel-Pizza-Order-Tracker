<?php

namespace App\Http\Controllers;

use App\Commentaire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CommentaireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

        /*$validator = Validator::make($request->json()->all(), [
            //'texte' => 'required',
            //'codeProduit' => 'required',
            //'numClient' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson());
        }*/

        $variable = $request->productname;

        //
        $Commentaire = new Commentaire();
        $Commentaire->texte = $request->texte;
        $Commentaire->codeProduit = $request->codeProduit;
        $Commentaire->numClient = $request->numClient;

        $Commentaire->save();

        return redirect()->route('products.show', $variable);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Commentaire  $commentaire
     * @return \Illuminate\Http\Response
     */
    public function show(Commentaire $commentaire)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Commentaire  $commentaire
     * @return \Illuminate\Http\Response
     */
    public function edit(Commentaire $commentaire)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Commentaire  $commentaire
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Commentaire $commentaire)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Commentaire  $commentaire
     * @return \Illuminate\Http\Response
     */
    public function destroy(Commentaire $commentaire)
    {
        //
    }
}
