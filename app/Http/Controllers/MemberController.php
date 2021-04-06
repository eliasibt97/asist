<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Member::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data =(object)$data;
        $member = new Member();
        
        $member->name = $data->name;
        $member->surnames = $data->surnames;
        $member->cellphone = $data->cellphone;
        $member->phone = $data->phone;
        $member->email = $data->email;
        $member->age = $data->age;
        $member->address = $data->address;
        $member->born_date = $data->born_date;
        $member->birth_place = $data->birth_place;
        $member->baptism_date = $data->baptism_date;
        $member->holy_spirit_receive_date = $data->holy_spirit_receive_date;
        $member->status = $data->status;
        $member->observations = $data->observations;
        $member->group_id = $data->group_id;
        $member->responsable_id = $data->responsable_id;

        if($member->save()) {
            return response()->json(['success' => true, 'message' => 'OK'],200);
        } else {
            throw response()->json(['success' => false, 'message' => 'Error'],500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $member = Member::find($id);
        $member->activities;
        return response()->json($member);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $data = $request->all();
        $data =(object)$data;
        $member = Member::find($id);
        
        $member->name = $data->name;
        $member->surnames = $data->surnames;
        $member->cellphone = $data->cellphone;
        $member->phone = $data->phone;
        $member->email = $data->email;
        $member->age = $data->age;
        $member->address = $data->address;
        $member->born_date = $data->born_date;
        $member->birth_place = $data->birth_place;
        $member->baptism_date = $data->baptism_date;
        $member->holy_spirit_receive_date = $data->holy_spirit_receive_date;
        $member->status = $data->status;
        $member->observations = $data->observations;
        $member->group_id = $data->group_id;
        $member->responsable_id = $data->responsable_id;

        if($member->save()) {
            return response()->json(['success' => true, 'message' => 'OK'],200);
        } else {
            throw response()->json(['success' => false, 'message' => 'Error'],500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $member = Member::find($id);
        $status = 200;
        if($member->delete()) {
            $response = ['success' => true, 'status' => 'OK'];
        } else {
            $response = ['success' => false, 'status' => 'Error'];
            $status = 500;
        }
        return response()->json($response, $status);
    }
}
