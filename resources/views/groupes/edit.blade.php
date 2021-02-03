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
                <form method="post" action="{{ route('groupes.update', $groupe) }}" autocomplete="off" class="form-horizontal" enctype="multipart/form-data" accept-charset="utf-8">
                    @csrf
                    @method('put')
                    <div class="card ">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Modifier un groupe</h4>
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
                                <label class="col-sm-2 col-form-label">Intitulé de la matière :</label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                        <input class="form-control{{ $errors->has('intitule') ? ' is-invalid' : '' }}" name="intitule" id="input-intitule" type="text" placeholder="Intitulé" value="{{$groupe->intitule}}" required="true" aria-required="true" />
                                        @if ($errors->has('intitule'))
                                        <span id="intitule-error" class="error text-danger" for="input-intitule">{{ $errors->first('intitule') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <!-- Coefficient -->
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Coefficient :</label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('coefficient') ? ' has-danger' : '' }}">
                                        <input class="form-control{{ $errors->has('coefficient') ? ' is-invalid' : '' }}" name="coefficient" id="input-coefficient" type="text" placeholder="Coefficient" value="{{$groupe->coefficient}}" required="true" aria-required="true" />
                                        @if ($errors->has('coefficient'))
                                        <span id="description-error" class="error text-danger" for="input-coefficient">{{ $errors->first('coefficient') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">{{ __('Matières') }}</label>
                                <div class="form-group">
                                    @foreach($groupe->matieres as $mat)
                                    <label>{{ Form::checkbox('mat[]', $mat->id, $mat->intitule ? true : false, array('class' => 'intitule'))}} {{ $mat->intitule }}</label>
                                    <br />
                                    @endforeach
                                    @foreach($matiere as $matnew)
                                    <!-- @if( $groupe->matiere != $matiere)
                                    <label>{{ Form::checkbox('matnew[]', $matnew->id, false, array('class' => 'matnew')) }} {{ $matnew->intitule }}</label>
                                    @endif
                                    <br />
                                    @endforeach
                                    -->
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
@endsection