<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;


class Gender extends Model
{
    use HasFactory;
    use HasTranslations;
    
    public $table        = 'genders';
    public $translatable = ['name']; 

    protected $timestamps   = ture;
    protected $guarded      = [];
}
