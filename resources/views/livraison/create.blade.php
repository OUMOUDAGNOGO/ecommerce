
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('ajouter livraison') }}</div>

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
                            <div class="row mb-3">
                            <label for="date_livraison" class="col-md-4 col-form-label text-md-end">{{ __('date_livraison ') }}</label>

                            <div class="col-md-6">
                                <input id="date_livraison" type="date" class="form-control @error('date_livraison') is-invalid @enderror" name="date_livraison" value="{{ old('date_livraison') }}" required autocomplete="date_livraison" autofocus>

                                @error('date_livraison')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                      </div>

                         <!-- fin description -->
                          <div class="container">
                             <label class="form-label text-white" style="font-weight: bold;" for="doa">Produit</label>
                               <select class="form-select" name="commandeId" style="color: #41A7A5" aria-label="Default select example" name="commandeId">
                                  @foreach ($commande as $commande )
                                  <option value="{{$commande->id}}">{{$commande->nom}}</option>
                                  @endforeach
                               </select>
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

