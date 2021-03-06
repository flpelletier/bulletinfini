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
        <form method="post" action="{{ route('matierescertification.update', $matiere) }}" autocomplete="off" class="form-horizontal" enctype="multipart/form-data" accept-charset="utf-8">
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
              <!-- Description -->
              <div class="row">
                <label for="nom" class="col-sm-2 col-form-label">{{ __('Matière') }}</label>
                <div class="col-sm-7">
                  <div class="form-group">
                    <input type="text" class="form-control{{ $errors->has('matiere') ? ' is-invalid' : '' }}" id="matiere" name="matiere" placeholder="Entrer la matière" value="{{$matiere->matiere }}">
                    @if ($errors->has('matiere'))
                    <span id="matiere-error" class="error text-danger" for="input-matiere">{{ $errors->first('matiere') }}</span>
                    @endif
                  </div>
                </div>
              </div>
              <!-- ./Description -->
              <div class="row">
                <label class="col-sm-2 col-form-label">{{ __('Type') }}</label>
                <div class="col-sm-7">
                  <div class="form-group">
                    <select name="type" id="$matiere->type" class="selectpicker form-control edit" data-live-search="true" style="width:100%" required="true" aria-required="true">
                      <option value="{{$matiere->type}}" selected>{{$matiere->type}}</option>
                      @if($matiere->type != 'entreprise')
                      <option value="entreprise">Entreprise</option>
                      @elseif($matiere->type != 'scolaire')
                      <option value="scolaire">Scolaire</option> 
                      @endif
                    </select>
                  </div>
                </div>
              </div>
              <!-- Coefficient -->
              <div class="row">
                <label class="col-sm-2 col-form-label">{{ __('Coefficient') }}</label>
                <div class="col-sm-7">
                  <div class="form-group{{ $errors->has('coefficient') ? ' has-danger' : '' }}">
                    <input class="form-control{{ $errors->has('coefficient') ? ' is-invalid' : '' }}" name="coefficient" id="input-coefficient" type="number" placeholder="Coefficient" value="{{$matiere->coefficient }}" required="true" aria-required="true" />
                    @if ($errors->has('coefficient'))
                    <span id="description-error" class="error text-danger" for="input-coefficient">{{ $errors->first('coefficient') }}</span>
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