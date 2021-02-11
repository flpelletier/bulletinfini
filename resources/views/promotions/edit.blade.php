@extends('layouts.template')

@section('content')
@include('alert')
<div class="content">
    <div class="container-fluid">
        @if (session('status'))
        <div class="row">
            <div class="col-sm-12">
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">
                            <i class="now-ui-icons ui-1_simple-remove"></i>
                        </span>
                    </button>
                    <span>{{ session('status') }}</span>
                </div>
            </div>
        </div>
        @endif
        <div class="row">
            <div class="col-md-12">
                <form method="post" action="{{ route('promotions.update', $promotion) }}" autocomplete="off" class="form-horizontal" enctype="multipart/form-data" accept-charset="utf-8">
                    @csrf
                    @method('put')
                    <div class="card ">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Modifier une promotion</h4>
                            <p class="card-category"></p>
                        </div>
                        <!-- Retour -->
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-md-12 ">
                                    <a href="{{ url()->previous() }}" class="btn btn-sm btn-secondary "><i class="fas fa-arrow-left"></i>Retour</a>
                                </div>
                            </div>
                            <br>
                            <!-- intitule  -->
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Intitulé de la promotion :</label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                        <input class="form-control{{ $errors->has('intitule') ? ' is-invalid' : '' }}" name="intitule" id="input-intitule" type="text" placeholder="Intitulé" value="{{$promotion->intitule}}" required="true" aria-required="true" />
                                        @if ($errors->has('namintitulee'))
                                        <span id="intitule-error" class="error text-danger" for="input-intitule">{{ $errors->first('intitule') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <!-- Année -->
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Année :</label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('annee') ? ' has-danger' : '' }}">
                                        <input class="form-control{{ $errors->has('annee') ? ' is-invalid' : '' }}" name="annee" id="input-annee" type="text" placeholder="Année" value="{{$promotion->annee}}" required="true" aria-required="true" />
                                        @if ($errors->has('annee'))
                                        <span id="description-error" class="error text-danger" for="input-annee">{{ $errors->first('annee') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Nom de la formation :</label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('nom') ? ' has-danger' : '' }}">
                                        <input class="form-control{{ $errors->has('nom') ? ' is-invalid' : '' }}" name="nom" id="input-nom" type="text" placeholder="Administrateur de Systèmes d'information" value="{{$promotion->nom_complet}}" required="true" aria-required="true" />
                                        @if ($errors->has('nom'))
                                        <span id="nom-error" class="error text-danger" for="input-nom">{{ $errors->first('nom') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Description :</label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('description') ? ' has-danger' : '' }}">
                                        <input class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" id="input-description" type="text" placeholder="TITRE RNCP de Niveau Il - N° de certification 26E32601 - Code NSF 326 n" value="{{$promotion->description}}" required="true" aria-required="true" />
                                        @if ($errors->has('description'))
                                        <span id="description-error" class="error text-danger" for="input-description">{{ $errors->first('description') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Coordonnées :</label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('coordonnees') ? ' has-danger' : '' }}">
                                        <textarea class="form-control{{ $errors->has('coordonnees') ? ' is-invalid' : '' }}" name="coordonnees" id="input-coordonnees" type="text" placeholder="Lycée Pasteur Mont Roland, Enseignement Supérieur. 9, avenue Rockefeller BP 24 39107 Dole Cedex 03 84 79 75 00" required="true" aria-required="true" />
                                        {{$promotion->coordonnees}}
                                        </textarea>
                                        @if ($errors->has('coordonnees'))
                                        <span id="coordonnees-error" class="error text-danger" for="input-coordonnees">{{ $errors->first('coordonnees') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="ml-auto mr-auto text-center">
                                <button type="submit" class="btn btn-success">Modifier</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection