<?php

/**
 * @author Elad Haviv <elad.haviv@gmail.com>
 */

namespace TutsZone\Http\Controllers\Acp;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Exception;
use App\Models\Category;
use App\Models\Course;
use App\Http\Controllers\Controller;
use App\Models\Lesson;

class LessonController extends AdminController
{
    public function showAdd($data = null)
    {
        $c = Course::select('id', 'title', 'name')->where('id', (int)$data)->first();
        return view('admin.add_lesson', ['course' => $c]);
    }

    public function postAdd(Request $r)
    {
        $this->validate($r, [
            'name' => 'required|unique:lessons,name',
            'title' => 'required|between:1,72',
            'course' => 'required|exists:courses,id',
            'content' => 'required'
        ]);

        $c = Course::select('id', 'title', 'name')->where('id', (int)$r->input('course'))->first();
        $l = new Lesson();
        $l->name = $r->input('name');
        $l->course = $c->id;
        $l->title = $r->input('title');
        $l->lead = $r->input('lead');
        $l->content = $r->input('content');
        $l->picture = $r->input('picture');
        $l->order = 0;
        $l->auth_date = time();
        $l->addons = $r->input('addons');

        if ($l->save()) {
            return redirect()->route('course:show', ['name' => $c->name, 'lesson' => $l->name]);
        }
    }

    public function showEdit($id)
    {
        $lesson = Lesson::where('id', $id)->first();
        return view('admin.edit_lesson', [
            "lesson" => $lesson,
        ]);
    }

    public function postEdit(Request $r)
    {
        $l = Lesson::where('id', $r->input('id'))->first();

        $rules = [
            'name' => 'required',
            'title' => 'required|between:1,72',
            'content' => 'required'
        ];
        if ($l->name != $r->input('name')) {
            $rules['name'] .= '|unique:lessons,name';
        }

        $this->validate($r, $rules);

        foreach (['name', 'title', 'lead', 'content', 'picture', 'addons'] as $field) {
            if ($l->$field != $r->input($field)) {
                $l->$field = $r->input($field);
            }
        }

        if ($l->save()) {
            $c = Course::select('name')->where('id', $l->course)->first();
            return redirect()->route('course:show', ['name' => $c->name, 'lesson' => $l->name]);
        }
    }

    public function delete($id)
    {
        Lesson::where('id', $id)->delete();
        return redirect()->back();
    }
}
