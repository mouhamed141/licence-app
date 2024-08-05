@extends('./layouts.division.renewer')

@section('content')
<div class="user-list-container">
    <div class="user-list-header">
        <h2>Liste des Renouvellements</h2>
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
                    <thead>
                        <tr>
                            <th>Numéro </th>
                            <th>Navire</th>
                            <th>Armateur</th>
                            <th>Date de début</th>
                            <th>Date de fin</th>
                            <th>Redevance</th>
                            <th>Zones</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($renouvellements as $renouvellement)
                            <tr>
                                <td>{{ $renouvellement->numero }}</td>
                                <td>{{ $renouvellement->demande->navire->matricule }}</td>
                                <td>{{ $renouvellement->demande->armateur->prenom }}  {{ $renouvellement->demande->armateur->nom }} </td>
                                <td>{{ $renouvellement->debutValiditeRenouvellement }}</td>
                                <td>{{ $renouvellement->finValiditeRenouvellement }}</td>
                                <td>{{ $renouvellement->redevance }}</td>
                                <td>
                                        @foreach($renouvellement->demande->zones as $zone)
                                            <span class="badge badge-primary">{{ $zone->nom }}/</span>
                                        @endforeach
                                </td>
                                 <td>
                                    <a href="{{ route('renouvellements.edit.division', $renouvellement->id) }}" class="action-btn edit"><i class='bx bx-edit-alt'></i></a>


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


