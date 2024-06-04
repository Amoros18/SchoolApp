<?php

namespace App\Http\Controllers;

use App\Http\Requests\EleveRequest;
use App\Models\Classe;
use App\Models\Dossiers;
use Illuminate\Http\Request;
use App\Models\Eleve;
use Illuminate\Auth\Events\Validated;

class EleveController extends Controller
{

    public function index(){
        $eleves = Eleve::paginate(20);
        return view('eleve.eleve-list',[
            'Listes'=>$eleves,
        ]);
    }

    public function createEleve()
    {
        $classes = Classe::all();
        $eleve = new Eleve();
        return view('eleve.eleve-create',[
            'table'=>$eleve,
            'classe'=>'Terminal',
            'classes'=>$classes,
        ]);
    }

    public function create_eleve(EleveRequest $request){
        //dd($request);
        $photo = $request->file('photo');
        //dd($photo);
        $eleve = Eleve::create($request->validated());
        if($photo){
            $filePath = $photo->store('eleve','public');
            $name = $_FILES['photo']['name'];
            $extension = strrchr($name,".");
            $numero = $eleve->id;
            $aleatoire = md5(substr('0123456789',rand(0,5)));
            $names = "{$numero}-{$aleatoire}{$extension}";
            rename(storage_path("app/public/{$filePath}") , storage_path("app/public/eleve/{$names}")) ;
            $eleve->photo = $names;
            $eleve->save();
        }
        $classe = Classe::all();
        $eleves = Eleve::paginate(20);

        return redirect()->route('eleve.accueil',[
            'Listes'=>$eleves,
        ])->with('success', "Eleve Enregistrer");
    }
    public function updateEleve(Eleve $table)
    {
        $classe = Classe::all();

        return view('eleve.eleve-edit', [
            'table'=>$table,
            'classe'=>'Terminal',
            'classes'=>$classe,
        ]); 
    }
    public function update_eleve(Eleve $table, EleveRequest $request){
        $table->update($request->validated());
        $nom = $request->input('nom');
        $photo = $request->file('photo');
        //dd($photo);
        if($photo != null){
            $filePath = $photo->store('eleve','public');
            $name = $_FILES['photo']['name'];
            $extension = strrchr($name,".");
            $numero = $table->id;
            $aleatoire = md5(substr('0123456789',rand(0,5)));
            $names = "{$numero}-{$aleatoire}{$extension}";
            rename(storage_path("app/public/{$filePath}") , storage_path("app/public/eleve/{$names}")) ;
            $table->photo = $names;
            $table->save();
        }
        $classe = Classe::all();
        return redirect()->route('eleve.update',[
            'table'=>$table->id,
        ])->with('success', "Eleve Enregistrer");
    }

    public function affiche_eleve(Eleve $table)
    {
        return view('eleve.eleve-search',[
            'table'=>$table,
        ]);
    }

    public function delete_eleve(Eleve $table){
        $table->delete();
        $Listes = Eleve::paginate(20);
        return redirect()->route('eleve.list',[
            'Listes'=>$Listes
        ])->with('status','eleve a ete supprimer avec success');        
    }
}
