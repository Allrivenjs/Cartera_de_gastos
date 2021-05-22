<?php

namespace App\Http\Controllers;


use App\Http\Requests\ExpenseRequest;
use App\Models\Expense;
use App\Models\ExpenseReport;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(ExpenseReport $expenseReport)
    {
        return view('expense.create', [
            'report' => $expenseReport,

        ]);
    }

    /**
     * Store a newly created resource in storage.
     * @param \App\Models\ExpenseReport $expenseReport
     * @param   \App\Http\Requests\ExpenseRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ExpenseRequest $request, ExpenseReport $expenseReport)
    {
        $validate=$request->validated();
        $expense= new Expense();
        $expense->description=$validate['description'];
        $expense->amount=$validate['amount'];
        $expense->expenses_report_id=$expenseReport->id;
        $expense->save();

        return redirect('/expense_reports/'.$expenseReport->id)->with('create','ok');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $report=Expense::findOrFail($id);

        return view('expense.edit',
            compact('report')
        );

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ExpenseRequest $request, $id)
    {
        $validate=$request->validated();

        $expens=Expense::findOrfail($id);

        $expens->description=$validate['description'];
        $expens->amount=$validate['amount'];
        $expens->save();
        return redirect('/expense_reports/'.$expens->expenses_report_id)->with('update','ok');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $expens = Expense::findOrFail($id);
        $expens->forceDelete();
        return redirect('/expense_reports/'.$expens->expenses_report_id)->with('delete','ok');

    }
}
