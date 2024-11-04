<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Grade;
use App\Models\ClassRoom;
use App\Models\Section;
use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $grades = Grade::all();
        $classrooms = ClassRoom::all();
        return view('dashboard.attendance',compact('grades','classrooms'));
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
    try {
        
        $attendances = $request->attendance;
        foreach ( $attendances as $student_id => $attendance_status) {
            $attendance = new Attendance();
            $attendance->student_id = $student_id; // Use actual student ID
            $attendance->attendance_status = $attendance_status;
            $attendance->attendance_date = date('Y-m-d');
            $attendance->teacher_id =1; // Assuming teacher is authenticated
            $attendance->save();
        }

        toastr()->success('Data has been saved successfully!', 'Congrats', ['timeOut' => 5000]);
        return redirect()->back();
    } catch (\Exception $e) {
        return redirect()->back()->withErrors(['error' => 'An error occurred while saving attendance data.']);
    }
}

    /**
     * Display the specified resource.
     */
    public function show(Attendance $attendance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($section_id)
    {
        $section_stds = Student::where('section_id',$section_id)->get();
        return view ('dashboard.attendance-edit',compact('section_stds'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Attendance $attendance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Attendance $attendance)
    {
        //
    }
}
