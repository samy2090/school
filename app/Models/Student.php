<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Relations\MorphMany;



class Student extends Model
{
    use HasFactory;
    use HasTranslations;
    public $translatable = ['name'];

    protected $guarded = [];
    public $timestamps = true;

    public function section (){
        return $this->belongsTo('App\Models\Section','section_id');
    }

    public function gender (){
        return $this->belongsTo('App\Models\Gender','gender_id');
    }

    public function nationalitie (){
        return $this->belongsTo('App\Models\Nationalitie','nationalitie_id');
    }

    public function blood (){
        return $this->belongsTo('App\Models\BloodType','blood_id');
    }

    public function grade (){
        return $this->belongsTo('App\Models\Grade','grade_id');
    }

    public function classroom (){
        return $this->belongsTo('App\Models\ClassRoom','classroom_id');
    }

    public function stdParent (){
        return $this->belongsTo('App\Models\StdParent','parent_id');
    }



    public function image(): MorphMany
    {
        return $this->morphMany(Image::class, 'imageable');
    }

}
