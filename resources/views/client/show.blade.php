<div class="container py-3">
    <main>
        <div class="row row-cols-1 row-cols-md-3 mb-3 text-center">
            <div class="col">
                <div class="card mb-4 rounded-3 shadow-sm border-primary">
                    <div class="card-header py-3 text-white bg-primary border-primary">
                        <h4 class="my-0 fw-normal">Id: {{$client->id}}</h4>
                    </div>
                    <div class="card-body" style="list-style: none;">
                        <ul class="list-unstyled mt-3 mb-4">
                        <li>Nom : {{$client->nom}}</li>
                        <li>prenom: {{$client->prenom}}</li>
                        <li>email: {{$client->email}}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <a href="{{url('categories')}}" class="btn btn-primary">Retour</a>