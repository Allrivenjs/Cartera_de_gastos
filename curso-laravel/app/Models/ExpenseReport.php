<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class ExpenseReport extends Model
{
    use SoftDeletes;

    protected $table = 'expense_reports';

    //relation one a much
    public function expenses(){

        return $this->hasMany('App\Models\Expense','expenses_report_id', 'id');

    }

}
