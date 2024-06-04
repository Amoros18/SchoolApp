<?php

namespace App\Http\Controllers;

use App\Http\Requests\MatiereRequest;
use App\Models\Matiere;
use Illuminate\Http\Request;

class MatiereController extends Controller
{
    public function index(){
        $matieres = Matiere::paginate(20);
        return view('matiere.matiere-list',[
            'Listes'=>$matieres,
        ]);
    }

    public function createMatiere()
    {
        $matiere = new Matiere();
        return view('matiere.matiere-create',[
            'table'=>$matiere,
        ]);
    }

    public function create_matiere(MatiereRequest $request){

        $matiere = Matiere::create($request->validated());
        $matieres = Matiere::paginate(20);

        return redirect()->route('matiere.accueil',[
            'Listes'=>$matieres,
        ])->with('success', "Matiere Enregistrer");
    }
    public function updateMatiere(Matiere $table){

        return view('matiere.matiere-edit',[
            'table'=>$table,
        ]);

    }

    public function update_matiere(Matiere $table, matiereRequest $request){
        $table->update($request->validated());
        return redirect()->route('matiere.update',[
            'table'=>$table->id,
        ])->with('success', "Matiere Enregistrer");
    }

    public function deletematiere(Matiere $table){
        $table->delete();
        $matieres = Matiere::paginate(20);
        return redirect()->route('matiere.accueil',[
            'Listes'=>$matieres,
        ])->with('success', "Matiere Enregistrer");
    }

    public function affichematiere(Matiere $table){
        return view('matiere.matiere-search',[
            'table'=>$table,
        ]);
    }

}
