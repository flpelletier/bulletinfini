@extends('layouts.template')

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">Utilisateur n°{{$user->id}}</h4>
                    </div>
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-md-12 ">
                                <a href="{{ route('users.index') }}" class="btn btn-sm btn-secondary "><i class="fas fa-arrow-left"></i> Retour</a>
                            </div>
                        </div>
                        <!-- Nom -->
                        <div class="row">
                            <label class="col-sm-2 col-form-label">{{ __('Nom') }}</label>
                            <div class="col-sm-7">
                                <div class="form-group">
                                    <div class="form-control" name="nom" id="nom" type="texte" style="background-color : #ececec;">{{ $user->name }}</div>

                                </div>
                            </div>
                        </div>
                        <!-- Fin Nom -->
                        <!-- Prénom -->
                        <div class="row">
                            <label class="col-sm-2 col-form-label">{{ __('Prénom') }}</label>
                            <div class="col-sm-7">
                                <div class="form-group">

                                    <div class="form-control" name="nom" id="nom" type="texte" style="background-color : #ececec;">{{ $user->surname }}</div>
                                </div>
                            </div>
                        </div>
                        <!-- Fin Prénom -->
                        <!-- Email -->
                        <div class="row">
                            <label class="col-sm-2 col-form-label">{{ __('Adresse Email') }}</label>
                            <div class="col-sm-7">
                                <div class="form-group">
                                    <div class="form-control" name="email" id="email" type="email" style="background-color : #ececec;">{{ $user->email }}</div>
                                </div>
                            </div>
                        </div>
                        <!-- Fin Email -->

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection