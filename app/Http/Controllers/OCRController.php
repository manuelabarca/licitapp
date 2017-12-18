<?php

namespace App\Http\Controllers;

use thiagoalessio\TesseractOCR\TesseractOCR;
use Illuminate\Http\Request;

class OCRController extends Controller
{
    public function index(){

        return view('tesseract');
    }
}
// /var/www/licitapp/vendor/thiagoalessio/tesseract_ocr/src/

