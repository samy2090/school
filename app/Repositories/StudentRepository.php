<?php

namespace App\Repositories;

use App\Interfaces\StudentRepositoryInterface;


class StudentRepository implements StudentRepositoryInterface {

    public function getStudents(){
        
        return 'test';
    }
}