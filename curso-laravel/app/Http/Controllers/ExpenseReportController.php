<?php

namespace App\Http\Controllers;
use App\Mail\SummaryReport;
use App\Models\Expense;
use App\Models\ExpenseReport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class ExpenseReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $expenseReport= ExpenseReport::withTrashed()->get();
        return view('expenseReport.index',
            compact(['expenseReport',])
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('expenseReport.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $valiData=$request->validate([
           'title'=>'required | min:3 '
        ]);
        $report = new ExpenseReport();
        $report->title =$valiData['title'];
        $report->save();
        return redirect('/expense_reports')->with('create','ok');
    }

    /**
     * Display the specified resource.
     *
     * @param  ExpenseReport $expenseReport
     * @return \Illuminate\Http\Response
     */

    public function show(ExpenseReport $expenseReport)
    {
        $Total=0;
        foreach ($expenseReport->expenses as $expense){
            $Total= $Total + $expense->amount;
        }
        return view('expenseReport.show',[
                'expenseReport'=>$expenseReport,
                'Total'=> $Total
                ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $report = ExpenseReport::findOrFail($id);
        return view('expenseReport.edit',
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
    public function update(Request $request, $id)
    {
        $valiData=$request->validate([
            'title'=>'required | min:3 '
        ]);
        $report = ExpenseReport::findOrFail($id);
        $report->title = $valiData['title'];
        $report->save();
        return redirect('/expense_reports')->with('update','ok');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $report = ExpenseReport::findOrFail($id);
        $report->delete();
        return redirect('/expense_reports')->with('delete','ok');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id){
        ExpenseReport::withTrashed()->find($id)->restore();
        return redirect('/expense_reports')->with('restore','ok');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function confirmDelete($id){

        if($report = ExpenseReport::findOrFail($id)){
            DB::table('expenses')->where('expenses_report_id', $id)->delete();
            $report->forceDelete();
        }
        return redirect('/expense_reports')->with('delete','ok');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function confirmSendEmail($id){
        $report = ExpenseReport::findOrFail($id);
        return view('expenseReport.SendEmail',[
            'report' => $report
            ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     * @param  \Illuminate\Http\Request  $request
     */
    public function SendEmail(Request $request,$id){
        $report = ExpenseReport::findOrFail($id);
        $Total=0;
        foreach ($report->expenses as $expense){
            $Total= $Total + $expense->amount;
        }
        Mail::to($request->get('email'))->send(new SummaryReport($report,$Total));
        return redirect('/expense_reports/'.$id)->with('SendEmail','ok');
    }
}
