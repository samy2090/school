<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;


class Specialization extends Model
{
    use HasFactory;
    use HasTranslations;

    public $table           = 'specializations';
    public $translatable    = ['name'];

    protected $timestamp    = true ;
    protected $guarded      = [];
}
