<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SchoolYear extends Model {
    use SoftDeletes;

    protected $guarded = ['id'];
    protected $fillable = [
        'from_year',
        'to_year',
    ];

    protected $hidden = [

    ];

    public function columns() {
        return $this->fillable;
    }
}
