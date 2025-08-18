<?php

namespace App\Http\Controllers;
use App\Http\Requests\SaveDepartementRequest;
use App\Models\Departement;
use Exception;
use Illuminate\Http\Request;


class DepartementController extends Controller
{
    public function index(){
        $departements=Departement::paginate(10);
        return view('departements.index',compact('departements'));
    }

    public function create(){
        return view('departements.create');
    }

    public function edit(Departement $departement){
        return view('departements.edit', compact('departement'));
    }

    public function store(Departement $departement,SaveDepartementRequest $request){

       try {

        $departement->name = $request->name;
        $departement->save();

        return redirect()->route('departement.index')->with('success_message', 'Departement enregistré');
       } catch (Exception $e) {
        dd($e);
       }

    }

// MODIFICATION UPDATE
      public function update(Departement $departement,SaveDepartementRequest $request){

       try {

        $departement->name = $request->name;
        $departement->update();

        return redirect()->route('departement.index')->with('success_message', 'Departement modifié');
       } catch (Exception $e) {
        dd($e);
       }

    }

    // SUPPRESSION DEPARTEMENT
 public function delete(Departement $departement){

       try {
        $departement->delete();

        return redirect()->route('departement.index')->with('success_message', 'Departement supprmé');
       } catch (Exception $e) {
        dd($e);
       }

    }
    

    
}