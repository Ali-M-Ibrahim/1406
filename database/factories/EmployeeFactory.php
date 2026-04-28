<?php

namespace Database\Factories;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{

    protected $model=Employee::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title'=> fake()->title,
            'first_name'=>fake()->firstName,
            'last_name'=>fake()->lastName,
            'email'=>fake()->safeEmail,
            'phone'=>fake()->phoneNumber,
            'address'=>fake()->address,
            'salary'=>fake()->randomFloat(),
        ];
    }
}
