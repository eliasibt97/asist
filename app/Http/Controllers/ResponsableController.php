<?php

namespace App\Http\Controllers;

use App\Models\Responsable;
use Illuminate\Http\Request;

class ResponsableController extends Controller
{
    public function index() {
        $responsables = Responsable::all();
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
}
