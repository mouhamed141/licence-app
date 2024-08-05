<?php

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\urlController;
use App\Http\Controllers\authController;
use App\Http\Controllers\userController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\bureauController;
use App\Http\Controllers\controlController;
use App\Http\Controllers\divisionController;
use App\Http\Controllers\downloadController;
use App\Http\Controllers\assistantController;
use App\Http\Controllers\rechercheController;
use App\Http\Controllers\forgetPasswordController;
use App\Http\Controllers\renouvellementController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/*---------------------------------------------------------------------------------------------------------------
LOGIN
---------------------------------------------------------------------------------------------------------------*/
Route::get('/', [authController::class,"login"])->name("auth.login");
Route::post('/login', [authController::class,"doLogin"])->name('submit_login');
Route::post('/logout', [authController::class, 'logout'])->name('logout');



Route::get('/forgot-password', [forgetPasswordController::class ,'forgot']);
Route::post('forgot-password', [forgetPasswordController::class, 'sendLienWithEmail'])->name('password.email');
Route::get('reset-password/{token}', [forgetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('reset-password', [forgetPasswordController::class, 'reset'])->name('password.update');




/*---------------------------------------------------------------------------------------------------------------
Administrateur
---------------------------------------------------------------------------------------------------------------*/


//liste des demandes
Route::get('/admin', [urlController::class,"indexAdmin"])->name('admin.demandes.index');

//formulaire ajouter et le traitement
Route::get('/admin/ajouter', [adminController::class,"view_ajouter_demande_admin"]);
Route::post('/admin/demande/ajouter', [adminController::class,"ajouter_Demande_traitement_admin"])->name("submit_ajouter_admin");

//formulaire modifier et le traitement
Route::get('admin/demande/edit/{id}', [adminController::class,"view_modifier_demande_admin"]);
Route::put('/admin/demande/{id}', [adminController::class,"modifier_Demande_traitement_admin"])->name("submit_modifier_admin");

//supprimer une demande
Route::delete('/admin/demande/supprimer/{id}', [adminController::class, 'supprimer_Demande_admin'])->name('supprimer_demande_admin');

//user
Route::get('/admin/user', [userController::class,"list_users"]);
Route::get('/admin/user/ajouter',[userController::class,'ajouter_user']);
Route::post('/ajouter/user/traitement',[userController::class,'ajouter_user_traitement']);
Route::get('/admin/user/modifier/{id}',[userController::class,'update_user']);
Route::put('/modifier/user/traitement',[userController::class,'update_user_traitement']);
Route::delete('/admin/user/supprimer/{id}', [UserController::class, 'supprimer_user'])->name('supprimer_user');

//liste des armateurs et navires
Route::get('/admin/armateur', [adminController::class,'liste_armateur_admin']);
Route::get('/telecharger-liste-armateur', [adminController::class , 'telecharger_liste_armateur'])->name('telecharger.liste.armateur');

Route::get('/admin/navire', [adminController::class,'liste_navire_admin']);
Route::get('/telecharger-liste-navire', [adminController::class , 'telecharger_liste_navire'])->name('telecharger.liste.navire');

//renouvellement
Route::get('/admin/list_renewer', [renouvellementController::class , 'list_renewer_admin']);
Route::get('/admin/{demande}/renew', [renouvellementController::class, 'view_ajouter_renouvellement_admin'])->name('demande.renew.admin');
Route::post('/admin/{demande}/renew', [renouvellementController::class, 'traitement_renewal_admin'])->name('store.renewal.admin');

Route::get('/admin/renouvellement/{id}/edit', [RenouvellementController::class, 'view_renouvellement_edit_admin'])->name('renouvellements.edit.admin');
Route::put('admin/renouvellement/{id}', [RenouvellementController::class, 'update_renouvellement_admin'])->name('renouvellements.update.admin');


//Route::get('/admin/search', [userController::class, 'list_user_admin'])->name('admin.search');
//Route::get('/demandes/search', [urlController::class, 'search'])->name('demandes.search');

//control
Route::get('/admin/control' ,[controlController::class ,'control_admin']);





/*---------------------------------------------------------------------------------------------------------------
Assistant
---------------------------------------------------------------------------------------------------------------*/

Route::get('/assistant', [urlController::class,"indexAssistant"])->name('assistant.demandes.index');;
Route::get('/assistant/ajouter', [assistantController::class,"view_ajouter_demande_assistant"]);
Route::post('/assistant/demande/ajouter', [assistantController::class,"ajouter_Demande_traitement_assistant"])->name("submit_ajouter_assistant");
Route::get('/assistant/demande/edit/{id}', [assistantController::class,"view_modifier_demande_assistant"]);
Route::put('/assistant/demande/{id}', [assistantController::class,"modifier_Demande_traitement_assistant"])->name("submit_modifier_assistant");

//renouvellement
Route::get('/assistant/list_renewer', [renouvellementController::class , 'list_renewer_assistant']);
Route::get('/assistant/{demande}/renew', [renouvellementController::class, 'view_ajouter_renouvellement_assistant'])->name('demande.renew.assistant');
Route::post('/assistant/{demande}/renew', [renouvellementController::class, 'traitement_renewal_assistant'])->name('store.renewal.assistant');

Route::get('/assistant/renouvellement/{id}/edit', [RenouvellementController::class, 'view_renouvellement_edit_assistant'])->name('renouvellements.edit.assistant');
Route::put('assistant/renouvellement/{id}', [RenouvellementController::class, 'update_renouvellement_assistant'])->name('renouvellements.update.assistant');

//control
Route::get('/assistant/control' ,[controlController::class ,'control_assistant']);




/*---------------------------------------------------------------------------------------------------------------
bureau
---------------------------------------------------------------------------------------------------------------*/

Route::get('/bureau', [urlController::class,"indexBureau"])->name('bureau.demandes.index');;
Route::get('/bureau/ajouter', [bureauController::class,"view_ajouter_demande_bureau"]);
Route::post('/bureau/demande/ajouter', [bureauController::class,"ajouter_Demande_traitement_bureau"])->name("submit_ajouter_bureau");
Route::get('/bureau/demande/edit/{id}', [bureauController::class,"view_modifier_demande_bureau"]);
Route::put('/bureau/demande/{id}', [bureauController::class,"modifier_Demande_traitement_bureau"])->name("submit_modifier_bureau");

//renouvellement
Route::get('/bureau/list_renewer', [renouvellementController::class , 'list_renewer_bureau']);
Route::get('/bureau/{demande}/renew', [renouvellementController::class, 'view_ajouter_renouvellement_bureau'])->name('demande.renew.bureau');
Route::post('/bureau/{demande}/renew', [renouvellementController::class, 'traitement_renewal_bureau'])->name('store.renewal.bureau');

Route::get('/bureau/renouvellement/{id}/edit', [RenouvellementController::class, 'view_renouvellement_edit_bureau'])->name('renouvellements.edit.bureau');
Route::put('/bureau/renouvellement/{id}', [RenouvellementController::class, 'update_renouvellement_bureau'])->name('renouvellements.update.bureau');

//control
Route::get('/bureau/control' ,[controlController::class ,'control_bureau']);



/*---------------------------------------------------------------------------------------------------------------
division
---------------------------------------------------------------------------------------------------------------*/

Route::get('/division', [urlController::class,"indexDivision"])->name('division.demandes.index');;
Route::get('/division/ajouter', [divisionController::class,"view_ajouter_demande_division"]);
Route::post('/division/demande/ajouter', [divisionController::class,"ajouter_Demande_traitement_division"])->name("submit_ajouter_division");
Route::get('/division/demande/edit/{id}', [divisionController::class,"view_modifier_demande_division"]);
Route::put('/division/demande/{id}', [divisionController::class,"modifier_Demande_traitement_division"])->name("submit_modifier_division");

//renouvellement
Route::get('/division/list_renewer', [renouvellementController::class , 'list_renewer_division']);
Route::get('/division/{demande}/renew', [renouvellementController::class, 'view_ajouter_renouvellement_division'])->name('demande.renew.division');
Route::post('/division/{demande}/renew', [renouvellementController::class, 'traitement_renewal_division'])->name('store.renewal.division');

Route::get('/division/renouvellement/{id}/edit', [RenouvellementController::class, 'view_renouvellement_edit_division'])->name('renouvellements.edit.division');
Route::put('division/renouvellement/{id}', [RenouvellementController::class, 'update_renouvellement_division'])->name('renouvellements.update.division');

//control
Route::get('/admin/division' ,[controlController::class ,'control_division']);



/*---------------------------------------------------------------------------------------------------------------
Recherche
---------------------------------------------------------------------------------------------------------------*/
Route::get('/admin/recherche', [rechercheController::class, 'recherche_matricule_admin'])->name("recherche_matricule_admin");
Route::get('/assistant/recherche', [rechercheController::class, 'recherche_matricule_assistant'])->name("recherche_matricule_assistant");
Route::get('/bureau/recherche', [rechercheController::class, 'recherche_matricule_bureau'])->name("recherche_matricule_bureau");
Route::get('/division/recherche', [rechercheController::class, 'recherche_matricule_division'])->name("recherche_matricule_division");


Route::get('/telecharger-demande/{id}', [downloadController::class , 'telechargerPDF'])->name('telecharger.demande');







