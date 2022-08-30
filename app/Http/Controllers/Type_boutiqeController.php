<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\type_boutique; 
use App\Models\boutiques;


class Type_boutiqeController extends Controller
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
    public function ViewForm()
    {
        return view('typeboutique.typeboutiqueRegister');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function Registertypeboutique(Request $request)
    {
        $verification = $request->validate(
            [
             'nom' => ['required', 'string', "max:200"],
             'abreviation'=>['required', 'string', "max:250"],
            ] 
         );
        
         If($verification)
         {
        
               type_boutique::create(
                [
                    'nom'=>  $request['nom'],
                    'abreviation' =>  $request['abreviation'],
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
