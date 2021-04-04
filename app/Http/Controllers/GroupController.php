<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{

    public function index() {
        $groups = Group::all();
        $groups = $groups->count() > 0 ?  $groups : [];
        return response()->json($groups);
    }

    public function show(int $id) {
        $group = Group::find($id);
        $group->members;
        return response()->json($group);
    }

    public function store(Request $request){
        $data = $request->all();
        $data =(object)$data;
        $group = new Group();
        
        $group->title = $data->title;
        $group->description = $data->description;

        if($group->save()) {
            return response()->json(['success' => true, 'message' => 'OK'],200);
        } else {
            throw response()->json(['success' => false, 'message' => 'Error'],500);
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Group  $member
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $response = [];
        $status_code = 200;

        $data = (object)$request->all();
        $group = Group::find($id);

        $group->title = $data->title;
        $group->description = $data->description;
        
        if($group->save()) {
            $response = ['success' => true, 'status' => 'OK'];
        } else {
            $response = ['success' => false, 'status' => 'Error'];
            $status = 500;
        }
        return response()->json($response, $status_code);
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Group  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $group)
    {
        $group = Group::find($group);
        $status = 200;
        if($group->delete()) {
            $response = ['success' => true, 'status' => 'OK'];
        } else {
            $response = ['success' => false, 'status' => 'Error'];
            $status = 500;
        }
        return response()->json($response, $status);
    }
}
