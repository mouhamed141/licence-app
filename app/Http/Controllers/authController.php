<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;

class authController extends Controller
{
    //

    public function login (){

        return view("auth.login");
    }
/*
    public function doLogin(Request $request)
{
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
        'type' => 'required|in:Assistant,Chef de bureau,Chef de division,Administrateur',
    ]);

    $type = $credentials['type'];

    // Retirer le type des credentials pour l'authentification
    $authCredentials = [
        'email' => $credentials['email'],
        'password' => $credentials['password']
    ];

    $authSuccess = false;
    $redirectPath = '';

    switch ($type) {
        case 'Administrateur':
            $authSuccess = Auth::attempt($authCredentials);
            $redirectPath = '/admin';
            break;
        case 'Chef de bureau':
            $authSuccess = Auth::guard('bureau')->attempt($authCredentials);
            $redirectPath = '/bureau';
            break;
        case 'Chef de division':
            $authSuccess = Auth::guard('division')->attempt($authCredentials);
            $redirectPath = '/division';
            break;
        case 'Assistant':
            $authSuccess = Auth::guard('assistant')->attempt($authCredentials);
            $redirectPath = '/assistant';
            break;
    }

    if ($authSuccess) {
        return redirect()->intended($redirectPath);
    }

    // Si l'authentification échoue, renvoyez une erreur générale
    return back()->withErrors([
        'email' => 'Identifiants incorrects ou type d\'utilisateur non valide.'
    ])->withInput($request->except('password'));
}
    */

    public function doLogin(Request $request)
   {
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    if (Auth::attempt($credentials)) {
        $user = Auth::user();

        switch ($user->role) {
            case 'Administrateur':
                return redirect('/admin');
            case 'Chef de bureau':
                return redirect('/bureau');
            case 'Chef de division':
                return redirect('/division');
            case 'Assistant':
                return redirect('/assistant');
            default:
                Auth::logout();
                return back()->withErrors([
                    'email' => 'Rôle utilisateur non valide.'
                ])->withInput($request->except('password'));
        }
    }

    return back()->withErrors([
        'email' => 'Ces identifiants ne correspondent pas à nos enregistrements.'
    ])->withInput($request->except('password'));
}



public function logout(Request $request)
{
    $guard = $this->getGuard();

    Auth::guard($guard)->logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    return redirect('/');
}

private function getGuard()
{
    if(Auth::guard('bureau')->check()) return 'bureau';
    if(Auth::guard('division')->check()) return 'division';
    if(Auth::guard('assistant')->check()) return 'assistant';
    return 'web';
}


}
