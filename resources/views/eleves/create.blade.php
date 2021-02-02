@extends('layouts.template')


@section('content')
@include('alert')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <form method="post" action="{{ route('eleves.store') }}" autocomplete="off" class="form-horizontal" enctype="multipart/form-data" accept-charset="utf-8">
          @csrf
          @method('post')
          <div class="card ">
            <div class="card-header card-header-primary">
              <h4 class="card-title">{{ __('Ajouter un élève') }}</h4>
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
              <!-- Nom -->
              <div class="row">
                <label for="nom" class="col-sm-2 col-form-label">{{ __('Nom') }}</label>
                <div class="col-sm-7">
                  <div class="form-group">
                    <input type="text" class="form-control{{ $errors->has('nom') ? ' is-invalid' : '' }}" id="nom" name="nom" placeholder="Entrer le nom" value="{{ old('nom') }}">
                    @if ($errors->has('nom'))
                    <span id="nom-error" class="error text-danger" for="input-nom">{{ $errors->first('nom') }}</span>
                    @endif
                  </div>
                </div>
              </div>
              <!-- ./Nom -->
              <div class="row">
                <label for="nom" class="col-sm-2 col-form-label">{{ __('Prénom') }}</label>
                <div class="col-sm-7">
                  <div class="form-group">
                    <input type="text" class="form-control{{ $errors->has('prenom') ? ' is-invalid' : '' }}" id="prenom" name="prenom" placeholder="Entrer le prénom" value="{{ old('prenom') }}">
                    @if ($errors->has('prenom'))
                    <span id="prenom-error" class="error text-danger" for="input-prenom">{{ $errors->first('prenom') }}</span>
                    @endif
                  </div>
                </div>
              </div>
              <div class="row">
                <label for="email" class="col-sm-2 col-form-label">{{ __('Promotion') }}</label>
                <div class="col-sm-7">
                  <div class="form-group">
                    <select name="promotion" id="promotion->id" class="selectpicker form-control edit" data-live-search="true" style="width:100%" required="true" aria-required="true">
                      <option value="">Choisir une promotion</option>
                      @foreach($promotions as $promotion)
                      <option value="{{$promotion->id}}">{{$promotion->intitule}}</option>
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