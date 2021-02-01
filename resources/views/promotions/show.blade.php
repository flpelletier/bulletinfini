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
                                    <div class="form-control" name="nom" id="nom" type="texte" style="background-color : #ececec;">{{ $promotion->année }}</div>

                                </div>
                            </div>
                        </div>
                        <!-- Fin Année -->
                        <!-- Création -->
                        <div class="row">
                            <label class="col-sm-2 col-form-label">{{ __('Date de création') }}</label>
                            <div class="col-sm-7">
                                <div class="form-group">
                                    <div class="form-control" name="email" id="email" type="email" style="background-color : #ececec;">{{ $promotion->created_at }}</div>
                                </div>
                            </div>
                        </div>
                        <!-- Fin Création -->
                        <!-- Modification -->
                        <div class="row">
                            <label class="col-sm-2 col-form-label">{{ __('Dernière modification') }}</label>
                            <div class="col-sm-7">
                                <div class="form-group">
                                    <div class="form-control" name="email" id="email" type="email" style="background-color : #ececec;">{{ $promotion->updated_at }}</div>
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