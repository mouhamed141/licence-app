<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Mot de passe oublié</title>

    <!-- Font Awesome for Icons -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
      integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <!-- Bootstrap Icons -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
  </head>
  <body>
    <div class="header">
      <div class="img">
        <img src="{{ asset('images/logo.jpg') }}" class="dpm-image" alt="Logo" />
      </div>
      <h2>GESTION DES LICENCES</h2>
    </div>

    <div class="form-container sign-in-container">
      <form action="{{route ('password.email')}}" method="post">
        @csrf
        <h1>Réinitialisation du mot de passe</h1>

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <span style="color: red">{{ $error }}</span>
            @endforeach
        @endif

        @if (session('status'))
            <div style="color: green">
                {{ session('status') }}
            </div>
        @endif

        <div class="infield">
          <i class="bi bi-envelope-fill"></i>
          <input type="email" placeholder="Entrez votre Email ici" name="email" required />
        </div>

        <button>Envoyer</button>
      </form>
    </div>
  </body>
</html>
