<?php

namespace App\Http\Controllers;

use App\Http\Requests\EnseignantRequest;
use App\Models\Enseignant;
use Illuminate\Http\Request;

class EnseignantController extends Controller
{
    public function index(){
        $enseignants = Enseignant::paginate(20);
        return view('enseignant.enseignant-list',[
            'Listes'=>$enseignants,
        ]);
    }

    public function createEnseignant()
    {
        $enseignant = new Enseignant();
        return view('enseignant.enseignant-create',[
            'table'=>$enseignant,
        ]);
    }

    public function create_enseignant(EnseignantRequest $request){
        
    }
  

    public function affiche_prof(Request $request)
    {
        $affiche_prof = $request->affiche_prof;
        $enseignant = Enseignant::where(function($query) use ($affiche_prof){

        $query->where('enseignant','like',"%$affiche_prof");
        })->get();
        return view('enseignant.professeurs',compact('enseignant','affiche_prof'));
    }

    public function search_prof(Request $request)
    {
        $search_prof = $request->search_prof;
        $enseignant = Enseignant::where(function($query) use ($search_prof){

        $query->where('nom','like',"%$search_prof");
        })->get();
        return view('enseignant.professeurs',compact('enseignant','search_prof'));
    }
    
    
    public function professeurs_traitement(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'numero' => 'required',
            'age' => 'required',
            'sexe' => 'required',
            'enseignant' => 'required',
            'situation' => 'required',
            'statut' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);
        $enseignant = new Enseignant();
        $enseignant ->nom = $request->nom;
        $enseignant ->prenom = $request->prenom;
        $enseignant ->numero = $request->numero;
        $enseignant ->age = $request->age;
        $enseignant ->sexe = $request->sexe;
        $enseignant ->enseignant = $request->enseignant;
        $enseignant ->situation = $request->situation;
        $enseignant ->statut = $request->statut;
        $enseignant ->email = $request->email;
        $enseignant ->password = $request->password;
        $enseignant->save();

        return redirect('/enseignant')->with('status','enseignant ajouter avec success'); 
    }

    public function update_enseignant($id)
    {
        $enseignant = Enseignant::find($id);

       return view('enseignant.update', compact('enseignant')); 
    }

    public function update_prof_traitement(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'numero' => 'required',
            'age' => 'required',
            'sexe' => 'required',
            'enseignant' => 'required',
            'situation' => 'required',
            'statut' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);
        $enseignant =Enseignant::find($request->id);
        $enseignant ->nom = $request->nom;
        $enseignant ->prenom = $request->prenom;
        $enseignant ->numero = $request->numero;
        $enseignant ->age = $request->age;
        $enseignant ->sexe = $request->sexe;
        $enseignant ->enseignant = $request->enseignant;
        $enseignant ->situation = $request->situation;
        $enseignant ->statut = $request->statut;
        $enseignant ->email = $request->email;
        $enseignant ->password = $request->password;
        $enseignant->update();
        return redirect('/enseignant')->with('status','professeur a ete modifier avec success'); 
    }

    public function delete_enseignant($id){
        $enseignant = Enseignant::find($id);
        $enseignant->delete();
        return redirect('/enseignant')->with('status','professeur a ete supprimer avec success');        
        }

}
