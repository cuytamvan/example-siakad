<?php

namespace Database\Seeders;

use App\Models\Subject;
use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder {
    public function run() {
        $input = [
            [ 'name' => 'Matematika' ],
            [ 'name' => 'Bahasa Indonesia' ],
            [ 'name' => 'Biologi' ],
        ];
        Subject::insert($input);
    }
}
