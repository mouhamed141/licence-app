<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class userController extends Controller
{
    //liste des users
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function list_users(){

        $user = User::all();
        return view("admin.users.list_users", compact('user'));
    }

    public function ajouter_user(){

        return view('admin.users.ajouter_user');
    }

    public function ajouter_user_traitement(Request $request ){

        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'tel' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required',

        ]);
        $user = new User();
        $user->nom = $request->nom;
        $user->prenom = $request->prenom;
        $user->tel = $request->tel;
        $user->email = $request->email;
        $user->password = bcrypt($request->input('password'));
        $user->role = $request->role;
        $user->save();
        return redirect('/admin/user')->with('status','L\' utilisateur a bien été ajouté avec succés');
    }

    public function update_user($id){

        $user = User::find($id);
        return view('admin.users..modifier_user', compact('user'));
    }

    public function update_user_traitement(Request $request){
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'tel' => 'required',
            'email' => 'required',
            'password' => 'required',

        ]);
        $user = User::find($request->id);
        $user->nom = $request->nom;
        $user->prenom = $request->prenom;
        $user->tel = $request->tel;
        $user->email = $request->email;
        $user->password = bcrypt($request->input('password'));
        $user->update();

        return redirect('/admin/user')->with('status','L\'utilisateur a bien été modifié avec succés');

    }

    public function supprimer_admin($id)
    {
        $user = User::find($id);

        if ($user) {
            $user->delete();
            return redirect('/admin/user')->with('status', 'L\'utilisateur a été supprimé avec succès.');
        }

        return redirect('/admin/user')->with('error', 'Admin non trouvé.');
    }
    /*

    public function list_user_division(){

        $division = Division::all();
        return view("admin.users.division.list_user_division", compact('division'));
    }

    public function list_user_admin(){

        $admin = User::all();
        return view("admin.users.administrateur.list_user_admin" ,compact('admin'));
    }
        */

    /*
    public function list_user_admin(Request $request)
{
    $search = $request->input('search');

    $query = User::query();

    if ($search) {
        $query->where(function($q) use ($search) {
            $q->where('id', 'LIKE', "%{$search}%")
              ->orWhere('email', 'LIKE', "%{$search}%")
              ->orWhere('nom', 'LIKE', "%{$search}%")
              ->orWhere('prenom', 'LIKE', "%{$search}%");
        });
    }

    $admin = $query->get();

    return view("admin.users.administrateur.list_user_admin", compact('admin'));
    }
    */


    // view ajouter



    //ajouter des users traitement













}

