@extends('./layouts.assistant.acceuil')

@section('content')
<div class="user-list-container">
    <div class="user-list-header">
        <h2>Liste des demandes</h2>
        <a href="/assistant/ajouter" class="custom-blue-button">
            Ajouter une demande
          </a>
    </div>
    @if (session('status'))
        <div class="alert alert-success" style="align-items: center">
          {{session('status')}}
        </div>
     @endif
    <div class="table-responsive">
        <table class="user-table">
            <thead>
                <tr>
                    <th>matricule navire</th>
                    <th>Armateur</th>
                    <th>Type de licence</th>
                    <th>numero de licence</th>
                    <th>Prix redevance</th>
                    <th>Durée en mois </th>
                    <th>zones</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($demandes as $demande)


                <tr>
                    <td>{{$demande->navire->matricule}}</td>
                    <td>{{ $demande->armateur->prenom }} {{ $demande->armateur->nom }}</td>
                    <td>{{ $demande->type }}</td>
                    <td>{{ $demande->numero }}</td>
                    <td>{{ $demande->redevance }}</td>
                    <td>{{ $demande->duree}}</td>
                    <td>
                        @foreach($demande->zones as $zone)
                            <span class="badge badge-primary">{{ $zone->nom }}/</span>
                        @endforeach
                    </td>
                    <td>
                        <a href="/assistant/demande/edit/{{$demande->id}}" class="action-btn edit"><i class='bx bx-edit-alt'></i></a>
                        <a href="{{ route('demande.renew.assistant', $demande->id) }}" class="action-btn edit"><i class="bi bi-arrow-repeat"></i>
                        </a>



                    </td>
                </tr>
                @endforeach

                <!-- Ajoutez d'autres lignes d'exemple ici -->
            </tbody>
        </table>
    </div>
</div>


@endsection


@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // JavaScript pour gérer la soumission du formulaire si nécessaire
        const form = document.getElementById('addForm');
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            // Ajoutez ici la logique pour soumettre le formulaire via AJAX si désiré
            // Sinon, vous pouvez laisser le formulaire se soumettre normalement
            this.submit();
        });
    });
</script>
@endpush


