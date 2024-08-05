<?php

namespace App\Http\Controllers;
use Barryvdh\DomPDF\Facade\Pdf;

use App\Models\Zone;
use App\Models\Navire;
use App\Models\Demande;
use App\Models\Armateur;
use Illuminate\Http\Request;

class adminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function view_modifier_demande_admin($id) {

        $demandes = Demande::with(['armateur', 'navire', 'zones'])->findOrFail($id);
        $zones = Zone::all();
        return view("admin.demandes.modifier_demande_admin", compact("demandes", "zones"));
    }


    public function modifier_Demande_traitement_admin (Request $request, $id){

        $request->validate([
            // Validation pour l'armateur
            'cni' => 'required|string',
            'nom' => 'required|string',
            'prenom' => 'required|string',

            // Validation pour le navire
            'matricule' => 'required|string',
            'nomNavire' => 'required|string',
            'armement' => 'required|string',
            'pavillon' => 'required|string',
            'jauge' => 'required|numeric',
            'longueur' => 'required|numeric',
            'modeConservation' => 'required|string',

            // Validation pour la demande de licence
            'type' => 'required|string',
            'option' => 'required|string',
            'libelleOption' => 'required|string',
            'zones' => 'required',
            'zones.*' => 'exists:zones,id',
            'ouvertureMaille' => 'required|numeric',
            'enginsAuthorizes' => 'required|string',
            'modeAcces' => 'required|string',
            'redevance' => 'required|numeric',
            'conditionsSpeciales' => 'required|string',
            'debutValidite' => 'required|date',
            'finValidite' => 'required|date',
            'zoneAuthorizes' => 'required|string',
            'zoneInterdites' => 'required|string',
            'especesLibres' => 'required|string',
            'prisesAccessoires' => 'required|string',
            'especesProtegees' => 'required|string',
        ]);

           $demande = Demande::findOrFail($id);

            // Mise à jour de l'armateur
            $demande->armateur->update([
                'cni' => $request->cni,
                'nom' => $request->nom,
                'prenom' => $request->prenom,
            ]);

            // Mise à jour du navire
            $demande->navire->update([
                'matricule' => $request->matricule,
                'nomNavire' => $request->nomNavire,
                'armement' => $request->armement,
                'pavillon' => $request->pavillon,
                'jauge' => $request->jauge,
                'longueur' => $request->longueur,
                'modeConservation' => $request->modeConservation,
            ]);

            // Mise à jour de la demande de licence
            $demande->update([
                'annee' => date('Y'),
                'dateDemande' => now(),
                'type' => $request->type,
                'option' => $request->option,
                'libelleOption' => $request->libelleOption,
                'ouvertureMaille' => $request->ouvertureMaille,
                'enginsAuthorizes' => $request->enginsAuthorizes,
                'modeAcces' => $request->modeAcces,
                'redevance' => $request->redevance,
                'conditionsSpeciales' => $request->conditionsSpeciales,
                'debutValidite' => $request->debutValidite,
                'finValidite' => $request->finValidite,
                'duree' => Demande::calculateDuree($request->debutValidite, $request->finValidite),
                'zoneAuthorizes' => $request->zoneAuthorizes,
                'zoneInterdites' => $request->zoneInterdites,
                'especesLibres' => $request->especesLibres,
                'prisesAccessoires' => $request->prisesAccessoires,
                'especesProtegees' => $request->especesProtegees,
            ]);

            // Synchroniser les zones
            $demande->zones()->sync($request->zones);

        return redirect('/admin')->with('status', 'La demande a bien été mise à jour avec succès');

    }


    public function view_ajouter_demande_admin(){

        $zones = Zone::all();

        return view("admin.demandes.ajouter_demande_admin", compact("zones"));
   }

    public function ajouter_Demande_traitement_admin (Request $request)
    {
        $request->validate([
            // Validation pour l'armateur
            'cni' => 'required',
            'nom' => 'required',
            'prenom' => 'required',

            // Validation pour le navire
            'matricule' => 'required',
            'nomNavire' => 'required',
            'armement' => 'required',
            'pavillon' => 'required',
            'longueur' => 'required',
            'modeConservation' =>'required',

            // Validation pour la demande de licence
            // 'annee' => 'required',
            //'dateDemande' => 'required',
            'type' => 'required',
            //'numero' => 'required',
            'option' => 'required',
            'libelleOption' => 'required',
            //'zone' => 'required',
            'zones' => 'required|array|min:1',
            'zones.*' => 'exists:zones,id',
            'ouvertureMaille' => 'required',
            'enginsAuthorizes' => 'required',
            'modeAcces' => 'required',
            'redevance' => 'required',
            'conditionsSpeciales' => 'required',
            'debutValidite' => 'required',
            'finValidite' => 'required',
            //'duree' => 'required',
            'zoneAuthorizes' => 'required',
            'zoneInterdites' => 'required',
            'especesLibres' => 'required',
            'prisesAccessoires' => 'required',
            'especesProtegees' => 'required',
        ]);

            // Création de l'armateur
            $armateur = new Armateur();
            $armateur->cni = $request->cni;
            $armateur->nom = $request->nom;
            $armateur->prenom = $request->prenom;
            $armateur->save();

            // Création du navire
            $navire = new Navire();
            $navire->armateur_id = $armateur->id;
            $navire->matricule = $request->matricule;
            $navire->nomNavire = $request->nomNavire;
            $navire->armement = $request->armement;
            $navire->pavillon = $request->pavillon;
            $navire->jauge = $request->jauge;
            $navire->longueur = $request->longueur;
            $navire->modeConservation = $request->modeConservation;
            $navire->save();

            // Création de la demande de licence
            $demande = new Demande();
            $demande->armateur_id = $armateur->id;
            $demande->navire_id = $navire->id;
            //$demande->annee = $request->annee;
            $demande->annee = date('Y');
            //$demande->dateDemande = $request->dateDemande;
            $demande->dateDemande = now();
            $demande->type = $request->type;
            //$demande->numero = $request->numero;
            $demande->numero = Demande:: generateNumero();
            $demande->option = $request->option;
            $demande->libelleOption = $request->libelleOption;
            //$demande->zone = $request->zone;
            $demande->ouvertureMaille = $request->ouvertureMaille;
            $demande->enginsAuthorizes = $request->enginsAuthorizes;
            $demande->modeAcces = $request->modeAcces;
            $demande->redevance = $request->redevance;
            $demande->conditionsSpeciales = $request->conditionsSpeciales;
            $demande->debutValidite = $request->debutValidite;
            $demande->finValidite = $request->finValidite;
            //$demande->duree = $request->duree;
            $demande->duree = Demande::calculateDuree($demande->debutValidite, $demande->finValidite);
            $demande->zoneAuthorizes = $request->zoneAuthorizes;
            $demande->zoneInterdites = $request->zoneInterdites;
            $demande->especesLibres = $request->especesLibres;
            $demande->prisesAccessoires = $request->prisesAccessoires;
            $demande->especesProtegees = $request->especesProtegees;

            $demande->save();

            $demande->zones()->attach($request->zones);





            return redirect('/admin')->with('status','La demande a bien été ajouté avec succés');
   }

   public function supprimer_Demande_admin($id)
   {
    $demande = Demande::findOrFail($id);

    // Suppression du navire associé
    if ($demande->navire) {
        $demande->navire->delete();
    }

    // Suppression de l'armateur associé
    if ($demande->armateur) {
        $demande->armateur->delete();
    }

    // Suppression de la demande
    $demande->delete();

    return redirect('/admin')->with('status', 'La demande a été supprimée avec succès');
}



 public function liste_armateur_admin() {

    $armateurs = Armateur::all();
    return view('admin.demandes.liste_armateur_admin', compact('armateurs'));
 }

 public function liste_navire_admin() {

    $navires = Navire::all();
    return view('admin.demandes.list_navire_admin', compact('navires'));
 }

 public function telecharger_liste_armateur()
    {
        $armateur = Armateur::all();

        $pdf = Pdf::loadView('liste.armateur', ['armateur' => $armateur]);

        return $pdf->download('armateur-' . '.pdf');
    }

    public function telecharger_liste_navire()
    {
        $navire = Armateur::all();

        $pdf = Pdf::loadView('liste.navire', ['navire' => $navire]);

        return $pdf->download('navire-' . '.pdf');
    }
}

