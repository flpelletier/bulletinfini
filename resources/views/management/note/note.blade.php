@extends('layouts.template')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Gestion des notes {{$promotion->intitule}}</h3>
                        </div>
                        <div class="card-body" style="overflow: auto">
                            <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                <div class="row">
                                    <div class="col-sm-12 col-md-6"></div>
                                    <div class="col-sm-12 col-md-6"></div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="example2"
                                               class="table table-bordered table-hover dataTable dtr-inline"
                                               role="grid" aria-describedby="example2_info">
                                            <thead>
                                            <tr role="row">
                                                <th class="sorting_asc" tabindex="0" aria-controls="example2"
                                                    rowspan="1"
                                                    colspan="1" aria-sort="ascending"
                                                    aria-label="Rendering engine: activate to sort column descending">
                                                    Matière
                                                </th>
                                                @foreach($promotion->eleves as $eleve)
                                                    <th class="sorting" tabindex="0" aria-controls="example2"
                                                        rowspan="1"
                                                        colspan="1"
                                                        aria-label="Browser: activate to sort column ascending">
                                                        {{strtoupper($eleve->nom) ." " .strtolower($eleve->prenom) }}
                                                    </th>
                                                @endforeach
                                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                                    colspan="1"
                                                    aria-label="Platform(s): activate to sort column ascending">
                                                    Action
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($promotion->matieres as $matiere)
                                                <tr class="odd">
                                                    <td class="dtr-control sorting_1"
                                                        tabindex="0">{{$matiere->intitule}}</td>
                                                    @foreach($promotion->eleves as $eleve)
                                                        <td class="dtr-control sorting_1"
                                                            tabindex="0">
                                                            @foreach($eleve->notes as $note)
                                                                @if($note->matiere == $matiere)
                                                                    {{$note->note}}
                                                                @endif
                                                            @endforeach
                                                        </td>
                                                    @endforeach
                                                    <td class="dtr-control sorting_1"
                                                        tabindex="0">
                                                        <center>
                                                            <div style="display: inline-flex;">

                                                                <a rel="tooltip" class="btn btn-linght"
                                                                   href="{{route('note.add', $matiere->id)}}"
                                                                   data-original-title="" title="">
                                                                    <span style="color:#4ae04a"><i
                                                                            class="fas fa-plus-square"></i></span>
                                                                    <div class="ripple-container"></div>
                                                                </a>
                                                                <a rel="tooltip" class="btn btn-linght"
                                                                   href="{{route('note.edit', $matiere->id)}}"
                                                                   data-original-title="" title="">
                                                                   <span style="color: red"><i
                                                                           class="fas fa-edit"></i></span>
                                                                    <div class="ripple-container"></div>
                                                                </a>
                                                                <a rel="tooltip" class="btn btn-linght"
                                                                   href="{{route('note_matiere.show', $matiere->id)}}"
                                                                   data-original-title="" title="">
                                                                    <i class="fas fa-eye"></i>
                                                                    <div class="ripple-container"></div>
                                                                </a>
                                                            </div>
                                                        </center>
                                                    </td>
                                                </tr>
                                            @endforeach

                                            </tbody>
                                            <tfoot>
                                            <tr>
                                                <th rowspan="1" colspan="1">Matière</th>
                                                @foreach($promotion->eleves as $eleve)
                                                    <th rowspan="1"
                                                        colspan="1"> {{strtoupper($eleve->nom) ." " .strtolower($eleve->prenom) }}</th>
                                                @endforeach
                                                <th rowspan="1" colspan="1">Action</th>
                                            </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Gestion des notes de certification {{$promotion->intitule}}</h3>
                        </div>
                        <div class="card-body" style="overflow: auto">
                            <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                <div class="row">
                                    <div class="col-sm-12 col-md-6"></div>
                                    <div class="col-sm-12 col-md-6"></div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="example2"
                                               class="table table-bordered table-hover dataTable dtr-inline"
                                               role="grid" aria-describedby="example2_info">
                                            <thead>
                                            <tr role="row">
                                                <th class="sorting_asc" tabindex="0" aria-controls="example2"
                                                    rowspan="1"
                                                    colspan="1" aria-sort="ascending"
                                                    aria-label="Rendering engine: activate to sort column descending">
                                                    Matière
                                                </th>
                                                @foreach($promotion->eleves as $eleve)
                                                    <th class="sorting" tabindex="0" aria-controls="example2"
                                                        rowspan="1"
                                                        colspan="1"
                                                        aria-label="Browser: activate to sort column ascending">
                                                        {{strtoupper($eleve->nom) ." " .strtolower($eleve->prenom) }}
                                                    </th>
                                                @endforeach
                                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                                    colspan="1"
                                                    aria-label="Platform(s): activate to sort column ascending">
                                                    Action
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            @foreach($certif_matiere as $matiere)
                                                <tr class="odd">
                                                    <td class="dtr-control sorting_1"
                                                        tabindex="0">{{$matiere->matiere}}</td>
                                                    @foreach($promotion->eleves as $eleve)
                                                        <td class="dtr-control sorting_1"
                                                            tabindex="0">
                                                            @foreach($eleve->certif_notes as $note)
                                                                @if($note->matiere_id == $matiere->id)
                                                                    {{$note->note}}
                                                                @endif
                                                            @endforeach
                                                        </td>
                                                    @endforeach
                                                    <td class="dtr-control sorting_1"
                                                        tabindex="0">
                                                        <center>
                                                            <div style="display: inline-flex;">
                                                                <form method="post"
                                                                      action="{{route('certif-note.add', $matiere->id)}}">
                                                                    @csrf
                                                                    <input type="hidden" value="{{$promotion->id}}" name="promo"/>
                                                                    <button type="submit" class="btn btn-linght"
                                                                            data-original-title="" title="">
                                                                    <span style="color:#4ae04a"><i
                                                                            class="fas fa-plus-square"></i></span>
                                                                        <div class="ripple-container"></div>
                                                                    </button>
                                                                </form>
                                                                <a rel="tooltip" class="btn btn-linght"
                                                                   href="{{route('certif-note.edit', $matiere->id)}}"
                                                                   data-original-title="" title="">
                                                                   <span style="color: red"><i
                                                                           class="fas fa-edit"></i></span>
                                                                    <div class="ripple-container"></div>
                                                                </a>
                                                                <a rel="tooltip" class="btn btn-linght"
                                                                   href="{{route('certif-note_matiere.show', $matiere->id)}}"
                                                                   data-original-title="" title="">
                                                                    <i class="fas fa-eye"></i>
                                                                    <div class="ripple-container"></div>
                                                                </a>
                                                            </div>
                                                        </center>
                                                    </td>
                                                </tr>
                                            @endforeach

                                            </tbody>
                                            <tfoot>
                                            <tr>
                                                <th rowspan="1" colspan="1">Matière</th>
                                                @foreach($promotion->eleves as $eleve)
                                                    <th rowspan="1"
                                                        colspan="1"> {{strtoupper($eleve->nom) ." " .strtolower($eleve->prenom) }}</th>
                                                @endforeach
                                                <th rowspan="1" colspan="1">Action</th>
                                            </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
