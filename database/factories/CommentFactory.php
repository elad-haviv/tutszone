<?php

namespace Database\Factories;

use App\Models\Comment;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $course = Course::inRandomOrder()->first();
        $lesson = Lesson::where('course_id', '=', $course->id)->inRandomOrder()->first();
        return [
            'contents' => fake()->text(50),
            'course_id' => $course->id,
            'lesson_id' => $lesson->id,
            'user_id' => User::inRandomOrder()->first()->id,
        ];
    }
}
