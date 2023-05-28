<?php

namespace App\Http\Controllers;
use App\Models\Course;
use App\Models\Request;
use App\Models\User;
use Auth;


class StudentCourseController extends Controller
{
    public function myCourse()
{
    $user = Auth::user();
    $acceptedRequests = Request::where('user_id', $user->id)->where('status', 'accepted')->get();

    if ($acceptedRequests->isEmpty()) {
        return redirect()->back()->with('error', 'You have not been accepted to any course yet.');
    }

    $courses = $acceptedRequests->map(function ($request) {
        return $request->course;
    });

    return view('student-courses', compact('courses'));
}
   

}
