<?php

namespace App\Http\Controllers;

use App\Models\Responsable;
use Illuminate\Http\Request;

class ResponsableController extends Controller
{
    public function index() {
        return view('responsables.responsables')->with('responsables',Responsable::all());
    }

    public function show(int $id) {
        return view('responsables.responsable-detalles')->with('responsable', Responsable::find($id));
    }
}
