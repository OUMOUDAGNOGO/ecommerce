<?php

namespace App\Http\Controllers;

use App\Models\Administrateurs;
use App\Models\boutiques;
use App\Models\category;
use App\Models\Clients;
use App\Models\commande;
use App\Models\livraison;
use App\Models\Produit;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
    
        $user = Auth::user();
        
            //    statistique pour produit
            $boutique=boutiques::count();
            // fin pour statistique
        if($user->statut == 'administrateurs' ){
            $Administrateur = Administrateurs::Where('userId', $user->id)->first();
            return view('admin.dashadmin', compact( 'Administrateur','boutique'));
        }elseif($user->statut == 'boutiques'){


            //    statistique pour produit
           $produit=Produit::count();
           // fin pour statistique
            //    statistique pour produit
            $categorie=category::count();
            // fin pour statistique
            //    statistique pour produit
            $commande=commande::count();
            // fin pour statistique
            //    statistique pour produit
            $livraison=livraison::count();
            // fin pour statistique
           return view('boutique.dashboutique', compact('produit', 'categorie', 'commande', 'livraison'));
         

            //$boutique = boutiques::Where('userId', $user->id)->first();
            //return view('boutique.dashboutique', compact('boutique','pro','cate','comm','livr'));
        }elseif($user->statut =='clients'){
            $client=Clients::where('userId', $user->id)->first();
            $categorie=category::all();
            $produit=Produit::all();
            return view('client.dashclient', compact(
                'client', 'categorie', 'produit'
            ));
        }
    }
   
    
    // Public function dashboard()
    // {
    //     $boutique = boutiques::all();
        
        
    //     // Nous allons compter tous les assurés inscrits 

    //     $nombreboutique = count($boutique);
        

    //     // Nous allons afficher la liste des assurés


    //     return view('admin.dashadmin', compact('boutique','nombreboutique', ));
    // }

}
