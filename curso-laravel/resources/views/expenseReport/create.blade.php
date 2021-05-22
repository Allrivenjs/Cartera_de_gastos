@extends('layouts.app')
@section('title')
    Expense Reports
@endsection
@section('content')
    <div class="row" >
       <div class="col">
           <h1>New Reports</h1>
       </div>
    </div>
    <div class="row">
        <div class="col">
            @if($errors->any())

                @include('helpers.Alert.Errors')
            @endif

            <form action="/expense_reports" method="POST">
                @csrf
                <button class="btn btn-primary mb-2" type="submit">Create now</button>
                <div class="form-floating">
                    <div class="form-floating mb-3">
                        <input type="text" name="title" class="form-control" id="floatingtitle" placeholder="Title" value="{{old('title')}}">
                        <label for="floatingtitle">TITLE</label>
                    </div>
                </div>
            </form>
    </div>
        <div class="row">
            <div class="col">
                <a class="btn btn-secondary" href="/expense_reports">Back</a>
            </div>
        </div>
@endsection

@section('js')
    @include('helpers.Alert.AlertFinal')
@endsection