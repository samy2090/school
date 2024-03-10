<?php

namespace App\Repositories;

use App\Interfaces\StudentRepositoryInterface;
use App\Models\Religion;
use App\Models\Gender;
use App\Models\StdParent;
use App\Models\Nationalitie;
use App\Models\BloodType;
use App\Models\Grade;
use App\Models\Student;


class StudentRepository implements StudentRepositoryInterface {

    public function getStudents(){
        return Student::all();
    }

    public function getBloodType(){
        return BloodType::all();
    }

    public function getStdParent(){
        return StdParent::all();
    }

    public function getNationality(){
        return Nationalitie::all();
    }

    public function getGrade(){
        return Grade::all();
    }

}