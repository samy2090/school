<?php

namespace App\Repositories;

use App\Models\Teacher;
use App\Interfaces\TeacherRepositoryInterface;


class TeacherRepository implements TeacherRepositoryInterface {

    public function getTeachers(){
        return Teacher::all();
    }

}