@extends('./layouts.admin.user')

@section('content')
<div class="user-list-container" style="padding: 26px";>
    <div class="user-list-header">
        <h2>Liste des Armateurs</h2>
        <a href="{{ route('telecharger.liste.armateur') }}" class="custom-blue-button">
            telecharger la liste
          </a>
    </div>
    <div class="table-responsive">
        <table class="user-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>CNI</th>
                    <th>NOM</th>
                    <th>PRENOM</th>

                </tr>
            </thead>
            <tbody>

                @foreach ($armateurs as $armateur)


                <tr>
                    <td>{{$armateur->id}}</td>
                    <td>{{$armateur->cni}}</td>
                    <td>{{$armateur->nom}}</td>
                    <td>{{$armateur->prenom}}</td>
                </tr>
                @endforeach


            </tbody>
        </table>
    </div>
</div>
@endsection
