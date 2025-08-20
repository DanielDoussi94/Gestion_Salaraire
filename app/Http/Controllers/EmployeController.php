<?php
namespace App\Http\Controllers;
use App\Http\Requests\storeEmployeRequest;
use App\Http\Requests\UpdateEmployeRequest;
use App\Models\Employe;
use Exception;
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

    public function edit(Employe $employer){
        $departements = Departement::all();
        return view('employers.edit', compact('employer', 'departements'));

    }

    // AFFICHAGE DES EMPLOYE AJOUTER SUR LA VUE EMPLOYE.INDEX
    public function store(storeEmployeRequest $request){

        $query = Employe::create($request->all());
        if ($query) {
                return redirect()->route('employer.index')->with('success_message', 'Nouvel employer ajouté');
            }
            
        }

        public function update(UpdateEmployeRequest $request, Employe $employer){
            try {

        $employer->departement_id = $request->departement_id;
        $employer->nom = $request->nom;
        $employer->prenom = $request->prenom;
        $employer->email = $request->email;
        $employer->contact = $request->contact;
        $employer->montant_journalier = $request->montant_journalier;
        $employer->update();

        return redirect()->route('employer.index')->with('success_message', 'Modification des employes ont été modifié');
       } catch (Exception $e) {
        dd($e);
       }
        }

        // DELETE EMPLOYE

        public function delete(Employe $employer){
            try {
                $employer->delete();
                return redirect()->route('employer.index')->with('success_message', 'L\'employé a été supprimé avec succès');
            } catch (Exception $e) {
                dd($e);
            }
        }
       
    }  
