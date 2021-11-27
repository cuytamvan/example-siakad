<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TestType extends Model {
    use SoftDeletes;

    protected $guarded = ['id'];
    protected $fillable = [
        'name',
        'sort',
    ];

    protected $hidden = [

    ];

    public function columns() {
        return $this->fillable;
    }
}
