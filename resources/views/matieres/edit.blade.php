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
                <form method="post" action="{{ route('matieres.update', $matiere) }}" autocomplete="off" class="form-horizontal" enctype="multipart/form-data" accept-charset="utf-8">
                    @csrf
                    @method('put')
                    <div class="card ">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Modifier une matière</h4>
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
                                <label class="col-sm-2 col-form-label">Intitulé de la matière :</label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                        <input class="form-control{{ $errors->has('intitule') ? ' is-invalid' : '' }}" name="intitule" id="input-intitule" type="text" placeholder="Intitulé" value="{{$matiere->intitule}}" required="true" aria-required="true" />
                                        @if ($errors->has('intitule'))
                                        <span id="intitule-error" class="error text-danger" for="input-intitule">{{ $errors->first('intitule') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <!-- Coefficient -->
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Coefficient :</label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('coefficient') ? ' has-danger' : '' }}">
                                        <input class="form-control{{ $errors->has('coefficient') ? ' is-invalid' : '' }}" name="coefficient" id="input-coefficient" type="number" placeholder="Coefficient" value="{{$matiere->coefficient}}" required="true" aria-required="true" />
                                        @if ($errors->has('coefficient'))
                                        <span id="description-error" class="error text-danger" for="input-coefficient">{{ $errors->first('coefficient') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                               <!-- Groupe Matière -->
                               <div class="row">
                                <label class="col-sm-2 col-form-label">{{ __('Groupe') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group">
                                        <select name="groupematiere" id="groupe_matiere_id->id" class="selectpicker form-control edit" data-live-search="true" style="width:100%" required="true" aria-required="true">
                                            <option value="{{$matiere->groupe_matiere_id}}" selected>{{$matiere->groupe_matiere->intitule}}</option>
                                            @foreach($groupes as $groupe)
                                            @if($groupe->id != $matiere->groupe_matiere_id)
                                            <option value="{{$groupe->id}}">{{$groupe->intitule}}</option>
                                            @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- Promotion -->
                            <div class="row">
                                <label class="col-sm-2 col-form-label">{{ __('Promotion') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group">
                                        <select name="promotion" id="promotion->id" class="selectpicker form-control edit" data-live-search="true" style="width:100%" required="true" aria-required="true">
                                            <option value="{{$matiere->promotion_id}}" selected>{{$matiere->promotion->intitule}}</option>
                                            @foreach($promotions as $promotion)
                                            @if($promotion->id != $matiere->promotion_id)
                                            <option value="{{$promotion->id}}">{{$promotion->intitule}}</option>
                                            @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- Professeur -->
                            <div class="row">
                                <label class="col-sm-2 col-form-label">{{ __('Professeur') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group">
                                        <select name="professeur" id="promotion->id" class="selectpicker form-control edit" data-live-search="true" style="width:100%" required="true" aria-required="true">
                                            <option value="{{$matiere->prof_id}}" selected>{{$matiere->prof->nom}}</option>
                                            @foreach($professeurs as $professeur)
                                            @if($professeur->id != $matiere->prof_id)
                                            <option value="{{$professeur->id}}">{{$professeur->nom}} {{$professeur->prenom}}</option>
                                            @endif
                                            @endforeach
                                        </select>
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