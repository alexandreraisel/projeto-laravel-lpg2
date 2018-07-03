<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;

class EnrollmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $courses = Course::all();

        return view('enrollmentUser/index', ['courses' => $courses]);
    }
}
