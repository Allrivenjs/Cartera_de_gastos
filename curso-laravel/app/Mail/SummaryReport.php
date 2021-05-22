<?php

namespace App\Mail;



use App\Models\ExpenseReport;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SummaryReport extends Mailable
{
    use Queueable, SerializesModels;

    private $expenseReports;
    private $Total;
    /**
     * Create a new message instance.
     * @param ExpenseReport $expenseReport
     * @return void
     */
    public function __construct(ExpenseReport $expenseReport,$total)
    {
        $this->expenseReports = $expenseReport ;
        $this->Total=$total;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.expenseReport',[
            'report' => $this->expenseReports,
            'Total' => $this->Total
        ]);

    }
}
