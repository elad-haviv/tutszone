<?php

/**
 * @author Elad Haviv <elad.haviv@gmail.com>
 */

namespace TutsZone\Http\Controllers\Acp;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\Course;
use App\Http\Controllers\Controller;
use App\Models\Lesson;

class CourseController extends AdminController
{
    public function showAdd($data = null)
    {
        return view('admin.add_course', [
            'categorySelector' => view('admin.category_selector', [
                'parent' => (int)$data,
                'self' => -1,
                'categories' => Category::getRecursiveCategoryList()
            ])
        ]);
    }

    public function postAdd(Request $r)
    {
        $this->validate($r, [
            'picture' => 'required',
            'name' => 'required|unique:courses,name',
            'title' => 'required|between:2,36',
            'category' => 'required|integer',
            'author_id' => 'required|exists:users,id',
            'description' => 'required'
        ]);

        $c = new Course();
        $c->name = $r->input("name");
        $c->title = $r->input("title");
        $c->description = $r->input("description");
        $c->category = $r->input("category");
        $c->picture = $r->input("picture");
        $c->author_id = $r->input("author_id");

        if ($c->save()) {
            return redirect()->route('course:show', ['name' => $c->name]);
        }
    }

    public function showEdit($id)
    {
        $course = Course::where('id', $id)->first();
        return view('admin.edit_course', [
            "course" => $course,
            "categorySelector" => view('admin.category_selector', [
                'parent' => (int)$course->category,
                'self' => -1,
                'categories' => Category::getRecursiveCategoryList()
            ])
        ]);
    }

    public function postEdit(Request $r)
    {
        $c = Course::where('id', $r->input('id'))->first();

        $rules = [
            'picture' => 'required',
            'name' => 'required',
            'title' => 'required|between:2,36',
            'category' => 'required|integer'
        ];
        if ($c->name != $r->input('name')) {
            $rules['name'] .= '|unique:courses,name';
        }

        $this->validate($r, $rules);

        foreach (['name', 'title', 'description', 'category', 'picture'] as $field) {
            if ($c->$field != $r->input($field)) {
                $c->$field = $r->input($field);
            }
        }

        if ($c->save()) {
            return redirect()->route('course:show', ['name' => $c->name]);
        }
    }

    public function delete($id)
    {
        Course::where('id', $id)->take(1)->delete();
        Lesson::where('course', $id)->delete();
        return redirect()->back();
    }
}
