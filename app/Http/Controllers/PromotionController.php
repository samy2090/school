<?php

namespace App\Http\Controllers;

use App\Models\Promotion;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Grade;
use App\Models\Student;

class PromotionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {  
        $grades = Grade::all();
        return view('dashboard.student.promotion', compact('grades'));
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
        $students = Student::where('grade_id',$request->from_grade)
        ->where('classroom_id',$request->from_class)
        ->where('section_id',$request->from_section)->get();
        if($students->count() < 1){
            toastr()->error('Data has not been saved successfully!', 'fail', ['timeOut' => 5000]);
            return redirect()->back();
        }

        else{
            foreach($students as $student){
                $student->update([
                    'grade_id' => $request->to_grade,
                    'classroom_id' => $request->to_class,
                    'section_id' => $request->to_section,
                ]);

                Promotion::updateOrCreate([
                    'std_id'          => $student->id,
                    'from_grade'      => $request->from_grade,
                    'from_class'      => $request->from_class,
                    'from_section'    => $request->from_section,
                    'to_grade'        => $request->to_grade,
                    'to_class'        => $request->to_class,
                    'to_section'      => $request->to_section,
                ]);
                
            }
            toastr()->success('Data has been saved successfully!', 'Congrats', ['timeOut' => 5000]);
                return redirect()->route('promotion.index');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Promotion $promotion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Promotion $promotion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Promotion $promotion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Promotion $promotion)
    {
        //
    }
}
