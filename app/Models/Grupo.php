<?php

namespace App\Models;

use Carbon\Traits\Timestamp;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Grupo extends Model
{
    use HasFactory;
    use  SoftDeletes;
    use Timestamp;

    // public function miembro() {
    //     return $this->hasMany(Miembro::class);
    // }
}
