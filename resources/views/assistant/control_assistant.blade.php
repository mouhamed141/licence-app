@extends('./layouts.assistant.recherche_assistant')

@section('content')
<style>
:root {
    --main-color: #3399ff;
    --secondary-color: #007bff;
    --accent-color: #ff6b6b;
}
.welcome-container {
    background: #f8f9fa;
    min-height: 80vh;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 20px;
}
.welcome-card {
    background: white;
    border-radius: 20px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    padding: 50px;
    text-align: center;
    max-width: 700px;
    width: 100%;
    transition: transform 0.3s ease;
}
.welcome-card:hover {
    transform: translateY(-5px);
}
.welcome-title {
    color: var(--main-color);
    font-size: 2.8em;
    margin-bottom: 30px;
    font-weight: bold;
    text-shadow: 2px 2px 4px rgba(0,0,0,0.1);
}
.welcome-text {
    color: #555;
    font-size: 1.3em;
    line-height: 1.8;
    margin-bottom: 30px;
}
.highlight {
    color: var(--accent-color);
    font-weight: bold;
}
.search-instruction {
    background: var(--secondary-color);
    color: white;
    padding: 15px 25px;
    border-radius: 50px;
    display: inline-block;
    font-weight: bold;
    transition: background 0.3s ease;
}
.search-instruction:hover {
    background: var(--main-color);
}
</style>

<div class="welcome-container">
<div class="welcome-card">
    <h1 class="welcome-title">Bienvenue sur la page Forme Contrôle</h1>
    <p class="welcome-text">
        Nous sommes ravis de vous accueillir sur notre plateforme de gestion maritime.
        Pour commencer votre expérience, veuillez suivre l'instruction ci-dessous :
    </p>
    <div class="search-instruction">
        Entrez le matricule du navire dans la barre de recherche
    </div>
</div>
</div>
@endsection
