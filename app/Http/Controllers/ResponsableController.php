<?php

namespace App\Http\Controllers;

use App\Models\Responsable;
use Illuminate\Http\Request;

class ResponsableController extends Controller
{

    public function index() {
        $responsables = Responsable::all();
        $responsables = $responsables->count() > 0 ?  $responsables : [];
        return response()->json($responsables);
    }

    public function show(int $id) {
        return response()->json(Responsable::find($id));
    }

    public function store(Request $request){
        $data = $request->all();
        $data =(object)$data;
        $responsable = new Responsable();
        
        $responsable->name = $data->name;
        $responsable->email = $data->email;
        $responsable->cellphone = $data->cellphone;

        if($responsable->save()) {
            return response()->json(['success' => true, 'message' => 'OK'],200);
        } else {
            throw response()->json(['success' => false, 'message' => 'Error']);
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Responsable  $member
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $response = [];
        $status_code = 200;

        $data = (object)$request->all();
        $responsable = Responsable::find($id);

        $responsable->name = $data->name;
        $responsable->email = $data->email;
        $responsable->cellphone = $data->cellphone;
        
        if($responsable->save()) {
            $response = ['success' => true, 'status' => 'OK'];
        } else {
            $response = ['success' => false, 'status' => 'Error'];
            $status_code = 500;
        }
        return response()->json($response, $status_code);
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Responsable  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $responsable)
    {
        $responsable = Responsable::find($responsable);
        $status = 200;
        if($responsable->delete()) {
            $response = ['success' => true, 'status' => 'OK'];
        } else {
            $response = ['success' => false, 'status' => 'Error'];
            $status = 500;
        }
        return response()->json($response, $status);
    }
}
