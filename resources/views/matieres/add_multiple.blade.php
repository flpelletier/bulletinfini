@extends('layouts.template')


@section('content')
@include('alert')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <form method="post" action="{{ route('matieres.store_multiple') }}" autocomplete="off" class="form-horizontal" enctype="multipart/form-data" accept-charset="utf-8">
          @csrf
          @method('post')
          <div class="card ">
            <div class="card-header card-header-primary">
              <h4 class="card-title">{{ __('Lier les matières à une promotion') }}</h4>
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
              <div class="row">
                <label for="nom" class="col-sm-2 col-form-label">{{ __('Matières') }}</label>
                <div class="form-group">
                  @foreach($matieres as $matiere)
                  <label>{{ Form::checkbox('matiere[]', $matiere->id, false, array('class' => 'matiere')) }}  {{ $matiere->intitule }}</label>
                  <br />
                  @endforeach
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