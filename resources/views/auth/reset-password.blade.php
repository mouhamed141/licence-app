<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Reinitialisation de mot de passe</title>

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
        <form action="{{route('password.update')}}" method="post">
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

            <input type="hidden" name="token" value="{{ $token }}">
            <div class="infield">
              <i class="bi bi-envelope-fill"></i>
              <input type="email" placeholder="Entrez votre Email ici" name="email" required />
            </div>
            <div class="infield">
                <i class="bi bi-key-fill"></i>
                <input type="password" name="password" placeholder="Mot de passe" required />
            </div>

            <div class="infield">
                <i class="bi bi-key-fill"></i>
                <input type="password" name="password_confirmation" placeholder="Confirmer votre mot de passe" required />
              </div>

            <button>Réinitialiser</button>
          </form>

    </div>
</body>
</html>
