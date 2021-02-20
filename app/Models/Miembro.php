<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasTimestamps;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Miembro extends Model
{
    use SoftDeletes;
    use HasTimestamps;
    protected $table = 'miembros';

    public function responsable() {
        return $this->belongsTo(Responsable::class, 'id_responsable');
    }

    public function grupo() {
        return $this->belongsTo(Grupo::class, 'id_grupo');
    }

    public function actividad() {
        return $this->hasOne(Actividad::class, 'id_miembro');
    }

    public function movimiento() {
        return $this->hasMany(Movimiento::class, 'id_miembro');
    }

    public function datos_academicos() {
        return $this->hasOne(DatosAcademico::class, 'id_miembro');
    }

    public function dato_laboral() {
        return $this->hasOne(DatoLaboral::class, 'id_miembro');
    }

}
