<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    protected static function newFactory() {
        return TaskFactory::new();
    }

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "TaskName" => fake()->name(),
            "TaskDescription" => fake()->paragraph(1),
            "CategoryId" => random_int(1, 20),
            "TaskImage" => fake()->imageUrl(),
            "CreatedBy" => random_int(1,3),
        ];
    }
}
