<?php

namespace App\Services;

use thiagoalessio\TesseractOCR\TesseractOCR;

class OcrReaderService {
    public static function toText(string $imagePath) {
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