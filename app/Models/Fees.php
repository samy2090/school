<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;


class Fees extends Model
{
    use HasFactory;
    use HasTranslations;

    public $translatable    = ['title'];
    protected $guarded      = [];


    public function grade(){
        return $this->hasOne('App\Models\Grade','id');
    }
    public function classroom(){
        return $this->hasOne('App\Models\Classroom','id');
    }
    public function invoices()
    {
        return $this->hasMany(FeesInvoices::class);
    }
}
