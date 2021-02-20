<?php

namespace App\Models;

use Carbon\Traits\Timestamp;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
    use HasFactory;
    use Timestamp;

    protected $table = 'actividades';

    // public function miembro() {
    //     return $this->
    // }
}
