<?php

namespace App\Interfaces;

interface TeacherRepositoryInterface {

    public function getTeachers();
    public function getSpecializations();
    public function getGenders();
    public function storeTeacher($request);

}
