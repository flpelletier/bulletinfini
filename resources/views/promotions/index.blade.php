@extends('layouts.template')

@section('content')

@include('alert')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">Toutes les promotions</h4>
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
                            <a href="{{route('promotions.create')}}">
                                <button style='margin-left:10px;' type="submit" class="btn btn-primary">
                                    Ajouter une promotion
                                </button>
                            </a>

                            <button style='margin-right:10px; float : right ;' type="submit" class="btn btn-danger delete_all" data-url="{{ url('promotions-deleteselection') }}">
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
                                                Intitulé
                                            </center>
                                        </th>
                                        <th>
                                            <center>
                                                Année
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

                                    @foreach ($promotions as $promotion)
                                    <tr>
                                        <td>
                                            <center>
                                                {{ $promotion->id }}
                                            </center>
                                        </td>
                                        <td>
                                            <center>
                                                {{ $promotion->intitule }}
                                            </center>
                                        </td>
                                        <td>
                                            <center>
                                                {{ $promotion->annee }}
                                            </center>
                                        </td>
                                        <td>
                                            <center>
                                                <div style="display: inline-flex;">
                                                    <a rel="tooltip" class="btn btn-linght" href="{{route('promotions.show', $promotion->id)}}" data-original-title="" title="">
                                                        <i class="fas fa-eye"></i>
                                                        <div class="ripple-container"></div>
                                                    </a>
                                                    <a rel="tooltip" class="btn btn-linght" href="{{route('promotions.edit', $promotion->id)}}" data-original-title="" title="">
                                                        <i class="fas fa-edit"></i>
                                                        <div class="ripple-container"></div>
                                                    </a>
                                                    <form action="{{route('promotions.destroy', $promotion->id)}}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" rel="tooltip" class="btn  btn-linght btn-round" onclick="return confirm('Est-tu sur de vouloir supprimer cette promotion ?')">
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection