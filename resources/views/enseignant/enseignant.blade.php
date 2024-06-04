<div class="boheader witsexe class="botitle fa fa-fsexene pharmacie>

</div>

<div  class="bobody">
    <div>
        <div class="card-body">
            <form action="" method="POST" enctype="multipart/form-data" class="vstack gap 3 text-black">
                @csrf

                <div class="form-group">
                    <label for="nom" class="control-label">Nom :</label>
                    <input type="text" name="name" class="form-control " value="{{old('name',$table->name)}}">
                    @error('name')
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
            
                <div class="form-group" >
                    <label for="situation" class="control-label">situation : </label>
                    <select name="situation" class="form-control ">
                        <option>{{old('situation',$table->situation)}}</option>
                        <option>Vacataire</option>
                        <option>PLEG</option>
                        <option>PSEG</option>
                    </select>                    
                    @error('situation')
                        <span class="text-danger" role="alert">
                            <strong>{{$message}}</strong>
                        </span>  
                    @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="statut" class="control-label">Statut : </label>
                    <select name="statut" class="form-control ">
                        <option>{{old('statut',$table->statut)}}</option>
                        <option>Marie</option>
                        <option>Celibataire</option>
                    </select>                    
                    @error('statut')
                        <span class="text-danger" role="alert">
                            <strong>{{$message}}</strong>
                        </span>  
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email" class="control-label">Email:</label>
                    <input type="email" name="email" class="form-control " value="{{old('email')}}">
                    @error('email')
                        <span class="text-danger" role="alert">
                            <strong>{{$message}}</strong>
                        </span> 
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password" class="control-label">Mot de passe:</label>
                    <input type="password" name="password" class="form-control " value="{{old('password')}}">
                    @error('password')
                        <span class="text-danger" role="alert">
                            <span class="text-danger" role="alert">
                                <strong>{{$message}}</strong>
                            </span> 
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
