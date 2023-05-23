<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Course;
use App\Models\Request;
use Auth;

class RequestController extends Controller
{
    public function showRequests()
{
    $requests = Request::with('user', 'course')->get();

    return view('requests', compact('requests'));
}


    public function sendRequest($userName, $courseId)
    {
        $user = User::where('name', $userName)->first();
    
        // Create a new request
        $request = new Request();
        $request->user_id = $user->id;
        $request->course_id = $courseId;
        $request->status = 'pending';
        $request->save();
    
        // Logic to notify the teacher about the request
        // You can send a notification or an email to the teacher informing about the request
    
        // Redirect back with a success message
        return redirect()->back()->with('success', 'Request sent successfully');
    }


    public function confirmRequest(Request $request, Course $course)
{
    // Perform any necessary validation or authorization checks

    // Update the request status to "confirmed"
    $request->status = 'accepted';
    $request->save();

    // Redirect to the "mycourse" view with the course ID
    return redirect()->route('my-course');
}
    }
