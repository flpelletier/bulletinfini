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
                <form method="post" action="{{ route('professeurs.update', $professeur) }}" autocomplete="off" class="form-horizontal" enctype="multipart/form-data" accept-charset="utf-8">
                    @csrf
                    @method('put')
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Professeur n°{{$professeur->id}}</h4>
                            <p class="card-category"></p>
                        </div>
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-md-12 ">
                                    <a href="{{ route('professeurs.index') }}" class="btn btn-sm btn-secondary "><i class="fas fa-arrow-left"></i> Retour</a>
                                </div>
                            </div>
                            <br>
                            <!-- Nom -->
                            <div class="row">
                                <label class="col-sm-2 col-form-label">{{ __('Nom') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group">
                                        <input class="form-control{{ $errors->has('nom') ? ' is-invalid' : '' }}" placeholder="Entrer le nom" name="nom" id="input-name" type="text" value="{{$professeur->nom}}" required="true" aria-required="true" />
                                        @if ($errors->has('nom'))
                                        <span id="nom-error" class="error text-danger" for="input-nom">{{ $errors->first('nom') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <!-- Prenom -->
                            <div class="row">
                                <label class="col-sm-2 col-form-label">{{ __('Prénom') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group">
                                        <input class="form-control{{ $errors->has('prenom') ? ' is-invalid' : '' }}" placeholder="Entrer le prénom" name="prenom" id="input-prenom" type="text" value="{{$professeur->prenom}}" required="true" aria-required="true" />
                                        @if ($errors->has('prenom'))
                                        <span id="prenom-error" class="error text-danger" for="input-prenom">{{ $errors->first('prenom') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <!-- Email -->
                            <div class="row">
                                <label class="col-sm-2 col-form-label">{{ __('Genre') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group">
                                        <select name="genre" id="genre->id" class="selectpicker form-control edit" data-live-search="true" style="width:100%" required="true" aria-required="true">
                                            <option value="{{$professeur->genre}}" selected>{{$professeur->genre}}</option>
                                            @if($professeur->genre != "femme")
                                            <option value="Femme">Femme</option>
                                            @elseif($professeur->genre != "homme")
                                            <option value="Homme">Homme</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- Submit -->
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