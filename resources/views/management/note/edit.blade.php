@extends('layouts.template')

@section('content')
    <div class="card card-secondary">
        <div class="card-header">
            <h3 class="card-title">Promotion {{$matiere->promotion->intitule}}</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form class="form-horizontal" action="{{route("note.update")}}" method="post">
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
                                        @foreach($matiere->promotion->eleves as $eleve)
                                            <option
                                                value="{{$eleve->id}}">{{strtoupper($eleve->nom) ." " .strtolower($eleve->prenom) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Periode</label>
                                    <select name="periode" class="custom-select rounded-0" onchange="noteviewer()"
                                            id="periode_selector">
                                        @foreach($matiere->promotion->periodes as $periode)
                                            <option value="{{$periode->id}}">{{$periode->nom}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Note : </label>
                                    <select name="note" class="custom-select rounded-0" onselect="editor()"
                                            onchange="editor()" id="note_selector">
                                            <option value="{{$eleve->note}}">{{$eleve->note}}</option>

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
                    <button type="submit" id="validate" name="id_note" class="btn btn-info text-center">Valider</button>

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
                var filter2 = document.getElementById("periode_selector").value;
                var selector = document.getElementById("note_selector");
                while (selector.options.length != 0) {
                    selector.options.remove(0);
                }
                var option = document.createElement("option");
                option.text = "";
                selector.add(option);
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
