<?php

namespace App\Interfaces;

use Illuminate\Http\Request;


interface StudentRepositoryInterface {

    public function getStudents();
    
    public function getBloodType();
    
    public function getStdParent();

    public function getNationality();

    public function getGrade();

    public function studentSave(Request $request);

    public function studentUpdate(Request $request);
    
    public function uploadAttachs(Request $request);

    public function attachmentDelete($id);

    public function deleteStudent($id);

}