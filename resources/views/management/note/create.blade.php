@extends('layouts.template')

@section('content')
    <div class="card card-secondary">
        <div class="card-header">
            <h3 class="card-title">Promotion {{$matiere->promotion->intitule}}</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form class="form-horizontal" action="{{route("note.create")}}" method="post">
            @csrf
            <div class="card-body">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Information sur la note : </h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-4">
                                <!-- textarea -->
                                <div class="form-group">
                                    <label>Description de la note (facultatif)</label>
                                    <textarea required name="description" class="form-control" rows="1"
                                              placeholder="Enter ..."></textarea>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Coefficient de la note</label>
                                    <select name="coef" class="custom-select rounded-0" id="exampleSelectRounded0">
                                        @for($i = 1 ; $i <20 ; $i++)
                                            <option>{{$i}}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Periode</label>
                                    <select name="periode" class="custom-select rounded-0" id="exampleSelectRounded0">
                                        @foreach($matiere->promotion->periodes as $periode)
                                            <option value="{{$periode->id}}">{{$periode->nom}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                @foreach($matiere->promotion->eleves as $eleve)
                    <div class="form-group row">
                        <label for="inputEmail3"
                               class="col-sm-2 col-form-label">{{strtoupper($eleve->nom) ." " .strtolower($eleve->prenom) }}</label>
                        <div class="col-sm-10">
                            <input type="number" max="20" class="form-control" name="note_{{$eleve->id}}"
                                   placeholder="Note">
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <center>
                    <button type="submit" name="matiere" value="{{$matiere->id}}" class="btn btn-info">Valider</button>

                </center>
            </div>
            <!-- /.card-footer -->
        </form>
    </div>
@endsection
