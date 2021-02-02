@extends('layouts.template')


@section('content')
@include('alert')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <form method="post" action="{{ route('matieres.store') }}" autocomplete="off" class="form-horizontal" enctype="multipart/form-data" accept-charset="utf-8">
          @csrf
          @method('post')
          <div class="card ">
            <div class="card-header card-header-primary">
              <h4 class="card-title">{{ __('Ajouter une matière') }}</h4>
              <p class="card-category"></p>
            </div>
            <!-- Retour -->
            <div class="card-body ">
              <div class="row">
                <div class="col-md-12 ">
                  <a href="{{ route('matieres.index') }}" class="btn btn-sm btn-secondary "><i class="fas fa-arrow-left"></i> Retour</a>
                </div>
              </div>
              <br>
              <!-- Nom -->
              <div class="row">
                <label for="nom" class="col-sm-2 col-form-label">{{ __('Nom') }}</label>
                <div class="col-sm-7">
                  <div class="form-group">
                    <input type="text" class="form-control{{ $errors->has('intitule') ? ' is-invalid' : '' }}" id="intitule" name="intitule" placeholder="Entrer le nom" value="{{ old('intitule') }}">
                    @if ($errors->has('intitule'))
                    <span id="nom-error" class="error text-danger" for="input-intitule">{{ $errors->first('intitule') }}</span>
                    @endif
                  </div>
                </div>
              </div>
              <!-- ./Nom -->

              <!-- Coefficient -->
              <div class="row">
                <label class="col-sm-2 col-form-label">Coefficient :</label>
                <div class="col-sm-7">
                  <div class="form-group{{ $errors->has('coefficient') ? ' has-danger' : '' }}">
                    <input class="form-control{{ $errors->has('coefficient') ? ' is-invalid' : '' }}" name="coefficient" id="input-coefficient" type="text" placeholder="Coefficient" value="{{ old('coefficient') }}" required="true" aria-required="true" />
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
                      <option value="" selected>Choisir un groupe de matière</option>
                      @foreach($groupes as $groupe)
                      <option value="{{$groupe->id}}">{{$groupe->intitule}}</option>
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
                      <option value="" selected>Choisir une promotion</option>
                      @foreach($promotions as $promotion)
                      <option value="{{$promotion->id}}">{{$promotion->intitule}}</option>
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
                      <option value="" selected>Choisir une matière</option>
                      @foreach($professeurs as $professeur)
                      <option value="{{$professeur->id}}">{{$professeur->nom}} {{$professeur->prenom}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
              </div>
              <div class="ml-auto mr-auto text-center">
                <button type="submit" class="btn btn-success">{{ __('Ajouter') }}</button>
              </div>
            </div>
          </div>
      </div>
      </form>

    </div>
  </div>
</div>
@endsection