@extends('layouts.template')

@section('content')
    <div class="card card-secondary">
        <div class="card-header">
            @if($matiere->promotion)
                <h3 class="card-title">Promotion {{$matiere->promotion->intitule}}</h3>
            @else
                <h3 class="card-title">Modification note {{$matiere->matiere}}</h3>
            @endif
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        @if($matiere->promotion)
            <form class="form-horizontal" action="{{route("note.update")}}" method="post">

                @else
                    <form class="form-horizontal" action="{{route("certif-note.update")}}" method="post">
                @endif
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
                                        <label>Eleve :</label>
                                        <select name="coef" class="custom-select rounded-0" onchange="noteviewer()"
                                                id="user_selector">
                                            <option selected></option>
                                            @if(isset($matiere->promotion) ==false )
                                                @foreach($meseleves as $eleve)
                                                    <option
                                                        value="{{$eleve->id}}">{{strtoupper($eleve->nom) ." " .strtolower($eleve->prenom) }}</option>
                                                @endforeach
                                            @else
                                                @foreach($matiere->promotion->eleves as $eleve)
                                                    <option
                                                        value="{{$eleve->id}}">{{strtoupper($eleve->nom) ." " .strtolower($eleve->prenom) }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                @if(isset($matiere->promotion))
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Periode</label>
                                            <select name="periode" class="custom-select rounded-0"
                                                    onchange="noteviewer()"
                                                    id="periode_selector">
                                                @foreach($matiere->promotion->periodes as $periode)
                                                    <option value="{{$periode->id}}">{{$periode->nom}}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>
                                @endif
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Note : </label>
                                        <select name="note" class="custom-select rounded-0" onselect="editor()"
                                                onchange="editor()" id="note_selector">
                                            @if(!isset($matiere->promotion))
                                                <option value="{{$eleve->certif_note}}">{{$eleve->certif_note}}</option>
                                            @else
                                                <option value="{{$eleve->note}}">{{$eleve->note}}</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <input style="display: none" type="number" max="20" class="form-control" name="note" id="note"
                           placeholder="note">
                </div>

                <!-- /.card-body -->
                <div class="card-footer">
                    <center>
                        <button type="submit" id="validate" name="id_note" class="btn btn-info text-center">Valider
                        </button>

                    </center>
                </div>

                <!-- /.card-footer -->
            </form>
            <form action="{{route('note.destroy')}}" method="post">
                @csrf
                <center>
                    <button style="display: none" type="submit" id="delete" name="id_note_destroy"
                            onclick="return confirm('Est tu sur de vouloir supprimer cette note ?')"
                            value="{{$matiere->id}}" class="btn btn-danger">Supprimer la note
                    </button>
                </center>
            </form>
            <script>
                function noteviewer() {
                    var filter1 = document.getElementById("user_selector").value;

                    var selector = document.getElementById("note_selector");
                    while (selector.options.length != 0) {
                        selector.options.remove(0);
                    }
                    var option = document.createElement("option");
                    option.text = "";
                    selector.add(option);
                    var test = <?php echo json_encode($matiere->promotion);?>;
                    if (test == null) {
                        var notes = <?php echo json_encode($matiere->certif_notes);?>;
                        for (var i = 0; i < notes.length; i++) {
                            if (notes[i].eleve_id == filter1) {
                                var option = document.createElement("option");
                                option.text = notes[i].descritpion + " Note: " + notes[i].note;
                                option.value = notes[i].note + "/" + notes[i].id;
                                selector.add(option);
                            }
                        }
                    } else {
                        var filter2 = document.getElementById("periode_selector").value;
                        var notes = <?php echo json_encode($matiere->notes);?>;
                        for (var i = 0; i < notes.length; i++) {
                            if (notes[i].eleve_id == filter1) {
                                if (notes[i].periode_id == filter2) {
                                    var option = document.createElement("option");
                                    option.text = notes[i].description + " Note: " + notes[i].note;
                                    option.value = notes[i].note + "/" + notes[i].id;
                                    selector.add(option);
                                }
                            }
                        }
                    }
                }

                function editor() {
                    var input = document.getElementById("note");
                    var value = document.getElementById("note_selector").value.split("/");
                    input.style.display = "flex";
                    input.value = value[0];
                    document.getElementById("validate").value = value[1];
                    document.getElementById("delete").style.display = "inline";
                    document.getElementById("delete").value = value[1];
                }


            </script>
    </div>
@endsection
