<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\Produit;
use App\Models\commande;
use App\Models\livraison;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth ;

class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produit = Produit::all();
       
        // dd($produit);
        return view('produit.index' ,compact('produit', ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorie=category::all();
        $commande=commande::count();
        $livraison=livraison::count();
        $produit = Produit::all();
        return view('produit.create', compact('produit', 'categorie', 'commande','livraison'));
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
            [    'image'=>'required||file',
                'nom_produit'=> ['required', 'string', "max:250"],
                'type_produit'=> ['required', 'string', "max:250"],
                'description'=> ['required', 'string', "max:250"],
                'quantité'=> ['required', 'string', "max:250"],
                'prix'=> ['required', 'string', "max:250"],
                
               
            ]
            );
             if ($verification)
                $user = Auth::user();
                $fileName = time().'.'.$request->image->extension();  
            $request->image->move(public_path('produits/image'), $fileName);

               
              $produit=Produit::create(

               [  
                   'image'=>$fileName,
                   'nom_produit'=>  $request['nom_produit'],
                   'type_produit'=>  $request['type_produit'],
                   'description'=>  $request['description'],
                   'quantité'=>  $request['quantité'],
                   'categorieId'=>  $request['categorieId'],
                   'prix' => $request['prix'],
                   'userId' => $user->id,
                 
                   
               ]
              );
              return redirect('/produits')->with('succès');
            }
    
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $produit = Produit::findOrFail($id);
        return view('produit.show', compact('produit'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $produit = Produit::findOrFail($id);
        return view('produit.edit', compact('produit'));
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
            'nom_produit'=> ['required', 'string', "max:250"],
            'type_produit'=> ['required', 'string', "max:250"],
            'description'=> ['required', 'string', "max:250"],
            'quantité'=> ['required', 'string', "max:250"],
            'prix'=> ['required', 'integer', "max:250"],
            
        ]);
    
        Produit::whereId($id)->update($validatedData);
    
        return redirect('/Produits')->with('success', 'produit mise à jour avec succèss');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produit = Produit::findOrFail($id);
        $produit->delete();
    
        return redirect('/produits')->with('success', 'produit supprimer avec succèss');
    }
}
