<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchoolYearsTable extends Migration {
    public function up() {
        Schema::create('school_years', function (Blueprint $table) {
            $table->id();
            $table->integer('from_year');
            $table->integer('to_year');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down() {
        Schema::dropIfExists('school_years');
    }
}
