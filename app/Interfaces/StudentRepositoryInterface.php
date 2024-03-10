<?php

namespace App\Interfaces;

interface StudentRepositoryInterface {

    public function getStudents();
    
    public function getBloodType();
    
    public function getStdParent();

    public function getNationality();

    public function getGrade();

}