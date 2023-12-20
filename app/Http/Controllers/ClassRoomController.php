<?php

namespace App\Http\Controllers;

use App\Models\ClassRoom;
use App\Models\Grade;
use Illuminate\Http\Request;

class ClassRoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $classrooms = CLassRoom::all();
        $grades     = Grade::all();
        return view('dashboard.classRooms',compact(['classrooms','grades']));
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
        if (ClassRoom::where('name->ar',$request->arName)->orWhere('name->en',$request->enName)->exists()){
            return redirect()->back()->withErrors('this classroom exists already');
        }
        try{
        $classrooms = new ClassRoom();
        $classrooms->name   = ['ar' => $request->arName , 'en' => $request->enName];
        $classrooms->notes  = $request->notes;
        $classrooms->grade_id  = $request->grade_id;
        $classrooms-> save();
        toastr()->success('Data has been saved successfully!', 'Congrats', ['timeOut' => 5000]);
        return redirect()->route('classrooms.index');
        }
        catch(\Exception $e){
            return redirect()->back()->withErrors(['error'=> $e->getMessage()]);
        }
}

    /**
     * Display the specified resource.
     */
    public function show(ClassRoom $classRoom)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ClassRoom $classRoom)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ClassRoom $classRoom)
    {

        try{
        $classrooms = ClassRoom::findOrFail($request->id);
        $classrooms->update([
            $classrooms->name   = ['ar' => $request->arName , 'en' => $request->enName],
            $classrooms->notes  = $request->notes,
            $classrooms->grade_id  = $request->grade_id,
        ]);
        toastr()->success('Data has been saved successfully!', 'Congrats', ['timeOut' => 5000]);
        return redirect()->route('classrooms.index');
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
        try{
        $classrooms = ClassRoom::findOrFail($request->id)->delete();
        toastr()->success('Data has been saved successfully!', 'Congrats', ['timeOut' => 5000]);
        return redirect()->route('classrooms.index');
        }
        catch(\Exception $e){
            return redirect()->back()->withErrors(['error'=> $e->getMessage()]);
        }

    }
    
    public function deleteAll(Request $request)
    {
        $delete_all_id = explode(",", $request->delete_all_id);

        Classroom::whereIn('id', $delete_all_id)->Delete();
        toastr()->success(trans('messages.Delete'));
        return redirect()->route('classrooms.index');
    }

    public function classroomFilter(Request $request)
    {
        $grades     = Grade::all();
        $classrooms = ClassRoom::select('*')->where('grade_id',$request->grade_id)->get();
        return view('dashboard.classRooms',compact(['classrooms','grades']));
    }

}
