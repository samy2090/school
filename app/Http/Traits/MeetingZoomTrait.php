<?php 

namespace App\Http\Traits;

use Carbon\Carbon;
use MacsiDigital\Zoom\Facades\Zoom;


trait MeetingZoomTrait {


    public function createMeeting($request){

        $user = Zoom::user()->first();
        
        $meetingsData = [
            "topic"     => $request->topic,
            "duration"  => $request->duration,
            "password"  => $request->password,
            "start_at"  => $request->start_at,
            "timezone"  => config('zoom.timezone'),

        ];
        $meeting = Zoom::meeting()->make($meetingsData);

        $meeting->settings()->make([
            ### all the settings of zoom meeting ###
            'join_before_host'=> false,
        ]);

        return $user->meetings()->save($meeting);
        return $request;
    }

}
