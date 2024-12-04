<?php

namespace App\Services;

use thiagoalessio\TesseractOCR\TesseractOCR;

class OcrReaderService {
    /**
     * Reads an image and converts it into a string.
     * @param string $imagePath The path to the image.
     * @return string The converted string.
     */
    public static function toText(string $imagePath) : string {
        return (new TesseractOCR($imagePath))
            ->lang("eng")
            ->psm(6)
            ->oem(3)
            ->allowlist(range('A', 'Z'))
            ->dpi(300)
            ->config('tessedit_char_whitelist', 'ABCDEFGHIJKLMNOPQRSTUVWXYZ')
            ->run();
    }
}

?>