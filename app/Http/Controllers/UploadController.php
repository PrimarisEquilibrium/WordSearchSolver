<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function showForm() {
        return view("home");
    }

    public function upload(Request $request) {
        // Ensure the uploaded file is a valid image
        $request->validate([
            "image" => "required|image|mimes:jpg,png,jpeg|max:2048",
        ]);

        // Store the image locally
        if ($request->file("image")->isValid()) {
            $imagePath = $request->file("image")->store("images");
            return redirect()->route("process", [basename($imagePath)]);
        }
        return response()->json(['error' => 'No file was uploaded.'], 400);
    }

    public function process($filename) {
        return Image;
    }
}
