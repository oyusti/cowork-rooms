<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reservation>
 */
class ReservationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $hours = $this->getAllHoursWithMinutesZero();

        return [
            'room_id' => $this->faker->numberBetween(1, 10),
            'user_id' => $this->faker->numberBetween(1, 10),
            'date' => $this->faker->date(),
            'time' => $this->faker->randomElement($hours),
            'status' => $this->faker->randomElement(['pendiente', 'aceptado', 'rechazado']),
        ];
    }

    /**
     * Get all hours with minutes zero
     *
     * @return array<string>
     */
    
    public function getAllHoursWithMinutesZero(){
        $hours = [];
        for ($i = 0; $i < 24; $i++) {
            $hours[] = sprintf('%02d:00', $i);
        }
        return $hours;
    }
}
