<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model {
    use SoftDeletes, HasFactory;

    protected $guarded = ['id'];
    protected $fillable = [
        'nis',
        'password',
        'first_name',
        'last_name',
        'address',
        'class_room_id',
    ];

    protected $hidden = [

    ];

    public function columns() {
        return $this->fillable;
    }

    public function class_room() {
        return $this->belongsTo(ClassRoom::class);
    }
}
