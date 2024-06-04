@extends('dashboard')

@section('title', 'Liste des Enseignants')
@section('content')
<div class="box-header with-border">
    <h3 class="box-title fa fa-flask">Liste des Enseignants</h3>
    <div class="box-tools pull-right">
        <div class="has-feedback">
            <input type="text" class="form-control input-sm" name="recherch" id="Re" placeholder="Recherche par Designation......"/>
            <span class="glyphicon glyphicon-search form-control-feedback"></span>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-6">
            <a href="{{route('enseignant.create')}}" id="aj"  class="btn btn-success glyphicon glyphicon-plus" > Ajouter</a>
        </div>
    </div>
</div>

<div  class="box-body">
    <div class="">
        <div class="table-responsive">
            <table class="table table-hover table-responsible table-striped">
                <thead>
                    <th>Id</th>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Matricule</th>
                    <th>Statut</th>
                    
                    <th>Modifier</th>
                    <th>Consulter</th>
                    <th>Suprimer</th>
                </thead>
                <tbody>
                    @foreach ($Listes as $Liste )
                        <tr>
                            <td>{{$Liste->id}}</td>
                            <td>{{$Liste->name}}</td>
                            <td>{{$Liste->prenom}}</td>
                            <td>{{$Liste->matricule}}</td>
                            <td>{{$Liste->statut}}</td>
                            
                            <td><a  href = "{{route('enseignant.update',['table'=>$Liste])}} ">
                                <button type="edit">Modifier</button></a></td>
                            <td><a  href = "{{route('enseignant.search',['table'=>$Liste])}} ">
                                <button type="edit">Voir</button></a></td>
                            <td><a  href = "{{route('enseignant.delete',['table'=>$Liste])}} ">
                                <button type="edit">Suprimer</button></a></td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
{{$Listes->links()}}

@endsection