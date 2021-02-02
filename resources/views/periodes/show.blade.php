@extends('layouts.template')

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">Période n°{{$periode->id}}</h4>
                    </div>
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-md-12 ">
                                <a href="{{ route('periodes.index') }}" class="btn btn-sm btn-secondary "><i class="fas fa-arrow-left"></i> Retour</a>
                            </div>
                        </div>
                        <!-- Nom -->
                        <div class="row">
                            <label class="col-sm-2 col-form-label">{{ __('Nom') }}</label>
                            <div class="col-sm-7">
                                <div class="form-group">
                                    <div class="form-control" name="nom" id="nom" type="texte" style="background-color : #ececec;">{{ $periode->nom }}</div>
                                </div>
                            </div>
                        </div>
                        <!-- Fin Nom -->
                        <!-- Description -->
                        <div class="row">
                            <label class="col-sm-2 col-form-label">{{ __('Date de début') }}</label>
                            <div class="col-sm-7">
                                <div class="form-group">
                                
                                    <div class="form-control" name="datedebut" id="nom" type="texte" style="background-color : #ececec;">{{ $periode->date_debut }}</div>
                                </div>
                            </div>
                        </div>
                        <!-- Fin Description -->
                        <!-- Coefficient -->
                        <div class="row">
                            <label class="col-sm-2 col-form-label">{{ __('Date de fin') }}</label>
                            <div class="col-sm-7">
                                <div class="form-group">
                                    <div class="form-control" name="datedefin" id="nom" type="texte" style="background-color : #ececec;">{{ $periode->date_debut }}</div>

                                </div>
                            </div>
                        </div>
                        <!-- Fin Coefficient -->
                        <!-- Période -->
                        <div class="row">
                            <label class="col-sm-2 col-form-label">{{ __('Promotion') }}</label>
                            <div class="col-sm-7">
                                <div class="form-group">
                                    <div class="form-control" name="promotion" id="professeur" type="texte" style="background-color : #ececec;">{{ $periode->promotion->intitule }}</div>

                                </div>
                            </div>
                        </div>
                        <!-- Fin Groupe de matière -->
                        <!-- Création -->
                        <div class="row">
                            <label class="col-sm-2 col-form-label">{{ __('Date de création') }}</label>
                            <div class="col-sm-7">
                                <div class="form-group">
                                    <div class="form-control" name="created_at" id="created_at" type="texte" style="background-color : #ececec;">{{ $periode->created_at }}</div>
                                </div>
                            </div>
                        </div>
                        <!-- Fin Création -->
                        <!-- Modification -->
                        <div class="row">
                            <label class="col-sm-2 col-form-label">{{ __('Dernière modification') }}</label>
                            <div class="col-sm-7">
                                <div class="form-group">
                                    @if($periode->updated_at != null)
                                    <div class="form-control" name="updated_at" id="updated_at" type="texte" style="background-color : #ececec;">{{ $periode->updated_at }}</div>
                                    @elseif($periode->updated_at == null)
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