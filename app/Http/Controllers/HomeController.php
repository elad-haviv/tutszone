<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public function showIndex()
    {
        //Try to get new tutorials.
        $new = Course::orderBy('created_at', 'DESC', 'id', 'DESC')->take(3)->get();

        //Try to get featured (random) tutorials.
        $count = Course::count();
        $featured = Course::skip(mt_rand(0, max(0, $count - 3)))->take(3)->get();

        return view("home", ["disableContainer" => true, "newTuts" => $new, "featuredTuts" => $featured]);
    }

    public function getContact()
    {
        return view("contact-form");
    }

    public function postContact(Request $r)
    {
        $data = [];

        $this->validate($r, [
            "name" => "required|between:3,18",
            "email" => "required|email",
            "subject" => "required|between:3,32",
            "msg" => "required|min:3",
            "ht-field" => "max:0"
        ]);

        $msg = [
            "name" => $r->input("name"),
            "subject" => $r->input("subject"),
            "email" => $r->input("email"),
            "msg" => $r->input("msg")
        ];

        Mail::send("emails.contact-form", $msg, function ($message) {
            $message->from('contact@tutszone.co.il', 'TutsZone Contact Form');
            $message->to('tutszone@gmail.com')->subject("פנייה חדשה למערכת האתר");
        });

        $data["success"] = true;

        return view("contact-form", $data);
    }
}
