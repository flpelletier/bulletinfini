@extends('layouts.template')

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">Groupe n°{{$matiere->id}}</h4>
                    </div>
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-md-12 ">
                                <a href="{{ route('groupes.index') }}" class="btn btn-sm btn-secondary "><i class="fas fa-arrow-left"></i> Retour</a>
                            </div>
                        </div>
                        <!-- Nom -->
                        <div class="row">
                            <label class="col-sm-2 col-form-label">{{ __('Intitulé') }}</label>
                            <div class="col-sm-7">
                                <div class="form-group">
                                    <div class="form-control" name="nom" id="nom" type="texte" style="background-color : #ececec;">{{ $matiere->intitule }}</div>
                                </div>
                            </div>
                        </div>
                        <!-- Fin Nom -->
                        <!-- Coefficient -->
                        <div class="row">
                            <label class="col-sm-2 col-form-label">{{ __('Coefficient') }}</label>
                            <div class="col-sm-7">
                                <div class="form-group">
                                    <div class="form-control" name="coefficient" id="nom" type="texte" style="background-color : #ececec;">{{ $matiere->coefficient }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 col-form-label">{{ __('Matières') }}</label>
                            <div class="col-sm-7">
                                <div class="form-group list-group">
                                    <center>
                                        <div class="table-responsive">
                                            <table id="table_id" class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Nom</th>
                                                        <th>Promotion</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($matiere->matieres as $mat)
                                                    <tr>
                                                        <td>{{ $mat->intitule }}</td>
                                                        <td>{{ $mat->promotion->intitule }}</td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                    </center>
                                </div>
                            </div>
                        </div>
                        <!-- Fin Coefficient -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection