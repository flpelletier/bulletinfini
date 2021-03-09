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
                        <i class="fas fa-times"></i>
                    </span>
                </button>
                <span>{{ session('status') }}</span>
            </div>
        </div>
    </div>
    @endif
        <form method="post" action="{{route("promo.manage")}}">
            @csrf
            <div class="form-group">
                <label> Selectionner une promotion : </label>
                <select class="custom-select form-control-border" name="selector">
                    @foreach($promotions as $promo)
                    <option value="{{$promo->id}}">{{$promo->intitule}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-row text-center">
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Valider</button>
                </div>
            </div>
        </form>
        <form method="get" action="{{route("promotions.create")}}">
            <br>
            <div class="form-row text-center">

                <div class="col-12">
                    <button type="submit" class="btn btn-success">Créer une nouvelle promotion</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection