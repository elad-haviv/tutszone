<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    public function showIndex($name, $lesson = null)
    {
        $variables = [];

        $variables['course'] = Course::where('name', $name)->first();
        if ($variables['course'] === null) {
            return abort(404);
        }

        $variables['category'] = Category::select('name', 'title')->where('id', $variables['course']->category)->first();
        $variables['lessons'] = Lesson::select('id', 'name', 'title', 'lead')->where('course', $variables['course']->id)->get();
        $variables['author'] = User::select('name')->where('id', $variables['course']->author_id)->first();

        if ($lesson !== null) {
            $variables['current'] = Lesson::where(['name' => $lesson, 'course' => $variables['course']->id])->first();

            if ($variables['current'] == null) {
                return abort(404);
            }

            $variables['comments'] = Comment::where('lesson', $variables['current']->id)->orderBy('auth_date', 'DESC')->paginate(15);
        } elseif (count($variables["lessons"]) == 1) {
            $variables['current'] = Lesson::where(['course' => $variables['course']->id])->first();
            $variables['comments'] = Comment::where('lesson', $variables['current']->id)->orderBy('auth_date', 'DESC')->paginate(15);
        }

        if (array_key_exists('current', $variables)) {
            if ($variables['current']->addons != null) {
                $addonNames = explode(',', $variables['current']->addons);
                $addons = [];
                foreach ($addonNames as $addon) {
                    $file =  public_path('addons' . DIRECTORY_SEPARATOR . $addon . '.json');
                    if (!is_readable($file)) {
                        continue;
                    } else {
                        $json = json_decode(file_get_contents($file));
                        if (json_last_error() !== JSON_ERROR_NONE) {
                            throw new \Exception("Invalid article addon.");
                        }
                        $addons[] = $json;
                    }
                }
                $variables["addons"] = $addons;
            }
        }

        return view("course.show", $variables);
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
