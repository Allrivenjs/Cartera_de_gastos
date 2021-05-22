@extends('layouts.app')
@section('title')
    Expense Reports
@endsection

@section('content')
    <div class="row" >
       <div class="col">
           <h1>Send Email</h1>
       </div>
    </div>

    <div class="row">
        <div class="col">
            @if($errors->any())

                @include('helpers.Alert.Errors')
            @endif
            <form action="/expense_reports/{{$report->id}}/SendEmail" class="form-email" method="POST">
                @csrf

                <button type="submit" class="btn btn-primary mb-2"> Send Email</button>

                <div class="form-floating">
                    <div class="form-floating mb-3">
                        <input type="email" name="email" class="form-control" id="floatingEmail" placeholder="Email" value="{{old('email')}}">
                        <label for="floatingEmail">Email</label>
                    </div>
                </div>
            </form>


        </div>
    </div>

    @section('js')
    @include('helpers.Alert.AlertConfirmSendEmail')
    @include('helpers.Alert.AlertFinal')
    {{--@include('.helpers.welcome.welcome')--}}
    @endsection
@endsection