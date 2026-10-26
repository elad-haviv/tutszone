<?php

namespace App\Http\Controllers\Acp;

use App\Http\Controllers\Acp\AdminController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MemberController extends AdminController
{
    public function showIndex()
    {
        return view('admin.members', [
            'members' => User::orderBy('id')->paginate(12),
        ]);
    }

    public function showAdd($data = null)
    {
        return view('admin.add_member');
    }

    public function postAdd(Request $r)
    {
        $this->validate($r, [
            'name' => 'required|unique:users,name',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
        ]);

        $u = new User();
        $u->name = $r->input('name');
        $u->email = $r->input('email');
        $u->password = Hash::make($r->input('password'));
        $u->group = $r->input('group', 0) == 1 ? 1 : 0;
        $u->save();

        return redirect()->route('admin:member:home');
    }

    public function showEdit($id)
    {
        $member = User::where('id', $id)->first();

        if ($member === null) {
            return abort(404);
        }

        return view('admin.edit_member', ['member' => $member]);
    }

    public function postEdit(Request $r)
    {
        $member = User::where('id', $r->input('id'))->first();

        if ($member === null) {
            return abort(404);
        }

        $rules = [
            'email' => 'required|email',
            'password' => 'nullable|min:8',
        ];
        $this->validate($r, $rules);

        $member->email = $r->input('email');
        $member->group = $r->input('group', 0) == 1 ? 1 : 0;
        if ($r->filled('password')) {
            $member->password = Hash::make($r->input('password'));
        }
        $member->save();

        return redirect()->route('admin:member:home');
    }

    public function delete($id)
    {
        User::where('id', $id)->delete();

        return redirect()->back();
    }
}
