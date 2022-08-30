
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
                                  <h2>Liste des livraisons</h2>
                               </div>
                            </div>
                            <div class="table_section padding_infor_info ">
                               <div class="table-responsive-sm  ">
                                  <table class="table">
                                     <thead>
                                        <tr>
                                             <th>Id</th>
                                            <th >Nom livreur </th>
                                            <th >date livraison</th>
                                            <th >id commande</th>
                                            <th >Actions</th>
                                        </tr>
                                     </thead>
                                     <tbody>
                                     @foreach($livraison as $Livraison)
                                        <tr>
                                        
                                           <td>{{$Livraison->id}}</td> 
                                            <td>{{$Livraison->nom_livreur}}</td>
                                            <td>{{$Livraison->date_livraison}}</td>
                                            <td>{{$Livraison->commandeId}}</td>
                                            <td><a href="{{ route('livraisons.edit', $Livraison->id)}}" class="btn btn-primary">Modifier</a></td>
                                            <td><a href="{{ route('livraisons.show', $Livraison->id)}}" class="btn btn-info">Details</a></td>
                                            <td>
                                              <form action="{{ route('livraisons.destroy', $Livraison->id)}}" method="post">
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

