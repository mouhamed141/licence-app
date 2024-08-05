@extends('./layouts.division.demande')

@section('content')
<div class="main-content">
    <form id="demandeLicenceForm" class="licence-form" method="POST" action="{{ route('submit_ajouter_division') }}">
        @csrf
        <h2>Formulaire de Demande de Licence</h2>
        @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
        @if (session('status'))
        <div class="alert alert-success" style="align-items: center">
          {{session('status')}}
        </div>
     @endif

        <section>
            <h3>1. Informations de l'Armateur</h3>
            <div class="form-row">
                <div class="form-group">
                    <label for="armateur_cni">CNI Armateur</label>
                    <input type="text" id="armateur_cni" name="cni" required>
                </div>
                <div class="form-group">
                    <label for="armateur_nom">Nom Armateur</label>
                    <input type="text" id="armateur_nom" name="nom" required>
                </div>
                <div class="form-group">
                    <label for="armateur_prenom">Prénom Armateur</label>
                    <input type="text" id="armateur_prenom" name="prenom" required>
                </div>
            </div>
        </section>

        <section>
            <h3>2. Informations du Navire</h3>
            <div class="form-row">
                <div class="form-group">
                    <label for="navire_matricule">Matricule</label>
                    <input type="text" id="navire_matricule" name="matricule" required>
                </div>
                <div class="form-group">
                    <label for="navire_nom">Nom du Navire</label>
                    <input type="text" id="navire_nom" name="nomNavire" required>
                </div>
                <div class="form-group">
                    <label for="navire_armement">Armement</label>
                    <input type="text" id="armement" name="armement" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="navire_pavillon">Pavillon</label>
                    <input type="text" id="pavillon" name="pavillon" required>
                </div>
                <div class="form-group">
                    <label for="navire_jauge">Jauge</label>
                    <input type="number" id="jauge" name="jauge" step="0.01" required>
                </div>
                <div class="form-group">
                    <label for="navire_longueur">Longueur</label>
                    <input type="number" id="longueur" name="longueur" step="0.01" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group full-width">
                    <label for="navire_mode_conservation">Mode de Conservation</label>
                    <textarea id="modeConservation" name="modeConservation" rows="3"></textarea>
                </div>
            </div>
        </section>

        <section>
            <h3>3. Informations de la Licence</h3>
            <div class="form-row">
                <div class="form-group">
                    <label for="type">Type</label>
                    <select id="type" name="type" required>
                        <option value="LPDC">LPDC</option>
                        <option value="LPDP">LPDP</option>
                        <option value="LPPC">LPPC</option>
                        <option value="LPPH">LPPH</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="option">Option</label>
                    <select id="option" name="option" required>
                        <option value="chalutiers">chalutiers</option>
                        <option value="palangriers">palangriers</option>
                        <option value="senneurs">senneurs</option>
                        <option value="casiers">casiers</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="libelleOption">Libellé Option</label>
                    <input type="text" id="libelleOption" name="libelleOption" required>
                </div>

            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="zonePeche">Zone de Pêche</label>
                    <select id="zones" name="zones[]" multiple required>
                        @foreach($zones as $zone)
                            <option value="{{ $zone->id }}">{{ $zone->nom }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="ouvertureMaille">Ouverture Maille</label>
                    <input type="number" id="ouvertureMaille" name="ouvertureMaille">
                </div>
                <div class="form-group">
                    <label for="Redevance">Paiement Redevance</label>
                    <input type="number" id="Redevance" name="redevance">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="debutValidite">Début Validité</label>
                    <input type="date" id="debutValidite" name="debutValidite">
                </div>
                <div class="form-group">
                    <label for="finValidite">Fin Validité</label>
                    <input type="date" id="finValidite" name="finValidite">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group half-width">
                    <label for="enginsAuthorizes">Engins Autorisés</label>
                    <textarea id="enginsAuthorizes" name="enginsAuthorizes" rows="3"></textarea>
                </div>
                <div class="form-group half-width">
                    <label for="modeAcces">Mode Accès</label>
                    <textarea id="modeAcces" name="modeAcces" rows="3"></textarea>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group half-width">
                    <label for="conditionsSpeciales">Conditions Spéciales</label>
                    <textarea id="conditionsSpeciales" name="conditionsSpeciales" rows="3"></textarea>
                </div>
                <div class="form-group half-width">
                    <label for="zoneAuthorizes">Zones Autorisées</label>
                    <textarea id="zoneAuthorizes" name="zoneAuthorizes" rows="3"></textarea>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group half-width">
                    <label for="zoneInterdites">Zones Interdites</label>
                    <textarea id="zoneInterdites" name="zoneInterdites" rows="3"></textarea>
                </div>
                <div class="form-group half-width">
                    <label for="especesLibres">Espèces Libres</label>
                    <textarea id="especesLibres" name="especesLibres" rows="3"></textarea>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group half-width">
                    <label for="prisesAccessoires">Prises Accessoires</label>
                    <textarea id="prisesAccessoires" name="prisesAccessoires" rows="3"></textarea>
                </div>
                <div class="form-group half-width">
                    <label for="especesProtegees">Espèces Protégées</label>
                    <textarea id="especesProtegees" name="especesProtegees" rows="3"></textarea>
                </div>
            </div>
        </section>

        <div class="form-row">
            <button type="submit" class="submit-btn">Soumettre</button>
        </div>
    </form>
</div>

<style>
    .main-content {
        width: 100%;
        max-width: 1200px;
        margin: 0 auto;
        padding: 30px;
        box-sizing: border-box;
    }

    .licence-form {
        background-color: #ffffff;
        padding: 40px;
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    }

    h2 {
        color: #2c3e50;
        text-align: center;
        margin-bottom: 40px;
        font-size: 32px;
        font-weight: 700;
    }

    h3 {
        color: #3498db;
        margin-top: 40px;
        margin-bottom: 25px;
        font-size: 24px;
        font-weight: 600;
        border-bottom: 2px solid #3498db;
        padding-bottom: 10px;
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

    .half-width {
        flex-basis: calc(50% - 10px);
    }

    label {
        display: block;
        margin-bottom: 10px;
        font-weight: 600;
        color: #34495e;
        font-size: 16px;
    }

    input[type="text"],
    input[type="number"],
    input[type="date"],
    select,
    textarea {
        width: 100%;
        padding: 12px;
        border: 2px solid #ddd;
        border-radius: 6px;
        box-sizing: border-box;
        font-size: 16px;
        transition: all 0.3s ease;
    }

    input[type="text"]:focus,
    input[type="number"]:focus,
    input[type="date"]:focus,
    select:focus,
    textarea:focus {
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
        margin: 40px auto 0;
        width: 250px;
    }

    .submit-btn:hover {
        background-color: #2980b9;
        transform: translateY(-3px);
        box-shadow: 0 5px 15px rgba(0,0,0,0.2);
    }

    @media (max-width: 768px) {
        .form-group, .half-width {
            flex-basis: 100%;
            margin-right: 0;
        }
    }
</style>
@endsection
