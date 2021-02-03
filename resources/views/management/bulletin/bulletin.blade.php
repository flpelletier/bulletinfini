@extends('layouts.template')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Promotion : {{$promotion->intitule}}</h1>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            @php($counter = 0)
            @foreach($promotion->periodes as $periode)
                <div class="container-fluid">
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title"><i class="fas fa-calendar-alt"></i> {{$periode->nom}} </h3>
                        </div>
                        <div class="card-body">
                            <a href="{{route("bulletin.add" ,$periode->id)}}">
                                <button class="btn btn-success">Générer les bulletins</button>
                            </a>
                            <div class="table-responsive">
                                <table id="table_1{{$counter}}" class="table">
                                    <thead>
                                    <tr>
                                        <th>
                                            <center>
                                                N°
                                            </center>
                                        </th>
                                        <th>
                                            <center>
                                                Eleve
                                            </center>
                                        </th>
                                        <th>
                                            <center>
                                                Bulletin
                                            </center>
                                        </th>
                                        <th>
                                            <center>
                                                Date
                                            </center>
                                        </th>
                                    </tr>
                                    <tbody>
                                    @foreach($promotion->eleves as $eleve)
                                        <tr>
                                            <td>
                                                <center>
                                                    {{ $eleve->id }}
                                                </center>
                                            </td>
                                            <td>
                                                <center>
                                                    {{strtoupper($eleve->nom) ." " .strtolower($eleve->prenom) }}
                                                </center>
                                            </td>
                                            <td>
                                                <center>

                                                </center>
                                            </td>
                                            <td>
                                                <center>

                                                </center>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.form group -->
                        </div>
                        <div class="card-footer">
                            Liste des eleves de la formation {{$promotion->intitule}}
                        </div>
                    </div>
                </div>
                @php($counter++)
            @endforeach
        </div>
    </div>
@endsection
