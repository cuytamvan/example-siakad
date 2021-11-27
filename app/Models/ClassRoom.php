<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClassRoom extends Model {
    use SoftDeletes;

    protected $guarded = ['id'];
    protected $fillable = [
        'name',
        'school_year_id',
    ];

    protected $hidden = [

    ];

    public function columns() {
        return $this->fillable;
    }

    public function school_year() {
        return $this->belongsTo(SchoolYear::class);
    }
}
