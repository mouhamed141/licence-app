<?php

namespace App\Http\Controllers;

use App\Models\Navire;
use App\Models\Demande;
use App\Models\Armateur;
use Illuminate\Http\Request;

class urlController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function indexAdmin(Request $request)
   {
    // Récupérer toutes les demandes
    $allDemandes = Demande::with(['armateur', 'navire', 'zones'])->get();

    $anneeEnCours = date('Y');
    $redevanceAnnuelle = $allDemandes->filter(function ($demande) use ($anneeEnCours) {
        return $demande->annee == $anneeEnCours;
    })->sum('redevance');

    $nombreNavires = Navire::count();
    $nombreArmateurs = Armateur::count();
    $totalDemandes = $allDemandes->count();

    // Requête de recherche
    $query = Demande::with(['armateur', 'navire', 'zones']);

    if ($request->has('matricule')) {
        $matricule = $request->input('matricule');
        $query->whereHas('navire', function ($q) use ($matricule) {
            $q->where('matricule', 'LIKE', "%{$matricule}%");
        });
    }

    $demandes = $query->get();

    return view("admin.demandes.list_demande_admin", compact(
        "totalDemandes",
        "redevanceAnnuelle",
        "nombreNavires",
        "nombreArmateurs",
        "demandes"
    ));
}
    /*
    public function indexAdmin(){

        $demandes = Demande::with(['armateur', 'navire', 'zones'])->get();

        $anneeEnCours = date('Y');

        $redevanceAnnuelle = $demandes->filter(function ($demande) use ($anneeEnCours) {
            return $demande->annee == $anneeEnCours;
        })->sum('redevance');


        $nombreNavires = Navire::count();

        // Nombre total d'armateurs
        $nombreArmateurs = Armateur::count();


        $totalDemandes = $demandes->count();

        return view("admin.demandes.list_demande_admin", compact(
        "totalDemandes",
        "redevanceAnnuelle",
        "nombreNavires",
        "nombreArmateurs",
        "demandes"));
    }
        */

/*
    public function search(Request $request)
{
    $query = $request->input('query');
    $demandes = Demande::whereHas('navire', function($q) use ($query) {
        $q->where('matricule', 'LIKE', "%{$query}%");
    })->with(['armateur', 'navire', 'zones'])->get();

    return view('admin.demandes.list_demande_admin', compact('demandes'));
}
    */











    public function indexAssistant(Request $request)

    {

    $allDemandes = Demande::with(['armateur', 'navire', 'zones'])->get();

    $anneeEnCours = date('Y');
    $redevanceAnnuelle = $allDemandes->filter(function ($demande) use ($anneeEnCours) {
        return $demande->annee == $anneeEnCours;
    })->sum('redevance');

    $nombreNavires = Navire::count();
    $nombreArmateurs = Armateur::count();
    $totalDemandes = $allDemandes->count();


    $query = Demande::with(['armateur', 'navire', 'zones']);

    if ($request->has('matricule')) {
        $matricule = $request->input('matricule');
        $query->whereHas('navire', function ($q) use ($matricule) {
            $q->where('matricule', 'LIKE', "%{$matricule}%");
        });
    }
    $demandes = $query->get();


        return view("assistant.list_demande_assistant", compact(
        "totalDemandes",
        "redevanceAnnuelle",
        "nombreNavires",
        "nombreArmateurs",
        "demandes"));
    }



    public function indexBureau(Request $request){


    $allDemandes = Demande::with(['armateur', 'navire', 'zones'])->get();

    $anneeEnCours = date('Y');
    $redevanceAnnuelle = $allDemandes->filter(function ($demande) use ($anneeEnCours) {
        return $demande->annee == $anneeEnCours;
    })->sum('redevance');

    $nombreNavires = Navire::count();
    $nombreArmateurs = Armateur::count();
    $totalDemandes = $allDemandes->count();


    $query = Demande::with(['armateur', 'navire', 'zones']);

    if ($request->has('matricule')) {
        $matricule = $request->input('matricule');
        $query->whereHas('navire', function ($q) use ($matricule) {
            $q->where('matricule', 'LIKE', "%{$matricule}%");
        });
    }
    $demandes = $query->get();
        return view("bureau.list_demande_bureau", compact(
       "totalDemandes",
        "redevanceAnnuelle",
        "nombreNavires",
        "nombreArmateurs",
        "demandes"
        ));
    }



    public function indexDivision(Request $request){

       // Récupérer toutes les demandes
    $allDemandes = Demande::with(['armateur', 'navire', 'zones'])->get();

    $anneeEnCours = date('Y');
    $redevanceAnnuelle = $allDemandes->filter(function ($demande) use ($anneeEnCours) {
        return $demande->annee == $anneeEnCours;
    })->sum('redevance');

    $nombreNavires = Navire::count();
    $nombreArmateurs = Armateur::count();
    $totalDemandes = $allDemandes->count();

    // Requête de recherche
    $query = Demande::with(['armateur', 'navire', 'zones']);

    if ($request->has('matricule')) {
        $matricule = $request->input('matricule');
        $query->whereHas('navire', function ($q) use ($matricule) {
            $q->where('matricule', 'LIKE', "%{$matricule}%");
        });
    }
    $demandes = $query->get();

        return view("division.list_demande_division", compact(
        "totalDemandes",
        "redevanceAnnuelle",
        "nombreNavires",
        "nombreArmateurs",
        "demandes"
        ));
    }



}
