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

<div class="container py-2">
    <main>
        <div class="row row-cols-1 row-cols-md-3 mb-3 text-center">
            <div class="col">
                <div class="card mb-4 rounded-3 shadow-sm border-warning">
                    <div class="card-header py-3 text-white bg-primary border-primary">
                        <h4 class="my-0 fw-normal">Id: {{$boutique->id}}</h4>
                    </div>
                    <div class="card-body" style="list-style: none;">
                        <ul class="list-unstyled mt-3 mb-4">
                        <li>Nom complet: {{$boutique->nom_complet}}</li>
                        <li>nom boutique: {{$boutique->nom_boutique}}</li>
                        <li>Adresse boutique: {{$boutique->adresse_boutique}}</li>
                        <li>Telephone boutique: {{$boutique->telephone_boutique}}</li>
                        <li>email: {{$boutique->email}}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <a href="{{url('boutiques')}}" class="btn btn-primary">Retour</a>
@endsection