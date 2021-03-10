@extends('layouts.template')

@section('content')

@include('alert')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">Toutes les notes pour la certification</h4>
                    </div>
                    <div class="card-body">
                        @if (session('status'))
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="alert alert-success">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">
                                            <i class="now-ui-icons ui-1_simple-remove"></i>
                                        </span>
                                    </button>
                                    <span>{{ session('status') }}</span>
                                </div>
                            </div>
                        </div>
                        @endif
                        <div>
                            <a href="{{route('notescertification.create')}}">
                                <button style='margin-left:10px;' type="submit" class="btn btn-primary">
                                    Ajouter une note
                                </button>
                            </a>

                            <button style='margin-right:10px; float : right ;' type="submit" class="btn btn-danger delete_all" data-url="{{ url('notescertification-deleteselection') }}">
                                Supprimer la séléction
                            </button>
                        </div>
                        <br /> <br />
                        <div class="table-responsive">
                            <table id="table_id" class="table">
                                <thead>
                                    <tr>
                                        <th>
                                            <center>
                                                N°
                                            </center>
                                        </th>
                                        <th>
                                            <center>
                                                Matière
                                            </center>
                                        </th>
                                        <th>
                                            <center>
                                                Description
                                            </center>
                                        </th>
                                        <th>
                                            <center>
                                                Note
                                            </center>
                                        </th>
                                        <th>
                                            <center>
                                                Coefficient
                                            </center>
                                        </th>
                                        <th>
                                            <center>
                                                Elève
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
                                    @foreach ($notes as $note)
                                    <tr>
                                        <td>
                                            <center>
                                                {{ $note->id }}
                                            </center>
                                        </td>
                                        <td>
                                            {{ $note->matiere_certif->matiere }}
                                        </td>
                                        <td>
                                            {{ $note->descritpion }}
                                        </td>
                                        <td>
                                            {{ $note->note }}
                                        </td>
                                        <td>
                                            {{ $note->coefficient }}
                                        </td>
                                        <td>
                                            {{ $note->eleve->nom }} {{ $note->eleve->prenom }}
                                        </td>
                                        <td>
                                            <center>
                                                <div style="display: inline-flex;">
                                                    <a rel="tooltip" class="btn btn-linght" href="{{route('notescertification.show', $note->id)}}" data-original-title="" title="">
                                                        <i class="fas fa-eye"></i>
                                                        <div class="ripple-container"></div>
                                                    </a>
                                                    <a rel="tooltip" class="btn btn-linght" href="{{route('notescertification.edit', $note->id)}}" data-original-title="" title="">
                                                        <i class="fas fa-edit"></i>
                                                        <div class="ripple-container"></div>
                                                    </a>
                                                    <form action="{{route('notescertification.destroy', $note->id)}}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" rel="tooltip" class="btn  btn-linght btn-round" onclick="return confirm('Est-tu sur de vouloir supprimer cette note ?')">
                                                            <i class="fas fa-times"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </center>
                                        </td>
                                        <td>
                                            <input type="checkbox" class="sub_chk" data-id="{{$note->id}}">
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