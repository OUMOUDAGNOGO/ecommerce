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
    Modifier Livraison
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

      <form method="post" action="{{route('commandes.update',$commande->id)}}">
         @csrf
         @method('patch')
          <div class="form-group">
              <label for="quantité">Quantité</label>
              <input type="text" class="form-control" name="quantité" value="{{$commande->quantité }}"/>
          </div>
          <div class="form-group">
              <label for="date">Date de livraison</label>
              <input type="date" class="form-control" name="date" value="{{$commande->date }}"/>
          </div>

          <button type="submit" class="btn btn-primary">Enregistrer</button>
      </form>
  </div>
  <a href="{{url('commandes')}}" class="btn btn-primary">Retour</a>
</div>
@endsection