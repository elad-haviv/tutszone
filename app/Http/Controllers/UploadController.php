<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function handle(Request $r)
    {
        foreach ($r->files->all()["files"] as $file) {
            try {
                $imageName = uniqid() . '.' . $file->getClientOriginalExtension();
                $file->move(base_path() . 'images/category/', $imageName);
                echo url('images/category/' . $imageName);
            } catch (Exception $e) {
                echo "Error: " . $e->getMessage();
                die;
            }
        }
    }

    // TODO: What is this? a backup?
    public function handleasd(Request $r)
    {
        try {
            $imageName = uniqid() . '.' . $r->file('upload-select')->getClientOriginalExtension();
            $r->file('upload-select')->move(base_path() . 'images/category/', $imageName);
        } catch (Exception $e) {
            return abort(418, $e->getMessage());
        }
        echo url('images/category/' . $imageName);
    }
}
