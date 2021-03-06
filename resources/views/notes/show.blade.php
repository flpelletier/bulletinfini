@extends('layouts.template')

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">Note n°{{$note->id}}</h4>
                    </div>
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-md-12 ">
                                <a href="{{ route('notes.index') }}" class="btn btn-sm btn-secondary "><i class="fas fa-arrow-left"></i> Retour</a>
                            </div>
                        </div>
                        <!-- Nom -->
                        <div class="row">
                            <label class="col-sm-2 col-form-label">{{ __('Note') }}</label>
                            <div class="col-sm-7">
                                <div class="form-group">
                                    <div class="form-control" name="nom" id="nom" type="texte" style="background-color : #ececec;">{{ $note->note }}</div>
                                </div>
                            </div>
                        </div>
                        <!-- Fin Nom -->
                        <!-- Description -->
                        <div class="row">
                            <label class="col-sm-2 col-form-label">{{ __('Description') }}</label>
                            <div class="col-sm-7">
                                <div class="form-group">
                                    @if($note->description == null)
                                    <div class="form-control" name="coefficient" id="nom" type="texte" style="background-color : #ececec;">Pas de description</div>
                                    @elseif($note->description != null)
                                    <div class="form-control" name="coefficient" id="nom" type="texte" style="background-color : #ececec;">{{ $note->description }}</div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <!-- Fin Description -->
                        <!-- Coefficient -->
                        <div class="row">
                            <label class="col-sm-2 col-form-label">{{ __('Coefficient') }}</label>
                            <div class="col-sm-7">
                                <div class="form-group">
                                    <div class="form-control" name="coefficient" id="nom" type="texte" style="background-color : #ececec;">{{ $note->coefficient }}</div>

                                </div>
                            </div>
                        </div>
                        <!-- Fin Coefficient -->
                        <!-- matière -->
                        <div class="row">
                            <label class="col-sm-2 col-form-label">{{ __('Matière') }}</label>
                            <div class="col-sm-7">
                                <div class="form-group">
                                    <div class="form-control" name="nom" id="nom" type="texte" style="background-color : #ececec;"> {{ $note->matiere->intitule}}</div>

                                </div>
                            </div>
                        </div>
                        <!--  matière -->
                        <!-- Elève -->
                        <div class="row">
                            <label class="col-sm-2 col-form-label">{{ __('Élève') }}</label>
                            <div class="col-sm-7">
                                <div class="form-group">
                                    <div class="form-control" name="promotion" id="promotion" type="texte" style="background-color : #ececec;">{{ $note->eleve->nom }}</div>

                                </div>
                            </div>
                        </div>
                        <!-- Fin Elève -->
                        <!-- Période -->
                        <div class="row">
                            <label class="col-sm-2 col-form-label">{{ __('Période') }}</label>
                            <div class="col-sm-7">
                                <div class="form-group">
                                    <div class="form-control" name="professeur" id="professeur" type="texte" style="background-color : #ececec;">{{ $note->periode->nom }}</div>

                                </div>
                            </div>
                        </div>
                        <!-- Fin Groupe de matière -->
                        <!-- Création -->
                        <div class="row">
                            <label class="col-sm-2 col-form-label">{{ __('Date de création') }}</label>
                            <div class="col-sm-7">
                                <div class="form-group">
                                    <div class="form-control" name="created_at" id="created_at" type="texte" style="background-color : #ececec;">{{ $note->created_at }}</div>
                                </div>
                            </div>
                        </div>
                        <!-- Fin Création -->
                        <!-- Modification -->
                        <div class="row">
                            <label class="col-sm-2 col-form-label">{{ __('Dernière modification') }}</label>
                            <div class="col-sm-7">
                                <div class="form-group">
                                    @if($note->updated_at != null)
                                    <div class="form-control" name="updated_at" id="updated_at" type="texte" style="background-color : #ececec;">{{ $note->updated_at }}</div>
                                    @elseif($note->updated_at == null)
                                    <div class="form-control" name="updated_at" id="updated_at" type="texte" style="background-color : #ececec;">Jamais</div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <!-- Fin Modification -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection