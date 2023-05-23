<?php

namespace App\Http\Controllers;
use App\Models\Course;
use App\Models\Request;
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
   
public function submitAnswer(HttpRequest $request, $sectionId)
{
    $section = Section::findOrFail($sectionId);
    
    // Validate the form data if needed
    $request->validate([
        'content' => 'required',
    ]);

    // Save the answer to the section
    $section->answers()->create([
        'content' => $request->input('content'),
        'user_id' => Auth::user()->id,
    ]);

    return redirect()->back()->with('success', 'Your answer has been submitted successfully.');
}

}
