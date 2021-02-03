@extends('layouts.template')

@section('content')
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Génération bulletin des {{strtoupper($periode->promotion->intitule)}} periode {{$periode->nom}}</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form method="post" action="{{route("bulletin.create")}}">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    @php($counter = 0)
                    @foreach($periode->promotion->eleves as $eleve)
                        @php($counter++)
                        <div class="row">
                            <div class="input-group">
                                <div class="input-group-prepend">
                        <span class="input-group-text">
                          <input id={{$counter}}  name="{{$eleve->id}}" type="checkbox">
                        </span>
                                </div>
                                <input type="text" class="form-control" disabled
                                       value="{{strtoupper($eleve->nom) ." " .strtolower($eleve->prenom) }}">
                            </div>
                        </div>
                        <br>
                    @endforeach
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer  text-center">
                <a class="btn btn-info text-white" id="btn_selectall" onclick="selectall()">Séléctionner tous</a>
                <button type="submit" name="periode" value="{{$periode->id}}" class="btn btn-success">Submit</button>
                <a class="btn btn-info text-white" id="btn_unselectall" onclick="unselectall()">Décocher tous</a>
            </div>
        </form>
    </div>
    <script>
        btn_select = document.getElementById("btn_selectall");
        btn_unselect = document.getElementById("btn_unselectall");

        function selectall() {
            var number = <?php echo json_encode($counter);?>;
            for(var i = 0 ; i < number ; i++){
                document.getElementById(i+1).checked = true;
            }
        }
        function unselectall(){
            var number = <?php echo json_encode($counter);?>;
            for(var i = 0 ; i < number ; i++){
                document.getElementById(i+1).checked = false;
            }
        }
    </script>
@endsection
