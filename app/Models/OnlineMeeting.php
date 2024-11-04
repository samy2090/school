<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OnlineMeeting extends Model
{
    use HasFactory;

    protected $guarded = [];
    

    public function classroom(){
        return $this->belongsTo('App\Models\ClassRoom','classroom_id');
    }
    public function grade(){
        return $this->belongsTo('App\Models\Grade','grade_id');
    }
    public function section(){
        return $this->belongsTo('App\Models\Section','section_id');
    }
}
