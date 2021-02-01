@extends('layouts.template')

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <form method="post" action="{{ route('users.store') }}" autocomplete="off" class="form-horizontal" enctype="multipart/form-data" accept-charset="utf-8">
          @csrf
          @method('post')
          <div class="card ">
            <div class="card-header card-header-primary">
              <h4 class="card-title">{{ __('Ajouter un utilisateur') }}</h4>
              <p class="card-category"></p>
            </div>
            <!-- Retour -->
            <div class="card-body ">
              <div class="row">
                <div class="col-md-12 ">
                  <a href="{{ route('users.index') }}" class="btn btn-sm btn-secondary "><i class="fas fa-arrow-left"></i> Retour</a>
                </div>
              </div>
              <br>
              <!-- Nom -->
              <div class="row">
                <label for="nom" class="col-sm-2 col-form-label">{{ __('Nom') }}</label>
                <div class="col-sm-7">
                  <div class="form-group">
                    <input type="text" class="form-control{{ $errors->has('nom') ? ' is-invalid' : '' }}" id="name" name="name" placeholder="Entrer le nom" value="{{ old('nom') }}">
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
                    <input type="text" class="form-control{{ $errors->has('prenom') ? ' is-invalid' : '' }}" id="surname" name="surname" placeholder="Entrer le prénom" value="{{ old('prenom') }}">
                    @if ($errors->has('prenom'))
                    <span id="prenom-error" class="error text-danger" for="input-prenom">{{ $errors->first('prenom') }}</span>
                    @endif
                  </div>
                </div>
              </div>
              <div class="row">
                <label for="email" class="col-sm-2 col-form-label">{{ __('Email') }}</label>
                <div class="col-sm-7">
                  <div class="form-group">
                    <input type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" id="email" name="email" placeholder="Entrer l'email" value="{{ old('email') }}">
                    @if ($errors->has('email'))
                    <span id="email-error" class="error text-danger" for="input-email">{{ $errors->first('email') }}</span>
                    @endif
                  </div>
                </div>
              </div>
              <div class="row">
                <label for="password" class="col-sm-2 col-form-label">{{ __('Mot de Passe') }}</label>
                <div class="col-sm-7">
                  <div class="form-group">
                    <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" id="password" name="password" placeholder="Entrer le mot de passe" value="{{ old('password') }}">
                    @if ($errors->has('password'))
                    <span id="password-error" class="error text-danger" for="input-password">{{ $errors->first('password') }}</span>
                    @endif
                  </div>
                </div>
              </div>
              <!-- Confirmation Mot de passe -->
              <div class="row">
                <label class="col-sm-2 col-form-label">{{ __('Confirmation mot de passe') }}</label>
                <div class="col-sm-7">
                  <div class="form-group">
                    <input class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}" placeholder="Confirmation mot de passe" name="password_confirmation" id="input-password_confirmation" type="password" value="" aria-required="true" />
                    @if ($errors->has('password_confirmation'))
                    <!--<span id="password_confirmation-error" class="error text-danger" for="input-password_confirmation">{{ $errors->first('password_confirmation') }}</span>-->
                    @endif
                  </div>
                </div>
              </div>
              <!-- Fin Confirmation Mot de passe -->
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