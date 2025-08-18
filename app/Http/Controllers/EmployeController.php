<?php
namespace App\Http\Controllers;
use App\Http\Requests\storeEmployeRequest;
use App\Models\Employe;
use App\Models\Departement;

use Illuminate\Http\Request;

class EmployeController extends Controller
{
    public function index(){
        $employers=Employe::with('departement')->paginate(10);
        return view('employers.index',compact('employers'));
    }

    public function create(){
        $departements = Departement::all();
        return view('employers.create', compact('departements'));
    }

    public function edit(Employe $employers){
        return view('employers.edit', compact('employer'));
    }

    // AFFICHAGE DES EMPLOYE AJOUTER SUR LA VUE EMPLOYE.INDEX
    public function store(storeEmployeRequest $request){

        $query = Employe::create($request->all());
        if ($query) {
                return redirect()->route('employer.index')->with('success_message', 'Nouvel employer ajouté');
            }
            
        }
       
    }  
