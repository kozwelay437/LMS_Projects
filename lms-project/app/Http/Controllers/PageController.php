<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function about()
    {
        return view('student.about'); // Blade file: resources/views/pages/about.blade.php
    }
}
