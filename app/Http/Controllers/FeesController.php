<?php

namespace App\Http\Controllers;

use App\Models\Fees;
use App\Models\Grade;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class FeesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $grades     = Grade::all();
        $fees       = Fees::all();
        return view('dashboard.fees',compact('fees','grades'));
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
        $validated = $request->validate([
            'arTitle' => 'required',
            'enTitle' => 'required',
            'amount' => 'required',
            'year' => 'required',
            'classroom_id' => 'required |unique:fees,class_id',
        ]);

        try{
        $fees   = new fees();
        $fees->title        = json_encode(['ar'=>$request->arTitle,'en'=>$request->enTitle]);
        $fees->amount       = $request->amount;
        $fees->grade_id     = $request->grade_id;
        $fees->class_id     = $request->classroom_id;
        $fees->year         = $request->year;
        $fees-> save();
        toastr()->success('Data has been saved successfully!', 'Congrats', ['timeOut' => 5000]);
        return redirect()->route('grades.index');
        }
        catch(\Exception $e){
            return redirect()->back()->withErrors(['errors'=>$e->getMessage()]);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Fees $fees)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Fees $fees)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Fees $fees)
    {
        $validated = $request->validate([
            'arTitle' => 'required',
            'enTitle' => 'required',
            'amount' => 'required',
            'year' => 'required',
            'classroom_id' => 'required |unique:fees,class_id',
        ]);

        try{
        $fees   = Fees::findOrFail($request->id);
        $fees->update([
        $fees->title        = json_encode(['ar'=>$request->arTitle,'en'=>$request->enTitle]),
        $fees->amount       = $request->amount,
        $fees->grade_id     = $request->grade_id,
        $fees->class_id     = $request->classroom_id,
        $fees->year         = $request->year,
        ]);
        toastr()->success('Data has been saved successfully!', 'Congrats', ['timeOut' => 5000]);
        return redirect()->route('grades.index');
        }
        catch(\Exception $e){
            return redirect()->back()->withErrors(['errors'=>$e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Fees::findOrfail($id)->delete();
    }
}
