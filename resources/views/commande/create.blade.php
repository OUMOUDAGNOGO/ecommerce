
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('ajouter commande') }}</div>

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
                                <input id="date" type="string" class="form-control @error('date') is-invalid @enderror" name="date" value="{{ old('date') }}" required autocomplete="date" autofocus>

                                @error('date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                     </div>
                       
                         <!-- fin description -->
                         <div class="container">
                             <label class="form-label text-white" style="font-weight: bold;" for="doa">Produit</label>
                               <select class="form-select" name="produitId" style="color: #41A7A5" aria-label="Default select example" name="produitId">
                                  @foreach ($produit as $produit )
                                  <option value="{{$produit->id}}">{{$produit->nom}}</option>
                                  @endforeach
                               </select>
                         </div>
                        
                         <div class="container">
                             <label class="form-label text-white" style="font-weight: bold;" for="doa">client</label>
                               <select class="form-select" name="clientId" style="color: #41A7A5" aria-label="Default select example" name="clientId">
                                  @foreach ($client as $client )
                                  <option value="{{$client->id}}">{{$client->nom}}</option>
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

