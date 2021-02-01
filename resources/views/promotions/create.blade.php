@extends('layouts.template')

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form method="post" action="{{ route('promotions.store') }}" autocomplete="off" class="form-horizontal" enctype="multipart/form-data" accept-charset="utf-8">
                    @csrf
                    @method('post')
                    <div class="card ">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Ajouter une promotion</h4>
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
                                <label class="col-sm-2 col-form-label">Intitulé de la promotion :</label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                        <input class="form-control{{ $errors->has('intitule') ? ' is-invalid' : '' }}" name="intitule" id="input-intitule" type="text" placeholder="Intitulé" value="" required="true" aria-required="true" />
                                        @if ($errors->has('namintitulee'))
                                        <span id="intitule-error" class="error text-danger" for="input-intitule">{{ $errors->first('intitule') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <!-- description sectin -->
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Année :</label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('annee') ? ' has-danger' : '' }}">
                                        <input class="form-control{{ $errors->has('annee') ? ' is-invalid' : '' }}" name="annee" id="input-annee" type="text" placeholder="Année" value="" required="true" aria-required="true" />
                                        @if ($errors->has('annee'))
                                        <span id="description-error" class="error text-danger" for="input-annee">{{ $errors->first('annee') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="ml-auto mr-auto text-center">
                                <button  type="submit" class="btn btn-success">Ajouter la promotion</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection