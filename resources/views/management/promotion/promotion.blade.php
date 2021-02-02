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
            <div class="container-fluid">
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title"><i class="fas fa-calendar-alt"></i> Periodes </h3>
                    </div>
                    <button class="btn btn-success">Ajouter une Periode</button>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="table_1" class="table">
                                <thead>
                                <tr>
                                    <th>
                                        <center>
                                            N°
                                        </center>
                                    </th>
                                    <th>
                                        <center>
                                            Nom
                                        </center>
                                    </th>
                                    <th>
                                        <center>
                                            Début
                                        </center>
                                    </th>
                                    <th>
                                        <center>
                                            Fin
                                        </center>
                                    </th>
                                    <th width="280px">
                                        <center>
                                            Actions
                                        </center>
                                    </th>
                                    <th width="50px"><input type="checkbox" id="master"></th>
                                </tr>
                                <tbody>
                                @foreach($promotion->periodes as $periode)

                                    <tr>
                                        <td>
                                            <center>
                                                {{ $periode->id }}
                                            </center>
                                        </td>
                                        <td>
                                            <center>
                                                {{ $periode->nom }}
                                            </center>
                                        </td>
                                        <td>
                                            <center>
                                                {{ $periode->date_debut }}
                                            </center>
                                        </td>
                                        <td>
                                            <center>
                                                {{ $periode->date_fin }}
                                            </center>
                                        </td>
                                        <td>
                                            <center>
                                                <div style="display: inline-flex;">
                                                    <a rel="tooltip" class="btn btn-linght"
                                                       href="{{route('promotions.show', $periode->id)}}"
                                                       data-original-title="" title="">
                                                        <i class="fas fa-eye"></i>
                                                        <div class="ripple-container"></div>
                                                    </a>
                                                    <a rel="tooltip" class="btn btn-linght"
                                                       href="{{route('promotions.edit', $periode->id)}}"
                                                       data-original-title="" title="">
                                                        <i class="fas fa-edit"></i>
                                                        <div class="ripple-container"></div>
                                                    </a>
                                                    <form action="{{route('promotions.destroy',$periode->id)}}"
                                                          method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" rel="tooltip"
                                                                class="btn  btn-linght btn-round"
                                                                onclick="return confirm('Est-tu sur de vouloir supprimer cette promotion ?')">
                                                            <i class="fas fa-times"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </center>
                                        </td>
                                        <td>
                                            <input type="checkbox" class="sub_chk" data-id="{{$periode->id}}">
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
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title"><i class="fas fa-user-graduate"></i> Eleves </h3>
                    </div>
                    <button class="btn btn-primary">Ajouter un Eleve</button>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="table_2" class="table">
                                <thead>
                                <tr>
                                    <th>
                                        <center>
                                            N°
                                        </center>
                                    </th>
                                    <th>
                                        <center>
                                            Nom
                                        </center>
                                    </th>
                                    <th>
                                        <center>
                                            Prenom
                                        </center>
                                    </th>
                                    <th width="280px">
                                        <center>
                                            Actions
                                        </center>
                                    </th>
                                    <th width="50px"><input type="checkbox" id="master"></th>
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
                                                {{ $eleve->nom }}
                                            </center>
                                        </td>
                                        <td>
                                            <center>
                                                {{ $eleve->prenom }}
                                            </center>
                                        </td>
                                        <td>
                                            <center>
                                                <div style="display: inline-flex;">
                                                    <a rel="tooltip" class="btn btn-linght"
                                                       href="{{route('promotions.show', $eleve->id)}}"
                                                       data-original-title="" title="">
                                                        <i class="fas fa-eye"></i>
                                                        <div class="ripple-container"></div>
                                                    </a>
                                                    <a rel="tooltip" class="btn btn-linght"
                                                       href="{{route('promotions.edit', $eleve->id)}}"
                                                       data-original-title="" title="">
                                                        <i class="fas fa-edit"></i>
                                                        <div class="ripple-container"></div>
                                                    </a>
                                                    <form action="{{route('promotions.destroy',$eleve->id)}}"
                                                          method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" rel="tooltip"
                                                                class="btn  btn-linght btn-round"
                                                                onclick="return confirm('Est-tu sur de vouloir supprimer cette promotion ?')">
                                                            <i class="fas fa-times"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </center>
                                        </td>
                                        <td>
                                            <input type="checkbox" class="sub_chk" data-id="{{$eleve->id}}">
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
                <div class="card card-warning">
                    <div class="card-header">
                        <h3 class="text-white card-title"><i class="fas fa-book"></i>Matières</h3>
                    </div>
                    <button class="btn btn-warning text-white">Ajouter une Matière</button>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="table_3" class="table">
                                <thead>
                                <tr>
                                    <th>
                                        <center>
                                            N°
                                        </center>
                                    </th>
                                    <th>
                                        <center>
                                            Intitulé
                                        </center>
                                    </th>
                                    <th>
                                        <center>
                                            Coefficient
                                        </center>
                                    </th>
                                    <th>
                                        <center>
                                            professeur
                                        </center>
                                    </th>
                                    <th width="280px">
                                        <center>
                                            Actions
                                        </center>
                                    </th>
                                    <th width="50px"><input type="checkbox" id="master"></th>
                                </tr>
                                <tbody>
                                @foreach($promotion->matieres as $matiere)
                                    <tr>
                                        <td>
                                            <center>
                                                {{ $matiere->id }}
                                            </center>
                                        </td>
                                        <td>
                                            <center>
                                                {{ $matiere->intitule }}
                                            </center>
                                        </td>
                                        <td>
                                            <center>
                                                {{ $matiere->coefficient }}
                                            </center>
                                        </td>
                                        <td>
                                            <center>
                                                {{ $matiere->prof->nom }} {{ $matiere->prof->prenom }}
                                            </center>
                                        </td>
                                        <td>
                                            <center>
                                                <div style="display: inline-flex;">
                                                    <a rel="tooltip" class="btn btn-linght"
                                                       href="{{route('promotions.show', $promotion->id)}}"
                                                       data-original-title="" title="">
                                                        <i class="fas fa-eye"></i>
                                                        <div class="ripple-container"></div>
                                                    </a>
                                                    <a rel="tooltip" class="btn btn-linght"
                                                       href="{{route('promotions.edit', $promotion->id)}}"
                                                       data-original-title="" title="">
                                                        <i class="fas fa-edit"></i>
                                                        <div class="ripple-container"></div>
                                                    </a>
                                                    <form action="{{route('promotions.destroy', $promotion->id)}}"
                                                          method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" rel="tooltip"
                                                                class="btn  btn-linght btn-round"
                                                                onclick="return confirm('Est-tu sur de vouloir supprimer cette promotion ?')">
                                                            <i class="fas fa-times"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </center>
                                        </td>
                                        <td>
                                            <input type="checkbox" class="sub_chk" data-id="{{$promotion->id}}">
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.form group -->
                    </div>
                    <div class="card-footer">
                        Liste des matieres de la formation {{$promotion->intitule}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection