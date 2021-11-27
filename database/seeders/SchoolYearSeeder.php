<?php

namespace Database\Seeders;

use App\Models\SchoolYear;
use Illuminate\Database\Seeder;

class SchoolYearSeeder extends Seeder {
    public function run() {
        $input = [
            [ 'from_year' => 2019, 'to_year' => 2020 ],
            [ 'from_year' => 2020, 'to_year' => 2021 ],
        ];
        SchoolYear::insert($input);
    }
}
