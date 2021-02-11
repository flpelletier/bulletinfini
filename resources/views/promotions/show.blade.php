@extends('layouts.template')

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">Promotion n°{{$promotion->id}}</h4>
                    </div>
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-md-12 ">
                                <a href="{{ route('promotions.index') }}" class="btn btn-sm btn-secondary "><i class="fas fa-arrow-left"></i> Retour</a>
                            </div>
                        </div>
                        <!-- Nom -->
                        <div class="row">
                            <label class="col-sm-2 col-form-label">{{ __('Intitulé') }}</label>
                            <div class="col-sm-7">
                                <div class="form-group">
                                    <div class="form-control" name="nom" id="nom" type="texte" style="background-color : #ececec;">{{ $promotion->intitule }}</div>
                                </div>
                            </div>
                        </div>
                        <!-- Fin Nom -->
                        <!-- Année -->
                        <div class="row">
                            <label class="col-sm-2 col-form-label">{{ __('Année') }}</label>
                            <div class="col-sm-7">
                                <div class="form-group">
                                    <div class="form-control" name="annee" id="annee" type="texte" style="background-color : #ececec;">{{ $promotion->annee }}</div>

                                </div>
                            </div>
                        </div>
                        <!-- Fin Année -->
                        <!-- Année -->
                        <div class="row">
                            <label class="col-sm-2 col-form-label">{{ __('Nom complet') }}</label>
                            <div class="col-sm-7">
                                <div class="form-group">
                                    <div class="form-control" name="nom_complet" id="nom_complet" type="texte" style="background-color : #ececec;">{{ $promotion->nom_complet }}</div>

                                </div>
                            </div>
                        </div>
                        <!-- Fin Année -->
                        <!-- Année -->
                        <div class="row">
                            <label class="col-sm-2 col-form-label">{{ __('Description') }}</label>
                            <div class="col-sm-7">
                                <div class="form-group">
                                    <div class="form-control" name="description" id="description" type="texte" style="background-color : #ececec;">{{ $promotion->description }}</div>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 col-form-label">{{ __('Coordonnées') }}</label>
                            <div class="col-sm-7">
                                <div class="form-group">
                                    <div class="form-control" name="coordonnees" id="coordonnees" type="texte" style="background-color : #ececec;height:100px;">{{ $promotion->coordonnees }}</div>
                                </div>
                            </div>
                        </div>
                        <!-- Fin Année -->
                        <!-- Création -->
                        <div class="row">
                            <label class="col-sm-2 col-form-label">{{ __('Date de création') }}</label>
                            <div class="col-sm-7">
                                <div class="form-group">
                                    <div class="form-control" name="created_at" id="created_at" type="texte" style="background-color : #ececec;">{{ $promotion->created_at }}</div>
                                </div>
                            </div>
                        </div>
                        <!-- Fin Création -->
                        <!-- Modification -->
                        <div class="row">
                            <label class="col-sm-2 col-form-label">{{ __('Dernière modification') }}</label>
                            <div class="col-sm-7">
                                <div class="form-group">
                                    @if($promotion->updated_at != null)
                                    <div class="form-control" name="updated_at" id="updated_at" type="texte" style="background-color : #ececec;">{{ $promotion->updated_at }}</div>
                                    @elseif($promotion->updated_at == null)
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