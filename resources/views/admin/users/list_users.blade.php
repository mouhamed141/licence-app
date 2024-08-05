@extends('./layouts.admin.user')

@section('content')
<div class="user-list-container" style="padding: 26px";>
    <div class="user-list-header">
        <h2>Liste des Utilisateurs</h2>
        <a href="/admin/user/ajouter" class="custom-blue-button">
            Ajouter un User
          </a>
    </div>
    @if (session('status'))
    <div class="alert alert-success">
        {{session('status')}}
    </div>
    @endif
    <div class="table-responsive">
        <table class="user-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>prenom</th>
                    <th>telephone</th>
                    <th>email</th>
                    <th>Role</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($user as $users)


                <tr>
                    <td>{{$users->id}}</td>
                    <td>{{$users->nom}}</td>
                    <td>{{$users->prenom}}</td>
                    <td>{{$users->tel}}</td>
                    <td>{{$users->email}}</td>
                    <td>{{$users->role}}</td>
                    <td>
                        <a href="/admin/user/modifier/{{$users->id}}" class="action-btn edit"><i class='bx bx-edit-alt'></i></a>
                        <form action="{{ route('supprimer_user', $users->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="action-btn delete" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet administrateur ?');">
                                <i class='bx bx-trash'></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach

                <!-- Ajoutez d'autres lignes d'exemple ici -->
            </tbody>
        </table>
    </div>
</div>
@endsection
