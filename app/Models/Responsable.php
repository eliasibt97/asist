<?php

namespace App\Models;

use Carbon\Traits\Timestamp;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Responsable extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Timestamp;

    // public function miembros() {
    //     return $this->hasMany(Miembro::class);
    // }
}
