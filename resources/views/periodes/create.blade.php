@extends('layouts.template')

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form method="post" action="{{ route('periodes.store') }}" autocomplete="off" class="form-horizontal" enctype="multipart/form-data" accept-charset="utf-8">
                    @csrf
                    @method('post')
                    <div class="card ">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Ajouter une période</h4>
                            <p class="card-category"></p>
                        </div>
                        <!-- Retour -->
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-md-12 ">
                                    <a href="{{ route('periodes.index') }}" class="btn btn-sm btn-secondary "><i class="fas fa-arrow-left"></i>Retour</a>
                                </div>
                            </div>
                            <br>
                            <!-- nom  -->
                            <div class="row">
                                <label class="col-sm-2 col-form-label">{{ __('Nom') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                        <input class="form-control{{ $errors->has('nom') ? ' is-invalid' : '' }}" name="nom" id="input-nom" type="text" placeholder="ASI A1" value="" required="true" aria-required="true" />
                                        @if ($errors->has('nom'))
                                        <span id="nom-error" class="error text-danger" for="input-nom">{{ $errors->first('nom') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <!-- date début -->
                            <div class="row">
                                <label class="col-sm-2 col-form-label">{{ __('Date de début') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('datedebut') ? ' has-danger' : '' }}">
                                        <input class="form-control{{ $errors->has('datedebut') ? ' is-invalid' : '' }}" name="datedebut" id="input-datedebut" type="text" placeholder="2021" value="" required="true" aria-required="true" />
                                        @if ($errors->has('datedebut'))
                                        <span id="description-error" class="error text-danger" for="input-datedebut">{{ $errors->first('datedebut') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <!-- date fin -->
                            <div class="row">
                                <label class="col-sm-2 col-form-label">{{ __('Date de fin') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('datefin') ? ' has-danger' : '' }}">
                                        <input class="form-control{{ $errors->has('datefin') ? ' is-invalid' : '' }}" name="datefin" id="input-datefin" type="text" placeholder="2023" value="" required="true" aria-required="true" />
                                        @if ($errors->has('datefin'))
                                        <span id="description-error" class="error text-danger" for="input-datefin">{{ $errors->first('datefin') }}</span>
                                        @endif
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
                            <div class="ml-auto mr-auto text-center">
                                <button type="submit" class="btn btn-success">Ajouter</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection