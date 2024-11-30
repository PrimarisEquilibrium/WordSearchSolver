<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function showForm() {
        return view("home");
    }

    public function upload(Request $request) {
        $request->validate([
            "image" => "required|image|mimes:jpg,png,jpeg|max:2048",
        ]);
        // dd($request->file("image"));
        if ($request->file("image")->isValid()) {
            $imagePath = $request->file("image")->store("images");
            return response()->json([
                'message' => 'File uploaded successfully!',
                'path' => $imagePath,
            ]);
        }
        return response()->json(['error' => 'No file was uploaded.'], 400);
    }

    public function process() {
        return "Processing Image Page";
    }
}
