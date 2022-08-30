<?php

namespace App\Http\Controllers;

use App\Models\commande;
use App\Models\livraison;
use App\Models\User;
use Illuminate\Http\Request;

class LivraisonController extends Controller
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
        $commande = commande::all();
       
        return view('livraison.create', compact('commande'));
    }

    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $verification = $request->validate(
            [    'nom_livreur'=>['required','string','max:1000'],
                'commandeId'=> ['required', 'string', "max:250"],
                
               
            ]
            );
             if ($verification)
                $user = User ::create(
                [
                    'name' =>  $request['nom_livreur'],
                    'email' => $request['commandeId'],
                    'password' =>bcrypt($request['password']),
                    'statut' => 'livraisons',
                ]
             );
    
             if ($user)
            {
              $livraison=livraison::create(

               [  
                   'nom_livreur'=>$request['nom_livreur'],
                   'commandeId'=>  $request['commandeId'],
                   'userId' => $user->id,
                 
                   
               ]
              );
              return redirect('/livraisons')->with('succès');
            }
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
