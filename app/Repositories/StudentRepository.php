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
use App\Models\Image;
use App\Models\Fees;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



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

    public function getFees(){
        return Fees::all();
    }

    public function deleteStudent($id){
        Student::findOrFail($id)->delete();
        toastr()->success('Data has been saved successfully!', 'Congrats', ['timeOut' => 5000]);
        return redirect()->route('students.index');
    }

    public function attachmentDelete($id){
        try{
            Image::findOrFail($id)->delete();
            toastr()->success('Data has been saved successfully!', 'Congrats', ['timeOut' => 5000]);
            return redirect()->route('students.index');
        }
        catch(\Exception $e){
            return redirect()->route('students.index')->withErrors(['error'=> $e->getMessage()]);
        }

    }

    public function studentSave(Request $request){

        DB::beginTransaction();                 ####### for done the insert of both tables together or fail togother #########
        try{
            $student = new Student();
                $student->name              = ['ar'=>$request->arName,'en'=>$request->enName];
                $student->email             = $request->email;
                $student->password          = $request->password;
                $student->gender_id         = $request->gender_id;
                $student->nationalitie_id   = $request->nationalitie_id;
                $student->blood_id          = $request->blood_id;
                $student->Date_Birth        = $request->Date_Birth;
                $student->grade_id          = $request->grade_id;
                $student->classroom_id      = $request->classroom_id;
                $student->section_id        = $request->section_id;
                $student->parent_id         = $request->parent_id;
                $student->academic_year     = $request->academic_year;
            $student->save();

            // insert img
            if($request->hasfile('photos'))
            {
                foreach($request->file('photos') as $file)
                {
                    $name = $file->getClientOriginalName();
                    $file->storeAs('attachments/students/'.$request->enName, $file->getClientOriginalName(),'upload_attachments');

                    // insert in image_table
                    $images= new Image();
                    $images->filename=$name;
                    $images->imageable_id= $student->id;
                    $images->imageable_type = 'App\Models\Student';
                    $images->save();
                }
            }
            DB::commit();  ####### for done the insert of both tables together or fail togother ######### insert the data if sucess
            toastr()->success('Data has been saved successfully!', 'Congrats', ['timeOut' => 5000]);
            return redirect()->route('students.index');
        }
        catch(\Exception $e){
            DB::rollback(); ####### for done the insert of both tables together or fail togother ######### if one sucess and the onther fails the success one will be deleted 
            return redirect()->route('students.index')->withErrors(['error' => $e->getMessage()]);
        }


    }
    public function studentUpdate(Request $request){
        $student = Student::findOrFail($request->id);
            $student->name              = ['ar'=>$request->arName,'en'=>$request->enName];
            $student->email             = $request->email;
            $student->password          = $request->password;
            $student->gender_id         = $request->gender_id;
            $student->nationalitie_id   = $request->nationalitie_id;
            $student->blood_id          = $request->blood_id;
            $student->Date_Birth        = $request->Date_Birth;
            $student->grade_id          = $request->grade_id;
            $student->classroom_id      = $request->classroom_id;
            $student->section_id        = $request->section_id;
            $student->parent_id         = $request->parent_id;
            $student->academic_year     = $request->academic_year;
        $student->save();
        toastr()->success('Data has been saved successfully!', 'Congrats', ['timeOut' => 5000]);
        return redirect()->route('students.index');
        // return $request;

    }

    public function uploadAttachs(Request $request){
        try{
            if($request->hasfile('photos'))
            {
                foreach($request->file('photos') as $file)
                {
                    $name = $file->getClientOriginalName();
                    $file->storeAs('attachments/students/'.$request->enName, $file->getClientOriginalName(),'upload_attachments');
                    $url = 'attachments/students/'.$request->enName.'/'.$name;

                    // return $name;
                    // insert in image_table
                    $images= new Image();
                    $images->filename=$name;
                    $images->imageable_id= $request->id;
                    $images->imageable_type = 'App\Models\Student';
                    $images->url = $url;
                    $images->save();
                    toastr()->success('Data has been saved successfully!', 'Congrats', ['timeOut' => 5000]);
                    return redirect()->route('students.index');
                }
            }

        }
        catch(\Exception $e){
            return redirect()->route('students.index')->withErrors(['error'=>$e->getMessage()]);
        }
    }

}