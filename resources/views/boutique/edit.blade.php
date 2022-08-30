@extends('admin.dashadmin')
@section('contenus')
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
    Modifier une boutique
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

      <form method="post" action="{{route('boutiques.update',$boutique->id)}}">
         @csrf
          <div class="form-group">
              <label for="nom_complet">Nom complet</label>
              <input type="text" class="form-control" name="nom_complet" value="{{ $boutique->nom_complet }}"/>
          </div>
          <div class="form-group">
              <label for="nom_boutique">Nom boutique</label>
              <input type="text" class="form-control" name="nom_boutique" value="{{ $boutique->nom_boutique }}" />
          </div>

          
          <div class="form-group">
              <label for="telephone_boutique">Telephone boutique</label>
              <input type="text" class="form-control" name="telephone_boutique" value="{{ $boutique->telephone_boutique }}"   />
          </div>
          <div class="form-group">
              <label for="email">Email</label>
              <input type="text" class="form-control" name="email" value="{{ $boutique->email }}"/>
          </div>
          <div class="form-group">
              <label for="password">Mot de passe</label>
              <input type="text" class="form-control" name="password" value="{{ $boutique->password }}"/>
          </div>
          <button type="submit" class="btn btn-primary">Enregistrer</button>
      </form>
  </div>
</div>
@endsection