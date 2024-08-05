@extends('./layouts.admin.user')

@section('content')
<div class="user-list-container" style="padding: 26px";>
    <div class="user-list-header">
        <h2>Liste des Navires</h2>

        <a href="{{ route('telecharger.liste.navire') }}" class="custom-blue-button">
            telecharger la liste
          </a>
    </div>
    <div class="table-responsive">
        <table class="user-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>matricule</th>
                    <th>nom du navire</th>
                    <th>armement</th>
                    <th>pavillon</th>
                    <th>Jauge</th>
                    <th>longueur</th>

                </tr>
            </thead>
            <tbody>

                @foreach ($navires as $navire)


                <tr>
                        <td>{{$navire->id}}</td>
                        <td>{{$navire->matricule}}</td>
                        <td>{{$navire->nomNavire}}</td>
                        <td>{{$navire->armement}}</td>
                        <td>{{$navire->pavillon}}</td>
                        <td>{{$navire->jauge}}</td>
                        <td>{{$navire->longueur}}</td>
                </tr>
                @endforeach


            </tbody>
        </table>
    </div>
</div>
@endsection
