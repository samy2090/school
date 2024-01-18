<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParentAttach extends Model
{
    use HasFactory;
    protected $guarded  = [];
    protected $table    = 'parents_atches';
}
