<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    public function index(Course $course, Lesson $lesson = null)
    {
        return view("course.show", [
            "course" => $course,
            "category" => $course->categories()->first(),
            "lessons" => $course->lessons(),
            "author" => $course->author(),
            "current" => $lesson,
            "comments" => $course->comments(),
            "addons" => $lesson->addons()
        ]);
    }

    public function postComment(Request $r)
    {
        if (!Auth::check()) {
            return redirect()->back();
        }

        $this->validate($r, [
            'content' => [
                'required', 'min:3', 'regex:/\S/'
            ],
            'lesson-id' => 'required|integer|exists:lessons,id'
        ]);

        $c = new Comment();
        $c->author = Auth::user()->id;
        $c->lesson = $r->input("lesson-id");
        $c->content = nl2br(htmlspecialchars($r->input("content")));
        $c->auth_date = time();
        $c->save();

        return redirect()->back();
    }
}
