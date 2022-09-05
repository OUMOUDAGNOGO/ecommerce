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
                <div class="card-header" style="background-color: #7f3f0a; color:white; text-align:center;">{{ __('AJOUTER UNE CATEGORIE') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('categories.store') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="nom_categorie" class="col-md-4 col-form-label text-md-end">{{ __('nom_categorie') }}</label>

                            <div class="col-md-6">
                                <input id="nom_categorie" type="text" class="form-control @error('nom_categorie') is-invalid @enderror" name="nom_categorie" value="{{ old('nom_categorie') }}" required autocomplete="nom_categorie" autofocus>

                                @error('nom_categorie')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                     </div>

                     <div class="row mb-3">
                            <label for="abreviation" class="col-md-4 col-form-label text-md-end">{{ __('abreviation') }}</label>

                            <div class="col-md-6">
                                <input id="abreviation" type="string" class="form-control @error('abreviation') is-invalid @enderror" name="abreviation" value="{{ old('abreviation') }}" required autocomplete="abreviation" autofocus>

                                @error('abreviation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                     </div>
                    
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Ajouter') }}
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
