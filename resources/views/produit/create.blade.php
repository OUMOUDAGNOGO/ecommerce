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
                <div class="card-header" style="background-color: #7f3f0a; color:white; text-align:center;">{{ __('AJOUTER UN PRODUIT') }}</div>

                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data" action="{{ route('produits.store') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="image" class="col-md-4 col-form-label text-md-end">{{ __('image') }}</label>

                            <div class="col-md-6">
                                <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image" value="{{ old('image') }}" required autocomplete="image" autofocus>

                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                     </div>

                     <div class="row mb-3">
                            <label for="nom_produit" class="col-md-4 col-form-label text-md-end">{{ __('nom_produit') }}</label>

                            <div class="col-md-6">
                                <input id="nom_produit" type="string" class="form-control @error('nom_produit') is-invalid @enderror" name="nom_produit" value="{{ old('nom_produit') }}" required autocomplete="nom_produit" autofocus>

                                @error('nom_produit')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                     </div>
                     <div class="row mb-3">
                            <label for="type_produit" class="col-md-4 col-form-label text-md-end">{{ __('type_produit') }}</label>

                            <div class="col-md-6">
                                <input id="type_produit" type="string" class="form-control @error('type_produit') is-invalid @enderror" name="type_produit" value="{{ old('type_produit') }}" required autocomplete="type_produit" autofocus>

                                @error('type_produit')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                     </div>
                     <div class="row mb-3">
                            <label for="description" class="col-md-4 col-form-label text-md-end">{{ __('description') }}</label>

                            <div class="col-md-6">
                                <input id="description" type="string" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" required autocomplete="description" autofocus>

                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                     </div>
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
                            <label for="categorieId" class="col-md-4 col-form-label text-md-end">{{ __('Categorie') }}</label>

                            <div class="col-md-6">
                                
                                <select class="form-control @error('categorieId') is-invalid @enderror" name="categorieId" value="{{ old('categorieId') }}" required autocomplete="categorieId" autofocus >
                                @foreach ($categorie as $categorie )
                                  <option value="{{$categorie->id}}">{{$categorie->nom}}</option>
                                  @endforeach
                               </select>


                                @error('categorieId')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                     </div>
                     <div class="row mb-3">
                            
                            <label for="prix" class="col-md-4 col-form-label text-md-end">{{ __('prix') }}</label>

                            <div class="col-md-6">
                                <input id="prix" type="string" class="form-control @error('prix') is-invalid @enderror" name="prix" value="{{ old('prix') }}" required autocomplete="prix" autofocus>

                                @error('prix')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
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
