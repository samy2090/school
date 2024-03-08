<?php

namespace App\Repositories;

use App\Models\Teacher;
use App\Models\Specialization;
use App\Models\Gender;
use App\Interfaces\TeacherRepositoryInterface;


class TeacherRepository implements TeacherRepositoryInterface {

    public function getTeachers(){
        $teachers           = Teacher::all();
        $specializations    = $this->getSpecializations();
        $genders            = $this->getGenders();
        return view('dashboard.teacher.teacherIndex',compact('teachers','specializations','genders'));
    }

    public function getSpecializations(){
        return Specialization::all();
    }

    public function getGenders(){
        return Gender::all();
    }

    public function storeTeacher($request){
        try{
            
            $teacher = new Teacher();
            $teacher->email                 = $request['email']; 
            $teacher->password              = $request['password'];
            $teacher->password              = $request['password'];
            $teacher->name                  = ['ar'=>$request['arName'],'en'=>$request['enName']];
            $teacher->specialization_id     = $request['specialization'];
            $teacher->gender_id             = $request['gender'];
            $teacher->joiningDate           = $request['joiningDate'];
            $teacher->address               = $request['address'];
            $teacher->save();
            // return var_dump($request['joiningDate']);
            toastr()->success('Data has been saved successfully!', 'Congrats', ['timeOut' => 5000]);
            return redirect()->route('teachers.index');
        }
        catch(\Exception $e){
            return redirect()->back()->withErrors(['error'=> $e->getMessage()]);
        }
    }

    public function updateTeacher($request){
        try{

            $teacher = Teacher::findOrFail($request->id);
            
                $teacher->email                 = $request['email'];
                $teacher->password              = $request['password'];
                $teacher->password              = $request['password'];
                $teacher->name                  = ['ar'=>$request['arName'],'en'=>$request['enName']];
                $teacher->specialization_id     = $request['specialization'];
                $teacher->gender_id             = $request['gender'];
                $teacher->joiningDate           = $request['joiningDate'];
                $teacher->address               = $request['address'];
                $teacher->save();
                toastr()->success('Data has been saved successfully!', 'Congrats', ['timeOut' => 5000]);
                return redirect()->route('teachers.index');
        }
        catch(\Exception $e){
            return redirect()->back()->withErrors(['error'=> $e->getMessage()]);
        }
    }

}