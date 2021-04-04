<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Member extends Model {

    use SoftDeletes;

    public function responsbale() {
        return $this->belongsTo(Responsable::class, 'responsable_id','id');
    }

    public function activities() {
        return $this->belongsToMany(Activity::class, 'activities_members','member_id', 'activity_id');
    }

    public function academycInformation() {
        return $this->hasOne(AcademicInformation::class);
    }

}