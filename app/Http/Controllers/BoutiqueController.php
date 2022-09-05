<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Administrateurs;
use App\Models\boutiques;
use App\Models\type_boutique;
use App\Models\User;

class BoutiqueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        
        $boutique = boutiques::all();
        return view('boutique.index' ,compact('boutique'));
    }


    public function ViewForm()
    {
        $typeboutique=type_boutique::all();
        return view('boutique.boutiqueRegister', compact('typeboutique'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function registerboutique(Request $request)
    {
        $verification = $request->validate(
            [
                'nom_complet'=> ['required', 'string', "max:250"],
                'nom_boutique'=> ['required', 'string', "max:250"],
                'adresse_boutique'=>['required','string',"max:250"],
                'telephone_boutique'=>['required','string',"max:250"],
                'email'=>['required','string',"max:250"],
                'password'=>['required','string','min:6','max:20', 'confirmed']
            ]
            );
             if ($verification)
                $user = User ::create(
                [
                    'name' =>  $request['nom_complet'],
                    'email' => $request['email'],
                    'password' =>bcrypt($request['password']),
                    'statut' => 'boutiques',
                ]
             );
    
             if ($user)
            {
              $boutique=boutiques::create(
               [
                   'nom_complet'=>  $request['nom_complet'],
                   'nom_boutique' =>  $request['nom_boutique'],
                   'adresse_boutique' => $request['adresse_boutique'],
                   'telephone_boutique'=>$request['telephone_boutique'],
                   'type_boutiqueId'=>$request['type_boutiqueId'],
                   'email' => $request['email'],
                   'password' =>bcrypt($request['password']),
                   'userId' => $user->id,
                 
                   
               ]
              );
              return redirect('/login');
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
        $boutique = boutiques::findOrFail($id);
        return view('Boutique.show', compact('boutique'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $boutique = boutiques::findOrFail($id);
        return view('Boutique.edit', compact('boutique'));
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
            'nom_complet' => ['required', 'string', "max:200"],
            'nom_boutique' => ['required', 'string', "max:200"],
          
            'telephone_boutique'=>['required','string',"max:250"],
             'email'=>['required','string',"max:250"],
            
        ]);
    
        boutiques::whereId($id)->update($validatedData);
    
        return redirect('/boutiques')->with('success', 'boutique mise à jour avec succèss');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $boutique = boutiques::findOrFail($id);
        $boutique->delete();
    
        return redirect('/boutiques')->with('success', 'boutique supprimer avec succèss');
    }
}
