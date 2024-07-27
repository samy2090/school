<?php

namespace App\Http\Controllers;

use App\Models\Graduation;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Grade;


class GraduationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {  
        $grades     = Grade::all();
        $graduated_stds   = Student::onlyTrashed()->get();
        return view('dashboard.graduation',compact('graduated_stds','grades'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $students    = Student::where('grade_id',$request->grade_id)->where('classroom_id',$request->classroom_id)->where('section_id',$request->section_id)->get();
        
        if($students->count() > 0 ){
            foreach ($students as $student){
                $ids = explode(',',$student->id);
                student::whereIn('id', $ids)->Delete();
            }
            toastr()->success(trans('messages.success'));
            return redirect()->route('graduation.index');
        }

        else{
            return redirect()->back()->with('error_Graduated', __('لاتوجد بيانات في جدول الطلاب'));
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Graduation $graduation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Graduation $graduation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Graduation $graduation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function back_graduation($id)
    {
        Student::onlyTrashed()->where('id', $id)->first()->restore();
        toastr()->success(trans('messages.success'));
        return redirect()->route('graduation.index');
    }

    public function destroy(Graduation $id)
    {
        student::onlyTrashed()->where('id', $id)->first()->forceDelete();
        toastr()->error(trans('messages.Delete'));
        return redirect()->back();
    }
}
