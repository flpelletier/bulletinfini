@extends('layouts.template')

@section('content')

@include('alert')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">Tout les groupes</h4>
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
              <a href="{{route('groupes.create')}}">
                <button style='margin-left:10px;' type="submit" class="btn btn-primary">
                  Ajouter un groupe
                </button>
              </a>
              <button style='margin-right:10px; float : right ;' type="submit" class="btn btn-danger delete_all" data-url="{{ url('groupes-deleteselection') }}">
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
                      <div style="display: inline-flex;">
                        <a rel="tooltip" class="btn btn-linght" href="{{route('groupes.show', $matiere->id)}}" data-original-title="" title="">
                          <i class="fas fa-eye"></i>
                          <div class="ripple-container"></div>
                        </a>
                        <a rel="tooltip" class="btn btn-linght" href="{{route('groupes.edit', $matiere->id)}}" data-original-title="" title="">
                          <i class="fas fa-edit"></i>
                          <div class="ripple-container"></div>
                        </a>
                        <form action="{{route('groupes.destroy', $matiere->id)}}" method="post">
                          @csrf
                          @method('DELETE')
                          <button type="submit" rel="tooltip" class="btn  btn-linght btn-round" onclick="return confirm('Est tu sur de vouloir supprimer ce groupe ?')">
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