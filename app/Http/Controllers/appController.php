<?php

namespace App\Http\Controllers;

use App\Models\Departement;
use App\Models\Employe;
use App\Models\User;
use Illuminate\Http\Request;

class appController extends Controller
{
    
    public function index(){
        $totalDepartements= Departement::all()->count();
        $totalEmployes = Employe::all()->count();
        $totalAdministrateurs = User::all()->count();
        return view ('dashboard', compact('totalDepartements', 'totalEmployes', 'totalAdministrateurs'));
    }
}
