@extends('layouts.app')
@section('title')
    Expense Reports
@endsection
@section('content')
    <div class="row" >
       <div class="col">
           <h1> Reports: {{ $expenseReport->title }}</h1>
       </div>
    </div>
    <div class="row">
        <div class="col">
            <h3>Details</h3>
            <div class="row">
                <div class="col mb-1">
                    <a class="btn btn-primary" href="/expense_reports/{{$expenseReport->id}}/expenses/create ">Create new expense</a>
                </div>
                <div class="col-10">
                    <a class="btn btn-info" href="/expense_reports/{{$expenseReport->id}}/confirmSendEmail">Send Email</a>
                </div>
            </div>
            <table class="table mt-2">
                <tr>
                    <th>#</th>
                    <th>Accion:</th>
                    <th>Gastado: </th>
                    <th>Fecha: </th>
                    <th>Acciones</th>

                </tr>

                @foreach($expenseReport->expenses as $expense)


                    <tr>
                        <th scope="row" >{{$expense->id}}</th>
                        <td>{{$expense->description}}</td>
                        <td>${{$expense->amount}}</td>
                        <td>{{$expense->created_at}}</td>

                        <td>
                            <div class="btn-group" role="group">
                                <button id="btnGroupDrop1" type="button" class="btn btn-success dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                    Config
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                    <li><a class="dropdown-item" href="/expense_reports/{{$expense->id}}/expenses/edit">EDITAR</a></li>
                                    <form action="/expense_reports/expenses/{{$expense->id}}/delete" class="form-delete" method="GET">
                                        @csrf
                                        <button type="submit" class="dropdown-item"> ELIMINAR </button>
                                    </form>
                                </ul>
                            </div>
                        </td>
                    </tr>
                @endforeach
                <tr>
                   <th scope="row">Total</th>
                    <td></td>
                    <td colspan="2" class="text-left">${{$Total}}</td>
                </tr>

            </table>
        </div>
    </div>
        <div class="row">
            <div class="col">
                <a class="btn btn-secondary" href="/expense_reports/">Back</a>
            </div>
        </div>
@endsection


@section('js')
@include('helpers.Alert.AlertFinal')
@endsection