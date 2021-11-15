<?php

namespace Database\Seeders;

use App\Models\Answer;
use App\Models\Question;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $users = [];
        $questions = [];

        // X users
        for ($i = 0; $i < random_int(3, 5); $i++) {
            $users[] = User::factory()->create();
        }

        // Random creation of X question by random user
        for ($i = 0; $i < random_int(10, 20); $i++) {
            $questions[] = Question::factory()->create(['user_id' => $users[random_int(0, count($users) - 1)]->id]);
        }

        // random creation of X answers for each question by random user

        foreach ($questions as $question) {
            for ($i = 0; $i < random_int(10, 20); $i++) {
                Answer::factory()->create(
                    [
                        'user_id' => $users[random_int(0, count($users) - 1)]->id,
                        'question_id' => $question->id,
                    ]
                );
            }
        }
    }
}
