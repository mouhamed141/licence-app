<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Armateurs</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            padding: 20px;
        }
        .table-container {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            padding: 20px;
        }
        h1 {
            color: #007bff;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="table-container">
            <h1 class="text-center">Liste des Armateurs</h1>
            <table id="armateursTable" class="table table-striped table-hover">
                <thead class="table-primary">
                    <tr>
                        <th>ID</th>
                        <th>CNI</th>
                        <th>NOM</th>
                        <th>PRENOM</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($armateur as $armateurs)
                    <tr>
                        <td>{{$armateurs->id}}</td>
                        <td>{{$armateurs->cni}}</td>
                        <td>{{$armateurs->nom}}</td>
                        <td>{{$armateurs->prenom}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
