<?php

namespace Database\Factories;

use App\Enums\CurrencyEnum;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\JobListing>
 */
class JobListingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->jobTitle(),
            'description' => $this->faker->paragraph(),
            'location' => $this->faker->city(),
            'category' => $this->faker->randomElement(array: ['IT', 'Finance', 'Marketing', 'Sales', 'Engineering']),
            'company' => $this->faker->company(),
            'salary' => $this->faker->numberBetween(int1: 30000, int2: 100000),
            'currency' => $this->faker->randomElement(array: CurrencyEnum::cases()),
            'created_at' => $this->faker->dateTimeBetween(startDate: '-1 month', endDate: 'now'),
        ];
    }
}
