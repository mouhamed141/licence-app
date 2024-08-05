<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class controlController extends Controller
{
    public function control_admin(){
        return view("admin.demandes.control_admin");
    }

    public function control_assistant(){
        return view("assistant.control_assistant");
    }
    public function control_bureau(){
        return view("bureau.control_bureau");
    }
    public function control_division(){
        return view("division.control_division");
    }
}
