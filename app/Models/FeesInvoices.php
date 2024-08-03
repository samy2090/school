<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeesInvoices extends Model
{
    use HasFactory;
    protected $table = 'fees_invoices';
    protected $guarded = [];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function fee()
    {
        return $this->belongsTo(Fees::class);
    }
}
