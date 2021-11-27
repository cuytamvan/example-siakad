<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Score extends Model {
    use SoftDeletes;

    protected $guarded = ['id'];
    protected $fillable = [
        'student_id',
        'test_type_id',
        'class_roon_id',
        'subject_id',
        'value',
    ];

    protected $hidden = [

    ];

    public function columns() {
        return $this->fillable;
    }
}
