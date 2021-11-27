<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Teacher extends Model {
    use SoftDeletes;

    protected $guarded = ['id'];
    protected $fillable = [
        'username',
        'password',
        'first_name',
        'last_name',
        'address',
        'subject_id',
    ];

    protected $hidden = [

    ];

    public function columns() {
        return $this->fillable;
    }

    public function subject() {
        return $this->belongsTo(Subject::class);
    }
}
