<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Std_Account extends Model
{
    use HasFactory;
    protected $table    = 'std_accounts';
    protected $guarded  = [];




    public function student (){
        return $this->belongsTo('App\Models\Student','student_id');
    }
}
