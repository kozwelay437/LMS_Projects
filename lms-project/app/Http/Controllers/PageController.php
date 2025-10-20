<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function about()
    {
        return view('student.about'); // Blade file: resources/views/pages/about.blade.php
    }
    public function home()
    {
        return view('student.index');
    }
    public function assignCalendar()
    {
        return view('student.assignCalendar');
    }
    public function assignment()
    {
        return view('student.assignment');
    }
    public function studentAssignment()
    {
        return view('student.studentAssignment');
    }
    public function events()
    {
        return view('student.event');
    }
    public function it()
    {
        return view('student.department.it');
    }
    public function ep()
    {
        return view('student.department.ep');
    }
    public function ec()
    {
        return view('student.department.ec');
    }
    public function civil()
    {
        return view('student.department.civil');
    }
    public function me()
    {
        return view('student.department.me');
    }
    public function ie()
    {
        return view('student.department.ie');
    }
}
