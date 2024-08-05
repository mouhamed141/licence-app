<?php

namespace App\Http\Controllers;

use App\Models\Demande;
use Illuminate\Http\Request;
use App\Models\Renouvellement;

class renouvellementController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //admin
    public function list_renewer_admin () {

        $renouvellements = Renouvellement::with(['demande' => function($query) {
            $query->with(['armateur', 'navire', 'zones']);
        }])->get();

        return view('admin.renouvellement.list_renouvellement_admin', compact('renouvellements'));
    }
    public function view_ajouter_renouvellement_admin($id) {

        $demande = Demande::with(['armateur', 'navire', 'zones'])->findOrFail($id);

        return view("admin.renouvellement.ajouter_renouvellement_admin", compact("demande"));
    }

    public function traitement_renewal_admin(Request $request, $id){

        $demande = Demande::findOrFail($id);

        $renewal = new Renouvellement();
        $renewal->annee = date('Y');
        $renewal->numero = Demande::generateNumero();
        $renewal->redevance = $demande->redevance;
        $renewal->duree = Renouvellement::calculateDuree($request->debutValiditeRenouvellement, $request->finValiditeRenouvellement);
        $renewal->finValiditeRenouvellement = $request->finValiditeRenouvellement;
        $renewal->debutValiditeRenouvellement = $request->debutValiditeRenouvellement;
        $renewal->demande_id = $id;

        $renewal->save();

        return redirect('/admin')->with('status', 'Renouvellement effectué avec succès');
   }

     public function view_renouvellement_edit_admin($id)
     {
        $renouvellement = Renouvellement::findOrFail($id);
        return view('admin.renouvellement.modifier_renouvellement_admin', compact('renouvellement'));
     }

     public function update_renouvellement_admin(Request $request, $id)
     {
      $request->validate([
        'debutValiditeRenouvellement' => 'required|date',
        'finValiditeRenouvellement' => 'required|date|after:debutValiditeRenouvellement',
        'redevance' => 'required|numeric'
      ]);

    $renouvellement = Renouvellement::findOrFail($id);
    $renouvellement->debutValiditeRenouvellement = $request->debutValiditeRenouvellement;
    $renouvellement->finValiditeRenouvellement = $request->finValiditeRenouvellement;
    $renouvellement->redevance = $request->redevance;
    $renouvellement->duree = Renouvellement::calculateDuree($request->debutValiditeRenouvellement, $request->finValiditeRenouvellement);
    $renouvellement->save();

    return redirect('admin/list_renewer')->with('status', 'Renouvellement modifié avec succès');
    }




   //bureau
   public function list_renewer_bureau () {

    $renouvellements = Renouvellement::with(['demande' => function($query) {
        $query->with(['armateur', 'navire', 'zones']);
    }])->get();

    return view('bureau.renouvellement.list_renouvellement_bureau', compact('renouvellements'));
}
   public function view_ajouter_renouvellement_bureau($id) {

    $demande = Demande::with(['armateur', 'navire', 'zones'])->findOrFail($id);

    return view("bureau.renouvellement.ajouter_renouvellement_bureau", compact("demande"));
   }

    public function traitement_renewal_bureau(Request $request, $id){

    $demande = Demande::findOrFail($id);

    $renewal = new Renouvellement();
    $renewal->annee = date('Y');
    $renewal->numero = Demande::generateNumero();
    $renewal->redevance = $demande->redevance;
    $renewal->duree = Renouvellement::calculateDuree($request->debutValiditeRenouvellement, $request->finValiditeRenouvellement);
    $renewal->finValiditeRenouvellement = $request->finValiditeRenouvellement;
    $renewal->debutValiditeRenouvellement = $request->debutValiditeRenouvellement;
    $renewal->demande_id = $id;

    $renewal->save();

    return redirect('/bureau')->with('status', 'Renouvellement effectué avec succès');
   }

   public function view_renouvellement_edit_bureau($id)
   {
      $renouvellement = Renouvellement::findOrFail($id);
      return view('bureau.renouvellement.modifier_renouvellement_bureau', compact('renouvellement'));
   }

   public function update_renouvellement_bureau(Request $request, $id)
   {
    $request->validate([
      'debutValiditeRenouvellement' => 'required|date',
      'finValiditeRenouvellement' => 'required|date|after:debutValiditeRenouvellement',
      'redevance' => 'required|numeric'
    ]);

  $renouvellement = Renouvellement::findOrFail($id);
  $renouvellement->debutValiditeRenouvellement = $request->debutValiditeRenouvellement;
  $renouvellement->finValiditeRenouvellement = $request->finValiditeRenouvellement;
  $renouvellement->redevance = $request->redevance;
  $renouvellement->duree = Renouvellement::calculateDuree($request->debutValiditeRenouvellement, $request->finValiditeRenouvellement);
  $renouvellement->save();

  return redirect('bureau/list_renewer')->with('status', 'Renouvellement modifié avec succès');
  }



   //Division
   public function list_renewer_division() {

   $renouvellements = Renouvellement::with(['demande' => function($query) {
            $query->with(['armateur', 'navire', 'zones']);
        }])->get();

    return view('division.renouvellement.list_renouvellement_division', compact('renouvellements'));
}
   public function view_ajouter_renouvellement_division($id) {

    $demande = Demande::with(['armateur', 'navire', 'zones'])->findOrFail($id);

    return view("division.renouvellement.ajouter_renouvellement_division", compact("demande"));
   }

    public function traitement_renewal_division(Request $request, $id){

    $demande = Demande::findOrFail($id);

    $renewal = new Renouvellement();
    $renewal->annee = date('Y');
    $renewal->numero = Demande::generateNumero();
    $renewal->redevance = $demande->redevance;
    $renewal->duree = Renouvellement::calculateDuree($request->debutValiditeRenouvellement, $request->finValiditeRenouvellement);
    $renewal->finValiditeRenouvellement = $request->finValiditeRenouvellement;
    $renewal->debutValiditeRenouvellement = $request->debutValiditeRenouvellement;
    $renewal->demande_id = $id;

    $renewal->save();

    return redirect('/division')->with('status', 'Renouvellement effectué avec succès');
   }

   public function view_renouvellement_edit_division($id)
   {
      $renouvellement = Renouvellement::findOrFail($id);
      return view('division.renouvellement.modifier_renouvellement_division', compact('renouvellement'));
   }

   public function update_renouvellement_division(Request $request, $id)
   {
    $request->validate([
      'debutValiditeRenouvellement' => 'required|date',
      'finValiditeRenouvellement' => 'required|date|after:debutValiditeRenouvellement',
      'redevance' => 'required|numeric'
    ]);

  $renouvellement = Renouvellement::findOrFail($id);
  $renouvellement->debutValiditeRenouvellement = $request->debutValiditeRenouvellement;
  $renouvellement->finValiditeRenouvellement = $request->finValiditeRenouvellement;
  $renouvellement->redevance = $request->redevance;
  $renouvellement->duree = Renouvellement::calculateDuree($request->debutValiditeRenouvellement, $request->finValiditeRenouvellement);
  $renouvellement->save();

  return redirect('division/list_renewer')->with('status', 'Renouvellement modifié avec succès');
  }


     //Assistant
     public function list_renewer_assistant () {


        $renouvellements = Renouvellement::with(['demande' => function($query) {
            $query->with(['armateur', 'navire', 'zones']);
        }])->get();

        return view('assistant.renouvellement.list_renouvellement_assistant', compact('renouvellements'));
    }
     public function view_ajouter_renouvellement_assistant($id) {

        $demande = Demande::with(['armateur', 'navire', 'zones'])->findOrFail($id);

        return view("assistant.renouvellement.ajouter_renouvellement_assistant", compact("demande"));
       }

        public function traitement_renewal_assistant(Request $request, $id){

        $demande = Demande::findOrFail($id);

        $renewal = new Renouvellement();
        $renewal->annee = date('Y');
        $renewal->numero = Demande::generateNumero();
        $renewal->redevance = $demande->redevance;
        $renewal->duree = Renouvellement::calculateDuree($request->debutValiditeRenouvellement, $request->finValiditeRenouvellement);
        $renewal->finValiditeRenouvellement = $request->finValiditeRenouvellement;
        $renewal->debutValiditeRenouvellement = $request->debutValiditeRenouvellement;
        $renewal->demande_id = $id;

        $renewal->save();

        return redirect('/assistant')->with('status', 'Renouvellement effectué avec succès');
       }

       public function view_renouvellement_edit_assistant($id)
       {
          $renouvellement = Renouvellement::findOrFail($id);
          return view('assistant.renouvellement.modifier_renouvellement_assistant', compact('renouvellement'));
       }

       public function update_renouvellement_assistant(Request $request, $id)
       {
        $request->validate([
          'debutValiditeRenouvellement' => 'required|date',
          'finValiditeRenouvellement' => 'required|date|after:debutValiditeRenouvellement',
          'redevance' => 'required|numeric'
        ]);

      $renouvellement = Renouvellement::findOrFail($id);
      $renouvellement->debutValiditeRenouvellement = $request->debutValiditeRenouvellement;
      $renouvellement->finValiditeRenouvellement = $request->finValiditeRenouvellement;
      $renouvellement->redevance = $request->redevance;
      $renouvellement->duree = Renouvellement::calculateDuree($request->debutValiditeRenouvellement, $request->finValiditeRenouvellement);
      $renouvellement->save();

      return redirect('assistant/list_renewer')->with('status', 'Renouvellement modifié avec succès');
      }


}
