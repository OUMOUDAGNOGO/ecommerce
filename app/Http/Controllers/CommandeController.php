<?php

namespace App\Http\Controllers;

use App\Models\Clients;
use App\Models\commande;
use App\Models\Produit;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommandeController extends Controller
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
        $produit = Produit::all();
        $client=Clients::all();
        return view('commande.create', compact('produit','client'));
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
            [    'quantité'=>['required','string','max:1000'],
                'date'=> ['required', 'string', "max:250"],
                'produitId'=> ['required', 'string', "max:250"],
                'clientId'=> ['required', 'string', "max:250"],
                
               
            ]
            );
             if ($verification)
                $user = User ::create(
                [
                    'name' =>  $request['quantité'],
                    'email' => $request['date'],
                    'password' =>bcrypt($request['password']),
                    'statut' => 'commandes',
                ]
             );
    
             if ($user)
            {
              $commande=commande::create(

               [  
                   'quantité'=>$request['quantité'],
                   'date'=>  $request['date'],
                   'produitId'=>  $request['produitId'],
                   'clientId'=>  $request['clientId'],
                   'userId' => $user->id,
                 
                   
               ]
              );
              return redirect('/commandes')->with('succès');
            }
    }


    public function clientcommande()[
        $user=Auth::user();
        $commande=commande::where('clientid',$userId)->get();
        
    ]
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
