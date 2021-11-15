<?php

namespace Database\Factories;

use App\Models\Question;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class AnswerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'question_id' => Question::factory(),
            'body' => $this->faker->sentences(3, true),
            'votes' => random_int(0, 124),
        ];
    }
}
