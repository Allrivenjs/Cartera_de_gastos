
<div class="row">
    <div class="col">
        <h1>Expense Report {{$report->id}}: {{$report->title}}</h1>
    </div>
</div>
<div class="row">
    <div class="col">
        <h2>Expenses</h2>
        <table class="table">
            <tr>
                <th>#</th>
                <th>Accion:</th>
                <th>Gastado: </th>
                <th>Fecha: </th>


            </tr>
            @foreach($report->expenses as $expense)
                <tr>
                    <th scope="row" >{{$expense->id}}</th>
                    <td> {{$expense->description}}</td>
                    <td> {{$expense->amount}}</td>
                    <td> {{$expense->created_at}}</td>
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