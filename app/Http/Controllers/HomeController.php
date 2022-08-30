<?php

namespace App\Http\Controllers;

use App\Models\Administrateurs;
use App\Models\boutiques;
use App\Models\Clients;
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
        if($user->statut == 'administrateurs' ){
            $Administrateur = Administrateurs::Where('userId', $user->id)->first();
            return view('admin.dashadmin', compact( 'Administrateur'));
        }elseif($user->statut == 'boutiques'){
            $boutique = boutiques::Where('userId', $user->id)->first();
            return view('boutique.dashboutique', compact('boutique'));
        }elseif($user->statut =='clients'){
            $client=Clients::where('userId', $user->id)->first();
            return view('client.dashclient', compact(
                'client'
            ));
        }
    }
        
}
