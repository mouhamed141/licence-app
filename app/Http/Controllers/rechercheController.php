<?php

namespace App\Http\Controllers;

use App\Models\Demande;
use Illuminate\Http\Request;

class rechercheController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function recherche_matricule_admin(Request $request)
    {
    $matricule = $request->input('matricule');

    $demande = Demande::whereHas('navire', function ($query) use ($matricule) {

        $query->where('matricule', $matricule);

    })->with(['armateur', 'navire'])->first();

    if ($demande) {

        return view('admin.demandes.fiche_control_admin', compact('demande'));

    } else {

        return redirect()->back()->with('error', 'Aucune demande trouvée pour ce matricule.');
    }
}



public function recherche_matricule_assistant(Request $request)
{
    $matricule = $request->input('matricule');

    $demande = Demande::whereHas('navire', function ($query) use ($matricule) {

        $query->where('matricule', $matricule);

    })->with(['armateur', 'navire'])->first();

    if ($demande) {

        return view('assistant.fiche_control_assistant', compact('demande'));

    } else {

        return redirect()->back()->with('error', 'Aucune demande trouvée pour ce matricule.');
    }
}


public function recherche_matricule_bureau(Request $request)
{
    $matricule = $request->input('matricule');

    $demande = Demande::whereHas('navire', function ($query) use ($matricule) {

        $query->where('matricule', $matricule);

    })->with(['armateur', 'navire'])->first();

    if ($demande) {

        return view('bureau.fiche_control_bureau', compact('demande'));

    } else {

        return redirect()->back()->with('error', 'Aucune demande trouvée pour ce matricule.');
    }
}


public function recherche_matricule_division(Request $request)
{
    $matricule = $request->input('matricule');

    $demande = Demande::whereHas('navire', function ($query) use ($matricule) {

        $query->where('matricule', $matricule);

    })->with(['armateur', 'navire'])->first();

    if ($demande) {

        return view('division.fiche_control_division', compact('demande'));

    } else {

        return redirect()->back()->with('error', 'Aucune demande trouvée pour ce matricule.');

    }
}
}
