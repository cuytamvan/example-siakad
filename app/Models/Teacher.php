<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Teacher extends Authenticatable {
    use SoftDeletes, HasApiTokens, HasFactory, Notifiable;

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
