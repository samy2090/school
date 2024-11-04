<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Grade;
use Illuminate\Http\Request;
use App\Models\OnlineMeeting;
use MacsiDigital\Zoom\Facades\Zoom;
use App\Http\Controllers\Controller;
use App\Http\Traits\MeetingZoomTrait;

class OnlineMeetingController extends Controller
{

    use MeetingZoomTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $grades     = Grade::all();
        $meetings   = OnlineMeeting::all();
        return view ('dashboard.onlinMeeting', compact('meetings','grades'));
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

            $meeting = $this->createMeeting($request);
        OnlineMeeting::create([
            'grade_id'      => $request->grade_id,
            'classroom_id'  => $request->classroom_id,
            'section_id'    => $request->section_id,
            'user_id'       => auth()->user()->id,
            'meeting_id'    => $meeting->id,
            'topic'         => $request->topic,
            'start_at'      => Carbon::createFromFormat('m/d/Y', $request->start_at)->format('Y-m-d H:i:s'), // Convert the date format
            'duration'      => $request->duration,
            'password'      => $meeting->password,
            'start_url'     => $meeting->start_url,
            'join_url'      => $meeting->join_url,
        ]);
        toastr()->success(trans('messages.success'));
            return redirect()->route('online_meetings.index');
        }
        catch(\Exception $e){
            return redirect()->back()->withErrors(['error'=> $e->getMessage()]);
        }
        
    }

    /**
     * Display the specified resource.
     */
    public function show(OnlineMeeting $onlineMeeting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OnlineMeeting $onlineMeeting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, OnlineMeeting $onlineMeeting)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try{
            Zoom::meeting()->find($id)->delete();                       ### delete from zoom  ###
            OnlineMeeting::findOrFail($id)->delete();                   ### delete from database  ###
            toastr()->success('Data has been saved successfully!', 'Congrats', ['timeOut' => 5000]);
            return redirect()->route('online_meetings.index');
            }
            catch(\Exception $e){
                return redirect()->back()->withErrors(['error'=> $e->getMessage()]);
            }
    }
}
