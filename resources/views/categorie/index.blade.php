@extends('boutique.dashboutique')

@section('adja')
<style>
  .uper {
    margin-top: 40px;
    width: 80%;
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
    <h2 style="text-align: center;">LISTE DES CATEGORIES</h2>
  <div class="d-flex justify-content-end mb-4"><a type="button" class="btn btn-primary" href="{{route('categories.index')}}">AJOUTER UNE CATEGORIE</a></div>
  <table class="table table-bordered table-hover" style="color:black; font-size: 0.8rem;">

    <thead>
        <tr>
          <td>Id</td>
          <td scope="col">Nom categorie</td>
          <td scope="col">Abreviation</td>
          <td scope="col">stock</td>
          <td colspan="3">Actions</td>
        </tr>
    </thead>

    <tbody>
        @foreach($categorie as $categorie)
        <tr>
          <td>{{$categorie->id}}</td>
          <td>{{$categorie->nom_categorie}}</td>
          <td>{{$categorie->abreviation}}</td>
          <td>{{$categorie->stock}}</td>
         
          <td><a href="{{ route('categories.edit', $categorie->id)}}" class="btn btn-primary">Modifier</a></td>
          <td><a href="{{ route('categories.show', $categorie->id)}}" class="btn btn-info">Details</a></td>
          <td>
            <form action="{{ route('categories.destroy', $categorie->id)}}" method="post">
              @csrf
              @method('DELETE')
              <button class="btn btn-danger" type="submit">Supprimer</button>
            </form>
          </td>
        </tr>
        
        @endforeach
    </tbody>
  </table>
  <a href="{{url('categories')}}" class="btn btn-primary" style="margin-left: 90%;">Retour</a>
 
<div>
@endsection
