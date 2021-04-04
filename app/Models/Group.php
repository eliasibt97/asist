<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Group extends Model {

    use HasFactory;
    use SoftDeletes;
    public $timestamps = true;

    protected $table = "groups";
    protected $fillable = ['title','description'];

    public function members() {
        return $this->hasMany(Member::class);
    }

}