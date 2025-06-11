<?php

namespace Database\Factories;

use Carbon\Carbon;
use App\Models\Room;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Booking>
 */
class BookingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

     
    public function definition(): array
    {
                // Generate random start and end datetime on the same day
        $date = $this->faker->dateTimeBetween('now', '+3 days');
        $start = Carbon::instance($date)->setTime(
            $this->faker->numberBetween(8, 18),  // mulai jam 8 - 18
            0, 0
        );
        $end = (clone $start)->addHours($this->faker->numberBetween(1, 3)); // durasi 1-3 jam

        return [
            'user_id' => User::inRandomOrder()->first()?->id??1,   // buat user baru atau bisa diganti dengan id spesifik
            'room_id' => Room::inRandomOrder()->first()?->id??1,   // buat room baru atau diganti dengan id
            'date' => $start->format('Y-m-d'),
            'start' => $start->format('Y-m-d H:i:s'),
            'end' => $end->format('Y-m-d H:i:s'),
            'status' => $this->faker->randomElement(['pending', 'approved', 'rejected', 'completed']), 
        ];
    }
}
