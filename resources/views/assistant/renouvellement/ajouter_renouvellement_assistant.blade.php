@extends('./layouts.assistant.demande')

@section('content')
<div class="main-content">
    <form id="renouvellementLicenceForm" class="licence-form" method="POST" action="{{ route('store.renewal.assistant', $demande->id) }}">
        @csrf
        <h2>Formulaire de Renouvellement de Licence</h2>
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

            <div class="form-row">
                <div class="form-group">
                    <label for="debutValidite">Début Validité</label>
                    <input type="date" id="debutValiditeRenouvellement" name="debutValiditeRenouvellement" required>
                </div>
                <div class="form-group">
                    <label for="finValidite">Fin Validité</label>
                    <input type="date" id="finValiditeRenouvellement" name="finValiditeRenouvellement" required>
                </div>
            </div>
            <div class="form-row">

                <div class="form-group">
                    <label for="Redevance">Paiement Redevance</label>
                    <input type="number" id="Redevance" name="redevance" value="{{$demande->redevance}}" required>
                </div>
            </div>
        </section>

        <div class="form-row">
            <button type="submit" class="submit-btn">renouveler</button>
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
<script>
$(document).ready(function() {
    $('#zones').select2({
        placeholder: "Sélectionnez une ou plusieurs zones",
        allowClear: true
    });
});
</script>
@endsection
