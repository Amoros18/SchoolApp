<div class="boheader witsexe class="botitle fa fa-fsexene pharmacie</h3>
</div>

<div  class="bobody">
    <dsexe>
        <div class="card-body">
            <form action="" method="POST"  enctype="multipart/form-data" class="vstack gap 3 text-black">
                @csrf

                <div class="form-group">
                    <label for="nom" class="control-label">Nom :</label>
                    <input type="text" name="nom" class="form-control " value="{{old('nom',$table->nom)}}">
                    @error('nom')
                        <span class="text-danger" role="alert">
                            <strong>{{$message}}</strong>
                        </span> 
                    @enderror
                </div>
                <div class="form-group">
                    <label for="prenom" class="control-label">Prenom :</label>
                    <input type="text" name="prenom" class="form-control " value="{{old('prenom',$table->prenom)}}">
                    @error('prenom')
                        <span class="text-danger" role="alert">
                            <strong>{{$message}}</strong>
                        </span> 
                    @enderror
                </div>
                <div class="form-group">
                    <label for="matricule" class="control-label">Matricule:</label>
                    <input type="text" name="matricule" class="form-control " value="{{old('matricule',$table->matricule)}}">
                    @error('matricule')
                        <span class="text-danger" role="alert">
                            <strong>{{$message}}</strong>
                        </span> 
                    @enderror
                </div>
                <div class="form-group">
                    <label for="numero" class="control-label">Numero Telephone:</label>
                    <input type="text" name="numero" class="form-control " value="{{old('numero',$table->numero)}}">
                        @error('numero')
                            <span class="text-danger" role="alert">
                                <strong>{{$message}}</strong>
                            </span>                      
                        @enderror
                </div>
                <div class="form-group">
                    <label for="sexe" class="control-label">Sexe :</label>
                    <select name="sexe">
                        <option>{{old('sexe',$table->sexe)}}</option>
                        <option>Masculin</option>
                        <option>Feminin</option>
                    </select>
                    @error('sexe')
                    <span class="text-danger" role="alert">
                        <strong>{{$message}}</strong>
                    </span> 
                    @enderror
                </div>
                <div class="form-group">
                    <label for="date_naissance" class="control-label"> Date Naissance : </label>
                    <input type="date" name="date_naissance" class="form-control" value="{{old('date_naissance',$table->date_naissance)}}" placeholder="entrer la date de naissance">
                    @error('date_naissance')
                    <span class="text-danger" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="lieu_naissance" class="control-label">Lieu Naissance:</label>
                    <input type="text" name="lieu_naissance" class="form-control " value="{{old('lieu_naissance',$table->lieu_naissance)}}">
                    @error('lieu_naissance')
                        <span class="text-danger" role="alert">
                            <strong>{{$message}}</strong>
                        </span>                      
                    @enderror
                </div>
                <div class="form-group" >
                    <label for="statut_familliale" class="control-label">Statut Familliale : </label>
                    <select name="statut_familliale" class="form-control ">
                        <option>{{old('statut_familliale',$table->statut_familliale)}}</option>
                        <option>R.A.S</option>
                        <option>Opheline</option>
                        <option>Ophelin</option>
                    </select>                    
                    @error('statut_familliale')
                        <span class="text-danger" role="alert">
                            <strong>{{$message}}</strong>
                        </span>  
                    @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="statut_social" class="control-label">Statut Social : </label>
                    <select name="statut_social" class="form-control ">
                        <option>{{old('statut_social',$table->statut_social)}}</option>
                        <option>Eleve Apte</option>
                        <option>Eleve Inapte</option>
                    </select>                    
                    @error('statut_social')
                        <span class="text-danger" role="alert">
                            <strong>{{$message}}</strong>
                        </span>  
                    @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="classe" class="control-label">Classe :</label>
                    <select name="classe" class="form-control">
                        <option value="{{$classe}}">{{$classe}}</option>
                        <option value=""></option>
                        @foreach ($classes as $cate )
                            <option value="{{$cate->id}}">{{$cate->label}}</option>
                        @endforeach
                    </select>
                    @error('classe')
                        <span class="text-danger" role="alert">
                            <strong>{{$message}}</strong>
                        </span>                      
                    @enderror
                </div>
                <div class="form-group">
                    <label for="photo" class="control-label">Photo :</label>
                    <input type="file" name="photo" class="form-control">
                    @error('photo')
                        <span class="text-danger" role="alert">
                            <strong>{{$message}}</strong>
                        </span>   
                    @enderror
                </div>

                <center class="mt-1">
                    <button class="btn btn-new me-2" type="submit" >
                        @if($table->id)
                            Modifier
                        @else
                            Enregistrer
                        @endif
                    </button >
                    <input type="reset" class="btn btn-new" value="Effacer">
                </center>
            </form>
        </div>
        <small class="text-left">creat by Amoros </small>
    </div>
</div>
