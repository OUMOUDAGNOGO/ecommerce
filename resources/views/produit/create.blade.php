
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('ajouter produit') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('produits.store') }}">
                        @csrf

                        <!-- nom_produit -->
                        <div class="row mb-3">
                            <label for="nom_produit" class="col-md-4 col-form-label text-md-end">{{ __('nom_produit') }}</label>

                            <div class="col-md-6">
                                <input id="nom_produit" type="text" class="form-control @error('nom_produit') is-invalid @enderror" name="nom_produit" value="{{ old('nom_produit') }}" required autocomplete="nom_produit" autofocus>

                                @error('nom_produit')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                     </div>

                     <div class="row mb-3">
                            <label for="image" class="col-md-4 col-form-label text-md-end">{{ __('Image') }}</label>

                            <div class="col-md-6">
                                <input id="image" type="string" class="form-control @error('image') is-invalid @enderror" name="image" value="{{ old('image') }}" required autocomplete="image" autofocus>

                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                     </div>
                        <!-- fin nom_produit -->

                        <!-- type_produit -->
                        <div class="row mb-3">
                            <label for="type_produit" class="col-md-4 col-form-label text-md-end">{{ __('type_produit') }}</label>

                            <div class="col-md-6">
                                <input id="type_produit" type="text" class="form-control @error('type_produit') is-invalid @enderror" name="type_produit" value="{{ old('type_produit') }}" required autocomplete="type_produit" autofocus>

                                @error('type_produit')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                     </div>
                        <!-- fin type_produit -->

                        <!-- description -->
                        <div class="row mb-3">
                            <label for="description" class="col-md-4 col-form-label text-md-end">{{ __('description') }}</label>

                            <div class="col-md-6">
                                <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" required autocomplete="description" autofocus>

                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                     </div>
                         <!-- fin description -->
                         <div class="container">
                             <label class="form-label text-white" style="font-weight: bold;" for="doa">categorie</label>
                               <select class="form-select" name="categorieId" style="color: #41A7A5" aria-label="Default select example" name="categorieId">
                                  @foreach ($categorie as $categorie )
                                  <option value="{{$categorie->id}}">{{$categorie->nom}}</option>
                                  @endforeach
                               </select>
                         </div>
                         <!-- prix -->
                         <div class="row mb-3">
                            <label for="prix" class="col-md-4 col-form-label text-md-end">{{ __('prix') }}</label>

                            <div class="col-md-6">
                                <input id="prix" type="text" class="form-control @error('prix') is-invalid @enderror" name="prix" value="{{ old('prix') }}" required autocomplete="prix" autofocus>

                                @error('prix')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                     </div>
                         <!-- fin prix -->
                       
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

