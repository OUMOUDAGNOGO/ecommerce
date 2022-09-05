<?php

namespace App\Http\Controllers;

use App\Models\Clients;
use App\Models\commande;
use App\Models\livraison;
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
        $commande=commande::all();
        return view('commande.index', compact('commande')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $commande=commande::all();
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


    // public function clientcommande()[
    //     $user=Auth::user();
    //     $commande=commande::where('clientid',$userId)->get();
        
    // ]
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $commande=commande::findOrFail($id);
        return view('commande.show',compact('commande'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $commande=commande::findOrFail($id);
        return view('commande.edit',compact('commande')); 
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
        $validatedData = $request->validate([
            'quantité' => ['required', 'string', "max:200"],
            'date' => ['required', 'string', "max:200"],
            'produitId'=>['required','string',"max:250"],
             'clientId'=>['required','string',"max:250"],
            
        ]);
    
        commande::whereId($id)->update($validatedData);
    
        return redirect('/commandes')->with('success', 'commande mise à jour avec succèss');
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
