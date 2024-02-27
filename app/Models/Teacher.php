<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;


class Teacher extends Model
{
    use HasFactory;
    use HasTranslations;
    public $translatable = ['name'];

    protected $guarded = [];
    public $timestamps = true;

    public function specialization(){
        return $this->belongsTo('App\Models\Specialization','specialization_id');
    }

}
