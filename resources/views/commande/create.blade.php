@extends('layouts.boutique')
@section('content')
<style>
    .container{
        margin-left: -11%;
        
    }
    form{
        width: 90%;
        height: 200%;
    }
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header" style="background-color: #7f3f0a; color:white; text-align:center;">{{ __('AJOUTER COMMANDE') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('commandes.store') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="quantité" class="col-md-4 col-form-label text-md-end">{{ __('quantité') }}</label>

                            <div class="col-md-6">
                                <input id="quantité" type="text" class="form-control @error('quantité') is-invalid @enderror" name="quantité" value="{{ old('quantité') }}" required autocomplete="quantité" autofocus>

                                @error('quantite')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                     </div>

                     <div class="row mb-3">
                            <label for="date" class="col-md-4 col-form-label text-md-end">{{ __('date') }}</label>

                            <div class="col-md-6">
                                <input id="date" type="date" class="form-control @error('date') is-invalid @enderror" name="date" value="{{ old('date') }}" required autocomplete="date" autofocus>

                                @error('date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                     </div>

                     <div class="row mb-3">
                            <label for="produitId" class="col-md-4 col-form-label text-md-end">{{ __('Produit') }}</label>

                            <div class="col-md-6">
                                
                                <select class="form-control @error('produitId') is-invalid @enderror" name="produitId" value="{{ old('produitId') }}" required autocomplete="produitId" autofocus >
                                  @foreach ($produit as $produit )
                                  <option value="{{$produit->id}}">{{$produit->nom}}</option>
                                  @endforeach
                               </select>


                                @error('produitId')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                     </div>


                     <div class="row mb-3">
                            <label for="clientId" class="col-md-4 col-form-label text-md-end">{{ __('Client') }}</label>

                            <div class="col-md-6">
                                
                                <select class="form-control @error('clientId') is-invalid @enderror" name="clientId" value="{{ old('clientId') }}" required autocomplete="clientId" autofocus >
                                @foreach ($client as $client )
                                  <option value="{{$client->id}}">{{$client->nom}}</option>
                                  @endforeach
                               </select>


                                @error('clientId')
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
