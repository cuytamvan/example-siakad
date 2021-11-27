<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
    public function run() {
        // \App\Models\User::factory(10)->create();
        $this->call(TestTypeSeeder::class);
        $this->call(StudentSeeder::class);
        $this->call(SchoolYearSeeder::class);
        $this->call(SubjectSeeder::class);
        $this->call(UserSeeder::class);
    }
}
