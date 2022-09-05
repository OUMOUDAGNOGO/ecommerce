@extends('layouts.boutique')
@section('content')

<style>
   thead{
      background-color: #7f3f0a;
      color: white;
      text-align:  center;
   }
   h2{
      text-align: center;
      
   }
</style>
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif

  <style>
   h2{
      margin-top:-5%;
   }
  </style>
<!-- debut  -->

                  <div class="container" style="margin-top: 5%;">
                    <div class="row ">
                        <div class="col-md-9">
                           <div class="white_shd full">
                           <div class="d-flex justify-content-end "><a type="button" class="btn btn-primary" href="{{route('commandes.create')}}">AJOUTER UNE COMMANDE</a></div>
                              <div class="full graph_head">
                                 <div class="margin-top:20%">
                                    <h2 >Liste des Commandes</h2>
                                 </div>
                              </div>
                              <div class="table_section padding_infor_info ">
                                 <div class="table-responsive-sm  ">
                                    <table class="table table-bordered table-hover">
                                       <thead>
                                          <tr>
                                               <th>Id</th>
                                              <th >Quantité</th>
                                              <th >date </th>
                                              <th >produit Id</th>
                                              <th >Client Id</th>
                                              <th colspan="3">Actions</th>
                                          </tr>
                                       </thead>
                                       <tbody>
                                       @foreach($commande as $Commande)
                                          <tr>
                                          
                                             <td>{{$Commande->id}}</td> 
                                              <td>{{$Commande->quantité}}</td>
                                              <td>{{$Commande->date}}</td>
                                              <td>{{$Commande->produitId}}</td>
                                              <td>{{$Commande->ClientId}}</td>
                                              
                                              <td><a href="{{ route('commandes.edit', $Commande->id)}}" class="btn btn-primary">Modifier</a></td>
                                              <td><a href="{{ route('commandes.show', $Commande->id)}}" class="btn btn-info">Details</a></td>
                                              <td>
                                                <form action="{{ route('commandes.destroy', $Commande->id)}}" method="post">
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
