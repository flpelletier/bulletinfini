@extends('layouts.template')

@section('content')
    <div class="content">
        <div class="container-fluid">
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
        </div>
    </div>

@endsection
