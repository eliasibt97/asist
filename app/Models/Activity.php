<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Activity extends Model
{
    use HasFactory;
    use SoftDeletes;
    public $timestamps = true;
    
    protected $table = "activities";
    protected $fillable = ['title', 'description'];

    public function members() {
        return $this->belongsToMany(Member::class, 'activities_members', 'activity_id', 'member_id');
    }
}
