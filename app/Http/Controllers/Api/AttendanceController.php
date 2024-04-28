<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AttendanceController extends Controller
{
    // check-in
    public function checkin(Request $request){

        //validate lat and long
        $request->validate([
            'latitude' => 'required',
            'longitude' => 'required',
        ]);

        //save new attendance
        $attendance = new Attendance;
        $attendance->user_id = $request->user()->id;
        $attendance->date = date('Y-m-d');
        $attendance->time_in = date('H:i:s');
        $attendance->latlng_in = $request->latitude . ',' . $request->longitude;
        $attendance->save();

        return ResponseHelper::sendSuccessResponse('check-in success', $attendance);
    }


    // check-out
    public function checkout(Request $request){

        //validate lat and long
        $request->validate([
            'latitude' => 'required',
            'longitude' => 'required',
        ]);



        $attendance = Attendance::where('user_id', $request->user()->id)->where('date', date('Y-m-d'))->first();

        // check if attendance not found
        if (!$attendance) {
            return ResponseHelper::sendErrorResponse('Please checkin first', [], Response::HTTP_BAD_REQUEST);
        }

        //save new attendance

        $attendance->time_out = date('H:i:s');
        $attendance->latlng_out = $request->latitude . ',' . $request->longitude;
        $attendance->save();

        return ResponseHelper::sendSuccessResponse('check-out success', $attendance);
    }


    // check is checkin
    public function isCheckedin (Request $request){
        // get attendance today
        $attendance = Attendance::where('user_id', $request->user()->id)->where('date', date('Y-m-d'))->first();

        return ResponseHelper::sendSuccessResponse( $attendance ? true : false, $attendance );
    }
}
