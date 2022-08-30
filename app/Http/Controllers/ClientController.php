<?php

namespace App\Http\Controllers;

use App\Models\Clients;
use App\Models\User;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $client=Clients::all();
        return view('client.index',compact('client'));
    }

    public function ViewForm()
    {
        // $client=Clients::all();
        return view('client.clientRegister');
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
    public function registerclient(Request $request)
    {
        $verification = $request->validate(
            [
                'nom'=> ['required', 'string', "max:250"],
                'prenom'=> ['required', 'string', "max:250"],
                'email'=>['required','string',"max:250"],
                'password'=>['required','string','min:6','max:20', 'confirmed']
            ]
            );
             if ($verification)
                $user = User ::create(
                [
                    'name' =>  $request['nom'],
                    'email' => $request['email'],
                    'password' =>bcrypt($request['password']),
                    'statut' => 'clients',
                ]
             );
    
             if ($user)
            {
              $client=Clients::create(
               [
                   'nom'=>  $request['nom'],
                   'prenom' =>  $request['prenom'],
                   'email' => $request['email'],
                   'password' =>bcrypt($request['password']),
                   'userId' => $user->id,
                 
                   
               ]
              );
              return redirect('/login');
            }
    }

    public function show($id)
    {
        $client=Clients::findOrFail($id);
        return view('client.show',compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $client=Clients::findOrFail($id);
        return view('client.edit',compact('client'));
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
            'nom' => ['required', 'string', "max:200"],
            'prenom' => ['required', 'string', "max:200"],
            'email'=>['required','string',"max:250"],
            'password'=>['required','string',"max:250"],
             
            
        ]);
    
        Clients::whereId($id)->update($validatedData);
    
        return redirect('/clients')->with('success', 'client mise à jour avec succèss');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client = Clients::findOrFail($id);
        $client->delete();
    
        return redirect('/clients')->with('success', 'client supprimer avec succèss');
    }
}
