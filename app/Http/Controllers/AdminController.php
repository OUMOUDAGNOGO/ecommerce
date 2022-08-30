<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Administrateurs;
use App\Models\User;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ViewForm()
    {
        return view('admin.adminRegister');
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
    public function registerAdmin(Request $request)
    {
        $verification = $request->validate(
            [
                'nom'=> ['required', 'string', "max:250"],
                'prenom'=> ['required', 'string', "max:250"],
                'telephone'=>['required','string',"max:250"],
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
                    'statut' => 'administrateurs',
                ]
             );
    
             if ($user)
            {
              $administrateurs=Administrateurs::create(
               [
                   'nom'=>  $request['nom'],
                   'prenom' =>  $request['prenom'],
                   'telephone' => $request['telephone'],
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
