<?php

/**
 * @author Elad Haviv <elad.haviv@gmail.com>
 */

namespace TutsZone\Http\Controllers\Acp;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use TutsZone\Http\Controllers\Controller;

class CategoryController extends AdminController
{
    public function postAdd(Request $r)
    {
        $r->validate([
            'picture' => 'required',
            'name' => 'required|unique:categories,name',
            'title' => 'required|between:2,36',
            'parent' => 'required|integer'
        ]);

        $c = new Category();
        $c->name = $r->input("name");
        $c->title = $r->input("title");
        $c->description = $r->input("description");
        $c->parent = $r->input("parent");
        $c->picture = $r->input("picture");

        if ($c->save()) {
            return redirect()->route('category:show', ['name' => $c->name]);
        }
    }

    public function delete($id)
    {
        Category::where('id', $id)->take(1)->delete();
        return redirect()->back();
    }

    public function showEdit($id)
    {
        $category = Category::where('id', $id)->first();
        return view('admin.edit_category', [
            "category" => $category,
            "parentSelector" => view('admin.category_selector', [
                'categories' => Category::getRecursiveCategoryList(),
                'self' => $category->id,
                'parent' => $category->parent
            ])
        ]);
    }

    public function postEdit(Request $r)
    {
        $c = Category::where('id', $r->input('id'))->first();

        $rules = [
            'picture' => 'required',
            'name' => 'required',
            'title' => 'required|between:2,36',
            'parent' => 'required|integer'
        ];
        if ($c->name != $r->input('name')) {
            $rules['name'] .= '|unique:categories,name';
        }

        $r->validate($rules);

        foreach (['name', 'title', 'description', 'parent', 'picture'] as $field) {
            if ($c->$field != $r->input($field)) {
                $c->$field = $r->input($field);
            }
        }

        if ($c->save()) {
            return redirect()->route('category:show', ['name' => $c->name]);
        }
    }
}
