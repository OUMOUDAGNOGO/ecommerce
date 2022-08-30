<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;
use App\Models\User;
use App\Models\Produit;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $categorie = category::all();
        // return view('categorie.index',compact('categorie'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $categorie = category::all();
        return view('categorie.create');
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
            [
                'nom_categorie'=> ['required', 'string', "max:250"],
                'abreviation'=> ['required', 'string', "max:250"],
                'stock'=>['required','string',"max:250"],
                
            ]
            );
             if ($verification)
                $user = User ::create(
                [
                    'name' =>  $request['nom_categorie'],
                    'email' => $request['abreviation'],
                    'password' =>bcrypt($request['password']),
                    'statut' => 'category',
                ]
             );
    
             if ($user)
            {
              $categorie=category::create(
               [
                   'nom_categorie'=>  $request['nom_categorie'],
                   'abreviation' =>  $request['abreviation'],
                   'stock' => $request['stock'],
                   'userId' => $user->id,
                 
                   
               ]
              );
              return redirect('/categories')->with('succès');
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
