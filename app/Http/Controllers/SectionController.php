<?php

namespace App\Http\Controllers;

use App\Models\Section;
use App\Models\Grade;
use App\Models\ClassRoom;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $grades = Grade::all();
        return view('dashboard.sections', compact('grades'));
    }

    public function getSection($classroom_id)
    {
        $sections = Section::where("class_id", $classroom_id)->pluck("name_section", "id");
        return $sections;
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
        try{
            $section = new Section();
            $section->name_section = ['en'=> $request->enName ,'ar'=>$request->arName ];
            $section->grade_id     = $request->gradeId;
            $section->class_id     = $request->classId;
            $section->status       = 1;
            $section->save();
            toastr()->success('Data has been saved successfully!', 'Congrats', ['timeOut' => 5000]);
            return redirect()->route('sections.index');
        }
        catch(\Exception $e){
            return redirect()->back()->withErrors(['error'=> $e->getMessage()]);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Section $section)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Section $section)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Section $section)
    {
        try{
            $section = Section::findOrFail($request->id);
            $section->update([
                $section->name_section  = ['ar'=>$request->arName , 'en'=>$request->enName],
                $section->status        = ($request->status == 1 || $request->status == 'on' ? 1 : 0),
                $section->grade_id      = $request->gradeId,
                $section->class_id      = $request->classId,
            ]);
            toastr()->success('Data has been saved successfully!', 'Congrats', ['timeOut' => 5000]);
            return redirect()->route('sections.index');
        }
        catch(\Exception $e){
            return redirect()->back()->withErrors(['error'=> $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        try{
            $section = Section::findOrFail($id)->delete();
            toastr()->success('Data has been saved successfully!', 'Congrats', ['timeOut' => 5000]);
            return redirect()->route('sections.index');
        }
        catch(\Exception $e){
            return redirect()->back()->withErrors(['error'=> $e->getMessage()]);

        }
    }

    public function getClass($Grade_id )
    {
        $classrooms = Classroom::where("grade_id", $Grade_id)->pluck("name", "id");
        return $classrooms;
    }
}
