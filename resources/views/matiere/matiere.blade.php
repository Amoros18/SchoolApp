<div class="box-header with-border">
    <h3 class="box-title fa fa-flask">Ajouter un Matiere</h3>
</div>

<div  class="box-body">
    <div class="card">
        <div class="card-body">
            <form action="" method="POST" class="vstack gap 3 text-black">
                @csrf

                <div class="form-group">
                    <label for="name" class="control-label">Nom:</label>
                    <input type="text" name="name" class="form-control " value="{{old('name',$table->name)}}">
                    @error('name')
                        <span class="text-danger" role="alert">
                            <strong>{{$message}}</strong>
                        </span> 
                    @enderror
                </div>
                <div class="form-group">
                    <label for="description" class="control-label">Description:</label>
                    <input type="description" name="description" class="form-control" value="{{old('description',$table->description)}}">
                    @error('description')
                        <span class="text-danger" role="alert">
                            <span class="text-danger" role="alert">
                                <strong>{{$message}}</strong>
                            </span> 
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
