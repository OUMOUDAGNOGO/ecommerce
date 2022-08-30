@extends('boutique.dashboutique')

@section('adja')

<style>
  .uper {
    margin-top: 40px;
    width: 45%;
    margin-left: 4%;
    margin-bottom: 5%;
    color: black;
  }

  .card-header{
    text-align: center;
    text-transform: uppercase;
    font-weight: bold;
    color: white;
    background-color: #4e73df;
  }

  form{
    width: 100%;
    justify-content: center;
  }

  .btn{
   
    color: white;
    font-weight: bold;
    margin-top: 5%;
  }

  thead{
    background-color: #7f3f0a;
    color: white;
    text-align: center;
  }

  .container{
    margin-left: -5%;
  }
  table{
    margin-top: 2%;
  }

 .oumou{
    margin-left: 10%;
  }
</style>


<div class="uper">

  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
   <div class="container" style="margin-top: 5%;">
                    <div class="row ">
                        <div class="col-md-10">
                           <div class="white_shd full">
                           <div class="margin-top:10%">
                                 <h2 style="text-align: center; margin-top:5%">LISTE DES PRODUITS</h2>
                                 </div>
    
                                    <div class="d-flex justify-content-end  "><a type="button" class="btn btn-primary" href="{{route('produits.create')}}">AJOUTER UN PRODUIT</a></div>
                                        <div class="table_section padding_infor_info ">
                                            <div class="table-responsive-md  ">
                                                <table class="table table-bordered table-hover" style="color:black; font-size: 0.8rem;">

                                                <thead>
                                                    <tr>
                                                    
                                                    <th>Nom produit</th>
                                                    <th>Type produit</th>
                                                    <th>Description</th>
                                                    <th> Categorie Id</th>
                                                    <th> Image</th>
                                                    <th colspan="3">Actions</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    @foreach($produit as $produit)
                                                    <tr>
                                                    <td>{{$produit->nom_produit}}</td>
                                                    <td>{{$produit->type_produit}}</td>
                                                    <td>{{$produit->description}}</td>
                                                    <td>{{$produit->categorieId}}</td>
                                                    <td>{{$produit->image}}</td> 
                                                    <td><a href="{{ route('produits.edit', $produit->id)}}" class="btn btn-primary">Modifier</a></td>
                                                    <td><a href="{{ route('produits.show', $produit->id)}}" class="btn btn-info">Details</a></td>
                                                    <td>
                                                        <form action="{{ route('produits.destroy', $produit->id)}}" method="post">
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
</div>          
<a href="{{url('produits')}}" class="btn btn-primary">Retour</a>
@endsection