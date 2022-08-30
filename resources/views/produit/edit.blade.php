@extends('boutique.dashboutique')

@section('adja')
<style>
  .uper {
    margin-top: 40px;
    width: 45%;
    margin-left: 25%;
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
    margin-left: 40%;
    color: white;
    font-weight: bold;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Modifier une produit
  </div>

  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif

      
    <form method="post" action="{{route('produits.update',$produit->id)}}">
         @csrf
         @method('patch')
          <div class="form-group">
              <label for="nom_produit">Nom produit</label>
              <input type="text" class="form-control" name="nom_produit" value="{{$produit->nom_produit }}"/>
          </div>
          <div class="form-group">
              <label for="type_produit">type produit</label>
              <input type="text" class="form-control" name="type_produit" value="{{$produit->type_produit }}"/>
          </div>
          <div class="form-group">
              <label for="description">type produit</label>
              <input type="text" class="form-control" name="description" value="{{$produit->description }}"/>
          </div>
          
          
          <button type="submit" class="btn btn-primary">Enregistrer</button>
      </form>
  </div>
  <a href="{{url('produits')}}" class="btn btn-primary">Retour</a>
</div>
@endsection 
