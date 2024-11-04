<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;
    protected $table = 'attendances';
    protected $fillable = ['student_id', 'attendance_status', 'attendance_date', 'teacher_id'];

    public function student(){
        return $this->belongsTo(Student::class);
    }
}
