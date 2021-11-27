<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder {
    public function run() {
        Student::factory()
            ->count(40)
            ->sequence(fn ($squence) => [
                'nis' => date('Y').str_pad($squence->index + 1, 5, '0', STR_PAD_LEFT),
                'class_room_id' => null,
            ])
            ->create();
    }
}
