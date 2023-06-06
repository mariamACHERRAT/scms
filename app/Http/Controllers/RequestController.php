<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Course;
use App\Models\Request;
use Auth;
use Illuminate\Http\Request as HttpRequest;

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


    public function confirmRequest(HttpRequest $httprequest, $request_id)
{
    // Perform any necessary validation or authorization checks

    // Update the request status to "confirmed"
    $request = Request::find($request_id);
    $request->status = 'accepted';
    $request->save();

    return redirect()->route('my-course');
}


public function showConfirmedStudents(HttpRequest $httprequest, $course_id)
{
    // Récupérer les étudiants confirmés pour cette course
    $course = Course::find($course_id);
    $confirmedStudents = $course->acceptedStudents()->get();
    // dd($confirmedStudents[0]["name"]);

    return view('confirmed_students', compact('course', 'confirmedStudents'));
}


public function deleteRequest(HttpRequest $httprequest, $request_id)
{
    // Perform any necessary validation or authorization checks

    // Update the request status to "confirmed"
    $request = Request::find($request_id);
    $request->status = 'rejected';
    $request->save();

    return redirect()->route('my-course');
}
public function deleteStudent(HttpRequest $httprequest, $request_id)
{
    // Perform any necessary validation or authorization checks

    // Update the request status to "confirmed"
    $request = Request::find($request_id);
    $request->status = 'rejected';
    $request->save();

    return redirect()->route('my-course');
}


    }
