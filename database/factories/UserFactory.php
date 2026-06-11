<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends Factory<User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // 1. Acak tipe user terlebih dahulu dan simpan ke variabel
        // 2 = Admin, 3 = Member
        $type = fake()->randomElement([3, 3, 3, 3, 2]);

        // 2. Siapkan data dasar yang dimiliki oleh semua tipe user
        $data = [
            'name'              => fake()->name(),
            'email'             => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password'          => Hash::make('password123'),
            'type'              => $type,
        ];

        // 3. Logika Bersyarat: Jika bukan Admin (2), maka berikan data langganan
        if ($type != 2) {
            $data['trainer_day'] = now()->addDays(fake()->randomElement([30, 15, 10, 0]))->format('Y-m-d');
            $data['trainer_id']  = fake()->randomElement([1, 2, 3]);

            $data['paket_day']   = now()->addDays(fake()->randomElement([365, 91, 30, 15, 10, 0]))->format('Y-m-d');
            $data['paket_id']    = fake()->randomElement([4, 3, 5, 0]);
        } else {
            // Jika Admin (2), pastikan data tersebut kosong (null)
            $data['trainer_day'] = 0;
            $data['trainer_id']  = 0;
            $data['paket_day']   = 0;
            $data['paket_id']    = 0;
        }

        // 4. Kembalikan data yang sudah dirakit
        return $data;
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn(array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
