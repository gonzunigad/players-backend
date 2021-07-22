<?php

namespace Database\Factories;

use App\Models\Player;
use Illuminate\Database\Eloquent\Factories\Factory;

class PlayerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Player::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nickname' => $this->faker->name,
            'status' => $this->faker->shuffleString,
            'avatar' => $this->faker->imageUrl,
            'balance' => $this->faker->numberBetween(10000, 999999),
        ];
    }
}
