<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\ClassRoom;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $grades = Grade::all();
        return view('dashboard.grades', compact('grades'));
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
        if (Grade::where('name->ar',$request->arName)->orWhere('name->en',$request->enName)->exists()){
            return redirect()->back()->withErrors('this grade exists already');
        }
        try{
            $Grade = new Grade();
            $Grade->name  = ['en' => $request->enName , 'ar' => $request->arName];
            $Grade->notes = $request->notes;
            $Grade-> save();
            toastr()->success('Data has been saved successfully!', 'Congrats', ['timeOut' => 5000]);
            return redirect()->route('grades.index');
        }
        catch(\Exception $e){
            return redirect()->back()->withErrors(['error'=> $e->getMessage()]);
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(Grade $grade)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Grade $grade)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Grade $grade)
    {
        try{
            $Grade = Grade::findOrFail($request->id);
            $Grade->update([
                $Grade->name  = ['ar'=>$request->arName , 'en'=>$request->enName],
                $Grade->notes = $request->notes, 
            ]);
            toastr()->success('Data has been saved successfully!', 'Congrats', ['timeOut' => 5000]);
            return redirect()->route('grades.index');
        }
        catch(\Exception $e){
            return redirect()->back()->withErrors(['error'=> $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $check_stage = ClassRoom::where('grade_id',$request->id)->pluck('grade_id');
        if($check_stage->count() == 0){
            try{
                $Grade = Grade::findOrFail($request->id)->delete();
                toastr()->success('Data has been saved successfully!', 'Congrats', ['timeOut' => 5000]);
                return redirect()->route('grades.index');
            }
            catch(\Exception $e){
                return redirect()->back()->withErrors(['error'=> $e->getMessage()]);
            }
        }

        else{
            toastr()->error('this grade have a classroom!', 'error', ['timeOut' => 5000]);
            return redirect()->route('grades.index');
        }


    }
}
