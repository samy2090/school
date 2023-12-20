<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class ClassRoom extends Model
{
    use HasFactory;
    use HasTranslations;
    public $translatable = ['name'];
    
    protected $table = 'class_rooms';
    protected $fillable = ['name','id','grade_id','created_at','updated_at','notes'];
    public $timestamps = true;


    public function grade (){
        return $this->belongsTo('app\Models\Grade','grade_id');
    }
    
    public function section(){
        return $this->hasMany('App\Models\Section','class_id');
    }
}
