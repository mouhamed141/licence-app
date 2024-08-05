@extends('./layouts.admin.user')

@section('content')
<div class="main-content">
    <form id="addUserForm" class="add-user-form" method="POST" action="/modifier/user/traitement">
        @csrf
        @method('PUT')
        <h2>modifier un user</h2>




            <input type="hidden" name="id" value="{{$user->id}}">
        <div class="form-row">
            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" id="nom" name="nom" value="{{$user->nom}}" required>
            </div>
            <div class="form-group">
                <label for="prenom">Prénom</label>
                <input type="text" id="prenom" name="prenom" value="{{$user->prenom}}" required>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="tel">Téléphone</label>
                <input type="tel" id="tel" name="tel" value="{{$user->tel}}" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="{{$user->email}}" required>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group full-width">
                <label for="password">Mot de passe</label>
                <input type="password" id="password" name="password" value="{{$user->password}}" required>
            </div>
        </div>

        <div class="form-row">
            <button type="submit" class="submit-btn">modifier user</button>
        </div>
    </form>
</div>

<style>
    .main-content {
        padding: 30px;
        margin-left: 250px; /* Ajustez cette valeur selon la largeur de votre sidebar */
    }

    .add-user-form {
        background-color: #ffffff;
        padding: 40px;
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        max-width: 800px; /* Augmenté pour donner plus d'espace */
    }

    h2 {
        color: #2c3e50;
        margin-bottom: 40px;
        font-size: 28px;
        font-weight: 700;
    }

    .form-row {
        display: flex;
        flex-wrap: wrap;
        margin-bottom: 25px;
    }

    .form-group {
        flex: 1;
        min-width: 200px;
        margin-right: 20px;
        margin-bottom: 20px;
    }

    .form-group:last-child {
        margin-right: 0;
    }

    .full-width {
        flex-basis: 100%;
        margin-right: 0;
    }

    label {
        display: block;
        margin-bottom: 10px;
        font-weight: 600;
        color: #34495e;
        font-size: 16px;
    }

    input[type="text"],
    input[type="tel"],
    input[type="email"],
    input[type="password"] {
        width: 100%;
        padding: 12px;
        border: 2px solid #ddd;
        border-radius: 6px;
        box-sizing: border-box;
        font-size: 16px;
        transition: all 0.3s ease;
    }

    input[type="text"]:focus,
    input[type="tel"]:focus,
    input[type="email"]:focus,
    input[type="password"]:focus {
        border-color: #3498db;
        outline: none;
        box-shadow: 0 0 10px rgba(52, 152, 219, 0.3);
    }

    .submit-btn {
        background-color: #3498db;
        color: white;
        padding: 15px 30px;
        border: none;
        border-radius: 30px;
        cursor: pointer;
        font-size: 18px;
        font-weight: 600;
        transition: all 0.3s ease;
        display: block;
        margin-top: 40px;
        width: 250px;
    }

    .submit-btn:hover {
        background-color: #2980b9;
        transform: translateY(-3px);
        box-shadow: 0 5px 15px rgba(0,0,0,0.2);
    }

    @media (max-width: 768px) {
        .main-content {
            margin-left: 0;
            padding: 20px;
        }

        .form-group {
            flex-basis: 100%;
            margin-right: 0;
        }
    }
</style>
@endsection
