<?php

namespace Database\Factories;

use App\Models\Tournament;
use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tournament>
 */
class TournamentFactory extends Factory
{
    protected $model = Tournament::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $start = fake()->dateTimeBetween('+1 week', '+1 month');
        $end = Carbon::parse($start)->addDays(rand(2, 5));

        return [
            'title'        => fake()->words(3, true),
            'description'  => fake()->sentence(),
            'start_date'   => $start,
            'end_date'     => $end,
        ];
    }
}
