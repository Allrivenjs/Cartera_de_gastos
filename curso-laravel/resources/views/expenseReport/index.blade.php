@extends('layouts.app')
@section('title')
    Expense Reports
@endsection

@section('content')
    <div class="row" >
       <div class="col">
           <h1>Reports</h1>
       </div>
    </div>
    <div class="row">
        <div class="col">
            <a class="btn btn-primary" href="/expense_reports/create">Create new report</a>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <table class="table mt-2" style="font-size: 30px;">
                @foreach($expenseReport as $expenseReports)
                    <tr>
                        <td>
                            @if($expenseReports->deleted_at!=null)
                                <s><a class="dropdown-item" href="/expense_reports/{{$expenseReports->id}}">{{$expenseReports->title}}</a></s>
                            @else
                                <a class="dropdown-item" href="/expense_reports/{{$expenseReports->id}}">{{$expenseReports->title}}</a>
                            @endif
                        </td>
                        <td>
                            <div class="btn-group" role="group">
                                <button id="btnGroupDrop1" type="button" class="btn btn-success dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                    Config
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                    <li><a class="dropdown-item" href="/expense_reports/{{$expenseReports->id}}/edit">EDITAR</a></li>
                                    @if($expenseReports->deleted_at==null)<li><a class="dropdown-item" href="/expense_reports/{{$expenseReports->id}}/delete">ELIMINAR</a></li> @endif
                                    <form action="/expense_reports/{{$expenseReports->id}}/confirmDelete" class="form-delete" method="GET">
                                        @csrf
                                        <button type="submit" class="dropdown-item"> ELIMINAR PERMANENTE</button>
                                    </form>
                                  @if($expenseReports->deleted_at!=null)  <li><a class="dropdown-item" href="/expense_reports/{{$expenseReports->id}}/restore">RECUPERAR</a></li> @endif
                                </ul>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>

    @section('js')
    @include('helpers.Alert.AlertFinal')
    {{--@include('.helpers.welcome.welcome')--}}
    @endsection
@endsection