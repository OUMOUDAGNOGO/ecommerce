@extends('layouts.boutique')
@section('content')
<style>
    .card-header{
        background-color: #7f3f0a;
        text-align: center;
        color:white;
        font-weight: bold;

    }
    .container{
        margin-left: -10%;
        margin-top: 5%;
    }
    /* .btn{
        margin-left: 800%;
    } */
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('AJOUTER LIVRAISON') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('livraisons.store') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="nom_livreur" class="col-md-4 col-form-label text-md-end">{{ __('nom livreur') }}</label>

                            <div class="col-md-6">
                                <input id="nom_livreur" type="text" class="form-control @error('nom_livreur') is-invalid @enderror" name="nom_livreur" value="{{ old('nom_livreur') }}" required autocomplete="nom_livreur" autofocus>

                                @error('nom_livreur')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="date_livraison" class="col-md-4 col-form-label text-md-end">{{ __('date') }}</label>

                            <div class="col-md-6">
                                <input id="date_livraison" type="date" class="form-control @error('date_livraison') is-invalid @enderror" name="date_livraison" value="{{ old('date_livraison') }}" required autocomplete="date_livraison" autofocus>

                                @error('date_livraison')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                     </div>

                     <div class="row mb-3">
                            <label for="commandeId" class="col-md-4 col-form-label text-md-end">{{ __('Commande ID') }}</label>

                            <div class="col-md-6">
                                
                                <select class="form-control @error('commandeId') is-invalid @enderror" name="commandeId" value="{{ old('commandeId') }}" required autocomplete="commandeId" autofocus >
                                  @foreach ($commande as $commande )
                                  <option value="{{$commande->id}}">{{$commande->nom}}</option>
                                  @endforeach
                               </select>


                                @error('commandeId')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                      </div>
                      <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Enregistrer') }}
                                </button>
                            </div>
                        </div>
                 </form>
                     
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

