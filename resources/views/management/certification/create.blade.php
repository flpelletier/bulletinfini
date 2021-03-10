@extends('layouts.template')

@section('content')
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Génération de la certification des {{strtoupper($promotion->intitule)}}</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form method="post" action="{{route("certification.create")}}">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    @php($counter = 0)
                    @foreach($promotion->eleves as $eleve)
                        @php($counter++)

                        <div class="row">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <?php
                                    $testc = 0;
                                    foreach ($eleve->certif_notes as $note) {
                                        $testc++;
                                    }
                                    ?>
                                    <span class="input-group-text">

                          <input id="{{$counter}}" name="{{$eleve->id}}" onchange="setview()" @if($testc == 0) disabled
                                 title="aucune note pour {{$eleve->prenom}}"
                                 style="background-color: rgb(153, 153, 153)" @else style="color : black;"
                                 @endif type="checkbox">
                        </span>
                                </div>
                                <input type="text" class="form-control" disabled
                                       @if($testc == 0)  style="background-color: rgb(153, 153, 153)" @endif
                                       value="{{strtoupper($eleve->nom) ." " .strtolower($eleve->prenom)}} @if($testc == 0) (Aucune note saisie) @endif">
                            </div>
                            <div id="remarque_{{$counter}}" style="display: none">
                                <div class="container">
                                    <div class="row">
                                        @foreach($matieres as $matiere)
                                            @php($counterc = 0 )
                                            @foreach($eleve->certif_notes as $note)
                                                @if($note->matiere_id == $matiere->id)
                                                    @if($counterc == 0)
                                                        <div class="col-sm">
                                                            <div class="form-group">
                                                                <div>
                                                                    <label>{{$matiere->matiere}}</label>
                                                                    <input name="r_{{$eleve->id}}_{{$matiere->id}}"
                                                                           type="text" class="form-control"
                                                                           maxlength="50" placeholder="Remarque">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @php($counterc++)
                                                    @endif
                                                @endif
                                            @endforeach
                                        @endforeach
                                        <div class="w-100"></div>
                                        <div class="col-sm">
                                            <div class="form-group">
                                                <div>
                                                    <label>Appréciation</label>
                                                    <input name="appr_{{$eleve->id}}"
                                                           type="text" class="form-control"
                                                           maxlength="150" placeholder="Remarque">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                    @endforeach
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer  text-center">
                <a class="btn btn-info text-white" id="btn_selectall" onclick="selectall()">Séléctionner tous</a>
                <button type="submit" name="promotion" value="{{$promotion->id}}" class="btn btn-success">Submit
                </button>
                <a class="btn btn-info text-white" id="btn_unselectall" onclick="unselectall()">Décocher tous</a>
            </div>
        </form>
    </div>
    <script>
        btn_select = document.getElementById("btn_selectall");
        btn_unselect = document.getElementById("btn_unselectall");

        function selectall() {
            var number = <?php echo json_encode($counter);?>;
            for (var i = 0; i < number; i++) {
                if (document.getElementById(i + 1).disabled == false) {
                    document.getElementById(i + 1).checked = true;
                }

            }
        }

        function setview() {
            var number = <?php echo json_encode($counter);?>;
            for (var i = 0; i < number; i++) {
                var n = i + 1;
                if (document.getElementById(i + 1).checked == true) {
                    document.getElementById("remarque_" + n).style.display = "flex";
                } else {
                    document.getElementById("remarque_" + n).style.display = "none";
                }
            }
        }

        function unselectall() {
            var number = <?php echo json_encode($counter);?>;
            for (var i = 0; i < number; i++) {

                document.getElementById(i + 1).checked = false;
            }
        }
    </script>
@endsection


