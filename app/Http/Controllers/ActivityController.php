<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Member;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    /**
     * MEMBER ACTIVITIES
     */
    public function index(){
        return response()->json(Activity::all());
    }

    /**
     * @param $id Activity ID
     */
    public function getActivityMembers(int $id) {
        $activity = Activity::find($id);
        $activity->members;
        
        return response()->json($activity);
    }

    public function addActivityToMember(Request $request) {

        $member = Member::find($request->member_id);
        $member->activities()->attach($request->activity_id);
        return response()->json(['success' => true, 'status' => 'OK']);
    }

    public function quitActivityFromMember(Request $request) {
        $member = Member::find($request->member_id);
        $member->activities()->detach($request->activity_id);
        return response()->json(['success' => true, 'status' => 'OK']);
    }

    public function store(Request $request) {

        $data = (object)$request->all();
        $status = 200;
        $activity = new Activity();
        $activity->title = $data->title;
        $activity->description = $data->description;

        if($activity->save()) {
            $response = ['success' => true, 'status' => 'OK'];
        } else {
            $response = ['success' => false, 'status' => 'Error'];
            $status = 500;
        }
        return response()->json($response, $status);
    }

    public function update(Request $request, int $id) {
        $activity = Activity::find($id);
        
        $activity->title = $request->title;
        $activity->description = $request->description;
        if($activity->save()) {
            return response()->json(['success' => true, 'message' => 'OK'],200);
        } else {
            throw response()->json(['success' => false, 'message' => 'Error'],500);
        }
    }
}
