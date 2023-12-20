<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Grade extends Model
{
    use HasFactory;

    use HasTranslations;
    public $translatable = ['name'];

    protected $table = 'Grades';
    protected $fillable = ['name','notes','id','created_at','updated_at'];
    public $timestamps = true;


    public function classRoom (){
        return $this->hasMany('App\Models\ClassRoom','grade_id');
    }
}
