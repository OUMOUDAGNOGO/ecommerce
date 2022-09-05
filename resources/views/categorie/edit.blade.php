@extends('layouts.boutique')
@section('content')
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
    Modifier une Categorie
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

      <form method="post" action="{{route('categories.update',$categorie->id)}}">
         @csrf
         @method('patch')
          <div class="form-group">
              <label for="nom_categorie">Nom categorie</label>
              <input type="text" class="form-control" name="nom_categorie" value="{{$categorie->nom_categorie }}"/>
          </div>
          <div class="form-group">
              <label for="abreviation">Abreviation</label>
              <input type="text" class="form-control" name="abreviation" value="{{$categorie->abreviation }}"/>
          </div>

          <div class="form-group">
              <label for="stock">stock</label>
              <select name="stock" id="">
                <option value="stock">disponible</option>
                <option value="stock">non disponible</option>
              </select>
          </div>
          
          <button type="submit" class="btn btn-primary">Enregistrer</button>
      </form>
  </div>
  <a href="{{url('categories')}}" class="btn btn-primary">Retour</a>
</div>
@endsection