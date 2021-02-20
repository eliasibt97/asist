<?php

namespace App\Http\Controllers;

use App\Models\Miembro;
use Illuminate\Http\Request;

class MiembroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $miembros = Miembro::all();
        foreach($miembros as $miembro){
            $miembro->responsable;
            $miembro->grupo;
            $miembro->actividad;
            $miembro->movimiento;
            $miembro->datos_academicos;
            $miembro->dato_laboral;
        }
        return $miembros;
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $miembro = Miembro::find($id);
        $miembro->responsable;
        $miembro->grupo;
        $miembro->actividad;
        $miembro->movimiento;
        $miembro->datos_academicos;
        $miembro->dato_laboral;
        return $miembro;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
