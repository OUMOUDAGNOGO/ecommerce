@extends('layouts.boutique')
@section('content')
<div class="uper">

@if(session()->get('success'))
  <div class="alert alert-success">
    {{ session()->get('success') }}  
  </div><br />
@endif

<!-- debut  -->

                <div class="container">
                  <div class="row ">
                      <div class="col-md-9">
                         <div class="white_shd full">
                            <div class="full graph_head">
                               <div class="margin-top:20%">
                                  <h2>Liste des clients</h2>
                               </div>
                            </div>
                            <div class="table_section padding_infor_info ">
                               <div class="table-responsive-sm  ">
                                  <table class="table">
                                     <thead>
                                        <tr>
                                             <th>Id</th>
                                            <th >Nom </th>
                                            <th >Prenom</th>
                                            <th >email</th>
                                            <th >Actions</th>
                                        </tr>
                                     </thead>
                                     <tbody>
                                     @foreach($client as $Client)
                                        <tr>
                                        
                                           <td>{{$Client->id}}</td> 
                                            <td>{{$Client->nom}}</td>
                                            <td>{{$Client->prenom}}</td>
                                            <td>{{$Client->email}}</td>
                                            <td><a href="{{ route('clients.edit', $Client->id)}}" class="btn btn-primary">Modifier</a></td>
                                            <td><a href="{{ route('clients.show', $Client->id)}}" class="btn btn-info">Details</a></td>
                                            <td>
                                              <form action="{{ route('clients.destroy', $Client->id)}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger" type="submit">Supprimer</button>
                                              </form>
                                            </td> 
                                        </tr>
                                        @endforeach
                                     </tbody>
                                  </table>
                               </div>
                            </div>
                         </div>
                      </div>
                  </div>
                </div>
                </div>
<!-- fin  -->
@endsection
