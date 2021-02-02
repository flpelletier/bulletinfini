@extends('layouts.template')

@section('content')

@include('alert')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">Toutes les matières</h4>
          </div>
          <div class="card-body">
            @if (session('status'))
            <div class="row">
              <div class="col-sm-12">
                <div class="alert alert-success">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">
                      <i class="fas fa-times"></i>
                    </span>
                  </button>
                  <span>{{ session('status') }}</span>
                </div>
              </div>
            </div>
            @endif
            <div>
              <a href="{{route('matieres.create')}}">
                <button style='margin-left:10px;' type="submit" class="btn btn-primary">
                  Ajouter une matière
                </button>
              </a>
              <button style='margin-right:10px; float : right ;' type="submit" class="btn btn-danger delete_all" data-url="{{ url('matiere-deleteselection') }}">
                Supprimer la séléction
              </button>
            </div>
            <br /> <br />
            <div class="table-responsive">
              <table id="table_id" class="table">
                <thead>
                  <tr>
                    <th>id</th>
                    <th>Nom</th>
                    <th>Coefficient</th>
                    <th>Groupe de matière</th>
                    <th>Promotion</th>
                    <th>Professeur</th>
                    <th>Actions</th>
                    <th width="50px"><input type="checkbox" id="master"></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($matieres as $matiere)
                  <tr>
                    <td>{{ $matiere->id }}</td>
                    <td>
                      {{ $matiere->intitule }}
                    </td>
                    <td>
                      {{ $matiere->coefficient }}
                    </td>
                    <td>
                      <!--
                      {{ $matiere->groupe_matiere}}
                      -->
                    </td>
                    <td>{{ $matiere->promotion->intitule }}</td>
                    <td> {{ $matiere->prof->nom }} {{ $matiere->prof->prenom }}</td>
                    <td>
                      <div style="display: inline-flex;">
                        <a rel="tooltip" class="btn btn-linght" href="{{route('matieres.show', $matiere->id)}}" data-original-title="" title="">
                          <i class="fas fa-eye"></i>
                          <div class="ripple-container"></div>
                        </a>
                        <a rel="tooltip" class="btn btn-linght" href="{{route('matieres.edit', $matiere->id)}}" data-original-title="" title="">
                          <i class="fas fa-edit"></i>
                          <div class="ripple-container"></div>
                        </a>
                        <form action="{{route('matieres.destroy', $matiere->id)}}" method="post">
                          @csrf
                          @method('DELETE')
                          <button type="submit" rel="tooltip" class="btn  btn-linght btn-round" onclick="return confirm('Est tu sur de vouloir supprimer cette matiere ?')">
                            <i class="fas fa-times"></i>
                          </button>
                        </form>
                      </div>
                    </td>
                    <td>
                      <input type="checkbox" class="sub_chk" data-id="{{$matiere->id}}">
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection