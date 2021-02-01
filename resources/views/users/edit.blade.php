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
                <form method="post" action="{{ route('users.update', $user) }}" autocomplete="off" class="form-horizontal" enctype="multipart/form-data" accept-charset="utf-8">
                    @csrf
                    @method('put')
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Utilisateur n°{{$user->id}}</h4>
                            <p class="card-category"></p>
                        </div>
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-md-12 ">
                                    <a href="{{ route('users.index') }}" class="btn btn-sm btn-secondary "><i class="fas fa-arrow-left"></i> Retour</a>
                                </div>
                            </div>
                            <br>
                            <!-- Nom -->
                            <div class="row">
                                <label class="col-sm-2 col-form-label">{{ __('Nom') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group">
                                        <input class="form-control{{ $errors->has('nom') ? ' is-invalid' : '' }}" placeholder="Entrer le nom" name="name" id="input-name" type="text" value="{{$user->name}}" required="true" aria-required="true" />
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
                                        <input class="form-control{{ $errors->has('prenom') ? ' is-invalid' : '' }}" placeholder="Entrer le prénom" name="surname" id="input-prenom" type="text" value="{{$user->surname}}" required="true" aria-required="true" />
                                        @if ($errors->has('prenom'))
                                        <span id="prenom-error" class="error text-danger" for="input-prenom">{{ $errors->first('prenom') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <!-- Email -->
                            <div class="row">
                                <label class="col-sm-2 col-form-label">{{ __('Email') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group">
                                        <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="email" name="email" id="input-email" type="email" value="{{$user->email}}" required="true" aria-required="true" />
                                        @if ($errors->has('email'))
                                        <span id="email-error" class="error text-danger" for="input-email">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <!-- Mot de passe -->
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