<?php

namespace Database\Seeders;

use App\Models\TestType;
use Illuminate\Database\Seeder;

class TestTypeSeeder extends Seeder {
    public function run() {
        $input = [
            ['name' => 'Tugas', 'sort' => 1],
            ['name' => 'UTS', 'sort' => 2],
            ['name' => 'UAS', 'sort' => 3],
        ];
        TestType::insert($input);
    }
}
