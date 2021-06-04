<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Expense extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $table = 'expenses';
    //relation one to much (inve)
    public function expenseReport(){
        return $this->belongsTo('App\Models\ExpenseReport','expenses_report_id', 'id');
    }
}
