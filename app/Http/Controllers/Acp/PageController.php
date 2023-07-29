<?php

/**
 * @author Elad Haviv <elad.haviv@gmail.com>
 */

namespace TutsZone\Http\Controllers\Acp;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Category;
use App\Http\Controllers\Controller;
use App\Models\Page;

class PageController extends AdminController
{
    public function showAdd($data = null)
    {
        return view('admin.add_page');
    }

    public function postAdd(Request $r)
    {
        $this->validate($r, [
            'name' => 'required|unique:pages,name',
            'title' => 'required|between:1,72',
            'content' => 'required'
        ]);

        $p = new Page();
        $p->name = $r->input('name');
        $p->title = $r->input('title');
        $p->content = $r->input('content');
        $p->show = $r->input('show');

        if ($p->save()) {
            return redirect()->route('page', ['name' => $p->name]);
        }
    }

    public function showEdit($id)
    {
        $page = Page::where('id', $id)->first();
        return view('admin.edit_page', [
            "page" => $page
        ]);
    }

    public function postEdit(Request $r)
    {
        $p = Page::where('id', $r->input('id'))->first();

        $rules = [
            'name' => 'required',
            'title' => 'required|between:1,72',
            'content' => 'required'
        ];
        if ($p->name != $r->input('name')) {
            $rules['name'] .= '|unique:pages,name';
        }

        $this->validate($r, $rules);

        foreach (['name', 'title', 'show', 'content'] as $field) {
            if ($p->$field != $r->input($field)) {
                $p->$field = $r->input($field);
            }
        }

        if ($p->save()) {
            return redirect()->route('page', ['name' => $p->name]);
        }
    }

    public function delete($id)
    {
        Page::where('id', $id)->delete();
        return redirect()->back();
    }
}
