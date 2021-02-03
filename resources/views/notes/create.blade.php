@extends('layouts.template')


@section('content')
@include('alert')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <form method="post" action="{{ route('notes.store') }}" autocomplete="off" class="form-horizontal" enctype="multipart/form-data" accept-charset="utf-8">
          @csrf
          @method('post')
          <div class="card ">
            <div class="card-header card-header-primary">
              <h4 class="card-title">{{ __('Ajouter une note') }}</h4>
              <p class="card-category"></p>
            </div>
            <!-- Retour -->
            <div class="card-body ">
              <div class="row">
                <div class="col-md-12 ">
                  <a href="{{ route('eleves.index') }}" class="btn btn-sm btn-secondary "><i class="fas fa-arrow-left"></i> Retour</a>
                </div>
              </div>
              <br>
              <!-- Note -->
              <div class="row">
                <label for="nom" class="col-sm-2 col-form-label">{{ __('Note') }}</label>
                <div class="col-sm-7">
                  <div class="form-group">
                    <input type="text" class="form-control{{ $errors->has('note') ? ' is-invalid' : '' }}" id="note" name="note" placeholder="Entrer la note" value="{{ old('note') }}">
                    @if ($errors->has('notenote'))
                    <span id="nom-error" class="error text-danger" for="input-note">{{ $errors->first('note') }}</span>
                    @endif
                  </div>
                </div>
              </div>
              <!-- ./Note -->
              <!-- Description -->
              <div class="row">
                <label for="nom" class="col-sm-2 col-form-label">{{ __('Description') }}</label>
                <div class="col-sm-7">
                  <div class="form-group">
                    <input type="text" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" id="description" name="description" placeholder="Entrer la description de la note" value="{{ old('description') }}">
                    @if ($errors->has('description'))
                    <span id="description-error" class="error text-danger" for="input-description">{{ $errors->first('description') }}</span>
                    @endif
                  </div>
                </div>
              </div>
              <!-- ./Description -->
              <!-- Coefficient -->
              <div class="row">
                <label class="col-sm-2 col-form-label">{{ __('Coefficient') }}</label>
                <div class="col-sm-7">
                  <div class="form-group{{ $errors->has('coefficient') ? ' has-danger' : '' }}">
                    <input class="form-control{{ $errors->has('coefficient') ? ' is-invalid' : '' }}" name="coefficient" id="input-coefficient" type="text" placeholder="Coefficient" value="{{ old('coefficient') }}" required="true" aria-required="true" />
                    @if ($errors->has('coefficient'))
                    <span id="description-error" class="error text-danger" for="input-coefficient">{{ $errors->first('coefficient') }}</span>
                    @endif
                  </div>
                </div>
              </div>
              <div class="row">
                <label class="col-sm-2 col-form-label">{{ __('Type') }}</label>
                <div class="col-sm-7">
                  <div class="form-group">
                    <select name="type" id="type->id" class="selectpicker form-control edit" data-live-search="true" style="width:100%" required="true" aria-required="true">
                      <option value="" selected>Choisir un type</option>
                      <option value="Continu">Continu</option>
                      <option value="Examen">Examen</option>
                    </select>
                  </div>
                </div>
              </div>
              <!-- Matière -->
              <div class="row">
                <label class="col-sm-2 col-form-label">{{ __('Matière') }}</label>
                <div class="col-sm-7">
                  <div class="form-group">
                    <select name="matiere" id="matiere->id" class="selectpicker form-control edit" data-live-search="true" style="width:100%" required="true" aria-required="true">
                      <option value="" selected>Choisir une matière</option>
                      @foreach($matieres as $matiere)
                      <option value="{{$matiere->id}}">{{$matiere->intitule}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
              </div>
              <!-- Elève -->
              <div class="row">
                <label class="col-sm-2 col-form-label">{{ __('Élève') }}</label>
                <div class="col-sm-7">
                  <div class="form-group">
                    <select name="eleve" id="eleve->id" class="selectpicker form-control edit" data-live-search="true" style="width:100%" required="true" aria-required="true">
                      <option value="" selected>Choisir un élève</option>
                      @foreach($eleves as $eleve)
                      <option value="{{$eleve->id}}">{{$eleve->nom}} {{$eleve->prenom}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
              </div>
              <!-- Période -->
              <div class="row">
                <label class="col-sm-2 col-form-label">{{ __('Période') }}</label>
                <div class="col-sm-7">
                  <div class="form-group">
                    <select name="periode" id="periode->id" class="selectpicker form-control edit" data-live-search="true" style="width:100%" required="true" aria-required="true">
                      <option value="" selected>Choisir une période</option>
                      @foreach($periodes as $periode)
                      <option value="{{$periode->id}}">{{$periode->nom}}</option>
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