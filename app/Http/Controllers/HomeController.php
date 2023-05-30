<?php

namespace App\Http\Controllers;
use App\Models\Course;
use Illuminate\Http\Request;
use App\Models\Section;
class HomeController extends Controller
{


    public function index()
    {
        $latestCourses = Course::latest()->take(6)->get();
    
        return view('welcome', compact('latestCourses'));
    }
    public function about()
    {
        return view('about');
    }

    public function show($id)
    {
        $course = Course::with('sections')->findOrFail($id);
        return view('about-lesson', compact('course'));
    }




}
