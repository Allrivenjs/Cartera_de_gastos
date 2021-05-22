@extends('layouts.app')
@section('title')
    Expense Reports
@endsection
@section('content')
    <div class="row" >
       <div class="col">
           <h1>Edit Reports {{ $report->id }}</h1>
       </div>
    </div>
    <div class="row">
        <div class="col">
            <form action="/expense_reports/{{ $report->id }}/expenses" method="POST" class="form-confirm">
                @csrf
                @method('put')

                <button class="btn btn-primary mb-2" type="submit">Update now</button>
                <div class="form-floating">
                    <div class="form-floating mb-3">
                        <input type="text" name="description" class="form-control" id="floatingDescription" placeholder="Description" value="{{ $report->description}}">
                        <label for="floatingDescription">Description</label>
                    </div>
                    <div class="input-group mb-3 w-50 ">
                        <span class="input-group-text">$</span>
                        <input type="text" name="amount" class="form-control" aria-label="Amount (to the nearest dollar)" value="{{$report->amount}}">
                        <span class="input-group-text">.00</span>
                    </div>
                </div>

            </form>
    </div>
        <div class="row">
            <div class="col">
                <a class="btn btn-secondary" href="/expense_reports/{{$report->expenses_report_id}}">Back</a>
            </div>
        </div>
@endsection

@section('js')
@include('helpers.Alert.AlertConfirm')
@include('helpers.Alert.AlertFinal')
@endsection