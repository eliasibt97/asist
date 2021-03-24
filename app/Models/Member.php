<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model {

    public function responsbale() {
        return $this->belongsTo(Responsable::class, 'responsable_id','id');
    }
}