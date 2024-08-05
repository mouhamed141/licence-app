<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Armateurs</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="user-list-container">
        <div class="user-list-header">
            <h2>Liste des Navires</h2>
        </div>
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
                    @foreach ($navire as $navires)
                    <tr>
                        <td>{{$navires->id}}</td>
                        <td>{{$navires->matricule}}</td>
                        <td>{{$navires->nomNavire}}</td>
                        <td>{{$navires->armement}}</td>
                        <td>{{$navires->pavillon}}</td>
                        <td>{{$navires->jauge}}</td>
                        <td>{{$navires->longueur}}</td>

                    </tr>

                   @endforeach

                    <!-- Ajoutez d'autres lignes d'exemple ici -->
                </tbody>
            </table>


        </div>
    </div>



</body>
</html>
