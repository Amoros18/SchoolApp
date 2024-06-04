<?php

namespace App\Http\Controllers;

use App\Http\Requests\EnseignantRequest;
use App\Models\Classe;
use App\Models\Enseignant;
use App\Models\EnseignantClasse;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
        $user = User::create($request->validated());
        $password = $request->input('password');
        $user->password = Hash::make($password);
        $user->role = 'Enseignant';
        $user->save();

        $enseignant = Enseignant::create($request->validated());
        $enseignant->user_id = $user->id;
        $enseignant->save();

        $photo = $request->file('photo');
        //dd($photo);
        if($photo){
            $filePath = $photo->store('enseignant','public');
            $name = $_FILES['photo']['name'];
            $extension = strrchr($name,".");
            $numero = $enseignant->id;
            $aleatoire = md5(substr('0123456789',rand(0,5)));
            $names = "{$numero}-{$aleatoire}{$extension}";
            rename(storage_path("app/public/{$filePath}") , storage_path("app/public/enseignant/{$names}")) ;
            $enseignant->photo = $names;
            $enseignant->save();
        }

        $enseignants = Enseignant::paginate(20);
        return redirect()->route('enseignant.accueil',[
            'Listes'=>$enseignants,
        ])->with('success', "Enseignant Enregistrer");
    }
    public function updateEnseignant(Enseignant $table){

        return view('enseignant.enseignant-edit',[
            'table'=>$table,
        ]);

    }

    public function update_enseignant(Enseignant $table, EnseignantRequest $request){
        $table->update($request->validated());
        $photo = $request->file('photo');
        //dd($photo);
        if($photo != null){
            $filePath = $photo->store('enseignant','public');
            $name = $_FILES['photo']['name'];
            $extension = strrchr($name,".");
            $numero = $table->id;
            $aleatoire = md5(substr('0123456789',rand(0,5)));
            $names = "{$numero}-{$aleatoire}{$extension}";
            rename(storage_path("app/public/{$filePath}") , storage_path("app/public/enseignant/{$names}")) ;
            $table->photo = $names;
            $table->save();
        }
        return redirect()->route('enseignant.update',[
            'table'=>$table->id,
        ])->with('success', "Enseignant Enregistrer");
    }

    public function deleteEnseignant(Enseignant $table){
        $table->delete();
        $enseignants = Enseignant::paginate(20);
        return redirect()->route('enseignant.accueil',[
            'Listes'=>$enseignants,
        ])->with('success', "Enseignant Enregistrer");
    }

    public function afficheEnseignant(Enseignant $table){
        return view('enseignant.enseignant-search',[
            'table'=>$table,
        ]);
    }

    public function validateClasse(){
        $classes = Classe::get();
        $user = Auth::user();
        $enseignant = Enseignant::where('user_id','=',$user->id)->first();
        if($user == null){
            return 'pas connecter';
        }
        if($enseignant == null){
            return "vous n'etez pas enseignant";
        }
        $ss = EnseignantClasse::where('enseignant_id','=',$enseignant->id)->get();
        //dd($ss->contains('id_medicament',1));
        return view('enseignant.validate-classe',[
            'classes'=>$classes,
            'check'=>$ss,
        ]);
    }

    public function validate_classe(){

    }
  
}
