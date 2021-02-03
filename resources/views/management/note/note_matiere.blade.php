@extends('layouts.template')

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">Note pour la matière {{$matiere->id}}</h4>
                    </div>
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-md-12 ">
                                <a href="{{ route('matieres.index') }}" class="btn btn-sm btn-secondary "><i class="fas fa-arrow-left"></i> Retour</a>
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
                        <!-- Groupe de matière -->
                        <div class="row">
                            <label class="col-sm-2 col-form-label">{{ __('Promotion') }}</label>
                            <div class="col-sm-7">
                                <div class="form-group">
                                    <div class="form-control" name="promotion" id="promotion" type="texte" style="background-color : #ececec;">{{ $matiere->promotion->intitule }}</div>
                                </div>
                            </div>
                        </div>
                        <!-- Fin Groupe de matière -->
                        <div class="row">
                            <label class="col-sm-2 col-form-label">{{ __('Notes') }}</label>
                            <div class="col-sm-7">
                                <div class="form-group list-group">
                                    <center>
                                        <div class="table-responsive">
                                            <table id="table_id" class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Élèves</th>
                                                        <th>Note</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if(!empty($notes))
                                                    @foreach($notes as $note)
                                                    <tr>
                                                        <td>{{ $note->eleve->nom}} {{ $note->eleve->prenom}}</td>
                                                        <td>{{ $note->note }}</td>

                                                    </tr>
                                                    @endforeach
                                                    @endif

                                                </tbody>
                                            </table>


                                    </center>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection