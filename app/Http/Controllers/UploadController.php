<?php

namespace App\Http\Controllers;

use App\Services\OcrReaderService;
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

        $wordList = $request->input("words");
        $wordArray = array_map("trim", explode(",", $wordList));

        // Store the image locally
        if ($request->file("image")->isValid()) {
            $imagePath = $request->file("image")->store("images", "public");
            return redirect()->route("process", [
                "imagename" => basename($imagePath),
                "words" => urlencode(json_encode($wordArray))   
            ]);
        }

        return response()->json(['error' => 'No file was uploaded.'], 400);
    }
}
