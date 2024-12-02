<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function showForm() {
        return view("home");
    }

    public function upload(Request $request) {
        // Ensure the form inputs are valid
        $request->validate([
            "image" => "required|image|mimes:jpg,png,jpeg|max:2048",
            "words" => "required|string"
        ]);

        $word_list = $request->input("words");
        $word_array = array_map("trim", explode(",", $word_list));

        // Store the image locally
        if ($request->file("image")->isValid()) {
            $image_path = $request->file("image")->store("images", "public");
            return redirect()->route("process", [
                "imagename" => basename($image_path),
                "words" => urlencode(json_encode($word_array))   
            ]);
        }

        return response()->json(['error' => 'No file was uploaded.'], 400);
    }
}
