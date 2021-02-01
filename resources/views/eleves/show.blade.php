@extends('layouts.template')

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">Élève n°{{$eleve->id}}</h4>
                    </div>
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-md-12 ">
                                <a href="{{ route('eleves.index') }}" class="btn btn-sm btn-secondary "><i class="fas fa-arrow-left"></i> Retour</a>
                            </div>
                        </div>
                        <!-- Nom -->
                        <div class="row">
                            <label class="col-sm-2 col-form-label">{{ __('Nom') }}</label>
                            <div class="col-sm-7">
                                <div class="form-group">
                                    <div class="form-control" name="nom" id="nom" type="texte" style="background-color : #ececec;">{{ $eleve->nom }}</div>

                                </div>
                            </div>
                        </div>
                        <!-- Fin Nom -->
                        <!-- Prénom -->
                        <div class="row">
                            <label class="col-sm-2 col-form-label">{{ __('Prénom') }}</label>
                            <div class="col-sm-7">
                                <div class="form-group">

                                    <div class="form-control" name="nom" id="nom" type="texte" style="background-color : #ececec;">{{ $eleve->prenom }}</div>
                                </div>
                            </div>
                        </div>
                        <!-- Fin Prénom -->
                        <!-- Promotion -->
                        <div class="row">
                            <label class="col-sm-2 col-form-label">{{ __('Promotion') }}</label>
                            <div class="col-sm-7">
                                <div class="form-group">
                                    <div class="form-control" name="promotion" id="promotion" type="texte" style="background-color : #ececec;">{{ $eleve->promotion->intitule }}</div>
                                </div>
                            </div>
                        </div>
                        <!-- Fin Promotion -->

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection