<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory {
    public function definition() {
        return [
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'password' => '$2y$10$/VksifLdjChA1t6fF.IHmuCfM5Bwm3NQ.jUNu/5URRowbSMScAIGG',
            'address' => $this->faker->address(),
        ];
    }
}
