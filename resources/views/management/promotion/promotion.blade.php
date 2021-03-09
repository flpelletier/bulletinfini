@extends('layouts.template')

@section('content')
@include('alert')
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
                <a class="btn btn-success" href="{{route('periodes.create')}}">
                    <button class=" btn btn-success">Ajouter une Periode</button>
                </a>

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
                                                <a rel="tooltip" class="btn btn-linght" href="{{route('periodes.show', $periode->id)}}" data-original-title="" title="">
                                                    <i class="fas fa-eye"></i>
                                                    <div class="ripple-container"></div>
                                                </a>
                                                <a rel="tooltip" class="btn btn-linght" href="{{route('periodes.edit', $periode->id)}}" data-original-title="" title="">
                                                    <i class="fas fa-edit"></i>
                                                    <div class="ripple-container"></div>
                                                </a>
                                                <form action="{{route('periodes.destroy',$periode->id)}}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" rel="tooltip" class="btn  btn-linght btn-round" onclick="return confirm('Est-tu sur de vouloir supprimer cette période ?')">
                                                        <i class="fas fa-times"></i>
                                                    </button>
                                                </form>
                                            </div>
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
                    Liste des périodes de la formation {{$promotion->intitule}}
                </div>
            </div>
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-user-graduate"></i> Eleves </h3>
                </div>
                <a class="btn btn-primary" href="{{route('eleves.create')}}">
                    <button class="btn btn-primary">Ajouter un Eleve</button>
                </a>

                <div class="card-body">
                    <div class="table-responsive">
                        @if($promotion->eleves->count() == 0)
                        <p>Sélectionnez un fichier Excel (.xlsx) pour importer les données dans la table "élèves".<br><strong>Les colonnes : </strong>nom, prenom, promotion_id</p>

                        <form method="POST" action="{{ route('excel.import') }}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            @method('post')
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="fichier" id="fichier">
                                <label class="custom-file-label" for="fichier">Choisir un fichier</label>

                            </div>
                            <button class="btn btn-primary text-center">Importer</button>

                        </form>

                        @elseif($promotion->eleves->count() != 0)
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
                                                <a rel="tooltip" class="btn btn-linght" href="{{route('eleves.show', $eleve->id)}}" data-original-title="" title="">
                                                    <i class="fas fa-eye"></i>
                                                    <div class="ripple-container"></div>
                                                </a>
                                                <a rel="tooltip" class="btn btn-linght" href="{{route('eleves.edit', $eleve->id)}}" data-original-title="" title="">
                                                    <i class="fas fa-edit"></i>
                                                    <div class="ripple-container"></div>
                                                </a>
                                                <form action="{{route('eleves.destroy',$eleve->id)}}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" rel="tooltip" class="btn  btn-linght btn-round" onclick="return confirm('Est-tu sur de vouloir supprimer cet élève ?')">
                                                        <i class="fas fa-times"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </center>
                                    </td>

                                </tr>
                                @endforeach

                            </tbody>
                            @endif

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
                <a class="btn btn-warning" href="{{route('matieres.create')}}">
                    <button class="btn btn-warning text-white">Ajouter une Matière</button>
                </a>
                <div class="card-body">
                    <div class="table-responsive">
                        @if($promotion->matieres->count() == 0)

                        <a class="btn btn-primary" href="{{route('matieres.addmultiple', $promotion->id)}}">
                            <button class="btn btn-primary">Ajouter toutes les matières</button>
                        </a>
                        @elseif($promotion->matieres->count() != 0)
                        <table id="table_3" class="table">
                            <thead>
                                <tr>

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
                                            Professeur
                                        </center>
                                    </th>
                                    <th>
                                        <center>
                                            Groupe
                                        </center>
                                    </th>
                                    <th width="280px">
                                        <center>
                                            Actions
                                        </center>
                                    </th>
                                </tr>
                            <tbody>
                                @foreach($promotion->matieres as $matiere)
                                <tr>

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
                                            @if(!empty($matiere->groupe_matiere->intitule) )
                                            {{ $matiere->groupe_matiere->intitule }}
                                            @endif
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <div style="display: inline-flex;">
                                                <a rel="tooltip" class="btn btn-linght" href="{{route('matieres.show', $promotion->id)}}" data-original-title="" title="">
                                                    <i class="fas fa-eye"></i>
                                                    <div class="ripple-container"></div>
                                                </a>
                                                <a rel="tooltip" class="btn btn-linght" href="{{route('matieres.edit', $promotion->id)}}" data-original-title="" title="">
                                                    <i class="fas fa-edit"></i>
                                                    <div class="ripple-container"></div>
                                                </a>
                                                <form action="{{route('matieres.destroy', $promotion->id)}}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" rel="tooltip" class="btn  btn-linght btn-round" onclick="return confirm('Est-tu sur de vouloir supprimer cette matiere ?')">
                                                        <i class="fas fa-times"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </center>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @endif
                    </div>
                    <!-- /.form group -->
                </div>
                <div class="card-footer">
                    Liste des matières de la formation {{$promotion->intitule}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection